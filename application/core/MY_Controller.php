<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller 
{

  
 public $data = [];

  public function __construct()
  {
      parent::__construct();
      $this->load->module('templates');
      $this->lang->load('general');
      if (!isset($this->data['view_module']))
      {
          $this->data['view_module'] = $this->uri->segment(1);
      }

      $this->data['logged_in_user_permissions'] = [];
    if (isset($_SESSION['user_id']))
    {
        $this->data['logged_in_user_permissions'] = Modules::run('roles/get_active_user_permissions');
    }

  }



  /**
   * admin template view 
   * @param $view_file
   * @param $data
   */
  public function admin_template($view_file, $data) 
  {
      $data['view_file'] = $view_file;
      $this->templates->admin_temp($data);
  }



  /**
   * public template view 
   * @param $view_file
   * @param $data
   */
  public function public_template($view_file, $data)
  {
      $data['view_file'] = $view_file;
      $this->templates->public_temp($data);
  }




}