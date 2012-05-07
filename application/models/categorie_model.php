<?php
	class Categorie_Model extends CI_Model
	{
		var $table = "categorie";
		function __construct()
		{
			parent::__construct();
		}
		function show()
		{
			$q = $this->db->query("select * from categorie order by cate_id asc");
			return $q->result();
		}
		function show1()
		{
			$q = $this->db->query("select * from categorie where active = 1 order by cate_id asc");
			return $q->result();
		}
		function add($data)
		{
			$data = array(
				'cate_name_tv' =>$data['cate_name_tv'],
				'cate_name_ta' =>$data['cate_name_ta'],
				'cat_order'  =>NULL,
				'ac_id'  =>$data['ac_id'],
				'cat_parent' =>0,
				'active'     =>$data['active']	
			);
			$this->db->set($data);
			$this->db->insert($this->table);
		}
		function update($id,$data)
		{
			$this->db->where('cate_id',$id);
			$data = array(
				'cate_name_tv' =>$data['cate_name_tv'],
				'cate_name_ta' =>$data['cate_name_ta'],
				'cat_order'  =>NULL,
				'ac_id'  =>$data['ac_id'],
				'cat_parent' =>0,
				'active'     =>$data['active']	
			);
			$this->db->set($data);
			$this->db->update($this->table);			
		}
		function delete($id)
		{
			$this->db->where('cate_id',$id);
			return $this->db->delete($this->table);
		}
		function get_by_id($id)
		{
			$this->db->where('cate_id',$id);
			$q = $this->db->get($this->table);
			return $q->row();
		}
		function get_name_acces($id)
		{
			$q = $this->db->get_where('acess',array('ac_id'=>$id));
			if($q->num_rows() > 0)
			{
				$ok = $q->row();
				return $ok->ac_name;				
			} else {
				return false;	
			}
		}
		
		function total($dk = null)
		{
			if($dk != null)
			{
				$this->db->where('cate_id', $dk);
			}
			
			
			
			return $this->db->count_all_results($this->table);
		}
		
		function cate_phantrang($begin,$max)
		{
		if($begin == ''){
			$begin = 0;
		}
		if($max >= 0 && $max != ''){
			$limit = 'limit '.$begin.','. $max;
		}else{
			$limit ='';	
		}
		return $this->db->query('select * from categorie  order by cate_id '. $limit)->result();	
		}
		function get_name_cate($id)
		{
			$q = $this->db->get_where('categorie',array('cate_id'=>$id));
			if($q->num_rows () >0)
			{
				$ok = $q->row();
				return $ok->cate_name_tv;
			}
			else
			{
				return FALSE;
			}
			
		}
		
		
	}
?>