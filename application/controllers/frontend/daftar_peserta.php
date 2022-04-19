<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class daftar_peserta extends CI_Controller {

  public function __construct() 
    {

        parent::__construct();
        $this->load->model('pendaftaran_peserta_model');
    }
	
	function index(){
  
        $data = array('title'=> 'Halaman Daftar Peserta',
                      'daftar' => $this->pendaftaran_peserta_model->get_data(),
                      'isi'  => 'frontend/daftar_peserta/daftar_peserta_view'
                     );
        $this->load->view('frontend/layout/v_wrapper', $data, FALSE);
      
      }
}