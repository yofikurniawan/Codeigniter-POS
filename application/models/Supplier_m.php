<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_m extends CI_Model
{
	public function get($id = null)
	{
		$this->db->from('supplier');
		if($id != null) {
			$this->db->where('supplier_id', $id);
		}
		return $query = $this->db->get();
	}

	public function add($post)
	{
		$params = [
			'name' => $post['name'],
			'alamat' => $post['alamat'],
			'email' => $post['email'],
			'phone' => $post['phone'],
			'deskripsi' => empty($post['deskripsi']) ? null : $post['deskripsi'],
		];
		$this->db->insert('supplier', $params);
	}

	public function edit($post)
	{
		$params = [
			'name' => $post['name'],
			'alamat' => $post['alamat'],
			'email' => $post['email'],
			'phone' => $post['phone'],
			'deskripsi' => empty($post['deskripsi']) ? null : $post['deskripsi'],
			'update'	=> date('Y-m-d H:i:s') 
		];
		$this->db->where('supplier_id',$post['supplier_id']);
		$this->db->update('supplier', $params);
	}

	public function del($id)
	{
		$this->db->where('supplier_id',$id);
		$this->db->delete('supplier');
	}

}
/* End of file Supplier_m.php */
/* Location: ./application/Models/Supplier_m.php*/
