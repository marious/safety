<?php 

class Home extends MY_Controller 
{


    public function __construct()
    {
        parent::__construct();
        $this->lang->load('home');
    }


    public function index()
    {


        $this->public_template('index', $this->data);

    }

}