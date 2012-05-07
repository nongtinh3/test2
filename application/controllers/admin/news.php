<?php
	require_once APPPATH.'controllers/admin/Base_Controller'.EXT;
	class News extends Base_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		function index()
		{
			$this->checklogin();
			$data['cate_news'] = $this->Mnews->show();
			$this->render($this->load->view('admin/news/show_cate',$data,TRUE));
		}
		function add_edit()
		{
			$this->checklogin();
			$uid  = $this->uri->segment(4);
			$data['c_news_name'] = $this->input->post('txt_c_news_name');
			$data['active']      = $this->input->post('txtactive');
			$_id = $this->input->post('id');
			$act = $this->input->post('ok');
			if($act == "Lưu")
			{
				if($_id && $_id !='')
				{
					if($this->Mnews->update($uid,$data))
					{
						redirect('admin/news/');
					}
					else
					{
						redirect('admin/news/');
					}
				}
				else
				{
					if($this->Mnews->add($data))
					{
						redirect('admin/news/');
					}
					else
					{
						redirect('admin/news/');
					}
				}
			}
			if($uid)
			{
				$data['cate_news'] = $this->Mnews->get_by_id($uid);
			}
			else
			{
				$data['cate_news'] = array();
			}
			$data['uid'] = $uid;
			$this->render($this->load->view('admin/news/form_add_edit',$data,TRUE));
		}
		function delete()
		{
			$this->checklogin();
			$uid = $this->uri->segment(4);
			if($this->Mnews->delete($uid))
			{
				redirect('admin/news/');
			}
		}
		function show_news()
		{
			$this->checklogin();
			$data['news'] = $this->Mnews->show_news();
			$config['base_url'] =  base_url().'index.php/admin/news/show_news';
			$uid =$this->uri->segment(4);
			$config['per_page'] = '5'; 				
			$config['uri_segment'] = 4;
			//lay tong so trang
			$config['total_rows'] = $this->Mnews->total();				
			$this->pagination->initialize($config);
			$data['page'] = $this->pagination->create_links();
			$data['news'] = $this->Mnews->news_phantrang($uid,$config['per_page']);
			
			$this->render($this->load->view('admin/news/show_news',$data,TRUE));
		}
		function add_edit_news()
		{
			$this->checklogin();
			$uid = $this->uri->segment(4);
			$data['name'] = $this->input->post('txtname');
			$data['short_info'] = $this->input->post('txtshort_info');
			$data['info']       = $this->input->post('txt_info');
			$data['cate_news_id'] = $this->input->post('txt_cate_news_id');
			$data['active']       = $this->input->post('txtactive');
			
			/*Upload hinh*/			
			$image 					= $this->input->post('txtimage');
			$image_thumb 			= $this->input->post('txtimage_thumb');
			
			$data['cate_news'] = $this->Mnews->show();
			$_id = $this->input->post('id');
			$act = $this->input->post('ok');
			if($act == "Lưu")
			{
				if($_FILES['p_image']['name']!='')
				{
					$config['upload_path'] = './upload/news/';
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
					$data['image'] = 'upload/news/'.$upload['file_name'];
					$data['image_thumb'] = 'upload/news/'.$upload['raw_name'].'_thumb'.$upload['file_ext'];
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
				if($_id && $_id !='')
				{
					if($this->Mnews->update_news($uid,$data))
					{
						redirect('admin/news/show_news/');
					}
					else
					{
						redirect('admin/news/show_news/');
					}
				}
				else
				{
					if($this->Mnews->add_news($data))
					{
						redirect('admin/news/show_news/');
					}
					else
					{
						redirect('admin/news/show_news/');
					}
				}
			}
			if($uid)
			{
				$data['news'] = $this->Mnews->get_by_id_news($uid);
			}
			else
			{
				$data['news'] = array();
			}
			$data['uid'] = $uid;
			$this->render($this->load->view('admin/news/form_add_edit_news',$data,TRUE));
		}
		function delete_news()
		{
			$this->checklogin();
			$uid = $this->uri->segment(4);
			if($this->Mnews->delete_news($uid))
			{
				redirect('admin/news/show_news');
			}
		}
	}
?>