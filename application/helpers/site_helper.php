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
    return $lang == 'ar' ? preg_replace('/[^\x{0600}-\x{06FF}0-9-]+/u', '-', 'معلومات عنا') :
        strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $title));
}

function transText($dataField , $lang = null)
{
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




function draw_actions_button($dit_link = '', $delete_link = '')
{
    $output = '';
    if ($dit_link) {
        $output .= '<a href="'.$dit_link.'" class="btn btn-sm btn-primary" title="'.lang('edit').'"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;';
    }
    if ($delete_link)
    {
        $output .= '<a data-href="'.$delete_link.'" class="btn btn-sm btn-danger" title="'.lang('delete').'" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>';
    }
    return $output;
}