<?php
	require_once APPPATH.'controllers/Base_Controller'.EXT;
	class News extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
			
		}
		function index()
		{
			$data['news'] = $this->Mnews->show_news();
			
			$this->render($this->load->view('news/show',$data,TRUE));
		}
		function detail()
		{
			$uid = $this->uri->segment(3);
			
			$data['news'] = $this->Mnews->get_by_id_news($uid);
			$this->render($this->load->view('news/detail',$data,TRUE));
		}
	}
?>