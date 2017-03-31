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
        $role = $this->session->userdata('userrole');
        if ($role != ROLE_BOSS) redirect('/home');

        $this->data['pagetitle'] = 'BotFactory - History ('. $role . ')';

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