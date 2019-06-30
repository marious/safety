<?php 

class Home extends MY_Controller 
{


    public function __construct()
    {
        parent::__construct();
        $this->lang->load('home');
    }


    public function index()
    {

        $this->data['view_module'] = 'home';
        $this->load->module('slider');
        $this->data['css_file'] = ['https://cdn.jsdelivr.net/jquery.owlcarousel/1.31/owl.carousel.css',
            site_url('assets/css/carousel.css')];
        $this->data['js_file'] = ['https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js',
            'https://cdn.jsdelivr.net/jquery.owlcarousel/1.31/owl.carousel.js'
            ,
            site_url('assets/js/wow.js'),
            site_url('assets/js/carousel.js')];
//        $this->data['menus'] = $this->Menu_model->get_menu();

        $this->public_template('index', $this->data);

    }

}