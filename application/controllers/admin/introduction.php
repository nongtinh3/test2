<?php
	require_once APPPATH.'controllers/admin/Base_Controller'.EXT;
	class Introduction extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$this->checklogin();
			$data['introduction'] = $this->Mintroduct->show();		
			$this->render($this->load->view('admin/info/show',$data,TRUE));	
		}
		function add_edit()
		{
			$this->checklogin();
			$uid = $this->uri->segment(4);
			$data['info'] = $this->input->post('txtinfo');
			$data['active'] = $this->input->post('txtactive');
			$data['title'] = $this->input->post('txttitle');
			$data['danhmuc'] = $this->input->post('txtdanhmuc');
			$id = $this->input->post('id');
			$act = $this->input->post('ok');
			if($act == "Lưu")
			{
				if($id && $id!='')
				{
					if($this->Mintroduct->update($id,$data))
					{
						redirect('admin/introduction/');
					}
					else
					{
						redirect('admin/introduction/');
					}
				}
				else
				{
				if($this->Mintroduct->add($data))
					{
						redirect('admin/introduction/');
					}
					else
					{
						redirect('admin/introduction/');
					}
				}
			}
			if($uid)
			{
				$data['introduction'] = $this->Mintroduct->get_by_id($uid);
			}
			else
			{
				$data['introduction'] = array();
			}
			$data['uid'] = $uid;
			$this->render($this->load->view('admin/info/form_add_edit',$data,TRUE));
		}
	}
?>