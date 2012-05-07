<?php
	class Googlemap extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('googlemaps');
		}
		function index()
		{
			$config['center'] = '21.027189,105.817758';
			$config['zoom'] = 'auto';
			$this->googlemaps->initialize($config);
			
			$marker = array();
			$marker['position'] = '21.027189,105.817758';
			$this->googlemaps->add_marker($marker);
			
			$data['map'] = $this->googlemaps->create_map();
			
			$this->load->view('view_file', $data);
		}
	}
	
?>