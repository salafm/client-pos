<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function index()
    {
        $this->load
            ->add_package_path(FCPATH.'vendor/restclient')
            ->library('restclient')
            ->remove_package_path(FCPATH.'vendor/restclient');

        $this->load->helper('url');

        //$json = $this->restclient->post(site_url('server'), [
         //   'lastname' => 'test'
        //]);

        //$this->restclient->debug();
		$this->load->view('vclient');
    }
}