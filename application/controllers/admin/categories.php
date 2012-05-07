<?php
	require_once APPPATH.'controllers/admin/Base_Controller'.EXT;
	class Categories extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->library('pagination');
		}
		function index()
		{
			$this->checklogin();
			$data['cates'] = $this->Mcates->show();
			$config['base_url'] =  base_url().'index.php/admin/categories/index';
			$uid =$this->uri->segment(4);
			$config['per_page'] = '20'; 				
			$config['uri_segment'] = 4;
			//lay tong so trang
			$config['total_rows'] = $this->Mcates->total();				
			$this->pagination->initialize($config);
			$data['page'] = $this->pagination->create_links();
			
			$data['cates'] = $this->Mcates->cate_phantrang($uid,$config['per_page']);
			
			$this->render($this->load->view('admin/categorie/show',$data,TRUE));
		}
		function add_edit()
		{
			$this->checklogin();
			$uid = $this->uri->segment(4);
			$data['cate_name_tv'] = $this->input->post('txt_ac_name_tv');
			$data['cate_name_ta'] = $this->input->post('txt_ac_name_ta');
			$data['ac_id']        = $this->input->post('txtdanhmuc'); 
			$data['active']       = $this->input->post('txtactive');
			$data['acces']        = $this->Macces->show();
			$_id = $this->input->post('id');
			$act = $this->input->post('ok');
			if($act == 'Lưu')
			{
				if($_id && $_id!='')
				{
					if($this->Mcates->update($uid,$data))
					{	
						redirect('admin/categories/');
					}
					else
					{
						redirect('admin/categories/');
					}
				}
				else
				{
					if($this->Mcates->add($data))
					{
						redirect('admin/categories/');
					}
					else
					{
						redirect('admin/categories/');
					}
				}
				
			}
			if($uid)
			{
				$data['cates'] = $this->Mcates->get_by_id($uid);
			}
			else
			{
				$data['cates'] = array();
			}
			$data['uid'] = $uid;
			$this->render($this->load->view('admin/categorie/form_add_edit',$data,TRUE));
			
		}
		function delete()
		{
			$uid = $this->uri->segment(4);
			if($this->Mcates->delete($uid))
			{
				redirect('admin/categories/');
			}
		}
	}
	
?>