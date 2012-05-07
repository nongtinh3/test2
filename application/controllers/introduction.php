<?php
	require_once APPPATH.'controllers/Base_Controller'.EXT;
	class Introduction extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$data['introduction'] = $this->Mintroduct->get_by_id('1');
			$this->render($this->load->view('info/show',$data,TRUE));
		}
	}
?>