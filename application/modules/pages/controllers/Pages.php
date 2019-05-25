<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware->execute_middlewares(['not_authinticated']);
        $this->middleware->only(['check_permission:show_pages'], ['all']);
        $this->middleware->only(['check_permission:add_pages'], ['add']);
        $this->middleware->only(['check_permission:edit_pages'], ['edit']);
        $this->middleware->only(['check_permission:delete_pages'], ['delete']);
        $this->lang->load('pages');
        $this->load->model('Page_model');
    }


    public function all()
    {
        $this->data['page_header'] = lang('all_pages');
        $this->data['css_file'] = [base_url(). '/assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'];
        $this->data['js_file'] = [base_url(). '/assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js',
            base_url(). '/assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js', base_url() . '/assets/admin/js/pages.js'];
        $this->admin_template('all', $this->data);
    }

    public function load_all_pages()
    {
        $this->Page_model->get_all_pages();
    }

    public function add($id= false)
    {
        $this->data['page_header'] = $id && is_numeric($id) ? '<i class="fa fa-arrow-circle-o-right"></i> '.lang('edit_service')  : '<i class="fa fa-arrow-circle-o-right"></i> '.lang('add_new_service');
        $this->data['css_file'] = [base_url() . '/assets/admin/css/summernote.css'];
        $this->data['js_file'] = [base_url() . '/assets/admin/js/summernote.js', base_url() . 'assets/admin/js/handle_editor.js'];

        if ($id && is_numeric($id))
        {
            $this->Page_model->get($id) || redirect('pages/all');     // check if valid page id
            $this->data['page'] = $this->Page_model->get($id);
        }
        else
        {
            $this->data['page'] = $this->Page_model->get_new();
        }

        $this->data['id'] = $id;

        // Process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->Page_model->rules);

        // Will produce $_SESSION['error'] is something happen
        if (isset($_FILES['image']) && $_FILES['image']['name'] != '')
        {
            if ($file = $this->Service_model->do_upload($this->Service_model->upload_path, 'image')) {
                $data['image'] = substr($file['full_path'], strpos($file['full_path'], 'assets'));
            }
        }


        if ($this->form_validation->run($this) == TRUE)
        {

            if (isset($_SESSION['error']))
            {
                $this->session->mark_as_flash('error');
                $this->admin_template('add', $this->data);
                return;
            }

            $data['name'] = addToJson($this->input->post('ar_name'), $this->input->post('en_name'));
            $data['content'] = addToJson($this->input->post('ar_description'), $this->input->post('en_description'));
            $data['slug'] = addToJson(make_slug($this->input->post('en_name')), make_slug($this->input->post('ar_name'), 'ar'));
            $data['meta_keywords'] = trim($this->input->post('meta_keywords'));
            $data['meta_description'] = trim($this->input->post('meta_description'));
            $data['meta_title'] = trim($this->input->post('meta_title'));
            $this->Service_model->save($data, $id);
            $_SESSION['success'] = $id ? lang('scucess_edit') : lang('success_add');
            $this->session->mark_as_flash('success');
            redirect('pages/all');
        }
        $this->admin_template('add', $this->data);
    }


    public function edit($id)
    {
        $this->add($id);
    }
}