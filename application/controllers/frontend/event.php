<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class event extends CI_Controller {

  public function __construct() 
    {

        parent::__construct();
        $this->load->model('event_model');
    }
	
  public function index()
  {
  
    $data = array('title'=> 'Halaman Event',
                  'event_e' => $this->event_model->event_utama(),
                  'isi'  => 'frontend/event/event_view'
                 );
    $this->load->view('frontend/layout/v_wrapper', $data, FALSE);
  
  }

  public function detail_event($id_event)
  {

    $data = array('title'=> 'Detail Event',
                  'detail_event' => $this->event_model->detail_event($id_event),
                  'isi'  => 'frontend/event/event_detail_f',
                 );
    $this->load->view('frontend/layout/v_wrapper', $data, FALSE);
  }
	
}