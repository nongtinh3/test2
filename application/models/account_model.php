<?php
	class User_model extends CI_Model
	{
		var $table ='users';
		function __construct()
		{
			parent::__construct();
		}
		function show()
		{
			$q = $this->db->query("select * from users order by user_id desc");
			return $q->result();
		}
		function add($data)
		{
			$data = array(
				'user_name'    =>$data['username'],
				'user_pass'    =>$data['password'],
				'user_email'   =>$data['email'],
				'level'        =>$data['level'],
				'user_fullname'=>$data['fullname'],
				'gender'       =>$data['gioitinh'],
				'add_date'     =>$data['ngay'],
				'phone'  		=>$data['phone'],
				'tinhthanh'		=>NULL,
				'diachi'		=>$data['diachi'],
				'active'		=>$data['active']
			);
			$this->db->set($data);
			$this->db->insert($this->table);
		}
		function edit($id,$data)
		{
			$this->db->where('user_id',$id);
			$data = array(
				'user_name'    =>$data['username'],
				'user_pass'    =>$data['password'],
				'user_email'   =>$data['email'],
				'level'        =>$data['level'],
				'user_fullname'=>$data['fullname'],
				'gender'       =>$data['gioitinh'],
				'add_date'     =>$data['ngay'],
				'phone'  		=>$data['phone'],
				'tinhthanh'		=>NULL,
				'diachi'		=>$data['diachi'],
				'active'		=>$data['active']
			);
			$this->db->set($data);
			$this->db->update($this->table);
		}
		function delete($id)
		{
			$this->db->where('user_id',$id);
			return $this->db->delete($this->table);
		}
		function get_by_id($id)
		{
			$this->db->where('user_id',$id);
			$q = $this->db->get($this->table);
			return $q->row();
		}
		function selectAll($where = null,$order =null ,$limit=null)
		{
			if($where !=null)
			{
				foreach($where as $field =>$value)
				{
					if($field[0] =='?')
					{
						$this->db->where_in(substr($field,1),$value);
					}
					else if($field[0] =='!')
					{
						$this->db->where_not_in(substr($field,1),$value);
					}
					else
					{
						$this->db->where($field,$value);
					}
				}
			}
			if($order !=null)
			{
				foreach($order as $key=>$value)
				{
					$this->db->order_by($key,$value);
				}
			}
			if($limit !=null)
			{
				$this->db->limit($limit['max'],$limit['begin']);
			}
			$q = $this->db->get($this->table);
			return $q;
		}
		function total($dk = null)
		{
			if($dk !='')
			{
				$this->db->where('id',$dk);
			}
			$this->db->from($this->table);
			return $this->db->count_all_results();
		}
		function user_phantrang($begin,$max)
		{
			if($begin =='')
			{
				$begin = 0;
			}
			if($max>=0 && $max !='')
			{
				$limit = 'limit'.$begin.','.$max;
			}
			else
			{
				$limit ='';
			}
			return $this->db->query("select * from users order by id".$limit)->result();
		}
	}
?>