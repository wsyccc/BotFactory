<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AssemblyController extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * the main page of assembly page
     */
    public function index()
    {
        $role = $this->session->userdata('userrole');
        if ($role == ROLE_GUEST || $role == ROLE_WORKER) redirect('/home');

            $this->data['pagetitle'] = 'BotFactory - Assembly ('. $role . ')';

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

        $this->data['pagebody'] = 'Assembly/assembly';

        //get all parts
        $parts = $this->parts->all();
        //get all robots
        $robots = $this->robots->all();

        //assembly the single parts tp a parser
        foreach ($parts as $part){
            if($part["piece"] === "Top"){
                $top[]= $this->parser->parse('Assembly/_singlePart', (array) $part, true);
            }else if($part["piece"] === "Torso"){
                $torso[]= $this->parser->parse('Assembly/_singlePart', (array) $part, true);
            }else{
                $bottom[]= $this->parser->parse('Assembly/_singlePart', (array) $part, true);
            }
        }


        //use the parser to build a robot

        foreach ($robots as $robot){
            $cellsForRobots[] = $this->parser->parse('Assembly/_singleRobot', (array)$robot, true);
        }

        //create a html table to display the robot
        $this->load->library('table');
        $template = array(
            'table_open' => '<table class="theTable">',
            'cell_start' => '<td class="justOne">',
            'table_close' => '</table>'
        );

        //set the parser configure and parameters
        $this->table->set_template($template);
        $this->table->set_caption('Top Part');
        $rows = $this->table->make_columns($top, 3);
        $this->data['tableTop'] = $this->table->generate($rows);

        $this->table->set_caption('Torso Part');
        $rows = $this->table->make_columns($torso, 3);
        $this->data['tableTorso'] = $this->table->generate($rows);

        $this->table->set_caption('Bottom Part');
        $rows = $this->table->make_columns($bottom, 3);
        $this->data['tableBottom'] = $this->table->generate($rows);

        $this->table->set_caption('Assembled Robots');
        $rows = $this->table->make_columns($cellsForRobots, 3);
        $this->data['tableRobots'] = $this->table->generate($rows);

        $this->render();
    }
}