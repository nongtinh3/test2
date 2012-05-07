<?php
	class Online extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('onlinelib');
		}
		function index()
		{
			$data['online'] = $this->onlinelib->countOnline();
			$this->load->view('hello',$data);
		}
	}
?>