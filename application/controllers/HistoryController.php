<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryController extends Application
{
    //Number of records that can be displayed
    private $items_per_page = 20;
    //Default history table sorting
    private $sort = "stamp";
    //Default history table filter for models
    private $filter_model = "all";
    //Default history table filter for model series
    private $filter_series = "all";

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
        $this->page(1);
    }

    //Allows multi-page views
    public function page($num = 1) {
        //Determines if your current role type is allowed
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

        //Determines if sort was specified on another page
        $sort = $this->input->post('order');
        if($this->session->userdata('sort') == null) {
            $this->session->set_userdata('sort', $this->sort);
        } else if($sort != null) {
            $this->session->set_userdata('sort', $sort);
        }
        $this->sort = $this->session->userdata('sort');

        //Determines if filter model was specified on another page
        $filter_model = $this->input->post('filterModel');
        if($this->session->userdata('filterModel') == null) {
            $this->session->set_userdata('filterModel', $this->filter_model);
        } else if($filter_model != null) {
            $this->session->set_userdata('filterModel', $filter_model);
        }
        $this->filter_model = $this->session->userdata('filterModel');

        //Determines if filter series was specified on another page
        $filter_series = $this->input->post('filterSeries');
        if($this->session->userdata('filterSeries') == null) {
            $this->session->set_userdata('filterSeries', $this->filter_series);
        } else if($filter_series != null) {
            $this->session->set_userdata('filterSeries', $filter_series);
        }
        $this->filter_series = $this->session->userdata('filterSeries');

        //Gets the history table from the database
        $source = $this->history->all($this->sort, $this->filter_model, $this->filter_series); //get all the history
        $history = array();

        //
        $index = 0;
        $count = 0;
        $start = ($num - 1) * $this->items_per_page;
        foreach($source as $record) {
            if ($index++ >= $start) {
                
                $history[] = array (
                    'transactionId' => $record->transactionID,
                    'customer' => $record->customer,
                    'date' => $record->stamp,
                    'category' => $record->category,
                    'price' => $record->price,
                    'description' => $record->description,
                    'partID' => $record->partID,
                    'model' => $record->model,
                    'series' => $record->series
                );
                $count++;
            }
            if ($count >= $this->items_per_page) break;
        }
        $this->data['pagination'] = $this->pagenav($num);


        //Sets the sort drop-down list to specified option
        $this->data['sort_script'] = '
            var textToFind = "' . $this->sort . '";
    
            var order = document.getElementById("order");
            order.selectedIndex = 0;
            for (var i = 0; i < order.options.length; i++) {
                if (order.options[i].value === textToFind) {
                    order.selectedIndex = i;
                    break;
                }
            }
        ';

        //Sets the model drop-down list to specified option
        $this->data['filterModel_script'] = '
            var textToFind = "' . $this->filter_model . '";
    
            var model = document.getElementById("filterModel");
            model.selectedIndex = 0;
            for (var i = 0; i < model.options.length; i++) {
                if (model.options[i].value === textToFind) {
                    model.selectedIndex = i;
                    break;
                }
            }
        ';

        //Sets the series drop-down list to specified option
        $this->data['filterSeries_script'] = '
            var textToFind = "' . $this->filter_series . '";
    
            var series = document.getElementById("filterSeries");
            series.selectedIndex = 0;
            for (var i = 0; i < series.options.length; i++) {
                if (series.options[i].value === textToFind) {
                    series.selectedIndex = i;
                    break;
                }
            }
        ';

        $this->show_page($history);
    }
    
    //Displays the page
    private function show_page($history) {
        $this->data['pagebody'] = 'History/history_page';

        $this->data['history'] = $history;
        $this->render();
    }
    
    //Enables page navigation to keep track where it is
    private function pagenav($num) {
        //Determines which page its currently on
        $lastpage = ceil($this->history->size() / $this->items_per_page);
        $parms = array(
            'first' => 1,
            'previous' => (max($num-1,1)),
            'next' => min($num+1,$lastpage),
            'last' => $lastpage
        );
        return $this->parser->parse('History/itemnav',$parms,true);
    }
}