<?php
class Contacts extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contacts_model');
    }


    public function all()
    {
        $this->data['page_header'] = lang('site_messages');
        $this->admin_template('index', $this->data);
    }


    public function add()
    {

    }

}