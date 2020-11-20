<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
		// check_admin();
	}

	public function index()
	{
		$data['judul'] = 'Item';
		$data['sub_judul'] = 'Data Barang';
		$data['row'] = $this->item_m->get();
		$this->template->load('template', 'product/item/item_data', $data);
	}

	public function add_item()
	{
		$item = new stdClass();
		$item->item_id = null;
		$item->barcode = null;
		$item->name = null;
		$item->price = null;
		$item->category_id = null;

		$query_category = $this->category_m->get();
		$query_unit = $this->unit_m->get();
		$unit[null] = '-Pilih Unit-';
		foreach ($query_unit->result() as  $unt) {
			$unit[$unt->unit_id] = $unt->name;
		}

		$data = array(
			'judul'=> 'Tambah Data',
			'sub_judul' => 'item', 
			'page' => 'add',
			'row' => $item,
			'category' => $query_category,
			'unit' => $unit, 'selectedunit' => null,
			
		);
		$this->template->load('template', 'product/item/item_form', $data);
	}

	public function edit_item($id)
	{
		$query = $this->item_m->get($id);
		if($query->num_rows() > 0){
			$item = $query->row();

			$query_category = $this->category_m->get();
			$query_unit = $this->unit_m->get();
			$unit[null] = '-Pilih Unit-';
			foreach ($query_unit->result() as  $unt) {
				$unit[$unt->unit_id] = $unt->name;
			}

			$data = array(
				'judul'=> 'Edit Data',
				'sub_judul' => 'item', 
				'page' => 'edit',
				'row' => $item,
				'category' => $query_category,
				'unit' => $unit, 'selectedunit' => $item->unit_id,
			);
			$this->template->load('template', 'product/item/item_form', $data);
		}else 
		{
			echo "<script> alert('Data Tidak ditemukan');";
			echo "window.location = '".site_url('item'). "';
				</script>";
		}
	}

	public function process()
	{
		$config['upload_path']   = './uploads/product/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = 2048;
		$config['file_name']     = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) 
		{
			if($this->item_m->check_barcode($post['barcode'])->num_rows() > 0){
				$this->session->set_flashdata('flash-error','Barcode '.$post['barcode'].' sudah dipakai barang lain');
				redirect('item/add_item');
			} else {
				if(@$_FILES['images']['name'] != null){
					if ($this->upload->do_upload('images')){
						$post['images'] = $this->upload->data('file_name');
						$this->item_m->add($post);
							if($this->db->affected_rows() > 0){
								$this->session->set_flashdata('flash','Data Berhasil Disimpan/Diedit');
								redirect('item');
							}
					}else{
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('flash-error', $error);
						redirect('item/add_item');
					}
				} else {
				$post['images'] = null;
				$this->item_m->add($post);
					if($this->db->affected_rows() > 0){
						$this->session->set_flashdata('flash','Data Kosong Berhasil Disimpan/Diedit');
						redirect('item');
					}
				}
			}
		// Jika tombol edit di tekan
		}else if(isset($_POST['edit'])) {
			if($this->item_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0){
				$this->session->set_flashdata('flash-error','Barcode '.$post['barcode'].' sudah dipakai barang lain');
				redirect('item/edit_item/'.$post['id']);
			} else {
				if(@$_FILES['images']['name'] != null){
					if ($this->upload->do_upload('images')){

						$item = $this->item_m->get($post['id'])->row();
						if($item->images != null) {
							$target_link = './uploads/product/'.$item->images ;
							unlink($target_link);
						}

						$post['images'] = $this->upload->data('file_name');
							$this->item_m->edit($post);
							if($this->db->affected_rows() > 0){
								$this->session->set_flashdata('flash','Data Berhasil Diedit');
								redirect('item');
							}
					}else {
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('flash-error','$error');
						redirect('item/add_item');
					}
				} else {
				$post['images'] = null;
					$this->item_m->edit($post);
					if($this->db->affected_rows() > 0){
					    $this->session->set_flashdata('flash','Data Kosong Berhasil Disimpan/Diedit');
				    }
					redirect('item');
			    }
			}
		}
	}

	public function del($id)
	{
		$item = $this->item_m->get($id)->row();
			if($item->images != null) {
				$target_link = './uploads/product/'.$item->images ;
				unlink($target_link);
			}

		$this->item_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('flash-delete','Data berhasil dihapus');
			}
	    redirect('item');
	}

	function barcode_qrcode($id)
	{
		$data['judul'] = 'Barcode';
		$data['sub_judul'] = 'Qrcode';
		$data['row'] = $this->item_m->get($id)->row();
		$this->template->load('template', 'product/item/barcode_qrcode', $data);
	}
	
	function barcode_print($id)
	{
		$data['row'] = $this->item_m->get($id)->row();
		$html = $this->load->view('product/item/barcode_print', $data, true);
		$this->fungsi->PdfGenerator($html,'Barcode-'.$data['row']->barcode, 'A4', 'landscape');
	}
	
	function qrcode_print($id)
	{
		$data['row'] = $this->item_m->get($id)->row();
		$html = $this->load->view('product/item/qrcode_print', $data, true);
		$this->fungsi->PdfGenerator($html,'qrcode-'.$data['row']->barcode, 'A4', 'potrait');
	} 


}