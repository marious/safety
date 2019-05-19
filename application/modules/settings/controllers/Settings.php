<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller 
{

    const UPLOAD_PATH = 'assets/uploads/';


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




    public function add()
    {
        // Process the form 
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->Setting_model->rules);
        if ($this->form_validation->run($this) == TRUE)
        {

            // check if the setting post exist
            foreach ($_POST as $setting_name => $value) {

                // check if the setting  is logo
                if (isset($_FILES['logo']))
                {
                    $_SESSION['active_tab'] = 'logo';

                    if ($file = $this->do_upload(self::UPLOAD_PATH, 'logo',
                    ['width' => 700, 'height' => 500, 'destination' => 'assets/uploads'])) {
                        $file_path = substr($file['full_path'], strpos($file['full_path'], 'assets'));
                        $this->make_setting('logo', $file_path);
                        $_SESSION['success'] = lang('logo_uploaded_successfully');
                        $this->session->mark_as_flash('success');
                    } else {
                        $this->session->mark_as_flash('error');
                    }
                    redirect('settings');

                }
                else
                {
                    $this->set_session_active_tab($setting_name);
                    $this->make_setting($setting_name, $value);
                }

            }
        } 
        $_SESSION['success'] = lang('success_sended_data');
        $this->session->mark_as_flash('success');
        redirect('settings');
    }


    protected function make_setting($setting_name, $value)
    {
        if ($setting_id = $this->Setting_model->check_setting_exist($setting_name)) {
            // update
            $this->Setting_model->save(['value' => $value], $setting_id);
        } else {
            // create a new one
            $this->Setting_model->save(['name' => $setting_name, 'value' => $value]);
        }
    }


    protected function set_session_active_tab($setting_name = '')
    {
        if ($setting_name == 'en_contact_address') {
            $_SESSION['active_tab'] = 'general_content';
            return;
        } else if ($setting_name == 'facebook') {
            $_SESSION['active_tab'] = 'social_media';
        }
        return;
    }



    protected function do_upload($upload_path = '', $file_name = 'image', $resize = [])
    {
        if (empty($resize)) {
            $resize['width'] = 700;
            $resize['height'] = 500;
        }
//        $upload_path =  FCPATH . "assets/uploads"
        $config['upload_path']          = FCPATH . $upload_path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg|JPG|JPEG';
        $config['max_size']             = 1096;
        $config['max_width']            = 10240;
        $config['max_height']           = 20240;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (! $this->upload->do_upload($file_name))
        {
            $error = ['error' => $this->upload->display_errors()];
            $_SESSION['error'] = $error['error'];
            return false;
        }

        // upload was success
        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];
        if ($upload_data['image_width'] > 1024 || $upload_data['image_height'] > 1024)
        {
            $this->resize_image($resize['width'], $resize['height'], ['source' => self::UPLOAD_PATH . $file_name, 'destination' => $resize['destination']]);
        }
        return $upload_data;

    }

    protected function resize_image($width, $height, $file_name = [])
    {

        $config['image_library'] 	= 'gd2';
        $config['source_image'] 	=  FCPATH . $file_name['source'];
        $config['new_image'] 		=  FCPATH . $file_name['destination'];
        $config['maintain_ratio'] 	= TRUE;
        $config['create_thumb']     = TRUE;
        $config['width']         	= $width;
        $config['height']       	= $height;

        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
    }





    protected function delete_file($file_name)
    {
        $file_path = FCPATH . $file_name;
        if (file_exists($file_path))
        {
            unlink($file_path);
        }
        return;
    }

}