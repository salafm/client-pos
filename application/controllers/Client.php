<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$API = '';
class Client extends CI_Controller
{

    function __construct() {
       parent::__construct();
       $this->load->model('mapi');
       $this->API="http://localhost/resto/index.php";
       $h = $this->db->get('apilogin')->result_array();
       if($h != NULL){
         $user = $h[0]['user'];
         $pass = $h[0]['pass'];
         $config = array (
         'auth'          => TRUE,
         'auth_type'     => 'digest',
         'auth_username' => $user,
         'auth_password' => $pass);
         $this->restclient->initialize($config);
         $this->id = $this->mapi->getId($user);
         $this->key = $this->mapi->getKey($user);
       }

      // if($this->session->userdata('status') != "login"){
   		//	redirect(site_url("login"));
   		// }
    }

    public function index()
    {
        $id = $this->id;
        $key = $this->key;
        $data['barang'] = json_decode(json_encode($this->restclient->get($this->API.'/api/barang/id/'.$id.'/X-API-KEY/'.$key)), FALSE);
        $this->restclient->debug();
		    $this->load->view('vclient',$data);
    }
}
