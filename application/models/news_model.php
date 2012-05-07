<?php
	class News_model extends CI_Model
	{
		var $table = "cate_news";
		var $table2 = "news";
		function __construct()
		{
			parent::__construct();
		}
		function show()
		{
			$q = $this->db->get($this->table);
			return $q->result();
		}
		function add($data)
		{
			$data = array(
				'c_news_name' => $data['c_news_name'],
				'active'      => $data['active']
			);
			$this->db->set($data);
			$this->db->insert($this->table);
		}
		
		function update($id,$data)
		{
			$this->db->where('c_news_id',$id);
			$data = array(
				'c_news_name' => $data['c_news_name'],
				'active'      => $data['active']
			);
			$this->db->set($data);
			$this->db->update($this->table);
			
		}
		function delete($id)
		{
			$this->db->where('c_news_id',$id);		
			return $this->db->delete($this->table);
		}
		function get_by_id($id)
		{
			$this->db->where('c_news_id',$id);
			$q = $this->db->get($this->table);
			return $q->row();
		}
		function get_name_cate($id)
		{
			$q = $this->db->get_where('cate_news',array('c_news_id'=>$id));
			if($q->num_rows() >0)
			{
				$ok = $q->row();
				return $ok->c_news_name;
			}
			else
			{
				return FALSE;
			}
		}
		function show_news()
		{
			$q = $this->db->get($this->table2);
			return $q->result();
		}
		function add_news($data)
		{
			$data = array(
				'name' 		 =>$data['name'],
				'short_info' =>$data['short_info'],
				'info'       =>$data['info'],
				'cate_news_id' =>$data['cate_news_id'],
				'image'        =>$data['image'],
				'image_thumb'  =>$data['image_thumb'],
				'active'       =>$data['active']				  
			);
			$this->db->set($data);
			$this->db->insert($this->table2);
		}
		function update_news($id,$data)
		{
			$this->db->where('news_id',$id);
			$data = array(
				'name' 		 =>$data['name'],
				'short_info' =>$data['short_info'],
				'info'       =>$data['info'],
				'cate_news_id' =>$data['cate_news_id'],
				'image'        =>$data['image'],
				'image_thumb'  =>$data['image_thumb'],
				'active'       =>$data['active']				  
			);
			$this->db->set($data);
			$this->db->update($this->table2);
		}
		function delete_news($id)
		{
			$this->db->where('news_id',$id);
			return $this->db->delete($this->table2);
		}
		function get_by_id_news($id)
		{
			$this->db->where('news_id',$id);
			$q = $this->db->get($this->table2);
			return $q->row();
		}
		function total($dk = null)
		{
			if($dk != null)
			{
				$this->db->where('p_id', $dk);
			}
			
			
			
			return $this->db->count_all_results($this->table2);
		}
		
		function news_phantrang($begin,$max)
		{
		if($begin == ''){
			$begin = 0;
		}
		if($max >= 0 && $max != ''){
			$limit = 'limit '.$begin.','. $max;
		}else{
			$limit ='';	
		}
		return $this->db->query('select * from news  order by news_id '. $limit)->result();	
		}
	}
?>