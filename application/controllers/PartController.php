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

		$this->data['id'] = $source['partID'];
		
		$this->data['part_code'] = $source['part_code'];
		
		$this->data['CA_code'] = $source['CA_code'];
		
		$this->data['manufacturer'] = $source['manufacturer'];
		
		$this->data['built_date'] = $source['built_date'];
        
        $this->data['cost'] = $source['cost'];
        $this->data['isAvailable'] = $source['isAvailable'];

		$this->render();
	}

}
