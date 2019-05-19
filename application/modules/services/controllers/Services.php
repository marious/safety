<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller 
{

  public function __construct()
  {
      parent::__construct();
      $this->middleware->execute_middlewares(['not_authinticated']);
      $this->lang->load('services');
      $this->load->model('Service_model');
  }


  public function all()
  {
      $this->data['page_header'] = lang('all_services');
      $this->data['css_file'] = [base_url(). '/assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'];
      $this->data['js_file'] = [base_url(). '/assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js',
          base_url(). '/assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js', base_url() . '/assets/admin/js/services.js'];
      $this->admin_template('all', $this->data);
  }

  public function load_all_services()
  {
      $this->Service_model->get_all_services();
  }


  public function add($id = null)
  {
    $this->data['page_header'] = '<i class="fa fa-arrow-circle-o-right"></i> '.lang('add_new_service');
    $this->data['css_file'] = [base_url() . '/assets/admin/css/summernote.css'];
    $this->data['js_file'] = [base_url() . '/assets/admin/js/summernote.js', base_url() . 'assets/admin/js/handle_editor.js'];

      if ($id && is_numeric($id))
      {

      }
      else if ($id == null)
      {
          $this->data['service'] = $this->Service_model->get_new();
          $this->data['id'] = false;
      }

      // Process the form
      $this->load->library('form_validation');
      $this->form_validation->set_rules($this->Service_model->rules);

      // upload featured image
      if (isset($_FILES['image']))
      {
          if ($file = $this->Service_model->do_upload($this->Service_model->upload_path, 'image')) {
              $data['image'] = substr($file['full_path'], strpos($file['full_path'], 'assets'));
          } else {
              $this->session->mark_as_flash('error');
              redirect('services/add');
          }
      }

      // upload banner image
      if (isset($_FILES['banner']))
      {
          if ($file = $this->Service_model->do_upload($this->Service_model->upload_path, 'banner')) {
              $data['banner'] = substr($file['full_path'], strpos($file['full_path'], 'assets'));
          } else {
              $this->session->mark_as_flash('error');
              redirect('services/add');
          }
      }



      if ($this->form_validation->run($this) == TRUE)
      {
            $data['name'] = addToJson($this->input->post('ar_name'), $this->input->post('en_name'));
            $data['description'] = addToJson($this->input->post('ar_description'), $this->input->post('en_description'));
            $data['slug'] = addToJson(make_slug($this->input->post('en_name')), make_slug($this->input->post('ar_name'), 'ar'));
            $this->Service_model->save($data);
            $_SESSION['success'] = 'Saved';
            $this->session->mark_as_flash('success');
            redirect('services/add');
      }
    $this->admin_template('add', $this->data);
  }


}