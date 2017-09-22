<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Client extends CI_Controller
{

    function __construct() {
       parent::__construct();
       $this->load->model('mdata');
       $this->API="http://localhost/resto/index.php";
       $h = $this->db->get('apilogin')->result_array();
       if($h != NULL){
         $user = $h[0]['user'];
         $pass = $h[0]['pass'];
         $config = array (
         'auth'          => TRUE,
         'auth_type'     => 'basic',
         'auth_username' => $user,
         'auth_password' => $pass);
         $this->restclient->initialize($config);
         $this->id = $this->mdata->getId($user);
         $this->key = $this->mdata->getKey($user);
       }

      if($this->session->userdata('statuss') != "login"){
   			redirect(site_url("login"));
   		}
    }

    public function index()
    {
        $this->db->trans_begin();
        $id = $this->id;
        $key = $this->key;
        $this->updatetabel($id,$key);
        $this->restclient->post(($this->API.'/api/petugas/waroenk/'.$key),['id' => $this->session->userdata('id')]);
        //this->restclient->debug();
        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
        }
        else
        {
                $this->db->trans_commit();
        }
        $data['barang'] = $this->mdata->tampil_all('barang')->result();
        $data['produk'] = $this->mdata->tampil_all('produk')->result();
        $this->cart->destroy();
		    $this->load->view('vclient',$data);
    }

    function updatetabel($id,$key){
      $barangclient = json_decode(json_encode($this->restclient->get($this->API.'/api/barang/id/'.$id.'/waroenk/'.$key)), FALSE);
      if(sizeof($barangclient) > 0){
        $this->restclient->post(($this->API.'/api/barang/waroenk/'.$key),['id' => $id]);
        foreach ($barangclient as $bc){
          $input = array(
            'idbarang' => $bc->idbarang,
            'nama' => $bc->nama,
            'harga' => $bc->harga,
            'satuan' => $bc->satuan,
            'cons' => $bc->cons
          );
          $barang = $this->mdata->tampil_where('barang',array('idbarang' => $bc->idbarang))->result();
          if(sizeof($barang) > 0){
            $harga = array('nama' => $bc->nama, 'harga' => $bc->harga, 'satuan' => $bc->satuan, 'stok' => $bc->cons*$barang[0]->stok, 'cons' => $barang[0]->cons*$bc->cons);
          }else{
            $harga = array('nama' => $bc->nama, 'harga' => $bc->harga, 'satuan' => $bc->satuan, 'cons' => $bc->cons);
          }
          $where = array('idbarang' => $bc->idbarang);
          $this->mdata->simpanjikabaru('barang',$where,$input,$harga);
        }
      }

      $produkclient = json_decode(json_encode($this->restclient->get($this->API.'/api/produk/id/'.$id.'/waroenk/'.$key)), FALSE);
      if (sizeof($produkclient) > 0 ){
        $this->restclient->post(($this->API.'/api/produk/waroenk/'.$key),['id' => $id]);
        foreach ($produkclient as $pc){
          $input = array(
            'idproduk' => $pc->idproduk,
            'nama' => $pc->nama,
            'harga' => $pc->harga,
            'kategori' => $pc->kategori
          );
          $where = array('idproduk' => $pc->idproduk);
          $input2 = array('nama' => $pc->nama, 'harga' => $pc->harga);
          $this->mdata->simpanjikabaru('produk',$where,$input,$input2);

          $produkdetails = json_decode(json_encode($this->restclient->get($this->API.'/api/produkdetails/id/'.$id.'/waroenk/'.$key)), FALSE);
          foreach ($produkdetails as $pd) {
            $input = array(
              'id' => $pd->id,
              'idproduk' => $pd->idproduk,
              'idbarang' => $pd->idbarang,
              'jumlah' => $pd->jumlah
            );
            $this->mdata->simpan2('produk_details',$input);
          }
        }
      }


      $barangmasuk = json_decode(json_encode($this->restclient->get($this->API.'/api/barangmasuk/id/'.$id.'/waroenk/'.$key)), FALSE);
      if (sizeof($barangmasuk) > 0 ){
        $this->restclient->post(($this->API.'/api/barangmasuk/waroenk/'.$key),['id' => $id]);
        foreach ($barangmasuk as $bm) {
          $input = array(
            'id' => $bm->id,
            'idtransaksi' => $bm->idtransaksi,
            'deskripsi' => $bm->deskripsi,
            'tanggal' => $bm->tanggal
          );
          $this->mdata->simpan2('barangmasuk',$input);

          $bmdetail = json_decode(json_encode($this->restclient->get($this->API.'/api/bmdetails/id/'.$bm->idtransaksi.'/waroenk/'.$key)), FALSE);
          foreach ($bmdetail as $bmd) {
            $input = array(
              'idtransaksi' => $bmd->idtransaksi,
              'idproduk' => $bmd->idproduk,
              'harga' => $bmd->harga,
              'jumlah' => $bmd->jumlah
            );
            $where = array('idtransaksi' => $bmd->idtransaksi, 'idproduk' => $bmd->idproduk);
            $this->mdata->simpanjikabaru('barangmasuk_details',$where,$input,array('id' => $bmd->id));
          }
        }
      }
    }

    function search(){
      $cari = $this->input->post('nama',true);
      $kategori = $this->input->post('kategori',true);
      $hasil = $this->mdata->search($cari,$kategori)->result();
      $cek = $this->mdata->search($cari,$kategori)->num_rows();
      $output = '<ul class="list-unstyled" id="pilihanbarang">';
      $baris = 0;
      if ($cek > 0){
        foreach ($hasil as $h) {
          if ($baris == 0){
            $output .= '<li id="'.$h->idproduk.'" class="list-group-item pilih">'.$h->nama.'</li>';
            $baris++;
          }else{
            $output .= '<li id="'.$h->idproduk.'" class="list-group-item">'.$h->nama.'</li>';
          }
        }
      }
      else {
        $output .= '<li class="list-group-item" name="baru">Tidak ditemukan produk "'.$cari.'"</li>';
      }
      $output .= '</ul>';
      echo $output;
    }

    function tambahcart($id){
  		$where = array('idproduk' => $id );
  		$item = $this->mdata->tampil_where('produk',$where)->result_array();
  		$data = array(
      	'id' => $item[0]['idproduk'],
  		  'name' => $item[0]['nama'],
  		  'qty' => 1,
  		  'price' => $item[0]['harga'],
  		);
  		$this->cart->insert($data);
  		$isi = $this->cart->contents();
      $this->tampilcart($isi);
  	}

    function updatecart()
    {
      $id = $this->input->get('id',true);
      $val = $this->input->get('value',true);
      $data = array('rowid' => $id, 'qty' => $val);
      $this->cart->update($data);
  		$isi = $this->cart->contents();
      $this->tampilcart($isi);
    }

  	function hapuscart($rowid){
  		$this->cart->remove($rowid);
      $isi = $this->cart->contents();
      $this->tampilcart($isi);
  	}

    function tampilcart($isi){
      $output1 ='';
      foreach ($isi as $i) {
        $hasil = $this->mdata->tampil_where('produk',array('idproduk' => $i['id']))->result();
        $output1 .= '<tr id="'.$i['rowid'].'">
                      <td class="">'.$i['id'].'<input type="hidden" name="idbarang[]" value="'.$i['id'].'"></td>
                      <td class="">'.$i['name'].'<input type="hidden" name="nama[]" value="'.$i['name'].'"></td>
                      <td class="">
                        <input name="jumlah[]" type="number" class="col-md-3 form-control number" style="width:65px;" value="'.$i['qty'].'" min="0" max="'.$hasil[0]->stok.'">
                      </td>
                      <td class="">Rp. '.$this->cart->format_number($i['price']).'<input type="hidden" name="harga[]" value="'.$i['price'].'"></td>
                      <td class="">Rp. '.$this->cart->format_number($i['subtotal']).'</td>
                      <td class="">
                        <a type="button" class="btn btn-default submit btn-sm btn-danger kurang" id="'.$i['rowid'].'"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>';
      }
      $output1 .=     '<tr>
                      <td colspan="2"><strong>Total Belanja</strong></td>
                      <td colspan="2">
                        <p><b class="total">'.$this->cart->total_items().'</b> Item(s)</p><input type="hidden" name="totalitem" value="'.$this->cart->total_items().'"></td>
                      <td style=""><b>Rp. '.$this->cart->format_number($this->cart->total()).'</b><input type="hidden" name="totalharga" value="'.$this->cart->total().'"></td>
                      <td></td>
                    </tr>';
      echo $output1;
    }

  	function resetcart(){
  		$this->cart->destroy();
      $isi = $this->cart->contents();
      $this->tampilcart($isi);
	  }

    function simpantransaksi(){
      $this->db->trans_begin();
      $idpetugas = $this->session->userdata('idpetugas');
      $namapetugas = $this->session->userdata('nama');
      $idtrans = $idpetugas.substr(uniqid(),3);
      $totalitem = $this->input->post('totalitem',true);
      $totalharga = $this->input->post('totalharga',true);
      $idbarang = $this->input->post('idbarang',true);
      $nama = $this->input->post('nama',true);
      $jumlah = $this->input->post('jumlah',true);
      $harga = $this->input->post('harga',true);
      for ($i=0; $i < sizeof($idbarang); $i++) {
        $input = array(
          'idtransaksi' => $idtrans,
          'idproduk'    => $idbarang[$i],
          'nama'        => $nama[$i],
          'jumlah'      => $jumlah[$i],
          'harga'       => $harga[$i]
        );
        $this->mdata->simpan('barangkeluar_details',$input);
      }
      $input2 = array(
        'idtransaksi' => $idtrans,
        'nama' => $namapetugas,
        'idpetugas' => $idpetugas,
        'totalbarang' => $totalitem,
        'totalharga' => $totalharga
      );
      $this->mdata->simpan('barangkeluar',$input2);
      if ($this->db->trans_status() === FALSE)
      {
              $this->db->trans_rollback();
      }
      else
      {
              $this->db->trans_commit();
      }
      echo json_encode(array("status" => TRUE, 'pesan' => 'Berhasil melakukan transaksi'));
    }

    function reset(){
      $this->mdata->deleteall('barang');
      $this->mdata->deleteall('barangmasuk');
      $this->mdata->deleteall('barangmasuk_details');
      $this->mdata->deleteall('produk_details');
      $this->mdata->deleteall('produk');
      redirect(site_url('client'));
    }
}
