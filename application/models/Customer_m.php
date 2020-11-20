<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer_m extends CI_Model
{
	public function get($id = null)
	{
		$this->db->from('customer');
		if($id != null) {
			$this->db->where('customer_id', $id);
		}
		return $query = $this->db->get();
	}

	public function add($post)
	{
		$params = [
			'name' => $post['name'],
			'phone' => $post['phone'],
			'gender' => $post['gender'],
			'addres' => $post['addres'],
		];
		$this->db->insert('customer', $params);
	}

	public function edit($post)
	{
		$params = [
			'name' => $post['name'],
			'phone' => $post['phone'],
			'gender' => $post['gender'],
			'addres' => $post['addres'],	
			'update'	=> date('Y-m-d H:i:s') 
		];
		$this->db->where('customer_id',$post['id']);
		$this->db->update('customer', $params);
	}

	public function del($id)
	{
		$this->db->where('customer_id',$id);
		$this->db->delete('customer');
	}

}
/* End of file Customer_m.php */
/* Location: ./application/Models/Customer_m.php*/
