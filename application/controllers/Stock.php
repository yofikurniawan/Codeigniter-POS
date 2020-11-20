<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stock extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		check_not_login();
  }
    
    public function stock_in_data() 
    {
      $data['judul'] = 'Stock In Data';
      $data['sub_judul'] = 'Barang Masuk/Pembelian';
      $data['row'] = $this->stock_m->get_stock_in()->result();
      $this->template->load('template', 'transaction/stock_in/stock_in_data', $data);
    }

    public function stock_in_add() 
    {
      $data['judul'] = 'Stock In';
      $data['sub_judul'] = 'Barang Masuk/Pembelian';
      $data['item'] = $this->item_m->get()->result();
      $data['supplier'] = $this->supplier_m->get()->result();
      $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
    }

    public function stock_in_del()
    {
      $stock_id = $this->uri->segment(4);
      $item_id = $this->uri->segment(5);
      $qty = $this->stock_m->get($stock_id)->row()->qty;
      $data['qty'] = $qty;
      $data['item_id'] = $item_id;
      $this->item_m->update_stock_out($data);
      $this->stock_m->del($stock_id);
      if($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('flash','Data Stock-in Berhasil Dihapus');
        }
        redirect('stock/in');
    }

    // Proses Stock in dan Stock Out
    public function process()
    {
      if(isset($_POST['in_add'])) {
        $post = $this->input->post(null, TRUE);
        $this->stock_m->add_stock_in($post);
        $this->item_m->update_stock_in($post);
        if($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('flash','Data Stock-in Berhasil Disimpan');
        }
        redirect('stock/in');
      } elseif (isset($_POST['out_add'])) {
          $post = $this->input->post(null, TRUE);
          $row_item = $this->item_m->get($this->input->post('item_id'))->row();
          if($row_item->stock < $this->input->post('qty')) {
            $this->session->set_flashdata('flash-error','Jumlah Qty ('.$post['qty'].') melebihi batas Stock ('.$post['stock'].')');
            redirect('stock/out/add');
          } else {
            $this->stock_m->add_stock_out($post);
            $this->item_m->update_stock_out($post);
            if($this->db->affected_rows() > 0) {
              $this->session->set_flashdata('flash','Data Stock-out Berhasil Disimpan');
            }
            redirect('stock/out');
          }
        
      }
    }

    
    // Data Stock Out / Keluar
    public function stock_out_data() 
    {
      $data['judul'] = 'Stock out Data';
      $data['sub_judul'] = 'Barang Keluar';
      $data['row'] = $this->stock_m->get_stock_out()->result();
      $this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
    }

    public function stock_out_add() 
    {
      $data['judul'] = 'Stock out';
      $data['sub_judul'] = 'Barang Keluar';
      $data['item'] = $this->item_m->get()->result();
      $this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
    }

    public function stock_out_del()
    {
      $stock_id = $this->uri->segment(4);
      $item_id = $this->uri->segment(5);
      $qty = $this->stock_m->get($stock_id)->row()->qty;
      $data['qty'] = $qty;
      $data['item_id'] = $item_id;
      $this->item_m->update_stock_in($data);
      $this->stock_m->del($stock_id);
      if($this->db->affected_rows() > 0) {
          $this->session->set_flashdata('flash','Data Stock-out Berhasil Dihapus');
        }
        redirect('stock/out');
    }
    
}    