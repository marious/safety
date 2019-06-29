<?php
class Page extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Page_m');

    }


    public function index()
    {
        $slug = $this->uri->segment(2);
        if ($this->Page_m->slug_exist($slug))
        {
            $page = $this->Page_m->get_page_slug($slug);
            $page_layout = $this->Page_m->get_method_layout($page->page_layout);
            $method = $page_layout->method;
            if (method_exists($this, $method)) {
                $this->$method($page);
                return;
            }

        }
    }



    private function main($page)
    {
        $this->data['page'] = $page;
        $this->public_template('main', $this->data);
    }

}