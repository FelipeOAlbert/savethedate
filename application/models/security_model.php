<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class security_model extends CI_Model
{
    var $array_url_free = array('signin','signup');

    function __construct()
	{
		parent::__construct();
	}

    public final function is_logged()
    {
        if($this->session->userdata('user_id') || $this->session->userdata('client_id') || in_array($this->router->method, $this->array_url_free))
			return true;
		
        redirect('dashboard/signin/1');
    }
}