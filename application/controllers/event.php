<?php

defined('BASEPATH') or exit('No direct script access allowed');

class event extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth'); 
    }        // load model
        $this->load->model('event_model', 'ev');
    }


    public function index()
    {
       
        $attradd = array('class' => 'btn  btn-gradient-success');
        $tambahdata = anchor('event/add', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $ev = $this->ev->get_data();
        $data = array(
            'event' =>  $ev,
            'title' => 'Data event',
            'btntambah' => $tambahdata,
        );
        $this->template->load('template/template_v', 'event/event_view', $data);
    }

    public function detail($id)
    {
        
        $id = $this->uri->segment(3);
        $get_row = $this->ev->get_row($id);
        if ($get_row->num_rows() > 0) {
            $row = $get_row->row();
            $nama_event = $row->nama_event;
            $id_kategori_agenda = $row->nama_kategori_agenda;
            $id_bidang_ilmu = $row->nama_bidang_ilmu;
            $id_narasumber = $row->nama_narasumber;
            $tanggal_pelaksanaan_event = $row->tanggal_pelaksanaan_event;
            $narasumber_pendamping = $row->narasumber_pendamping;
            $tanggal_deadline_event = $row->tanggal_deadline_event;
            $id_lembaga = $row->nama_lembaga;
            $deskripsi_event = $row->deskripsi_event;
            $brosur_event = $row->brosur_event;
            $data = array(
                'title' => 'Detail Event',
                'parent' => 'Data Event',
                'nama_event' => $nama_event,
                'id_kategori_agenda' => $id_kategori_agenda,
                'id_bidang_ilmu' => $id_bidang_ilmu,
                'id_narasumber' => $id_narasumber,
                'tanggal_pelaksanaan_event' => $tanggal_pelaksanaan_event,
                'narasumber_pendamping' => $narasumber_pendamping,
                'tanggal_deadline_event' => $tanggal_deadline_event,
                'id_lembaga' => $id_lembaga,
                'deskripsi_event' => $deskripsi_event,
                'brosur_event' => $brosur_event,
            );
            $this->template->load('template/template_v', 'event/event_detail', $data);
        } else {
            
            $this->session->set_flashdata('warning', 'Data tidak ditemukan!');
            redirect('event');
        }
    }

    public function add()
    {

        $attr_form = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        // ATTRIBUTE INPUT TEXt
        $attrid_event = array(
            'type' => 'hidden',
            'id' => 'id_event',
            'value' => set_value('id_event'),
        );

        $attrnama_event = array(
            'type' => 'text',
            'name' => 'nama_event',
            'id' => 'nama_event',
            'placeholder' => 'Masukkan Nama event',
            'value' => set_value('nama_event'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attrnarasumber_pendamping = array(
            'type' => 'text',
            'name' => 'narasumber_pendamping',
            'id' => 'narasumber_pendamping',
            'placeholder' => 'Masukkan Narasumber Pendamping',
            'value' => set_value('narasumber_pendamping'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attrtema_event = array(
            'type' => 'text',
            'name' => 'tema_event',
            'id' => 'tema_event',
            'placeholder' => 'Masukkan Tema Event',
            'value' => set_value('tema_event'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attrsubtema_event = array(
            'type' => 'text',
            'name' => 'subtema_event',
            'id' => 'subtema_event',
            'placeholder' => 'Masukkan Subtema Event',
            'value' => set_value('subtema_event'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attrdeskripsi_event = array(
            'type' => 'text',
            'name' => 'deskripsi_event',
            'id' => 'deskripsi_event',
            'placeholder' => 'Masukkan Deskripsi Event',
            'value' => set_value('deskripsi_event'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attrtanggal_deadline_event = array(
            'type' => 'date',
            'name' => 'tanggal_deadline_event',
            'id' => 'tanggal_deadline_event',
            'placeholder' => 'Masukkan Tanggal Deadline Event',
            'value' => set_value('tanggal_deadline_event'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attrtanggal_pelaksanaan_event = array(
            'type' => 'date',
            'name' => 'tanggal_pelaksanaan_event',
            'id' => 'tanggal_pelaksanaan_event',
            'placeholder' => 'Masukkan Tanggal pelaksanaan Event',
            'value' => set_value('tanggal_pelaksanaan_event'),
            'class' => 'form-control',
            'required' => 'required'
        );

    
        $attrlink_event = array(
            'type' => 'text',
            'name' => 'link_event',
            'id' => 'link_event',
            'placeholder' => 'Masukkan link',
            'class' => 'form-control',
            'value' => set_value('link_event'),
            'required' => 'required'

        );

        $attrbrosur_event = array(
            'type' => 'file',
            'name' => 'foto',
            'value' => set_value('foto'),
            'placeholder' => 'foto',
            'id' => 'input-file-now',
            'class' => 'dropify',
        );

        $attrnomor_informasi_event = array(
            'type' => 'text',
            'name' => 'nomor_informasi_event',
            'id' => 'nomor_informasi_event',
            'placeholder' => 'Masukkan Nomor informasi event',
            'class' => 'form-control',
            'value' => set_value('nomor_informasi_event'),
            'required' => 'required'
        );

        $attrstatus_event = array(
            'type' => 'text',
            'name' => 'status_event',
            'id' => 'status_event',
            'placeholder' => 'status',
            'class' => 'form-control',
            'value' => set_value('status_event'),
            'required' => 'required'
        );

        $attrsubmit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

        $narasumber = $this->ev->get_narasumber();
        $kategori_agenda = $this->ev->get_kategori_agenda();
        $bidang_ilmu = $this->ev->get_bidang_ilmu();
        $lembaga = $this->ev->get_lembaga();
        $form_open = form_open_multipart('event/addaction', $attr_form);
        $formclose  = form_close();
        $lnama_event = form_label('Nama event', 'nama_event');
        $lnarasumber = form_label('Narasumber', 'narasumber');
        $lnarasumber_pendamping = form_label('Narasumber Pendamping', 'narasumber_pendamping');
        $ltema_event = form_label('Tema Event', 'tema_event');
        $lsubtema_event = form_label('Subtema Event', 'subtema_event');
        $lkategori_agenda = form_label('Kategori Agenda', 'kategori_agenda');
        $lbidang_ilmu = form_label('Bidang Ilmu', 'bidang_ilmu');
        $llembaga = form_label('Lembaga', 'lembaga');
        $ltanggal_deadline_event = form_label('Tanggal Deadline Event', 'tanggal_deadline_event');
        $ltanggal_pelaksanaan_event = form_label('Tanggal Pelaksanaan Event', 'tanggal_pelaksanaan_event');
        $llink_event = form_label('Link Event', 'link_event');
        $ldeskripsi_event = form_label('deskripsi Event', 'deskripsi_event');
        $lbrosur_event = form_label('Foto', 'brosur_event');
        $lnomor_informasi_event = form_label('nomor informasi Event', 'nomor_informasi_event');
        $lstatus_event = form_label('status Event', 'status_event');
        // FORM INPUT
        $inputid_event = form_input($attrid_event);
        $inputnama_event = form_input($attrnama_event);
        $inputnarasumber_pendamping = form_input($attrnarasumber_pendamping);
        $inputtema_event = form_input($attrtema_event);
        $inputsubtema_event = form_input($attrsubtema_event);
        $inputdeskripsi_event = form_input($attrdeskripsi_event);
        $inputtanggal_deadline_event = form_input($attrtanggal_deadline_event);
        $inputtanggal_pelaksanaan_event = form_input($attrtanggal_pelaksanaan_event);
        $inputlink_event = form_input($attrlink_event);
        $inputnomor_informasi_event = form_input($attrnomor_informasi_event);
        $inputstatus_event = form_input($attrstatus_event);
         //error form input
        $fe_namaevent = form_error('nama_event');
        //INVALID FEEDBACKS
        $ivnama_event = 'Nama harus diisi!';
        // DROP DOWN
        $getnar = $this->ev->get_narasumber();
        $narasumber = array();
        foreach ($getnar as $d) {
            $narasumber[$d->id_narasumber] = $d->nama_narasumber;
        }

        $optnarasumber = array(
            'id' => 'narasumber',
            'class' => 'form-control'
        );

        $getkat = $this->ev->get_kategori_agenda();
        $kategori_agenda = array();
        foreach ($getkat as $d) {
            $kategori_agenda[$d->id_kategori_agenda] = $d->nama_kategori_agenda;
        }

        $optkategori_agenda = array(
            'id' => 'kategori_agenda',
            'class' => 'form-control'
        );

        $getbid = $this->ev->get_bidang_ilmu();
        $bidang_ilmu = array();
        foreach ($getbid as $b) {
            $bidang_ilmu[$b->id_bidang_ilmu] = $b->nama_bidang_ilmu;
        }

        $optbidang_ilmu = array(
            'id' => 'bidang_ilmu',
            'class' => 'form-control'
        );

        $getlem = $this->ev->get_lembaga();
        $lembaga = array();
        foreach ($getlem as $p) {
            $lembaga[$p->id_lembaga] = $p->nama_lembaga;
        }
        
        $optlembaga = array(
            'id' => 'lembaga',
            'class' => 'form-control'
        );

        $ddnarasumber = form_dropdown('narasumber', $narasumber, set_value('narasumber'), $optnarasumber);
        $ddkategori_agenda = form_dropdown('kategori_agenda', $kategori_agenda, set_value('kategori_agenda'), $optkategori_agenda);
        $ddbidang_ilmu = form_dropdown('bidang_ilmu', $bidang_ilmu, set_value('bidang_ilmu'), $optbidang_ilmu);
        $ddlembaga = form_dropdown('lembaga', $lembaga, set_value('lembaga'), $optlembaga);
        $inputbrosur_event = form_input($attrbrosur_event);
        //simpan
        $submit = form_submit('submit', 'Simpan', $attrsubmit);
        $data = array(
            'form_open' => $form_open,
            'formclose' => $formclose,
            'parent' => 'Data event',
            'title' => 'Tambah event',
            'narasumber' => $narasumber,
            'bidang_ilmu' => $bidang_ilmu,
            'kategori_agenda' => $kategori_agenda,
            'lembaga' => $lembaga,
            'nama_event' => $lnama_event,
            'narasumber' => $lnarasumber,
            'narasumber_pendamping' => $lnarasumber_pendamping,
            'tema_event' => $ltema_event,
            'subtema_event' => $lsubtema_event,
            'kategori_agenda' => $lkategori_agenda,
            'bidang_ilmu' => $lbidang_ilmu,
            'lembaga' => $llembaga,
            'tanggal_deadline_event' => $ltanggal_deadline_event,
            'tanggal_pelaksanaan_event' => $ltanggal_pelaksanaan_event,
            'link_event' => $llink_event,
            'deskripsi_event' => $ldeskripsi_event,
            'brosur_event' => $lbrosur_event,
            'nomor_informasi_event' => $lnomor_informasi_event,
            'status_event' => $lstatus_event,
            'inputid_event' => $inputid_event,
            'inputnama_event' => $inputnama_event,
            'inputnarasumber_pendamping' => $inputnarasumber_pendamping,
            'inputtema_event' => $inputtema_event,
            'inputsubtema_event' => $inputsubtema_event,
            'inputtanggal_deadline_event' => $inputtanggal_deadline_event,
            'inputtanggal_pelaksanaan_event' => $inputtanggal_pelaksanaan_event,
            'inputlink_event' => $inputlink_event,
            'inputdeskripsi_event' => $inputdeskripsi_event,
            'inputbrosur_event' => $inputbrosur_event,
            'inputnomor_informasi_event' => $inputnomor_informasi_event,
            'inputstatus_event' => $inputstatus_event,
            'ddnarasumber' => $ddnarasumber,
            'ddkategori_agenda' => $ddkategori_agenda,
            'ddbidang_ilmu' => $ddbidang_ilmu,
            'ddlembaga' => $ddlembaga,
            'fe_namaevent' => $fe_namaevent,
            'ivnama_event' => $ivnama_event,
            'submit' => $submit
        );
        $this->template->load('template/template_v', 'event/event_form', $data);
    }

    public function addaction()
    {
        $this->_rules();
        $validasi = $this->form_validation->run();
        if ($validasi == FALSE) {
            $this->add();
        } else {
            $config['upload_path']   = FCPATH . '/uploads/event/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '1000';
            $config['max_width']  = '5000';
            $config['max_height']  = '5000';
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('warning', $this->upload->display_errors());
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                 $nama_event = $this->input->post('nama_event', TRUE);
                 $narasumber = $this->input->post('narasumber', TRUE);
                 $narasumber_pendamping = $this->input->post('narasumber_pendamping', TRUE);
                 $tema_event = $this->input->post('tema_event', TRUE);
                 $subtema_event = $this->input->post('subtema_event', TRUE);
                 $kategori_agenda = $this->input->post('kategori_agenda', TRUE);
                 $bidang_ilmu = $this->input->post('bidang_ilmu', TRUE);
                 $lembaga = $this->input->post('lembaga', TRUE);
                 $deskripsi_event = $this->input->post('deskripsi_event', TRUE);
                 $tanggal_deadline_event = $this->input->post('tanggal_deadline_event', TRUE);
                 $tanggal_pelaksanaan_event = $this->input->post('tanggal_pelaksanaan_event', TRUE);
                 $link_event = $this->input->post('link_event', TRUE);
                 $brosur_event = $this->upload->data('file_name', TRUE);
                 $nomor_informasi_event = $this->input->post('nomor_informasi_event', TRUE);
                 $status_event = $this->input->post('status_event', TRUE);
                 $data = array(
                         'nama_event' => $nama_event,
                         'narasumber_pendamping' => $narasumber_pendamping,
                         'tema_event' => $tema_event,
                         'subtema_event' => $subtema_event,
                         'id_narasumber' => $narasumber,
                         'id_kategori_agenda' => $kategori_agenda,
                         'id_bidang_ilmu' => $bidang_ilmu,
                         'id_lembaga' => $lembaga,
                         'deskripsi_event' => $deskripsi_event,
                         'tanggal_deadline_event' => $tanggal_deadline_event,
                         'tanggal_pelaksanaan_event' => $tanggal_pelaksanaan_event,
                         'link_event' => $link_event,
                         'brosur_event' => $brosur_event,
                         'nomor_informasi_event' => $nomor_informasi_event,
                         'status_event' => $status_event,
                     );
                        $this->ev->insert_data($data);
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        redirect('event');
        }
    } 
}

    public function update($id =NULL)
    {

        $divisi = $this->pen->get_divisi();
        $bidang_ilmu = $this->pen->get_bidang_ilmu();
        $provinsi = $this->pen->get_provinsi();
        $kabupaten = $this->pen->get_kabupaten();
        $attrform = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $action  = 'pengurus/updateaction';
        $formopen = form_open($action, $attrform);
        $formclose  = form_close();
        $ldivisi = form_label('Divisi', 'divisi');
        $lnama_pengurus = form_label('Nama Pengurus', 'nama_pengurus');
        $ltempat_lahir_pengurus = form_label('tempat lahir Pengurus', 'tempat_lahir_pengurus');
        $ltanggal_lahir_pengurus = form_label('tanggal lahir Pengurus', 'tanggal_lahir_pengurus');
        $ljenis_kelamin_pengurus = form_label('jenis kelamin Pengurus', 'jenis_kelamin_pengurus');
        $lpendidikan_terakhir_pengurus = form_label('pendidikan terakhir Pengurus', 'pendidikan_terakhir_pengurus');
        $lbidang_ilmu = form_label('Bidang Ilmu', 'bidang_ilmu');
        $lpekerjaan_pengurus = form_label('Pekerjaan Pengurus', 'pekerjaan_pengurus');
        $lafiliasi_pengurus = form_label('AfiliasiPengurus', 'afiliasi_pengurus');
        $lemail_pengurus = form_label('Email Pengurus', 'email_pengurus');
        $ltelp_pengurus = form_label('Nomor Telepon', 'telp_pengurus');
        $lalamat_pengurus = form_label('Nomor Telepon', 'alamat_pengurus');
        $lprovinsi = form_label('Provinsi', 'provinsi');
        $lkabupaten = form_label('Kabupaten', 'kabupaten');
        $lfoto_pengurus = form_label('Foto', 'foto_pengurus');


        // ATTRIBUTE INPUT TEXt
        $attrid_pengurus = array(
            'type' => 'hidden',
            'name' => 'id_pengurus',
            'id' => 'id_pengurus',
            'value' => set_value('id_pengurus'),
            'required' => 'required'
        );

        $attrnama_pengurus = array(
            'type' => 'text',
            'name' => 'nama_pengurus',
            'id' => 'nama_pengurus',
            'placeholder' => 'Masukkan Nama Pengurus',
            'value' => set_value('nama_pengurus'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attrtempat_lahir_pengurus = array(
            'type' => 'text',
            'name' => 'tempat_lahir_pengurus',
            'id' => 'tempat_lahir_pengurus',
            'placeholder' => 'Masukkan tempat lahir Pengurus',
            'value' => set_value('tempat_lahir_pengurus'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attrtanggal_lahir_pengurus = array(
            'type' => 'date',
            'name' => 'tanggal_lahir_pengurus',
            'id' => 'tanggal_lahir_pengurus',
            'placeholder' => 'Masukkan tanggal lahir Pengurus',
            'value' => set_value('tanggal_lahir_pengurus'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attrjenis_kelamin_pengurus = array(
            'type' => 'text',
            'name' => 'jenis_kelamin_pengurus',
            'id' => 'jenis_kelamin_pengurus',
            'placeholder' => 'Masukkan jenis kelamin Pengurus',
            'value' => set_value('jenis_kelamin_pengurus'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attrpendidikan_terakhir_pengurus = array(
            'type' => 'text',
            'name' => 'pendidikan_terakhir_pengurus',
            'id' => 'pendidikan_terakhir_pengurus',
            'placeholder' => 'Masukkan pendidikan terakhir Pengurus',
            'value' => set_value('pendidikan_terakhir_pengurus'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attrpekerjaan_pengurus = array(
            'type' => 'text',
            'name' => 'pekerjaan_pengurus',
            'id' => 'pekerjaan_pengurus',
            'placeholder' => 'Masukkan pekerjaan Pengurus',
            'value' => set_value('pekerjaan_pengurus'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attrafiliasi_pengurus = array(
            'type' => 'text',
            'name' => 'afiliasi_pengurus',
            'id' => 'afiliasi_pengurus',
            'placeholder' => 'Masukkan afiliasi Pengurus',
            'value' => set_value('afiliasi_pengurus'),
            'class' => 'form-control',
            'required' => 'required'
        );

        $attremail_pengurus = array(
            'type' => 'email',
            'name' => 'email',
            'id' => 'email_pengurus',
            'placeholder' => 'Masukkan Email',
            'class' => 'form-control',
            'value' => set_value('email_pengurus'),
            'required' => 'required'

        );

        $attrtelp_pengurus = array(
            'type' => 'text',
            'name' => 'telp_pengurus',
            'id' => 'telp_pengurus',
            'placeholder' => 'Masukkan Nomor Telpon',
            'class' => 'form-control phone',
            'value' => set_value('telp_pengurus'),
            'required' => 'required'
        );

        $attralamat_pengurus = array(
            'type' => 'text',
            'name' => 'alamat_pengurus',
            'id' => 'alamat_pengurus',
            'placeholder' => 'Masukkan Alamat Pengurus',
            'class' => 'form-control phone',
            'value' => set_value('alamat_pengurus'),
            'required' => 'required'
        );

        $attrfoto_pengurus = array(
            'type' => 'file',
            'name' => 'foto',
            'value' => set_value('foto'),
            'placeholder' => 'foto',
            'id' => 'input-file-now',
            'class' => 'dropify',
        );

        // DROP DOWN
        $getdiv = $this->pen->get_divisi();
        $divisi = array();
        foreach ($getdiv as $d) {
            $divisi[$d->id_divisi] = $d->nama_divisi;
        }

        $optdivisi = array(
            'id' => 'divisi',
            'class' => 'form-control'
        );

        $getbid = $this->pen->get_bidang_ilmu();
        $bidang_ilmu = array();
        foreach ($getbid as $b) {
            $bidang_ilmu[$b->id_bidang_ilmu] = $b->nama_bidang_ilmu;
        }

        $optbidang_ilmu = array(
            'id' => 'bidang_ilmu',
            'class' => 'form-control'
        );

        $getprov = $this->pen->get_provinsi();
        $provinsi = array();
        foreach ($getprov as $p) {
            $provinsi[$p->id_provinsi] = $p->nama_provinsi;
        }
        
        $optprovinsi = array(
            'id' => 'provinsi',
            'class' => 'form-control'
        );

        $getkab = $this->pen->get_kabupaten();
        $kabupaten = array();
        foreach ($getkab as $k) {
            $kabupaten[$k->id_kabupaten] = $k->nama_kabupaten;
        }
        
        $optkabupaten = array(
            'id' => 'kabupaten',
            'class' => 'form-control'
        );

        $dddivisi = form_dropdown('divisi', $divisi, set_value('divisi'), $optdivisi);
        $ddbidang_ilmu = form_dropdown('bidang_ilmu', $bidang_ilmu, set_value('bidang_ilmu'), $optbidang_ilmu);
        $ddprovinsi = form_dropdown('provinsi', $provinsi, set_value('provinsi'), $optprovinsi);
        $ddkabupaten = form_dropdown('kabupaten', $kabupaten, set_value('kabupaten'), $optkabupaten);

        // FORM INPUT
        $inputid_pengurus = form_input($attrid_pengurus);
        $inputnama_pengurus = form_input($attrnama_pengurus);
        $inputtempat_lahir_pengurus = form_input($attrtempat_lahir_pengurus);
        $inputtanggal_lahir_pengurus = form_input($attrtanggal_lahir_pengurus);
        $inputjenis_kelamin_pengurus = form_input($attrjenis_kelamin_pengurus);
        $inputpendidikan_terakhir_pengurus = form_input($attrpendidikan_terakhir_pengurus);
        $inputpekerjaan_pengurus = form_input($attrpekerjaan_pengurus);
        $inputafiliasi_pengurus = form_input($attrafiliasi_pengurus);
        $inputemail_pengurus = form_input($attremail_pengurus);
        $inputtelp_pengurus = form_input($attrtelp_pengurus);
        $inputalamat_pengurus = form_input($attralamat_pengurus);
        $inputfoto_pengurus = form_input($attrfoto_pengurus);
        $attrsubmit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

         //error form input
        $fe_namapengurus = form_error('nama_pengurus');
        $fe_emailpengurus = form_error('email_pengurus');
        $fe_telppengurus = form_error('telp_pengurus');

        //INVALID FEEDBACKS
        $ivnama_pengurus = 'Nama harus diisi!';
        $ivemail_pengurus = 'Email harus diisi!';
        $ivtelp_pengurus = 'No telepon harus diisi!';

        //simpan
        $submit = form_submit('submit', 'Simpan', $attrsubmit);
        $data = array(
            'formopen' => $formopen,
            'formclose' => $formclose,
            'parent' => 'Data pengurus',
            'title' => 'Tambah pengurus',
            'divisi' => $divisi,
            'bidang_ilmu' => $bidang_ilmu,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'lnama_pengurus' => $lnama_pengurus,
            'ltempat_lahir_pengurus' => $ltempat_lahir_pengurus,
            'ltanggal_lahir_pengurus' => $ltanggal_lahir_pengurus,
            'ljenis_kelamin_pengurus' => $ljenis_kelamin_pengurus,
            'lpendidikan_terakhir_pengurus' => $lpendidikan_terakhir_pengurus,
            'lpekerjaan_pengurus' => $lpekerjaan_pengurus,
            'lafiliasi_pengurus' => $lafiliasi_pengurus,
            'ldivisi' => $ldivisi,
            'lbidang_ilmu' => $lbidang_ilmu,
            'lprovinsi' => $lprovinsi,
            'lkabupaten' => $lkabupaten,
            'lemail_pengurus' => $lemail_pengurus,
            'ltelp_pengurus' => $ltelp_pengurus,
            'lalamat_pengurus' => $lalamat_pengurus,
            'lfoto_pengurus' => $lfoto_pengurus,
            'inputid' => $inputid_pengurus,
            'inputnama_pengurus' => $inputnama_pengurus,
            'inputtempat_lahir_pengurus' => $inputtempat_lahir_pengurus,
            'inputtanggal_lahir_pengurus' => $inputtanggal_lahir_pengurus,
            'inputjenis_kelamin_pengurus' => $inputjenis_kelamin_pengurus,
            'inputpendidikan_terakhir_pengurus' => $inputpendidikan_terakhir_pengurus,
            'inputpekerjaan_pengurus' => $inputpekerjaan_pengurus,
            'inputafiliasi_pengurus' => $inputafiliasi_pengurus,
            'inputemail_pengurus' => $inputemail_pengurus,
            'inputtelp_pengurus' => $inputtelp_pengurus,
            'inputalamat_pengurus' => $inputalamat_pengurus,
            'inputfoto_pengurus' => $inputfoto_pengurus,
            'dddivisi' => $dddivisi,
            'ddbidang_ilmu' => $ddbidang_ilmu,
            'ddprovinsi' => $ddprovinsi,
            'ddkabupaten' => $ddkabupaten,
            'fe_namapengurus' => $fe_namapengurus,
            'fe_emailpengurus' => $fe_emailpengurus,
            'fe_telppengurus' => $fe_telppengurus,
            'ivnama_pengurus' => $ivnama_pengurus,
            'ivemail_pengurus' => $ivemail_pengurus,
            'ivtelp_pengurus' => $ivtelp_pengurus,
            'submit' => $submit
        );
        $this->template->load('template/template_v', 'pengurus/pengurus_form', $data);
       
    }

    public function updateaction()
    {
        $this->_rules();
        $validation = $this->form_validation->run();
        if ($validation == FALSE) {
            $this->update();
        } else {
            $config['upload_path']   = FCPATH . '/uploads/pengurus/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '1000';
            $config['max_width']  = '5000';
            $config['max_height']  = '5000';
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('warning', $this->upload->display_errors());
                redirect($_SERVER['HTTP_REFERER']);
            } else {

            $foto_pengurus = $this->upload->data('file_name', TRUE);
            $nama_pengurus = $this->input->post('nama_pengurus', TRUE);
            $tempat_lahir_pengurus = $this->input->post('tempat_lahir_pengurus', TRUE);
            $tanggal_lahir_pengurus = $this->input->post('tanggal_lahir_pengurus', TRUE);
            $jenis_kelamin_pengurus = $this->input->post('jenis_kelamin_pengurus', TRUE);
            $pendidikan_terakhir_pengurus = $this->input->post('pendidikan_terakhir_pengurus', TRUE);
            $pekerjaan_pengurus = $this->input->post('pekerjaan_pengurus', TRUE);
            $afiliasi_pengurus = $this->input->post('afiliasi_pengurus', TRUE);
            $alamat_pengurus = $this->input->post('alamat_pengurus', TRUE);
            $divisi = $this->input->post('divisi', TRUE);
            $bidang_ilmu = $this->input->post('bidang_ilmu', TRUE);
            $provinsi = $this->input->post('provinsi', TRUE);
            $kabupaten = $this->input->post('kabupaten', TRUE);
            $email_pengurus = $this->input->post('email_pengurus', TRUE);
            $telp_pengurus = $this->input->post('telp_pengurus', TRUE);
            $notelp = str_replace('-', '', $telp_pengurus);
            $data = array(
                'nama_pengurus' => $nama_pengurus,
                'tempat_lahir_pengurus' => $tempat_lahir_pengurus,
                'tanggal_lahir_pengurus' => $tanggal_lahir_pengurus,
                'jenis_kelamin_pengurus' => $jenis_kelamin_pengurus,
                'pendidikan_terakhir_pengurus' => $pendidikan_terakhir_pengurus,
                'pekerjaan_pengurus' => $pekerjaan_pengurus,
                'afiliasi_pengurus' => $afiliasi_pengurus,
                'alamat_pengurus' => $alamat_pengurus,
                'id_divisi' => $divisi,
                'id_bidang_ilmu' => $bidang_ilmu,
                'id_provinsi' => $provinsi,
                'id_kabupaten' => $kabupaten,
                'email_pengurus' => $email_pengurus,
                'telp_pengurus' => $telp_pengurus,
                'foto_pengurus' => $foto_pengurus,
            );

            $this->pen->update_data($id,$data);
            $this->session->set_flashdata('success', 'Data berhasil diubah');
            redirect('pengurus');
        }
    }
}

    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $this->ev->delete_data($id);
        redirect('event', 'refresh');
    }

    public function _rules()
    {
    
        $attrnama_event = array(
            'required' => 'Nama event harus diisi!',
            'min_length' => 'Nama event minimal 5 karakter!',
            'max_length' => 'Nama event maksimal 200 karakter!',
        );

        // mengatur form validasi
        $this->form_validation->set_rules('nama_event', 'Nama event', 'required|min_length[5]|max_length[200]', $attrnama_event);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}