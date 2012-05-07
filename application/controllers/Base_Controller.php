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
			
			$this->load->helpers('counter');
			
		}
		function render($content)
		{
			$data['headers'] = $this->headers();
			$data['content'] = $content;
			$data['footers'] = $this->footers();			
			$data['right']   = $this->right();
			$this->load->view('comman/template',$data);			
		}
		function headers()
		{
			$data = array();
			$data['quangcao'] = $this->Mquangcao->show();
			$data['aces'] = $this->Macces->show1();
			$data['cates'] = $this->Mcates->show1();
			
			return $this->load->view('comman/headers',$data,TRUE);
		}
		function footers()
		{			
			$data = array();
			return $this->load->view('comman/footers',$data,TRUE);
		}
		function right()
		{
			$data['online'] = countuseronline();
			$data['username'] = $this->session->userdata('username');
			$data['total'] = $this->cart->total_items();
			$data['products'] = $this->Mproducts->show_right();
			$data['news'] = $this->Mnews->show_news();
			return $this->load->view('comman/right',$data,TRUE);
		}
		function checklogin()
		{
			$id_user = $this->session->userdata('id_user');
			$logged_in = $this->session->userdata('logged_in');
			if($id_user == NULL || $logged_in == FALSE)
			{
				redirect('member/login');
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