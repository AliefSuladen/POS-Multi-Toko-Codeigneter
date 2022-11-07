<?php

function chek_session()
{
    $CI = &get_instance();
    $session = $CI->session->userdata;
    if ($session['status_login'] != 'oke') {
        redirect('Auth/login');
    }
}

function chek_role()
{
    $CI = &get_instance();
    $session = $CI->session->userdata;
    if ($session['status_login'] != 'oke') {
        redirect('Auth/login');
    }
}
