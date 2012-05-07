<?php
	class Acces_model extends CI_Model
	{
		var $table = "acess";
		function show()
		{
			$q = $this->db->query("select * from acess order by ac_id asc");
			return $q->result();
		}
		function show1()
		{
			$q = $this->db->query("select * from acess where active = 1 order by ac_id asc");
			return $q->result();
		}
		function add($data)
		{
			$data = array(
				'ac_name' =>$data['ac_name'],
				'ac_name_ta' =>$data['ac_name_ta'],
				'ac_order' =>NULL,
				'active'   =>$data['active']			
			);
			$this->db->set($data);
			$this->db->insert($this->table);
		}
		function edit($id,$data)
		{
			$this->db->where('ac_id',$id);
			$data = array(
				'ac_name' =>$data['ac_name'],
				'ac_name_ta' =>$data['ac_name_ta'],
				'ac_order' =>NULL,
				'active'   =>$data['active']			
			);
			$this->db->set($data);
			$this->db->update($this->table);
		}
		function get_by_id($id)
		{
			$this->db->where('ac_id',$id);
			$q = $this->db->get($this->table);
			return $q->row();
		}
		function delete($id)
		{
			$this->db->where('ac_id',$id);
			return $this->db->delete($this->table);
		}
	}
?>