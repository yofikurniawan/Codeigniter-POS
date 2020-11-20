<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Unit extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		// check_admin();
	}

	public function index()
	{
		$data['judul'] = 'Unit';
		$data['sub_judul'] = 'Unit Barang';
		$data['row'] = $this->unit_m->get();
		$this->template->load('template', 'product/unit/unit_data', $data);
	}

	public function add_unit()
	{
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null;
		$unit->phone = null;
		$unit->addres = null;
		$unit->deskripsi = null;
		$data = array(
			'judul'=> 'Tambah Data',
			'sub_judul' => 'Unit',
			'page' => 'add',
			'row' => $unit
		);
		$this->template->load('template', 'product/unit/unit_form', $data);
	}

	public function edit_unit($id)
	{
		$query = $this->unit_m->get($id);
		if($query->num_rows() > 0)
		{
			$unit = $query->row();
			$data = array(
			'judul'=> 'Edit Data',
			'sub_judul' => 'Unit',
			'page' => 'edit',
			'row' => $unit
		);
			$this->template->load('template', 'product/unit/unit_form', $data);
		}else 
		{
			echo "<script> alert('Data Tidak ditemukan');";
			echo "window.location = '".site_url('unit'). "';
				</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->unit_m->add($post);
		}elseif (isset($_POST['edit'])) {
			$this->unit_m->edit($post);
		}
		if($this->db->affected_rows() > 0){
	    	$this->session->set_flashdata('flash','Data Unit Berhasil Disimpan');
	    }
		redirect('unit');
	}

	public function del($id)
	{
		$this->unit_m->del($id);
		if($this->db->affected_rows() > 0){
	    	$this->session->set_flashdata('flash','Data Unit Berhasil Dihapus');
	    }
	    	redirect('unit');
	}
}

