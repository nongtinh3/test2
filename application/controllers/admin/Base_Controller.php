<?php
	class Base_Controller extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('user_model','users');
			$this->load->model('categorie_model','Mcates');
			$this->load->model('acces_model','Macces');
			$this->load->model('product_model','Mproducts');
			$this->load->model('news_model','Mnews');
			$this->load->model('quangcao_model','Mquangcao');
			$this->load->model('contact_model','Mcontact');
			$this->load->model('config_model','Mconfig');
			$this->load->model('introduction_model','Mintroduct');
		}
		function render($content)
		{
			$data['headers'] = $this->headers();
			$data['footers']  = $this->footers();
			$data['content']  = $content;
			$this->load->view('admin/comman/template',$data);			
		}
		function headers()
		{
			$data = array();
			$data['username'] = $this->session->userdata('user_name');
			return $this->load->view('admin/comman/headers',$data,TRUE);
		}
		function footers()
		{
			$data = array();
			return $this->load->view('admin/comman/footers',$data,TRUE);
		}
		function checksql($str)
		{
			if(is_array($str))
			{
				return '';
			}
			else if(function_exists('mysql_real_escape_string'))
			{
				return mysql_real_escape_string($str);
			}
			else if(function_exists('mysql_escape_string'))
			{
				return mysql_escape_string($str);
			}
			else return null;
		}
		function checkmd5($md5)
		{
			return md5($md5);
		}
		function checklogin()
		{
			$id_user = $this->session->userdata('id_user');
			$logged_in = $this->session->userdata('logged_in');
			if($id_user == NULL || $logged_in == FALSE)
			{
				redirect('admin/main/login');
			}
		}
		function deleteFile($file)
		{
			if(is_file($file))
			{
				unlink($file);
			}
		}
		function loadMail()
		{
		$this->load->library('email');
		
		// do send mail
			if ($this->config->item('mail_protocol') != '') 
			{
				$mail_config = array(	'protocol'=>$this->config->item('mail_protocol'), 
									'smtp_host'   =>$this->config->item('smtp_host'), 
									'smtp_user'   =>$this->config->item('smtp_user'), 
									'smtp_pass'   =>$this->config->item('smtp_pass'), 
									'smtp_port'   =>$this->config->item('smtp_port'), 
									'smtp_timeout'=>$this->config->item('smtp_timeout'), 
									'charset'     =>$this->config->item('mail_charset'),
									'wordwrap'    =>$this->config->item('mail_wordwrap'),
									'mailtype'    =>$this->config->item('mailtype')
								);
				$this->email->initialize($mail_config);
			}
		}
	}
?>