<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		// check_admin();
	}
	
	public function index()
	{
		check_not_login();
		$data['judul'] = '';
		$data['sub_judul'] = '';
		$this->template->load('template','dashboard',$data);
	}

}
