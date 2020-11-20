<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_m extends CI_Model
{
	public function get($id = null)
	{
		$this->db->from('p_category');
		if($id != null) {
			$this->db->where('category_id', $id);
		}
		$this->db->order_by('name','ASC');
		return $query = $this->db->get();
	}

	public function add($post)
	{
		$params = [ 'name' => $post['name']];
		$this->db->insert('p_category', $params);
	}

	public function edit($post)
	{
		$params = [
			'name' => $post['name'],
			'updated'	=> date('Y-m-d H:i:s') 
		];
		$this->db->where('category_id',$post['id']);
		$this->db->update('p_category', $params);
	}

	public function del($id)
	{
		$this->db->where('category_id',$id);
		$this->db->delete('p_category');
	}

}
/* End of file Category_m.php */
/* Location: ./application/Models/Category_m.php*/
