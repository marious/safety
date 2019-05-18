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