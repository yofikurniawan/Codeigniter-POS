<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function index()
	{
		$data['judul'] = 'Data Pengguna';
		$data['sub_judul'] = 'Users';
		$data['user'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add_user()
	{
		//Aturan Vlidasi
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('passwordcon', 'Konfirmasi Password', 'required|matches[password]', array('matches' => 'Konfirmasi Password tidak sama dengan Password Sebelumnya'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
		$this->form_validation->set_rules('nohp', 'No Hp', 'required');
		$this->form_validation->set_rules('pendidikan', 'Pendidkan Terakhir', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		if (empty($_FILES['foto']['name'])) {
			$this->form_validation->set_rules('foto', 'Foto', 'required');
		}
		// Pesan Validasi
		$this->form_validation->set_message('required', ' %s masih kosong, silahkan diisi');
		$this->form_validation->set_message('min_length', ' %s Minimal 8 Karakter');
		$this->form_validation->set_message('is_unique', ' %s sudah digunakan, Silahkan diganti');
		// Ketika Validasi Dijalankan
		if ($this->form_validation->run() == FALSE) {
					$data['judul'] = 'User Pengguna';
					$data['sub_judul'] = '';
                    $this->template->load('template', 'user/add_user',$data);
                } else {
                    $post = $this->input->post(null, TRUE);
                    $this->user_m->add($post);
                    if($this->db->affected_rows() > 0) {
                		$this->session->set_flashdata('flash','Data User Berhasil Ditambahkan');
                    }
					redirect('user');
                }
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
		$this->form_validation->set_rules('name', 'Full Nama', 'required');
		if($this->input->post('password')) {
		$this->form_validation->set_rules('password', 'Password', 'min_length[8]');
		$this->form_validation->set_rules('passwordcon', 'Konfirmasi Password', 'matches[password]', array('matches' => ' Harap masukan konfirmasi password'));
		}
		if($this->input->post('passwordcon')) {
			$this->form_validation->set_rules('passwordcon', 'Konfirmasi Password', 'matches[password]', array('matches' => ' Konfirmasi Password tidak sama dengan Password Sebelumnya'));
		}
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_email_check');
		$this->form_validation->set_rules('nohp', 'No Hp', 'required');
		$this->form_validation->set_message('required', ' %s masih kosong, silahkan diisi');
		$this->form_validation->set_message('min_length', ' %s Minimal 8 Karakter');
		$this->form_validation->set_message('is_unique', ' %s sudah digunakan, Silahkan diganti');
		//Ketika Validasi Dijalankan
		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->user_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['judul'] = 'User Pengguna';
				$data['sub_judul'] = '';
				$this->template->load('template', 'user/edit_user', $data);
			} else {	
				echo "<script> alert('Data Tidak ditemukan');";
				echo "window.location = '".site_url('user'). "'; </script>";
				} 
			} else {
				$post = $this->input->post(null, TRUE);
				$this->user_m->edit($post);
				if($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('flash','Data User Berhasil Diupdate');
				}
				redirect('user');
		}       
	}

	function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query(" SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]' ");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', ' %s Sudah digunakan, Silahkan  Diganti');	
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function email_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query(" SELECT * FROM user WHERE email = '$post[email]' AND user_id != '$post[user_id]' ");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('email_check', ' %s Sudah digunakan, Silahkan  Diganti');	
			return FALSE;
		} else {
			return TRUE;
		}
	} 

	public function del($id)
	{
		$this->user_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash','Data User Berhasil Dihapus');
		}
		redirect('user');
	}
}

