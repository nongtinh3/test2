<?php
	require_once APPPATH.'controllers/admin/Base_Controller'.EXT;
	class Config extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$this->checklogin();			
			$data['info'] = $this->Mconfig->
          
        
        $this->render($this->load->view('info/page', $data, TRUE));
		}
	}
?>