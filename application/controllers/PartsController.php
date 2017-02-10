<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PartsController extends Application
{

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
		$this->data['pagebody'] = 'parts_page';

		$parts = array();

		$source = $this->parts->all();
		foreach ($source as $record)
		{
			$parts[] = array('part_code' => $record['part_code']);
		}
		$this->data['parts'] = $parts;

		/*
		$parts = $this->parts->all();

		$images = array();

		foreach ($parts as $part)
		{
			$images[] = "/pix/parts/" . $part['part_code'] . ".jpeg";
		}

		$this->data['images'] = $images;
		*/
		$this->render();
	}

}
