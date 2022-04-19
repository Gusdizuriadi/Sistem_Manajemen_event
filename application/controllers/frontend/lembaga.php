<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lembaga extends CI_Controller {

  public function __construct() 
    {

        parent::__construct();
        $this->load->model('lembaga_model');
    }
	
	function index(){
  
    $data = array('title'=> 'Halaman lembaga',
                  'lembaga' => $this->lembaga_model->get_data(),
                  'isi'  => 'frontend/lembaga/lembaga_view'
                 );
    $this->load->view('frontend/layout/v_wrapper', $data, FALSE);
  
  }
	
}