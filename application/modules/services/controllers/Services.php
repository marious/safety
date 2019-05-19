<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller 
{

  public function __construct()
  {
      parent::__construct();
      $this->middleware->execute_middlewares(['not_authinticated']);
      $this->lang->load('services');
  }


  public function all()
  {
      $this->data['page_header'] = lang('all_services');
      $this->admin_template('all', $this->data);
  }



  public function add()
  {

    $this->admin_template('add', $this->data);
  }


}