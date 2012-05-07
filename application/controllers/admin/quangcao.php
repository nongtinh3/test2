<?php
	require_once APPPATH.'controllers/admin/Base_Controller'.EXT;
	class Quangcao extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$this->checklogin();
			$data['quangcao'] = $this->Mquangcao->show();
			$this->render($this->load->view('admin/quangcao/show',$data,TRUE));
		}
		function add_edit()
		{
			$this->checklogin();
			$uid = $this->uri->segment(4);
			$image = $this->input->post('txt_image');
			$image_thumb = $this->input->post('txt_image_thumb');
			$data['vitri'] = $this->input->post('txt_vitri');
			$data['lienket'] = $this->input->post('txt_lienket');
			$data['active']   = $this->input->post('txtactive');
			$data['Mvitri'] = $this->Mquangcao->show_vitri();
			$_id = $this->input->post('id');
			$act = $this->input->post('ok');
			if($act == "Lưu")
			{
				if($_FILES['p_image']['name']!='')
				{
					$config['upload_path'] = './upload/quangcao/';
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
					$data['image'] = 'upload/quangcao/'.$upload['file_name'];
					$data['image_thumb'] = 'upload/quangcao/'.$upload['raw_name'].'_thumb'.$upload['file_ext'];
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
					if($this->Mquangcao->update($uid,$data))
					{
						redirect('admin/quangcao/');
					}
					else
					{
						redirect('admin/quangcao/');
					}
				}
				else
				{
					if($this->Mquangcao->add($data))
					{
						redirect('admin/quangcao/');
					}
					else
					{
						redirect('admin/quangcao/');
					}
				}
				
				
			}
			if($uid)
			{
				$data['quangcao'] = $this->Mquangcao->get_by_id($uid);
			}
			else
			{
				$data['quangcao'] = array();
			}
			$data['uid'] = $uid;
			$this->render($this->load->view('admin/quangcao/form_add_edit',$data,TRUE));
		}
		function delete()
		{
			$this->checklogin();
			$uid = $this->uri->segment(4);		
			if($this->Mquangcao->delete($uid))
			{
				redirect('admin/quangcao/');
			}
		
		}
	}
?>