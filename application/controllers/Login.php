<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Login extends CI_Controller
{

  function __construct()
  {
  		parent::__construct();
      $this->load->model('mapi');
      $this->API="http://localhost/resto/index.php";

  }

  function index()
  {
    $h = $this->db->get('apilogin')->result_array();
    $id[] = array('id'=>'100000');
    if($h != NULL){
      $user = $h[0]['user'];
      $pass = $h[0]['pass'];
      $config = array (
        'auth'          => TRUE,
        'auth_type'     => 'digest',
        'auth_username' => $user,
        'auth_password' => $pass);
      $this->restclient->initialize($config);
      $id = $this->restclient->get($this->API.'/api/cabangid/user/'.$user);
      if (count($id) == 2){
        if($id['error'] == 'IP unauthorized'){
           $id[] = array('id'=>'ip');
        }elseif ($id['error'] == 'Invalid credentials') {
          $id[] = array('id'=>'invalid');
        }
      }
    }
    $data['login'] = $id[0]['id'];
    $this->load->view('vlogin',$data);
  }

  function cekapi()
  {
    $cek = $this->db->get('apilogin')->num_rows();
    echo $cek;
  }

  function initapi()
	{
		$user = $this->input->post('user',true);
		$pass = $this->input->post('pass',true);
		$input = array(
			'user' => $user,
			'pass' => $pass
		);

		$this->mapi->simpan('apilogin',$input);
		echo json_encode(array("status" => TRUE));
	}

  function reset()
  {
    $this->db->query('delete from apilogin');
    echo 'sukses';
  }
}
