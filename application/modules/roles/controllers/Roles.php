<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware->execute_middlewares(['not_authinticated']);
        $this->lang->load('roles');
        $this->load->model('Role_model');
    }



    public function permissions()
    {

    }
}