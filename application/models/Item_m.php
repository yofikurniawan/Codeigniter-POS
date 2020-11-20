<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_m extends CI_Model
{
	public function get($id = null)
	{
		$this->db->select('p_item.*, p_category.name AS category_name, p_unit.name as category_unit');
		$this->db->from('p_item');
		$this->db->join('p_category', 'p_category.category_id = p_item.category_id');
		$this->db->join('p_unit', 'p_unit.unit_id = p_item.unit_id');
		if($id != null) {
			$this->db->where('item_id', $id);
		}
		$this->db->order_by('barcode','ASC');
		return $query = $this->db->get();
	}

	public function add($post)
	{
		$params = [
			'barcode' => $post['barcode'],
			'name' => $post['name'],
			'category_id' => $post['category'],
			'unit_id' => $post['unit'],
			'price' => $post['price'],
			'images' => $post['images'],
		];
		$this->db->insert('p_item', $params);
	}

	public function edit($post)
	{
		$params = [
			'barcode' => $post['barcode'],
			'name' => $post['name'],
			'category_id' => $post['category'],
			'unit_id' => $post['unit'],
			'price' => $post['price'],
			'updated'	=> date('Y-m-d H:i:s') 
		];
		if($post['images'] != null ){
			$params['images'] = $post['images'];
		}
		$this->db->where('item_id',$post['id']);
		$this->db->update('p_item', $params);
	}

	function check_barcode($code, $id = null) 
	{
		$this->db->from('p_item');
		$this->db->where('barcode', $code);
		if($id !=null ){
			$this->db->where('item_id !=', $id);
		}
		return $query = $this->db->get();
	}

	public function del($id)
	{
		$this->db->where('item_id',$id);
		$this->db->delete('p_item');
	}

	function update_stock_in($post) 
	{
		$qty = $post['qty'];
		$id = $post['item_id'];
		$this->db->query("UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$id'");
	} 

	function update_stock_out($data) 
	{
		$qty = $data['qty'];
		$id = $data['item_id'];
		$this->db->query("UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$id'");
	}
	

}
/* End of file Item_m.php */
/* Location: ./application/Models/Item_m.php*/
