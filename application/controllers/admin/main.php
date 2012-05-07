<?php
	require_once APPPATH.'controllers/admin/Base_Controller'.EXT;
	class Main extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{	
			$data =array();
			$id_user = $this->session->userdata('id_user');
			$logged_in = $this->session->userdata('logged_in');
			if($id_user == NULL || $logged_in == FALSE)
			{
				$this->load->view('admin/acount/login',$data);
			}
			else
			{
				redirect('admin/introduction/');
			}
		}
		function login()
		{
			
			$data['title' ] = "Chào mừng đăng nhập quản trị website";
			$username = $this->checksql($this->input->post('txtname'));
			$password = $this->checkmd5($this->checksql($this->input->post('txtpass')));
			$q = $this->users->selectAll(array('user_name'=>$username),null,null);
			if($q->num_rows >0)
			{
				foreach($q->result() as $row)
				{
					if($row->user_pass == $password)
					{
					$data_session = array(
						'id_user' =>$row->user_id,
						'user_name' =>$row->user_name,
						'logged_in' =>TRUE
					
					);
						$this->session->set_userdata($data_session);
						redirect('admin/main');
					}
					else
					{
						$data['error'] = "Tên đăng nhập hoặc mật khẩu không đúng ";
						$this->load->view('admin/acount/login',$data);

					}
				}
			}
			else
			{
				$data['error'] = "Tên đăng nhập hoặc tài khoản không tồn tại";
				$this->load->view('admin/acount/login',$data);
			}
		}
		function logout()
		{
			$data_session = array(
				'id_user' => '',
				'user_name' =>'',
				'logged_in' =>FALSE
			);
			$this->session->unset_userdata($data_session);
			redirect('admin/main','refresh');
		}
	}
?>