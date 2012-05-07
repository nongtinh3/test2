<?php
	require_once APPPATH.'controllers/admin/Base_Controller'.EXT;
	class Acces extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$this->checklogin();
			$data['acces'] = $this->Macces->show();
			$this->render($this->load->view('admin/access/show',$data,TRUE));
			
		}
		function add_edit()
		{
			$this->checklogin();
			$uid = $this->uri->segment(4);
			$data['ac_name'] = $this->input->post('txtac_name');
			$data['ac_name_ta'] = $this->input->post('txtac_name_ta');
			$data['ac_order'] = $this->input->post('txtac_order');
			$data['active']   = $this->input->post('txtactive');
			$_id = $this->input->post('id');
			$act = $this->input->post('ok');
			if($act == "Lưu")
			{
				if($_id && $_id!='')
				{
					if(!$this->Macces->edit($uid,$data))
					{
						redirect('admin/acces/');
					}
					else
					{
						redirect('admin/acces/');
					}
				}
				else
				{
					if(!$this->Macces->add($data))
					{
						redirect('admin/acces/');
					}
					else
					{
						redirect('admin/acces/');
					}
				}
			}
			if($uid)
			{
				$data['acces'] = $this->Macces->get_by_id($uid);
			}
			else
			{
				$dara['acces'] = array();
			}
			$data['uid'] = $uid;
			$this->render($this->load->view('admin/access/form_add_edit',$data,TRUE));
		}
		function delete()
		{
			$this->checklogin();
			$uid = $this->uri->segment(4);
			if($this->Macces->delete($uid))
			{
				redirect('admin/acces');
			}
		}
	}
	
?>