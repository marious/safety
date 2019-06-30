<?php 
/**
 * Check if the current sidebar menu is active or not
 */
function is_sidebar_menu_active($current) 
{
    $CI =& get_instance();
    if ($CI->uri->segment(1) == $current) {
      return 'active';
    }
    return '';
}


function is_tree_sidebar_menu_active($first, $second) {
  $CI =& get_instance();
    if ($CI->uri->segment(2) == $second && $CI->uri->segment(1) == $first) {
      return 'active';
    }
    return '';
}


/**
 * Get the setting by it's name
 */
function setting($setting_name = null) {
  $CI =& get_instance();
  if ($setting_name) {
    $query = $CI->db->get_where('settings', ['name' => $setting_name]);
    return $query->row() ? $query->row()->value : '';
  }
  return '';
}


function active_tab($current)
{
    if (isset($_SESSION['active_tab']) && $_SESSION['active_tab'] == $current) {
        return 'active';
    }
}


function addToJson($ar , $en)
{
    $text = [
        'en' => $en,
        'ar' => $ar,
    ];

    $json = json_encode($text , JSON_UNESCAPED_UNICODE);

    return $json;
}

function make_slug($title, $lang = 'en')
{
    return $lang == 'ar' ? preg_replace('/[^\x{0600}-\x{06FF}0-9-]+/u', '-', $title) :
        strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $title));
    
}

function transText($dataField , $lang = null)
{
    $languages = ['english' => 'en', 'arabic' => 'ar'];
    $lang = get_current_front_lang();
    $lang = $languages[$lang];
    if($dataField != '') {
        $text = json_decode($dataField);
        return $text->$lang;
    }
    return '';

//    if ($lang == null)
//        $lang = app()->getLocale();

}

function shortDescrip($descrip , $numb)
{
    $desc = words(strip_tags($descrip) , $numb ,' ....');
    return $desc;
}

 function words($value, $words = 100, $end = '...')
{
    preg_match('/^\s*+(?:\S++\s*+){1,'.$words.'}/u', $value, $matches);

    if (! isset($matches[0]) || get_length($value) === get_length($matches[0])) {
        return $value;
    }

    return rtrim($matches[0]).$end;
}

function get_length($value, $encoding = null)
{
    if ($encoding) {
        return mb_strlen($value, $encoding);
    }

    return mb_strlen($value);
}

function dateFormat($date){
    $newFormat = date('j M Y h:i a',strtotime($date));
    return $newFormat;
}




function draw_actions_button($dit_link = '', $delete_link = '', $permission_group = '')
{
    $output = '';
    $logged_in_user_permissions = Modules::run('roles/get_active_user_permissions');

    
    if ($dit_link && in_array('edit' . '_' . $permission_group, $logged_in_user_permissions)) {
        $output .= '<a href="'.$dit_link.'" class="btn btn-sm btn-primary" title="'.lang('edit').'"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;';
    }
    if ($delete_link && in_array('delete' . '_' . $permission_group, $logged_in_user_permissions))
    {
        $output .= '<a data-href="'.$delete_link.'" class="btn btn-sm btn-danger" title="'.lang('delete').'" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>';
    }
    return $output;
}



function get_current_lang()
{
    if (!isset($_SESSION['lang']) && !isset($_GET['lang']) && isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    {
            $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    } 
    else if (isset($_SESSION['lang'])) {
        $lang = $lang;
    }

    return $lang;
}


function get_current_front_lang()
{
    return isset($_SESSION['public_site_language']) ? $_SESSION['public_site_language'] : 'arabic';
}


function make_trans($column) {
    $lang = get_current_lang();
    $text_trans = $column . '_' . $lang;
    return $text_trans;
}


function get_caller_info() {
    $c = '';
    $file = '';
    $func = '';
    $class = '';
    $trace = debug_backtrace();
    if (isset($trace[2])) {
        $file = $trace[1]['file'];
        $func = $trace[2]['function'];
        if ((substr($func, 0, 7) == 'include') || (substr($func, 0, 7) == 'require')) {
            $func = '';
        }
    } else if (isset($trace[1])) {
        $file = $trace[1]['file'];
        $func = '';
    }
    if (isset($trace[3]['class'])) {
        $class = $trace[3]['class'];
        $func = $trace[3]['function'];
        $file = $trace[2]['file'];
    } else if (isset($trace[2]['class'])) {
        $class = $trace[2]['class'];
        $func = $trace[2]['function'];
        $file = $trace[1]['file'];
    }
    if ($file != '') $file = basename($file);
    $c = $file . ": ";
    $c .= ($class != '') ? ":" . $class . "->" : "";
    $c .= ($func != '') ? $func . "(): " : "";
    return($c);
}