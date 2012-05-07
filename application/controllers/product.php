<?php
	require_once APPPATH.'controllers/Base_Controller'.EXT;
	class Product extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function show()
		{
			$uid = $this->uri->segment(3);
			$data['products'] = $this->Mproducts->show_list_product($uid);
			$this->render($this->load->view('product/show_list_product',$data,TRUE));
		}
		function detail()
		{
			$uid = $this->uri->segment(3);
			$id = $this->input->post('pid');
			
			$data['products_cl'] = $this->Mproducts->show_product_cl($id,$uid);
			
			$data['products'] = $this->Mproducts->get_by_id($uid);
			
			$this->render($this->load->view('product/detail',$data,TRUE));
		}
		
			
	}
?>