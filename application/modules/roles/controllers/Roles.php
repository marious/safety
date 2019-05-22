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
        $this->data['page_header'] = lang('all_roles');
        $this->data['roles'] = $this->Role_model->get_roles();
        $this->admin_template('all', $this->data);
    }

    public function add($id = false)
    {
        $this->data['page_header'] = lang('add_new_role');
        $this->data['css_file'] = [site_url('assets/admin/plugins/iCheck/all.css')];
        $this->data['js_file'] = [site_url('assets/admin/plugins/iCheck/icheck.min.js'), site_url('assets/admin/js/roles.js')];
        $this->data['icheck'] = true;

        $this->data['id'] = $id;

        // Process The form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('role_name', 'lang:role_name', 'trim|required');
        $this->form_validation->set_rules('role_description', 'lang:role_description', 'trim|required');

        if ($this->form_validation->run($this) == true)
        {
            $group_id = $this->ion_auth->create_group($this->input->post('role_name'), $this->input->post('role_description'));
            if (! $group_id)
            {
                $_SESSION['error'] = $this->ion_auth->messages();
                $this->session->mark_as_flash('error');
                redirect('roles/add');
            }
            $permissions = $this->input->post('permissions');
            $this->Role_model->create_permission_group($permissions, $group_id);
            $_SESSION['success'] = 'New Role Added Successfully';
            redirect('roles/addl');
        }

        $this->admin_template('add', $this->data);
    }

}