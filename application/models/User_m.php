<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model 
{
	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', sha1($post['password']));
		return $this->db->get();
	}

	public function get($id = null)
	{
		$this->db->from('user');
		if($id != null) {
			$this->db->where('user_id', $id);
		}
		return $query = $this->db->get();
	}

	public function add($post)
	{
		$params['name'] 	= $post['name'];
		$params['username'] = $post['username'];
		$params['password'] = sha1($post['password']);
		$params['addres'] 	= $post['alamat'];
		$params['level'] 	= $post['level'];
		$params['nohp'] 	= $post['nohp'];
		$params['email'] 	= $post['email'];
		$params['pendidikan'] 	= $post['pendidikan'];
		$params['jenis_kelamin'] 	= $post['jenis_kelamin'];
		$params['foto'] 	= $this->upload();
		$this->db->insert('user',$params);
	}

	function upload()
	{
		$config['upload_path']          = './assets/images/';
		$config['allowed_types']        = 'png|img|jpg|jpeg';
		$config['max_size']             = 5024;
		$config['overwrite']			= true;
		$this->load->library('upload', $config);

		if (empty($_FILES["foto"]["name"])) {
			return $this->input->post('foto_lama');
		} else {
			if (!$this->upload->do_upload('foto')) {
				return "foto.png";
			} else {
				return $this->upload->data("file_name");
			}
		}
	}

	public function edit($post)
	{
		$params['name'] 	= $post['name'];
		$params['username'] = $post['username'];
		if(!empty($post['password'])) {
			$params['password'] = sha1($post['password']);
		}
		$params['addres'] 	= $post['alamat'];
		$params['level'] 	= $post['level'];
		$params['nohp'] 	= $post['nohp'];
		$params['email'] 	= $post['email'];
		$params['pendidikan'] 	= $post['pendidikan'];
		$params['jenis_kelamin'] 	= $post['jenis_kelamin'];
		$params['foto'] 	= $this->upload();
		$this->db->where('user_id',$post['user_id']);
		$this->db->update('user',$params);
	}

	public function del($id)
	{
		$this->db->where('user_id',$id);
		$this->db->delete('user');
	}

}
/* End of file User_m.php */
/* Location: ./application/Models/User_m.php*/