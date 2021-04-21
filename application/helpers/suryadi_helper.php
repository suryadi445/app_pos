<?php

function sudah_login()
{
    $ci = get_instance();

    if ($ci->session->userdata('role_id') == 2) {
        redirect('user/index/' . $ci->session->userdata("session_user"));
    } elseif ($ci->session->userdata('role_id') == 1) {
        redirect('administrator');
    };
}

function belum_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('email');

    if (!$user_session) {
        redirect('auth2');
    }
}
