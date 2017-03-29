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
            // transactionId | customerName | date | category | type | price | description | partId
            $history[] = array (
                'transactionId' => $record['transactionID'],
                'customerName' => $record['customerName'],
                'date' => $record['date'],
                'category' => $record['category'],
                'price' => $record['price'],
                'description' => $record['description'],
                'partID' => $record['partID']
            );
        }

        $this->data['history'] = $history;

        $this->render();
    }
}