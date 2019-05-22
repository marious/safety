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



    
    public function all()
    {
        $this->data['page_header'] = 'All Roles';
        $this->data['roles'] = $this->Role_model->get_roles();
        $this->admin_template('all', $this->data);
    }

}