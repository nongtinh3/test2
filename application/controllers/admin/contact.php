<?php
	require_once APPPATH.'controllers/admin/Base_Controller'.EXT;
	class Contact extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$this->checklogin();
			$data['contact'] = $this->Mcontact->show();
			$this->render($this->load->view('admin/lienhe/show',$data,TRUE));			
		}
		function reply()
		{
			$this->checklogin();
			$email = $this->input->post('txtemail');
			$message = $this->input->post('txtmessage');
			$data['active'] = $this->input->post('txtactive');
			
			$uid = $this->uri->segment(4);
			$_id = $this->input->post('id');
			$act = $this->input->post('ok');
			if($act == "Trả lời")
			{
								$this->Mcontact->update($uid,$data);
								$this->loadMail();
								$this->email->from($email);
								$this->email->to('nongtinh3@gmail.com','thanh minh');
								$this->email->subject("Chúc mừng đến với chúng tôi");								
								$this->email->message($message);								
								if($this->email->send())
								{
								redirect('admin/contact');
								}
			}
			if($uid)
			{
				$data['contact'] = $this->Mcontact->get_by_id($uid);
			}
			else
			{
				$data['contact'] = array();
			}
			$data['uid'] = $uid;
			$this->render($this->load->view('admin/lienhe/form_add_edit',$data,TRUE));
		}
		function delete()
		{
			$this->checklogin();
			$uid = $this->uri->segment(4);
			if($this->Mcontact->delete($uid))
			{
				redirect('admin/contact/');
			}
		}
	}
?>