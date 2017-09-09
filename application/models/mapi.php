<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class mapi extends CI_Model
{
  function simpan($table,$data){
		$this->db->insert($table, $data);
	}
}
