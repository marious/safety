<?php 

function not_authinticated()
{
    $CI =& get_instance();
    if (! $CI->ion_auth->logged_in())
    {
        redirect('auth/login');
    }

    return true;
}