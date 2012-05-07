<?php
	require_once APPPATH.'controllers/admin/Base_Controller'.EXT;
	class Slishow extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$data['products'] = $this->Mproducts->show();
			$data['total'] = $this->Mproducts->total_result();
			$this->load->view('slishow/show',$data);
		}
	}
?>