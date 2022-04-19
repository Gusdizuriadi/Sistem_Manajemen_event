<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct() 
    {

        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('pendaftaran_peserta_model');
        $this->load->model('stakeholder_model');
    }
	
	public function index(){
  
    $data = array('title'=> 'Home',
                  'event_h' => $this->event_model->event_utama(),
                  'stakeholder' => $this->stakeholder_model->get_sponsor(),
                  'pendaftaran' => $this->pendaftaran_peserta_model->get_data(),
                  'isi'  => 'frontend/Home/list'
                 );
    $this->load->view('frontend/layout/v_wrapper', $data, FALSE);
  
  }
	
}