<?php
	class Contact_model extends CI_Model
	{
		var $table ="contact";
		function __construct()
		{
			parent::__construct();
		}
		function show()
		{
			$q = $this->db->get($this->table);
			return $q->result();
		}
		function get_by_id($id)
		{
			$this->db->where('contact_id',$id);
			$q = $this->db->get($this->table);
			return $q->row();
		}
		function add($data)
		{
			$data = array(
				'title' =>$data['title'],
				'email' =>$data['email'],
				'info'  =>$data['info'],
				'add_date' =>$data['add_date']
			);
			$this->db->set($data);
			$this->db->insert($this->table);
		}
		function update($id,$data)
		{
			$this->db->where('contact_id',$id);
			$data = array(
				'active'=>$data['active']
			);
			$this->db->set($data);
			$this->db->update($this->table);
		}
		function delete($id)
		{
			$this->db->where('contact_id',$id);
			return $this->db->delete($this->table);
		}
	}
?>