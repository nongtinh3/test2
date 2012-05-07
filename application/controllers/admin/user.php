<?php
	require_once APPPATH.'controllers/admin/Base_Controller'.EXT;
	class User extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$this->checklogin();			
			$data['users'] = $this->users->show();			
			
			$this->render($this->load->view('admin/acount/show',$data,TRUE));
			
			
			
		}
		function add_edit()
		{
			$this->checklogin();			
			$uid = $this->uri->segment(4);
			$data['username'] = $this->checksql($this->input->post('txtuser'));
			$data['password'] = md5($this->input->post('txtpass'));
			$data['fullname'] = $this->checksql($this->input->post('txtfullname'));
			$data['email']    = $this->checksql($this->input->post('txtemail'));
			$data['phone']    = $this->input->post('txtphone');
			$data['diachi']   = $this->input->post('txtphone');			
			$data['level']   = $this->input->post('quyen');
			$data['gioitinh'] = $this->input->post('gioitinh');
			$data['active']    = $this->input->post('hienthi');			
			$data['ngay'] = $this->input->post('ngaysinh');
			
			$_id = $this->input->post('id');
			$act = $this->input->post('ok');
			if($act == 'Lưu')
			{
				if(isset($_id) && $_id!='')
				{
					if($this->users->edit($uid,$data))
					{
						$data['error'] = "Bạn cập nhật thành công";
						redirect('admin/user/');
					}
					else
					{
						$data['error'] = "Bạn cập nhật lỗi";
						//redirect('admin/user/add_edit/'.$uid);
						redirect('admin/user/');
					}					
				}
				else
				{
					if($this->users->add($data))
					{
						$data['error'] = "Thêm thành công";
					}
					else
					{
						$data['error'] = "Thêm không thành công";
						redirect('admin/user/');
					}
				}
			}
			if($uid)
			{
				$data['users'] = $this->users->get_by_id($uid);
			}
			else
			{
				$data['users'] = array();
			}
			$data['uid'] = $uid;
			$this->render($this->load->view('admin/acount/form_add_edit',$data,TRUE));
			
			
		}
		function delete()
		{
			$uid = $this->uri->segment(4);
			if($this->users->delete($uid))
			{
			redirect('admin/user/');
			}
		}
	}
?>