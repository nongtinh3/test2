<?php
	require_once APPPATH.'controllers/admin/Base_Controller'.EXT;
	class Product extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$this->checklogin();
			$data['products'] = $this->Mproducts->show();
			
			$config['base_url'] =  base_url().'index.php/admin/product/index';
			$uid =$this->uri->segment(4);
			$config['per_page'] = '5'; 				
			$config['uri_segment'] = 4;
			//lay tong so trang
			$config['total_rows'] = $this->Mproducts->total();				
			$this->pagination->initialize($config);
			$data['page'] = $this->pagination->create_links();
			
			$data['products'] = $this->Mproducts->product_phantrang($uid,$config['per_page']);
			$this->render($this->load->view('admin/product/show',$data,TRUE));
		}
		function add_edit()
		{
			$this->checklogin();
			$uid = $this->uri->segment(4);
			$data['p_name']    		= $this->input->post('txt_p_name');
			$data['p_code']			= $this->input->post('txt_p_code');
			$data['p_price']		= $this->input->post('txt_p_price');
			$data['p_info']			= $this->input->post('txt_info');
			$data['p_thongso']		= $this->input->post('txt_thongso');
			$data['p_khuyen_mai']	= $this->input->post('txt_khuyenmai');			
			$data['active_index']	= $this->input->post('txtactive_index');
			$data['active_top']		= $this->input->post('txtactive_top');
			$data['p_cate_id']      = $this->input->post('txt_cate_id');
			$data['active']    		= $this->input->post('txtactive');
			$data['active_slishow']    		= $this->input->post('txtactive_slishow');
			$image 					= $this->input->post('image');
			$image_thumb 			= $this->input->post('image_thumb');
			$data['cates']          = $this->Mcates->show();
			$_id = $this->input->post('id');
			$act = $this->input->post('ok');
			if($act == 'Lưu')
			{
				if($_FILES['p_image']['name']!='')
				{
					$config['upload_path'] = './upload/product/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['remove_spaces'] = TRUE;
					$config['max_size'] = 1024;
					$config['max_width'] = '1024';
					$config['max_height'] = '1024';
					$config['file_name'] = $_FILES['p_image']['name'];
					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('p_image')) 
					{
					return false;
					} else {
					$upload = $this->upload->data();
					$data['image'] = 'upload/product/'.$upload['file_name'];
					$data['image_thumb'] = 'upload/product/'.$upload['raw_name'].'_thumb'.$upload['file_ext'];
					// tao image thumb
						$config['image_library'] = 'gd2';
						$config['source_image'] = $upload['full_path'];
						$config['thumb_maker'] = '_thumb';
						$config['create_thumb'] = TRUE;
						$config['maintain_ratio'] = FALSE;
						$config['quality'] = '100%';
						$config['width'] = '100';
						$config['height'] = '120';
						$config['new_image'] = $upload['file_name'];	
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						$this->image_lib->clear();
						if($image !='' && $image_thumb !='')
						{
						$this->deleteFile($image);
						$this->deleteFile($image_thumb);
						}
					
						}	
				}
				else
				{
					if($image !='' && $image_thumb !='') {
					$data['image'] = $image;
					$data['image_thumb'] = $image_thumb;
					} else {
						$data['image'] = '';
						$data['image_thumb'] = '';
					}
				}
				if($_id && $_id!='')
				{
					if($this->Mproducts->update($uid,$data))
						{
							redirect('admin/product/');
						}
					else
						{
							redirect('admin/product/');
						}
				}
				else
				{
					if($this->Mproducts->add($data))
						{
							redirect('admin/product/');
						}
					else
						{
							redirect('admin/product/');
						}
				}
			}
			if($uid)
			{
				$data['products'] = $this->Mproducts->get_by_id($uid);
			}
			else
			{
				$data['products'] = array();
			}
			$data['uid'] = $uid;
			$this->render($this->load->view('admin/product/form_add_edit',$data,TRUE));
		}
		function delete()
		{
			$this->checklogin();
			$uid = $this->uri->segment(4);
			if($this->Mproducts->delete($uid))
			{
				redirect('admin/product');
			}
		}
	}
?>