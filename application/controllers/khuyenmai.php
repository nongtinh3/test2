<?php
	require_once APPPATH.'controllers/Base_Controller'.EXT;
	class Khuyenmai extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$data['introduction'] = $this->Mintroduct->get_by_id('2');
			$this->render($this->load->view('info/show_khuyenmai',$data,TRUE));
		}
	}
?>