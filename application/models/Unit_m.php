<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_m extends CI_Model
{
	public function get($id = null)
	{
		$this->db->from('p_unit');
		if($id != null) {
			$this->db->where('unit_id', $id);
		}
		return $query = $this->db->get();
	}

	public function add($post)
	{
		$params = ['name' => $post['name'],];
		$this->db->insert('p_unit', $params);
	}

	public function edit($post)
	{
		$params = [
			'name' => $post['name'],
			'updated'	=> date('Y-m-d H:i:s') 
		];
		$this->db->where('unit_id',$post['id']);
		$this->db->update('p_unit', $params);
	}

	public function del($id)
	{
		$this->db->where('unit_id',$id);
		$this->db->delete('p_unit');
	}

}
/* End of file Unit_m.php */
/* Location: ./application/Models/Unit_m.php*/
