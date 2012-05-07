<?php
	class Quangcao_model extends CI_Model
	{
		var $table = "quangcao";
		var $table2 = "vitri";
		function __construct()
		{
			parent::__construct();
		}
		function show_vitri()
		{
			$q = $this->db->get($this->table2);
			return $q->result();
		}
		function show()
		{
			$q = $this->db->get($this->table);
			return $q->result();
		}
		function add($data)
		{
			$data = array(
				'vitri' 		=>$data['vitri'],
				'lienket'		=>$data['lienket'],
				'active' 		=>$data['active'],
				'image'  		=>$data['image'],
				'image_thumb' 	=>$data['image_thumb']			
			);
			$this->db->set($data);
			$this->db->insert($this->table);
		}
		function update($id,$data)
		{
			$this->db->where('q_id',$id);
			$data = array(
				'vitri' 		=>$data['vitri'],
				'lienket'		=>$data['lienket'],
				'active' 		=>$data['active'],
				'image'  		=>$data['image'],
				'image_thumb' 	=>$data['image_thumb']			
			);
			$this->db->set($data);
			$this->db->update($this->table);
		}
		function delete($id)
		{
			$this->db->where('q_id',$id);
			return $this->db->delete($this->table);
		}
		function get_by_id($id)
		{
			$this->db->where('q_id',$id);
			$q = $this->db->get($this->table);
			return $q->row();
		}
		function get_name_vitri($id)
		{
			$q = $this->db->get_where('vitri',array('id_vitri'=>$id));
			if($q->num_rows() >0)
			{
				$ok = $q->row();
				return $ok->name;
			}
			else
			{
				return FALSE;
			}
		}
	}
?>