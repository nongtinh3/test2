<?php
	require_once APPPATH.'controllers/Base_Controller'.EXT;
	class Contact extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$valid = $this->form_validation;
			$valid->set_rules('txtemail','Email','trim|required|valid_email');
			$valid->set_rules('txttitle','Tiêu đề','trim|required');
			$valid->set_rules('txtnoidung','Nội dung','trim|required');
			if($valid->run() == FALSE)
			{
				$data['error'] = "Bạn điền thông tin đầy đủ";
				$this->render($this->load->view('contact/show',$data,TRUE));
			}
			else
			{
			$now = getdate();
			$currentDate = $now["mday"] . "-" . $now["mon"] . "-" . $now["year"];
			$data['email'] = $this->input->post('txtemail');
			$data['title'] = $this->input->post('txttitle');
			$data['info'] = $this->input->post('txtnoidung');
			$data['add_date'] = $currentDate;
			$act = $this->input->post('ok');
			if($act == "Liên hệ")
			{
				if(!$this->Mcontact->add($data))
				{
				$data['error'] = "Cảm ơn bạn chúng tôi sẽ hồi âm lại!";												
				}
			}
			
			$this->render($this->load->view('contact/show',$data,TRUE));
			}
		}
	}
?>