<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RobotController extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->data['pagetitle'] = 'Bot Factory - Robots';
        $this->data['pagebody'] = 'Robot/robots';

    }

    public function details($which){
        $this->data['pagetitle'] = 'BotFactory - Robot details';
        $this->data['pagebody'] = 'Robot/robots';

        $source = $this->robots->get($which);

        $this->data['image'] = $source['image'];
        $this->data['type'] = $source['type'];
        $this->data['topPardId'] = $source['topPardId'];
        $this->data['torsoPartId'] = $source['torsoPartId'];
        $this->data['bottomPartId'] = $source['bottomPartId'];
        $this->data['cost'] = $source['cost'];
        $this->data['date'] = $source['assembleDate'];

        $this->render();
    }
}