<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware->execute_middlewares(['not_authinticated']);
        $this->lang->load('users');
        $this->load->model('User_Model');
    }

    public function all()
    {
        $this->data['page_header'] = lang('all_users');
        $this->data['css_file'] = [base_url(). '/assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'];
        $this->data['js_file'] = [base_url(). '/assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js',
            base_url(). '/assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js', site_url('assets/admin/js/users.js')];
        $this->admin_template('all', $this->data);
    }

    public function load_all_users()
    {
        $this->User_Model->get_all_users();
    }


    public function add($id = null)
    {
        $this->data['page_header'] = $id && is_numeric($id) ? lang('edit_user') : lang('add_new_user');
        if ($id && is_numeric($id))
        {
            $this->data['user'] = $this->ion_auth->user($id)->row();
            $this->data['id'] = $id;
        }
        else
        {
            $this->data['user'] = $this->User_Model->get_new();
            $this->data['id'] = false;
        }

        // Process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->User_Model->rules);

        if ($this->form_validation->run($this) == true)
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $group = array($this->input->post('role_group'));
            $this->ion_auth->register($username, $password, $email, [], $group);
            $_SESSION['success'] = 'User Created Successfully';
            $this->session->mark_as_flash('success');
            redirect('users/all');
        }


        $this->data['groups'] = $this->ion_auth->groups()->result();
        $this->admin_template('add', $this->data);
    }



    public function _unique_username($str)
    {
        $id = $this->uri->segment(3);
        $this->db->where('username', $this->input->post('username'));
        !$id || $this->db->where('id !=', $id);
        $item = $this->User_Model->get();
        if (!empty($item)) {
            $this->form_validation->set_message('_unique_username', '%s already exist please choose another one');
            return false;
        }
        return true;
    }

    public function _unique_email($str)
    {
        $id = $this->uri->segment(3);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $item = $this->User_Model->get();
        if (!empty($item)) {
            $this->form_validation->set_message('_unique_email', '%s already exist please choose another one');
            return false;
        }
        return true;
    }


    public function _verify_role_group()
    {
        // check if empty
        if ($this->input->post('role_group') == '0')
        {
            $this->form_validation->set_message('_verify_role_group', 'Please choose a role group for the user');
            return false;
        } else {
            $group = $this->ion_auth->group($this->input->post('role_group'))->row();
            if (!$group) {
                $this->form_validation->set_message('_verify_role_group', 'Please select a valid role group');
                return false;
            }
        }

        return true;
    }


//    public function test()
//    {
//        var_dump($this->ion_auth->get_users_groups(5)->row()->id);exit;
//    }
}