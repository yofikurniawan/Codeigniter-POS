<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		// check_admin();
	}

	public function index()
	{
		$data['judul'] = 'Data Customer';
		$data['sub_judul'] = '';
		$data['row'] = $this->customer_m->get();
		$this->template->load('template', 'customer/data_customer', $data);
	}

	public function add_customer()
	{
		$customer = new stdClass();
		$customer->customer_id = null;
		$customer->name = null;
		$customer->gender = null;
		$customer->phone = null;
		$customer->addres = null;
		$data = array(
			'judul' => 'Data Customer',
			'sub_judul' => '',
			'page' => 'add',
			'row' => $customer
		);
		$this->template->load('template', 'customer/customer_form', $data);
	}

	public function edit_customer($id)
	{
		$query = $this->customer_m->get($id);
		if($query->num_rows() > 0)
		{
			$customer = $query->row();
			$data = array(
			'judul' => 'Data Customer',
			'sub_judul' => '',
			'page' => 'edit',
			'row' => $customer
		);
			$this->template->load('template', 'customer/customer_form', $data);
		}else 
		{
			echo "<script> alert('Data Tidak ditemukan');";
			echo "window.location = '".site_url('customer'). "';
				</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->customer_m->add($post);
		}elseif (isset($_POST['edit'])) {
			$this->customer_m->edit($post);
		}
		if($this->db->affected_rows() > 0){
	    $this->session->set_flashdata('flash','Data Customer Berhasil Disimpan');
	    }
		redirect('pelanggan');
	}

	public function del($id)
	{
		$this->customer_m->del($id);
		if($this->db->affected_rows() > 0){
	    	$this->session->set_flashdata('flash','Data Customer Berhasil Dihapus');
	    }
	    	redirect('pelanggan');
	}

}