<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profil extends CI_Controller {

  public function __construct() 
    {

        parent::__construct();
        $this->load->model('profil_model');
    }
	
	function index(){
  
    $data = array('title'=> 'Halaman Profil',
                  'profil' => $this->profil_model->get_data(),
                  'isi'  => 'frontend/profil/profil_view'
                 );
    $this->load->view('frontend/layout/v_wrapper', $data, FALSE);
  
  }
}