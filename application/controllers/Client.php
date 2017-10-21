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
         $nama = $h[0]['nama'];
         $config = array (
         'auth'          => TRUE,
         'auth_type'     => 'basic',
         'auth_username' => $user,
         'auth_password' => $pass);
         $this->restclient->initialize($config);
         $this->id = $this->mdata->getId($user);
         $this->key = $this->mdata->getKey($user);
         $this->nama = $nama;
       }

      if($this->session->userdata('statuss') != "login"){
   			redirect(site_url("login"));
   		}
    }

    public function index()
    {
        $id = $this->id;
        $key = $this->key;
        $this->restclient->post(($this->API.'/api/petugas/waroenk/'.$key),['id' => $this->session->userdata('id')]);
        $jam = date('H');
        if($jam >= 0){
          $this->updatetabel($id,$key);
        }

        if ($jam < 22) {
          $this->updatestokserver($id,$key);
        }

        $this->restock();
        //$this->restclient->debug();
        $data['barang'] = $this->mdata->tampil_all('barang')->result();
        $data['produk'] = $this->mdata->tampil_all('produk')->result();
        $data['tk'] = $this->mdata->tampil_allorder('barangkeluar')->result();
        $data['tm'] = $this->mdata->tampil_allorder('barangmasuk')->result();
        $data['cabang'] = array('nama' => $this->nama);
        $data['query'] = $this->mdata;
        $data['total'] = array('total' => $this->pendapatansehari());
        $this->cart->destroy();
		    $this->load->view('vclient',$data);
    }

    function updatetabel($id,$key){
      $barangclient = json_decode(json_encode($this->restclient->get($this->API.'/api/barang/id/'.$id.'/waroenk/'.$key)), FALSE);
      if(sizeof($barangclient) > 0){
        $this->db->trans_begin();
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
        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
        }
        else
        {
                $this->db->trans_commit();
                $this->restclient->post(($this->API.'/api/barang/waroenk/'.$key),['id' => $id]);
        }
      }

      $produkclient = json_decode(json_encode($this->restclient->get($this->API.'/api/produk/id/'.$id.'/waroenk/'.$key)), FALSE);
      if (sizeof($produkclient) > 0 ){
        $this->db->trans_begin();
        foreach ($produkclient as $pc){
          $input = array(
            'idproduk' => $pc->idproduk,
            'nama' => $pc->nama,
            'harga' => $pc->harga,
          );
          $where = array('idproduk' => $pc->idproduk);
          $input2 = array('nama' => $pc->nama, 'harga' => $pc->harga);
          $this->mdata->simpanjikabaru('produk',$where,$input,$input2);

          $produkdetails = json_decode(json_encode($this->restclient->get($this->API.'/api/produkdetails/id/'.$id.'/waroenk/'.$key)), FALSE);
          foreach ($produkdetails as $pd) {
            $input = array(
              'idproduk' => $pd->idproduk,
              'idbarang' => $pd->idbarang,
              'jumlah' => $pd->jumlah
            );
            $this->mdata->simpanjikabaru('produk_details',array('idproduk' => $pd->idproduk, 'idbarang' => $pd->idbarang),$input,array('jumlah' => $pd->jumlah));
          }
        }
        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
        }
        else
        {
                $this->db->trans_commit();
                $this->restclient->post(($this->API.'/api/produk/waroenk/'.$key),['id' => $id]);
        }
      }


      $barangmasuk = json_decode(json_encode($this->restclient->get($this->API.'/api/barangmasuk/id/'.$id.'/waroenk/'.$key)), FALSE);
      if (sizeof($barangmasuk) > 0 ){
        $this->db->trans_begin();
        foreach ($barangmasuk as $bm) {
          $idt = 'in'.trim($bm->idtransaksi,'out');
          $input = array(
            'id' => $bm->id,
            'idtransaksi' => $idt,
            'deskripsi' => $bm->deskripsi,
            'tanggal' => $bm->tanggal
          );
          $this->mdata->simpan2('barangmasuk',$input);

          $bmdetail = json_decode(json_encode($this->restclient->get($this->API.'/api/bmdetails/id/'.$bm->idtransaksi.'/waroenk/'.$key)), FALSE);
          foreach ($bmdetail as $bmd) {
            $input = array(
              'idtransaksi' => $idt,
              'idbarang' => $bmd->idbarang,
              'harga' => $bmd->harga,
              'jumlah' => $bmd->jumlah
            );
            $where = array('idtransaksi' => $idt, 'idbarang' => $bmd->idbarang);
            $this->mdata->simpanjikabaru('barangmasuk_details',$where,$input,array('id' => $idt));
          }
        }
        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
        }
        else
        {
                $this->db->trans_commit();
                $this->restclient->post(($this->API.'/api/barangmasuk/waroenk/'.$key),['id' => $id]);
        }
      }

      $cekdelete = json_decode(json_encode($this->restclient->get($this->API.'/api/cekdelete/id/'.$id.'/waroenk/'.$key)), FALSE);
      if(sizeof($cekdelete) > 0){
        $this->db->trans_begin();
        foreach ($cekdelete as $cd) {
          $where = array(
            $cd->kolom => $cd->idkolom
          );
          if($cd->kolom == 'idproduk')
          {
            $this->mdata->hapus($where,'produk');
            $this->mdata->hapus($where,'produk_details');
          }else{
            $this->mdata->hapus($where,'barang');
          }
        }
        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
        }
        else
        {
                $this->db->trans_commit();
                $this->restclient->delete($this->API.'/api/cekdelete/id/'.$id.'/waroenk/'.$key);
        }
      }
    }

    function updatestokserver($id,$key){
      $barang = $this->mdata->tampil_all('barang')->result();
      foreach ($barang as $b) {
        $this->restclient->post(($this->API.'/api/stokbarang/waroenk/'.$key),['id' => $id, 'idbarang' => $b->idbarang, 'stok' => $b->stok]);
      }
      $produk = $this->mdata->tampil_all('produk')->result();
      foreach ($produk as $p) {
        $this->restclient->post(($this->API.'/api/stokproduk/waroenk/'.$key),['id' => $id, 'idproduk' => $p->idproduk, 'stok' => $p->stok]);
      }
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
      $this->tampilcart($isi, array());
  	}

    function updatecart()
    {
      $id = $this->input->get('id',true);
      $val = $this->input->get('value',true);
      $data = array('rowid' => $id, 'qty' => $val);
      $this->cart->update($data);
  		$isi = $this->cart->contents();
      $this->tampilcart($isi, array());
    }

  	function hapuscart($rowid){
  		$this->cart->remove($rowid);
      $isi = $this->cart->contents();
      $this->tampilcart($isi, array());
  	}

    function resetcart(){
      $this->cart->destroy();
      $isi = $this->cart->contents();
      $this->tampilcart($isi, array());
    }

    function simpantransaksi(){
      $this->db->trans_begin();
      $idpetugas = $this->session->userdata('idpetugas');
      $namapetugas = $this->session->userdata('namapetugas');
      $date = date('Ymd');
      $hasil = $this->db->query('SELECT MAX(id) as id FROM barangkeluar');
      if($hasil->num_rows()>0){
        $hasil = $hasil->result();
        $id = $hasil[0]->id+1;
        if(strlen((string)$id) == 1){
          $id = '000'.$id;
        }elseif (strlen((string)$id) == 2) {
          $id = '00'.$id;
        }elseif (strlen((string)$id) == 3) {
          $id ='0'.$id;
        }else{
          $id = $id;
        }
      }else{
        $id = '0001';
      }
      $idtrans = $date.$id;
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
      $this->cart->destroy();
      $isi = $this->cart->contents();
      $this->restock();
      $this->tampilcart($isi,$idtrans);
    }

    function tampilcart($isi,$id){
      $output1 ='';
      $isi = array_reverse($isi);
      $total = $this->cart->total_items();
      if ($total == 0){
        $total = '';
      }else{
        $total = $this->cart->total_items();
      }
      foreach ($isi as $i) {
        $hasil = $this->mdata->tampil_where('produk',array('idproduk' => $i['id']))->result();
        $output1 .= '<tr id="'.$i['rowid'].'">
                      <td class="">'.$i['id'].'<input type="hidden" name="idbarang[]" value="'.$i['id'].'"></td>
                      <td class="">'.$i['name'].'<input type="hidden" name="nama[]" value="'.$i['name'].'"></td>
                      <td class="">
                        <input name="jumlah[]" type="number" id="'.$i['id'].'" class="col-md-3 form-control number" style="width:65px;" value="'.$i['qty'].'" min="0" max="'.$hasil[0]->stok.'">
                      </td>
                      <td class="">Rp. '.number_format($i['price'],2,",",".").'<input type="hidden" name="harga[]" value="'.$i['price'].'"></td>
                      <td class="">Rp. '.number_format($i['subtotal'],2,",",".").'</td>
                      <td class="">
                        <a type="button" class="btn btn-default submit btn-sm btn-danger kurang" id="'.$i['rowid'].'"><i class="fa fa-times"></i></a>
                      </td>
                    </tr>';
      }
      $output1 .=     '<tr>
                      <td colspan="2"><strong>Total Belanja</strong></td>
                      <td colspan="2">
                        <p><b class="total">'.$this->cart->total_items().'</b> Item(s)</p><input type="text" style="display:none" name="totalitem" value="'.$total.'" required></td>
                      <td style=""><b>Rp. '.number_format($this->cart->total(),2,",",".").'</b><input type="hidden" name="totalharga" value="'.$this->cart->total().'"></td>
                      <td></td>
                    </tr>';

      $produk = $this->mdata->tampil_all('produk')->result();
      $output2 ='';
      $no = 1;
      foreach ($produk as $p) {
        $hasil = $this->mdata->tampil_join3('produk_details',$p->idproduk)->result();
        $komposisi = 'Komposisi '.$p->nama.' :'."\n";
        foreach ($hasil as $h) {
          $komposisi .= $h->jumlah.' '.$h->satuan.' '.$h->nama."\n";
        }
        $output2 .= '<tr>
                        <td>'.$no.'</td>
                        <td>'.$p->idproduk.'</td>
                        <td id="'.$no.'" title="'.$komposisi.'">'.$p->nama.'</td>
                        <td>Rp. '.number_format($p->harga,2,",",".").'</td>
                        <td class="stok">'.$p->stok.'</td>
                        <td><a type="button" name="'.$no.'" class="btn btn-default btn-sm btn-default tambah" id="'.$p->idproduk.'"> <i class="fa fa-shopping-cart"></i></a></td>
                    </tr>';
                    $no++;
      }

      $barang = $this->mdata->tampil_all('barang')->result();
      $output3 = '';
      $no = 1;
      foreach ($barang as $b) {
        $output3 .= ' <tr class="hasil">
                        <td>'.$no++.'</td>
                        <td>'.$b->idbarang.'</td>
                        <td>'.$b->nama.'</td>
                        <td>Rp. '.number_format($b->harga,2,",",".").'</td>
                        <td>'.$b->stok.'</td>
                        <td>'.$b->satuan.'</td>
                        <td>'.$b->tanggal.'</td>
                      </tr>';
      }


      $tk = $this->mdata->tampil_allorder('barangkeluar')->result();
      $output4 = '';
      $no = 1;
      foreach ($tk as $tk) {
        $output4 .= '<tr id="'.$tk->idtransaksi.'">
                      <td>'.$no++.'</td>
                      <td>'.$tk->idtransaksi.'</td>
                      <td>'.$tk->nama.'</td>
                      <td>'.$tk->totalbarang.'</td>
                      <td>'.number_format($tk->totalharga,2,",",".").'</td>
                      <td>'.$tk->tanggal.'</td>
                      <td><button class="btn btn-default btn-sm details" id=""><i class="fa fa-info-circle"></i>  &nbsp;details</button></td>
                    </tr>';
      }

      $rupiah = number_format($this->pendapatansehari(),2,",",".");
      echo json_encode(array('isi' => $output1, 'id' => $id, 'produk' => $output2, 'barang' => $output3, 'tk' => $output4, 'penghasilan' => $rupiah, 'isinya' => $isi));
    }

    function restock(){
      $produk = $this->mdata->tampil_all('produk')->result();
      foreach ($produk as $p) {
        $all = $this->db->query('SELECT * FROM barang INNER JOIN produk_details ON barang.idbarang = produk_details.idbarang WHERE idproduk = "'.$p->idproduk.'" ')->result();
        $min = 10000000000000000;
        foreach ($all as $a) {
          $x = $a->stok/$a->jumlah;
          if($min > $x){
            $min = floor($x);
          }else {
            $min = $min;
          }
        }
        $this->mdata->update(array('idproduk' => $p->idproduk),array('stok' => $min),'produk');
      }
    }

    function pendapatansehari(){
      $d = (int)date('d');
      $m = (int)date('m');
      $y = (int)date('Y');
      $pendapatan = $this->db->query('SELECT totalharga FROM barangkeluar WHERE DAY(tanggal) = '.$d.' AND MONTH(tanggal) = '.$m.' AND YEAR(tanggal) = '.$y.'')->result();
      $total = 0;
      foreach ($pendapatan as $pd) {
        $total = $total + $pd->totalharga;
      }
      return $total;
    }

    function detail()
    {
      $id = $this->input->get('id',true);
      $table = $this->input->get('tabel',true);
      $hasil = $this->mdata->tampil_join2($table,$id)->result();
      $output ='';
      $total = 0;
      foreach ($hasil as $h) {
        $barang = $this->mdata->tampil_join3('produk_details',$h->idproduk)->result();
        $n = sizeof($barang);
        $c = 0;
        foreach ($barang as $b) {
          if ($c==0){
            $output .= '<tr id="'.$h->idproduk.'"><td rowspan="'.$n.'">'.$h->nama.'</td>';
            $output .= '<td rowspan="'.$n.'">'.$h->jumlah.'</td>';
            $output .= '<td rowspan="'.$n.'"> Rp.'.number_format($h->harga,2,",",".").'</td>';
            $output .= '<td>'.$b->nama.'</td>';
            $output .= '<td>'.$h->jumlah*$b->jumlah.'</td>';
            $output .= '<td>'.$b->satuan.'</td></tr>';
          }
          else {
            $output .= '<tr>';
            $output .= '<td>'.$b->nama.'</td>';
            $output .= '<td>'.$h->jumlah*$b->jumlah.'</td>';
            $output .= '<td>'.$b->satuan.'</td></tr>';
          }
          $c++;
        }
      }
      echo $output;
    }

    function reset(){
      $this->mdata->deleteall('barang');
      $this->mdata->deleteall('barangmasuk');
      $this->mdata->deleteall('barangmasuk_details');
      $this->mdata->deleteall('produk_details');
      $this->mdata->deleteall('produk');
      redirect(site_url('client'));
    }

    function cekmeja(){
      $meja = $this->mdata->tampil_all('trans_meja')->result();
      foreach ($meja as $m) {
        $output[] = $m->flag;
      }
      echo json_encode($output);
    }

    function transaksi(){
      $this->db->trans_begin();
      $idmeja = $this->input->post('idmeja',true);
      $idtrans = 'trans'.$idmeja;
      $idbarang = $this->input->post('idbarang',true);
      $jumlah = $this->input->post('jumlah',true);
      for ($i=0; $i < sizeof($idbarang); $i++) {
        $input = array(
          'idtransaksi' => $idtrans,
          'idproduk'    => $idbarang[$i],
          'jumlah'      => $jumlah[$i]
        );
        $input2 = array(
          'jumlah'      => $jumlah[$i]
        );
        $where = array(
          'idtransaksi' => $idtrans,
          'idproduk'    => $idbarang[$i]
        );
        $this->mdata->simpanjikabaru('trans_dtl',$where,$input,$input2);
      }

      $inputan = array(
        'idtransaksi' => $idtrans,
        'flag' => 1
      );
      $this->mdata->update(array('meja' => $idmeja),$inputan,'trans_meja');
      if ($this->db->trans_status() === FALSE)
      {
              $this->db->trans_rollback();
      }
      else
      {
              $this->db->trans_commit();
      }
      $this->cart->destroy();
      $isi = $this->cart->contents();
      $this->tampilcart($isi,$idtrans);
    }

    function tampiltrans($id){
      $this->cart->destroy();
      $meja = $this->mdata->tampil_where('trans_meja',array('meja' => $id, 'flag' => '1'))->result();
      $item = $this->mdata->tampil_where('trans_dtl',array('idtransaksi' => $meja[0]->idtransaksi))->result();
      foreach ($item as $i) {
        $produk = $this->mdata->tampil_where('produk',array('idproduk' => $i->idproduk))->result();
        $data = array(
        	'id' => $i->idproduk,
    		  'name' => $produk[0]->nama,
    		  'qty' => $i->jumlah,
    		  'price' => $produk[0]->harga
    		);
    		$this->cart->insert($data);
      }
      $isi = $this->cart->contents();
      $this->tampilcart($isi, array());
    }
}
