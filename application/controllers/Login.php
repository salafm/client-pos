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
    $userid = '';
    $id[] = array('id'=>'0');
    if($h != NULL){
      $user = $h[0]['user'];
      $pass = $h[0]['pass'];
      $keys = $h[0]['apikeys'];
      $config = array (
        'auth'          => TRUE,
        'auth_type'     => 'digest',
        'auth_username' => $user,
        'auth_password' => $pass);
      $this->restclient->initialize($config);
      $id = $this->restclient->get($this->API.'/api/cabangid/user/'.$user.'/X-API-KEY/'.$keys);
      if(!array_key_exists('error',$id)){
        $userid = $id[0]['id'];
      }
      $input = array(
        'userid' => $userid
      );
      $this->mapi->simpanid($user,$input,'apilogin');
      if (count($id) == 2){
        if($id['error'] == 'IP unauthorized'){
           $id[] = array('id'=>'ip');
        }elseif ($id['error'] == 'Invalid credentials') {
          $id[] = array('id'=>'invalid');
        }elseif ($id['error'] == 'Invalid API key ') {
          $id[] = array('id'=>'api');
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
    $key = $this->input->post('api',true);
		$input = array(
			'user' => $user,
			'pass' => $pass,
      'apikeys' => $key
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
