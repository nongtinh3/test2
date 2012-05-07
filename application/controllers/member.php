<?php
	require_once APPPATH.'controllers/Base_Controller'.EXT;
	class Member extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
			
		}
		function index()
		{
			$data = array();
			$user_id = $this->session->userdata('user_id');
			$logged_in = $this->session->userdata('logged_in');
			if($user_id == NULL || $logged_in == FALSE)
			{
				redirect('member/login');
			}
			else
			{
				$data['username'] = $this->session->userdata('username');
				redirect('main/');
			}
		}
		function login()
		{
			$email = $this->input->post('txtemail');
			$pass  = md5($this->input->post('txtpass'));
			$q = $this->users->selectAll(array('user_email'=>$email),null,null);
			if($q->num_rows >0)
			{
				foreach($q->result() as $rows)
				{
					if($rows->user_pass == $pass)
					{
						$data_session = array(
							'user_id' =>$rows->user_id,
							'user_name'=>$rows->user_name,
							'user_fullname'=>$rows->user_fullname,
							'logged_in'=>TRUE
						);
						$this->session->set_userdata($data_session);
						redirect('main/');
					} 
					else
					{
						$data['error'] = "Tên đăng nhập hoặc mật khẩu không đúng";
						$this->render($this->load->view('member/login',$data,TRUE));
						//redirect('member/');
					}
				}
			}
			else
			{
				$data['error'] = "Tên đăng nhập hoặc tài khoản không tồn tại";
				//redirect('main/');
				$this->render($this->load->view('member/login',$data,TRUE));
			}
		}
		function logout()
		{
			$data_session = array(
				'id_user' => '',
				'user_name' =>'',
				'user_fullname'=>'',
				'logged_in' =>FALSE
			);
			$this->session->unset_userdata($data_session);
			redirect('main/','refresh');
			// Thoat roi - thi chuyen no ve trang chu
			// Do e chuyenr no ve trang mem --> loi temp
		}
		function register()
		{
			$valid = $this->form_validation;
			$valid->set_rules('txtname','Username','trim|required|xss_clean');
			$valid->set_rules('txtemail','Email','trim|required|valid_email|xss_clean');
			$valid->set_rules('txtdiachi','Address','trim|required|xss_clean');
			$valid->set_rules('txtphone','Phone','trim|required|alpha_numeric|xss_clean');			
			$valid->set_rules('txtpass','Password','trim|required|xss_clean');
			$data['email'] = $this->input->post('txtemail');
			$data['password'] = md5($this->input->post('txtpass'));
			$data['fullname']   = $this->input->post('txtname');
			$data['phone']   = $this->input->post('txtphone');
			$data['diachi']   = $this->input->post('txtdiachi');	
		
			$act = $this->input->post('ok');
			if($valid->run() == FALSE)
			{
				$data['error'] = 'Yêu cầu bạn nhập thông tin đầy đủ';
				
			}
			else
			{
				if($act == 'Đăng ký')
				{
					$data['error'] = "Đăng ký thành công";
					$this->users->register($data);
				}						
			}
			
			
			$this->render($this->load->view('member/register',$data,TRUE));
		}
	}
?>