<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryController extends Application
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
	 * 		http://example.com/history
	 *
	 * map to /history/index
	 */
	public function index()
	{
		$this->data['pagetitle'] = 'BotFactory - History';
		
		$this->data['pagebody'] = 'History/history_page';
       
		$source = $this->history->all();
		$history = array ();
       
		foreach ($source as $record)
		{
			//WHO | CATEGORY | TYPE | PRICE | DESCRIPTION | DATE 
			$history[] = array (
				'who' => $record['who'],
				'category' => $record['category'],
				'type' => $record['type'],
				'price' => $record['price'],
				'description' => $record['description'],
				'date' => $record['date']
			);
		}
       
		$this->data['history'] = $history;

		$this->render();
	}
}