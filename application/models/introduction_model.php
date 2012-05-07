<?php
	class Introduction_model extends CI_Model
	{
		var $table = "introduction";
		function __construct()
		{
			parent::__construct();
		}
		function show()
		{
			$q = $this->db->get($this->table);
			return $q->result();
		}
		function show_info($id)
		{
			$this->db->where('danhmuc',$id);
			$q = $this->db->get($this->table);
			return $q->result();
		}
		function add($data)
		{
			$data = array(
				'info' =>$data['info'],
				'title' =>$data['title'],
				'active' =>$data['active'],
				'danhmuc'=>$data['danhmuc']
			);
			$this->db->set($data);
			$this->db->insert($this->table);
		}
		function update($id,$data)
		{
			$this->db->where('id',$id);
			$data = array(
				'info' =>$data['info'],
				'title' =>$data['title'],
				'active' =>$data['active'],
				'danhmuc'=>$data['danhmuc']
			);
			$this->db->set($data);
			$this->db->update($this->table);
		}
		function get_by_id($id)
		{
			$this->db->where('danhmuc',$id);
			$q = $this->db->get($this->table);
			return $q->row();
		}
		function delete($id)
		{
			$this->db->where('id',$id);
			return $this->db->delete($this->table);
		}

	}
		
?>