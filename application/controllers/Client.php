<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$API = '';
class Client extends CI_Controller
{

    function __construct() {
       parent::__construct();
       $this->API="http://localhost/resto/index.php";
       $config = array (
       'auth'          => TRUE,
       'auth_type'     => 'basic',
       'auth_username' => 'alfa',
       'auth_password' => 'password2');
       $this->restclient->initialize($config);
    }
    public function index()
    {
        $data['cabang'] = json_decode(json_encode($this->restclient->get($this->API.'/api/cabang/id/')), FALSE);
        $this->restclient->debug();
		    $this->load->view('vclient',$data);
    }

    function lihatcabang($id){
      $data = json_decode(json_encode($this->restclient->get($this->API.'/api/cabang/id/'.$id)), FALSE);
      foreach ($data as $d) {
        echo '<td>'.$d->nama.'</td><td>'.$d->user.'</td><td>'.$d->pass.'</td>';
      }
    }
}
