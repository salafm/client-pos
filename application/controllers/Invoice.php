<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Invoice extends CI_Controller
{
  function __construct() {
     parent::__construct();
     $this->load->model('mdata');

    if($this->session->userdata('statuss') != "login"){
      redirect(site_url("login"));
    }
  }

  function index()
  {
    $id = $this->uri->segment(3, 0);
    $data['transaksi'] = $this->mdata->tampil_where('barangkeluar',array('idtransaksi' => $id))->result();
    $data['produk'] = $this->mdata->tampil_where('barangkeluar_details',array('idtransaksi' => $id))->result();
    $data['cabang'] = $this->mdata->tampil_all('apilogin')->result();
    $data['bayar'] = array('pembayaran' => $this->uri->segment(4, 0));
    $this->load->view('vinvoice',$data);
  }
}
