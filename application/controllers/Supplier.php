<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		// check_admin();
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function index()
	{
		$data['judul'] = 'Supplier';
		$data['sub_judul'] = 'Pemasok Barang';
		$data['row'] = $this->supplier_m->get();
		$this->template->load('template', 'supplier/data_supplier', $data);
	}

	public function add_supplier()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
		$this->form_validation->set_rules('phone', 'Nomor Hp', 'required');

		$this->form_validation->set_message('required', ' %s masih kosong, silahkan diisi');
		$this->form_validation->set_message('is_unique', ' %s sudah digunakan, Silahkan diganti');

		if ($this->form_validation->run() == FALSE)
                {
					$data['judul'] = 'Data Supplier';
					$data['sub_judul'] = '';
                    $this->template->load('template', 'supplier/add_supplier',$data);
                } else {
                    $post = $this->input->post(null, TRUE);
                    $this->supplier_m->add($post);
                    if($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('flash','Data Supplier Berhasil Ditambahkan');
                    }
					redirect('supplier');
                }
	}

	public function edit_supplier($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
		$this->form_validation->set_rules('phone', 'Nomor Hp', 'required');
		$this->form_validation->set_message('required', ' %s masih kosong, silahkan diisi');
		$this->form_validation->set_message('is_unique', ' %s sudah digunakan, Silahkan diganti');
		
		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->supplier_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['judul'] = 'Data Supplier';
				$data['sub_judul'] = '';
				$this->template->load('template', 'supplier/edit_supplier', $data);
			} else {	
				echo "<script> alert('Data Tidak ditemukan');";
					echo "window.location = '".site_url('supplier'). "';
				</script>";
				} 
			} else {
				$post = $this->input->post(null, TRUE);
				$this->supplier_m->edit($post);
				if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('flash','Data supplier Berhasil Diupdate');
				}
				redirect('supplier');
			
		}       
	}


	public function del($id)
	{
		$this->supplier_m->del($id);
		$error = $this->db->error();
		if($error['code'] != 0) {
			$this->session->set_flashdata('flash-error','Data Tidak bisa dihapus (Sudah Berelasi)');
			redirect('supplier');
		}else {
			$this->session->set_flashdata('flash-delete','Data Berhasil Dihapus');
			redirect('supplier');
	    }
	    
	}
}

