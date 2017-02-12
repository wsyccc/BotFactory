<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomepageController extends Application
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
	 * 		http://example.com/homepage
	 *
	 * map to /Homepage/index
	 */
	public function index()
	{

		$this->data['pagetitle'] = 'Bot Factory - Homepage';

		$this->data['pagebody'] = 'homepage';

		$this->render(); 
	}

}
