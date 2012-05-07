<?php
	class Product_model extends CI_Model
	{
		var $table = "product";
		function __construct()
		{
			parent::__construct();
		}
		function show()
		{
			$q = $this->db->get($this->table);
			return $q->result();			
		}
		function show_list_product($id)
		{
			$this->db->where('p_cate_id',$id);
			$q = $this->db->get($this->table);
			return $q->result();
		}
		function show_product_cl($id,$uid)
		{
			$sql = "select * from product where p_cate_id = '".$id."' and p_id !='".$uid."'";
			$q = $this->db->query($sql);
			return $q->result();
		}
		
		function show_right()
		{
			$sql = "select * from product where active_slishow = 1 and active =1 ";
			$q = $this->db->query($sql);
			return $q->result();
		}
		function show_index()
		{
			$sql = "select * from product where active_index = 1 and active =1 ";
			$q = $this->db->query($sql);
			return $q->result();
		}
		function show_top()
		{
			$sql = "select * from product where active_top = 1 and active =1 ";
			$q = $this->db->query($sql);
			return $q->result();
		}
		function add($data)
		{
			$data = array(
				'p_name'   		=>$data['p_name'],
				'p_code'   		=>$data['p_code'],
				'p_price'  		=>$data['p_price'],
				'p_info'   		=>$data['p_info'],
				'p_thongso'		=>$data['p_thongso'],
				'p_khuyenmai'	=>$data['p_khuyen_mai'],
				'p_image'		=>$data['image'],
				'p_image_thumb' =>$data['image_thumb'],
				'active_index'  =>$data['active_index'],
				'active_top'	=>$data['active_top'],
				'p_cate_id'     =>$data['p_cate_id'],
				'active_slishow'=>$data['active_slishow'],
				'active'        =>$data['active'] 	
			);
			$this->db->set($data);
			$this->db->insert($this->table);
		}
		function update($id,$data)
		{
			$this->db->where('p_id',$id);
			$data = array(
				'p_name'   		=>$data['p_name'],
				'p_code'   		=>$data['p_code'],
				'p_price'  		=>$data['p_price'],
				'p_info'   		=>$data['p_info'],
				'p_thongso'		=>$data['p_thongso'],
				'p_khuyenmai'	=>$data['p_khuyen_mai'],
				'p_image'		=>$data['image'],
				'p_image_thumb' =>$data['image_thumb'],
				'active_index'  =>$data['active_index'],
				'active_top'	=>$data['active_top'],
				'p_cate_id'     =>$data['p_cate_id'],
				'active_slishow'=>$data['active_slishow'],
				'active'        =>$data['active'] 	
			);
			$this->db->set($data);
			$this->db->update($this->table);			
		}
		function total_result()
		{
			return $this->db->count_all_results($this->table);
		}
		function delete($id)
		{
			$this->db->where('p_id',$id);
			return $this->db->delete($this->table);
		}
		function get_by_id($id)
		{
			$this->db->where('p_id',$id);
			$q = $this->db->get($this->table);
			return $q->row();
		}
		function total($dk = null)
		{
			if($dk != null)
			{
				$this->db->where('p_id', $dk);
			}
			
			
			
			return $this->db->count_all_results($this->table);
		}
		
		function product_phantrang($begin,$max)
		{
			if($begin == ''){
				$begin = 0;
			}
			if($max >= 0 && $max != ''){
				$limit = 'limit '.$begin.','. $max;
			}else{
				$limit ='';	
			}
		return $this->db->query('select * from product  order by p_id '. $limit)->result();	
		}
		function cate_get($id)
		{
			$this->db->where('p_id',$id);
			$q=$this->db->get($this->table);				
			return $q;
		}
		
		
	}
?>