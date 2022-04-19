<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stakeholder extends CI_Controller {

  public function __construct() 
    {

        parent::__construct();
        $this->load->model('stakeholder_model');
    }
	
	function index(){
  
    $data = array('title'=> 'Halaman Stakeholder',
                  'stakeholder' => $this->stakeholder_model->get_sponsor(),
                  'isi'  => 'frontend/stakeholder/stakeholder_view'
                 );
    $this->load->view('frontend/layout/v_wrapper', $data, FALSE);
  
  }
}