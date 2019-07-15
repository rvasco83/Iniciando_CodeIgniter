<?php

class AuthHook
{
    private $controller = [
      'auth'
    ];

    public function check()
    {
        $CI =& get_instance();

        if(!isset ($CI->session)) {
            $CI->load->library('session');
        }
        $CI->load->helper('url');

        $user = $CI->session->user ?? NULL;
        $controller = $CI->uri->segment(1);

        if(!$user and !in_array($controller, $this->controller)) {
            redirect('auth/login', 'location', 302);
            die();
        }
    }
}