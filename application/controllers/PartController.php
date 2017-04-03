<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PartController extends Application
{
    function __construct()
    {
        parent::__construct();
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$role = $this->session->userdata('userrole');
        if ($role == ROLE_GUEST) redirect('/home');

	    // set page title and view
		$this->data['pagetitle'] = 'BotFactory - Parts ('. $role . ')';

		switch ($role) {
			case ROLE_GUEST:
				$this->data['menubuttons'] = '_buttonsguest';
		        break;
		    case ROLE_WORKER:
		        $this->data['menubuttons'] = '_buttonsworker';
		        break;
		    case ROLE_SUPERVISOR:
		        $this->data['menubuttons'] = '_buttonssupervisor';
		        break;
		    case ROLE_BOSS:
		        $this->data['menubuttons'] = '_buttonsboss';
		        break;
		}

		$this->data['pagebody'] = 'Parts/parts_page';

		$source = $this->parts->all();

		$this->data['parts'] = $source;

		// set page to return to
		$this->session->set_userdata('referred_from', current_url());

		$this->render();
	}

    /**
     * @param $id the id we are using to allocate the item
     * set data to the model
     */

	public function details($id)
	{
		$role = $this->session->userdata('userrole');
        if ($role == ROLE_GUEST) redirect('/home');
        
		$this->data['pagetitle'] = 'BotFactory - Part Details ('. $role . ')';

		switch ($role) {
			case ROLE_GUEST:
				$this->data['menubuttons'] = '_buttonsguest';
		        break;
		    case ROLE_WORKER:
		        $this->data['menubuttons'] = '_buttonsworker';
		        break;
		    case ROLE_SUPERVISOR:
		        $this->data['menubuttons'] = '_buttonssupervisor';
		        break;
		    case ROLE_BOSS:
		        $this->data['menubuttons'] = '_buttonsboss';
		        break;
		}
		
		$this->data['pagebody'] = 'Parts/part_details';

		$source = $this->parts->get($id);

		$this->data['partID'] = $source->partID;
		
		$this->data['model'] = $source->model;

        $this->data['piece'] = $source->piece;

        $this->data['plant'] = $source->plant;

        $this->data['line'] = $source->line;
		
		$this->data['CA_code'] = $source->CA_code;
		
		$this->data['stamp'] = $source->stamp;

		$this->render();
	}

	/**
	 * Builds parts
	 */
	public function build()
	{

        $properties = $this->properties->tail();
        if (sizeof($properties) == 0) {
            // if empty (e.g. no token)
            $password = file_get_contents("password.txt");
            $response = explode(' ', file_get_contents("http://umbrella.jlparry.com/work/registerme/apple/$password"));
            $token = $response[1];

            $db_token = $this->properties->create();
            $db_token->token = $token;
            $this->properties->add($db_token);
        }
        $current_token = $this->properties->head(1);
        $token = $current_token[0]->token;




		$parts_response = file_get_contents("http://umbrella.jlparry.com/work/mybuilds?key=" . $token);
		$built_parts = json_decode($parts_response, true);

		$response = explode(' ', $parts_response);

		if ($response[0] == '[]') {
			echo "<b>Not enough parts to retrieve</b>";
		} else {
			$size = sizeof($built_parts);

			foreach ($built_parts as $part) {
				$p = $this->parts->create();

				$p->CA_code = $part['id'];
				$p->model = $part['model'];
				$p->piece = $part['piece'];
				$p->plant = $part['plant'];
				$p->stamp = $part['stamp'];
				// get line
				if (preg_match("/^[a-lA-L]$/", $part['model'])) {
					$p->line = "household";
				} else if (preg_match("/^[m-vM-V]$/", $part['model'])) {
					$p->line = "butler";
				} else {
					$p->line = "companion";
				}
				$p->isAvailable = 1;

				// insert into database
				$this->parts->add($p);
			}

			echo 'Built ' . $size . ' parts';

			$record = array('category' => 'Build', 'description' => 'Built ' . $size . ' parts');

			// Update history table

            $this->history->add($record);
		}

		// return to original page
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
	}

	/**
	 * Buys a box of parts
	 */
	public function buy()
	{
		$tokens = array();
		$properties = $this->properties->tail();
		if (sizeof($properties) == 0) {
			// if empty (e.g. no token)
            $password = file_get_contents("password.txt");
            $response = explode(' ', file_get_contents("http://umbrella.jlparry.com/work/registerme/apple/$password"));
			$token = $response[1];

			$db_token = $this->properties->create();
			$db_token->token = $token;
			$this->properties->add($db_token);

			$properties = $this->properties->tail();
		}

		// grab api key (token)
		foreach ($properties as $token_property) {
			array_push($tokens, $token_property->token);
		}

		foreach ($tokens as $token) {
			$parts_response = file_get_contents("http://umbrella.jlparry.com/work/buybox?key=" . $token);

			$box_parts = json_decode($parts_response, true);

			if (sizeof($box_parts) == 0) {
				continue;
			}

			if (is_array($box_parts)) {
				foreach ($box_parts as $part) {
					$p = $this->parts->create();

					$p->CA_code = $part['id'];
					$p->model = $part['model'];
					$p->piece = $part['piece'];
					$p->plant = $part['plant'];
					$p->stamp = $part['stamp'];
					$p->piece = $part['piece'];
					// get line
					if (preg_match("/^[a-lA-L]$/", $part['model'])) {
						$p->line = "household";
					} else if (preg_match("/^[m-vM-V]$/", $part['model'])) {
						$p->line = "butler";
					} else {
						$p-> line = "companion";
					}
					$p->isAvailable = 1;

					// insert into database
					$this->parts->add($p);
                    $record = array('category' => 'Buy Box', 'description' => 'Buy a Box ');

                    // Update history table

                    $this->history->add($record);
				}
			}
		}

		// return to original page
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
	}

}
