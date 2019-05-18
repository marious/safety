<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware->execute_middlewares(['not_authinticated']);
        $this->lang->load('settings');
        $this->load->model('Setting_model');
    }


    public function index()
    {
        $this->data['page_header'] = lang('settings');
        $this->admin_template('index', $this->data);
    }


    public function test()
    {
        var_dump($this->Setting_model->check_setting_exist('test'));
    }


    public function add()
    {
        // Process the form 
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->Setting_model->rules);
        if ($this->form_validation->run($this) == TRUE)
        {
            // check if the setting post exist 
            foreach ($_POST as $setting_name => $value) {
                if ($setting_id = $this->Setting_model->check_setting_exist($setting_name)) {
                    // update 
                    $this->Setting_model->save(['value' => $value], $setting_id);
                } else {
                    // create a new one 
                    $this->Setting_model->save(['name' => $setting_name, 'value' => $value]);
                }
            }
        } 
        $_SESSION['success'] = lang('success_sended_data');
        $this->session->mark_as_flash('success');
        redirect('settings');


    }


}