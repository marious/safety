<?php 

class Menu extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
    }


    public function index()
    { 
        $this->data['page_header'] = 'Manage Menu';
        $this->data['css_file'] = [site_url('assets/admin/plugins/iCheck/all.css')];
        $this->data['js_file'] = [site_url('assets/admin/plugins/jquery.nestable/jquery.nestable.js'), site_url('assets/admin/plugins/iCheck/icheck.min.js'), site_url('assets/admin/js/menu.js')];
        $this->data['icheck'] = true;

        $this->data['menus'] = $this->Menu_model->get_menu();
        $this->admin_template('index', $this->data);
    }



    public function save_order()
    {
        $menus = json_decode($this->input->post('reorder'), true);



			$child = array();
			$a=0;
			foreach($menus as $m)
			{			
				if(isset($m['children']))
				{
					$b=0;
					foreach($m['children'] as $l)					
					{
						if(isset($l['children']))
						{
							$c=0;
							foreach($l['children'] as $l2)
							{
                $level3[] = $l2['id'];
                $this->db->where('id', $l2['id']);
                $this->db->update('menu', array('parent_id'=> $l['id'],'ordering'=>$c));
								$c++;	
							}		
            }
            $this->db->where('id', $l['id']);
            $this->db->update('menu', array('parent_id'=> $m['id'],'ordering'=>$b));
						$b++;
					}							
        }
        $this->db->where('id', $m['id']);
        $this->db->update('menu', array('parent_id'=>'0','ordering'=>$a) );
				$a++;		
			}


        redirect('menu');

    }

}