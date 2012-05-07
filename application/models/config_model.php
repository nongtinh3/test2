<?php
	class Config_model extends CI_Model
	{
		var $table = "config";
		function __construct()
		{
			parent::__construct();
		}
		function add($data)
		{
			$data = array(
				'title' =>$data['title'],
				'meta'  =>$data['meta'],
				'footer'=>$data['footer']
			);
			$this->db->set($data);
			$this->db->insert($this->table);
		}
		function update($id,$data)
		{
			$this->db->where('id',$id);
			$data = array(
				'title' =>$data['title'],
				'meta'  =>$data['meta'],
				'footer'=>$data['footer']
			);
			$this->db->set($data);
			$this->db->update($this->table);
		}
		function get_by_id($id)
		{
			$this->db->where('id',$id);
			$q = $this->db->get($this->table);
			return $q->row();
		}
	}
?>