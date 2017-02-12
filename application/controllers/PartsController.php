<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PartsController extends Application
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
		$this->data['pagetitle'] = 'Bot Factory - Parts';
		$this->data['pagebody'] = 'Parts/parts_page';

		$source = $this->parts->all();
//		foreach ($source as $record)
//		{
//			$piece_type = substr($record['part_code'], 1, 1);
//			$piece = '';
//			if ($piece_type == '1')
//			{
//				$piece = "Top";
//			}
//			else if ($piece_type == '2')
//			{
//				$piece = "Torso";
//			}
//			else if ($piece_type == '3')
//			{
//				$piece = "Bottom";
//			}
//
//
//			$line_code = substr($record['part_code'], 0, 1);
//			$household_range = range('a', 'l');
//			$butler_range = range('m', 'v');
//			$companion_range = range('w', 'z');
//
//			$line = '';
//
//			if (in_array($line_code, $household_range)) // Household bot
//			{
//				$line = 'Household';
//			}
//			else if (in_array($line_code, $butler_range)) // Butler bot
//			{
//				$line = 'Butler';
//			}
//			else if (in_array($line_code, $companion_range)) // Companion bot
//			{
//				$line = 'Companion';
//			}
//
//			$parts[] = array('id' => $record['partID'], 'part_code' => $record['part_code'], 'piece_type' => $piece, 'line' => $line);
//		}
		$this->data['parts'] = $source;

		$this->render();
	}

	public function details($id)
	{
		$this->data['pagetitle'] = 'Bot Factory - Part details';
		$this->data['pagebody'] = 'Parts/part_details';

		$source = $this->parts->get($id);

		$this->data['id'] = $source['partID'];
		$this->data['part_code'] = $source['part_code'];
		$this->data['CA_code'] = $source['CA_code'];
		$this->data['manufacturer'] = $source['manufacturer'];
		$this->data['built_date'] = $source['built_date'];
        $this->data['cost'] = $source['cost'];

		$this->render();
	}

}
