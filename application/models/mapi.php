<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class mapi extends CI_Model
{
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

  function simpanid($u,$fields,$table){
		$this->db->where('user',$u)->update($table,$fields);
    }
}
