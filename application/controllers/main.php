<?php
	require_once APPPATH.'controllers/Base_Controller'.EXT;
	class Main extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$data['products'] = $this->Mproducts->show_index();
			$this->render($this->load->view('main/home',$data,TRUE));
		}
		function product_top()
		{
			$data['products'] = $this->Mproducts->show_top();
			$this->render($this->load->view('product/product_top',$data,TRUE));
		}
		
	}
?>
