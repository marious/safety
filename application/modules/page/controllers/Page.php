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


    private function news()
    {
    
        $this->load->module('news');

        // Count All News 
        $count = $this->db->count_all_results('news');

        // Setup pagination
        $per_page = 6;
        if ($count > $per_page) 
        {
            $this->load->library('pagination');

            $config['base_url'] = site_url('page/'.$this->uri->segment(2)) . '/';
            $config['total_rows'] = $count;
            $config['per_page'] = $per_page;
            $config['uri_segment'] = 3;

            $this->pagination->initialize($config);
            $this->data['pagination'] = $this->pagination->create_links();
            $offset = $this->uri->segment(3);
        }
        else 
        {
            $this->data['pagination'] = '';
            $offset = 0;
        }


        $this->data['news'] = $this->news->News_model->get_news_with_limit('created_at', 'DESC', $per_page, $offset);


        $this->public_template('news', $this->data);
    }




    protected function view_news_item($slug)
    {
        var_dump($slug);
    }

}