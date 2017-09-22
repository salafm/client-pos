<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class mdata extends CI_Model
{
  function cek_login($table,$where){
    return $this->db->get_where($table,$where);
  }

  function tampil_all($table){
    return $this->db->get($table);
  }

  function tampil_where($table, $where){
    return $this->db->get_where($table, $where);
  }

  function update($where,$fields,$table){
    $this->db->where($where)->update($table,$fields);
  }

  function getId($user)
  {
    $hasil = $this->db->where('user',$user)->get('apilogin')->result();
    foreach ($hasil as $h) {
      $result = $h->userid;
    }
    return $result;
  }

  function getKey($user)
  {
    $hasil = $this->db->where('user',$user)->get('apilogin')->result();
    foreach ($hasil as $h) {
      $result = $h->apikeys;
    }
    return $result;
  }

  function simpan($table,$data){
		$this->db->insert($table, $data);
	}

  function simpan2($table,$data){
		$this->db->replace($table, $data);
	}

  function simpanjikabaru($table,$where,$input,$input2)
  {
    if($this->tampil_where($table,$where)->num_rows() == 0){
        $this->simpan($table,$input);
    }else{
      $this->update($where,$input2,$table);
    }
  }

  function simpanid($u,$fields,$table){
		$this->db->where('user',$u)->update($table,$fields);
  }

  function deleteall($table)
  {
    $this->db->empty_table($table);
  }

  function search($search,$kategori)
  {
    return $this->db->query('SELECT idproduk, nama FROM produk WHERE kategori = "'.$kategori.'" AND nama LIKE "%'.$search.'%"');
  }
}