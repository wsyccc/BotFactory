<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AboutController extends Application
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/about
	 *
	 * map to /About/index
	 */
	public function index()
	{
		$this->data['pagetitle'] = 'Bot Factory - About';

		$this->data['pagebody'] = 'about';

		$this->data['logo'] = '/pix/icons/robot_logo.png';

		$this->render(); 
	}
}
