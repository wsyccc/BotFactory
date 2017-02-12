<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomepageController extends Application
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/homepage
	 *
	 * map to /Homepage/index
	 */
	public function index()
	{

		$this->data['pagetitle'] = 'Bot Factory - Homepage';

		$this->data['pagebody'] = 'homepage';

		$data = array();
		$parts = $this->parts->count();
		//$robots = $this->robot->count();
		$spent = $this->history->getSpent();
		$earned = $this->history->getEarned();
		$data = array('parts'=> $parts, 'spent' => $spent , 'earned' => $earned);//'robots' => $robots,
        $this->data = array_merge($this->data, $data);

		$this->render(); 
	}

}
