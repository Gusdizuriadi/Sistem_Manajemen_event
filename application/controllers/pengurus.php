<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pengurus extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        // load model
        $this->load->model('pengurus_model', 'pen');
    }


    public function index()
    {
       
        $attradd = array('class' => 'btn  btn-gradient-success');
        $tambahdata = anchor('pengurus/add', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $pen = $this->pen->lihat_data();
        $data = array(
            'pengurus' =>  $pen,
            'title' => 'Data pengurus',
            'btntambah' => $tambahdata,
        );
        $this->template->load('template/template_v', 'pengurus/pengurus_view', $data);
    }

    public function add()
    {

        $divisi = $this->pen->get_divisi();
        $bidang_ilmu = $this->pen->get_bidang_ilmu();
        $provinsi = $this->pen->get_provinsi();
        $kabupaten = $this->pen->get_kabupaten();
        $attrform = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $action  = 'pengurus/addaction';
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

        //INVALID FEEDBACKS
        $ivnama_pengurus = 'Nama harus diisi!';
    

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
            'inputid_pengurus' => $inputid_pengurus,
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
            'ivnama_pengurus' => $ivnama_pengurus,
            'submit' => $submit
        );
        $this->template->load('template/template_v', 'pengurus/pengurus_form', $data);
    }

    public function addaction()
    {
        $this->_rules();
        $validation = $this->form_validation->run();
        if ($validation == FALSE) {
            $this->add();
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

            $this->pen->insert_data($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }  redirect('pengurus');
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
        $this->pen->delete_data($id);
        redirect('pengurus', 'refresh');
    }

    public function _rules()
    {
    
        $attrnama_pengurus = array(
            'required' => 'Nama Pengurus harus diisi!',
            
        );

        // mengatur form validasi
        $this->form_validation->set_rules('nama_pengurus', 'Nama Pengurus', 'trim|required', $attrnama_pengurus);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}