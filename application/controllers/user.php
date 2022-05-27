<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	public function index()
	{
		$var['title'] = 'Home';
        $this->load->view('users/home', $var);
	}
}