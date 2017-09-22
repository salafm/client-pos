<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
$API = '';
class Login extends CI_Controller
{

  function __construct()
  {
  		parent::__construct();
      $this->load->model('mdata');
      $this->API="http://localhost/resto/index.php";

  }

  function index()
  {
    $this->db->trans_begin();
    $h = $this->db->get('apilogin')->result_array();
    $userid = '';
    $id[] = array('id'=>'0');
    if($h != NULL){
      $user = $h[0]['user'];
      $pass = $h[0]['pass'];
      $keys = $h[0]['apikeys'];
      $config = array (
        'auth'          => TRUE,
        'auth_type'     => 'basic',
        'auth_username' => $user,
        'auth_password' => $pass);
      $this->restclient->initialize($config);
      $id = $this->restclient->get($this->API.'/api/cabangid/user/'.$user.'/waroenk/'.$keys);
      if(!array_key_exists('error',$id)){
        $userid = $id[0]['id'];
        $petugas = $this->restclient->get($this->API.'/api/petugas/id/'.$userid.'/waroenk/'.$keys);
        foreach ($petugas as $p) {
          $inputpetugas = array(
            'id' => $p['id'],
            'idpetugas' => substr($user,0,3).'0'.$p['id'],
            'user' => $p['user'],
            'pass' => $p['pass'],
            'nama' => $p['nama'],
            'email' => $p['email']
          );
          $this->mdata->simpan2('petugas',$inputpetugas);
        }
      }
      else{
        if($id['error'] == 'IP unauthorized'){
           $id[] = array('id'=>'ip');
        }elseif ($id['error'] == 'Unauthorized' || $id['error'] == 'Invalid credentials'){
          $id[] = array('id'=>'invalid');
        }elseif ($id['error'] == 'Invalid API key ') {
          $id[] = array('id'=>'api');
        }
      }
      $input = array(
        'userid' => $userid
      );
      $this->mdata->simpanid($user,$input,'apilogin');
    }
    if ($this->db->trans_status() === FALSE)
    {
            $this->db->trans_rollback();
    }
    else
    {
            $this->db->trans_commit();
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

		$this->mdata->simpan('apilogin',$input);
		echo json_encode(array("status" => TRUE));
	}

  function reset()
  {
    $this->mdata->deleteall('apilogin');
    $this->mdata->deleteall('petugas');
    $this->mdata->deleteall('barang');
    echo 'sukses';
  }

  function aksi_login(){
		$user = $this->input->post('username',true);
		$pass = $this->input->post('password',true);
		$where = array(
			'user' => $user,
			'pass' => $pass
			);
		$cek = $this->mdata->cek_login('petugas',$where)->num_rows();
		$data = $this->mdata->cek_login('petugas',$where)->result_array();
		if($cek > 0){
			$data_session = array(
				'user' => $user,
				'statuss' => "login",
				'nama' => $data[0]['nama'],
        'id' => $data[0]['id'],
        'idpetugas' => $data[0]['idpetugas']
				);
			$this->session->set_userdata($data_session);
			redirect(site_url("client"));
		}else{
      $data['login'] = '0';
			$data['logins'] = 'gagal';
			$this->load->view('vlogin',$data);
		}
	}

  function logout(){
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}
}
