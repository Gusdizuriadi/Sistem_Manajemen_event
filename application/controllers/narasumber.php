<?php


class narasumber extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('narasumber_model', 'nr');
    }

    public function index()
    {
        $title = 'Data narasumber';
        $attradd = array('class' => 'btn  btn-gradient-success');
        $btnadd = anchor('narasumber/add', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $get_data = $this->nr->get_data();
        $data = array(
            'narasumber' => $get_data,
            'title' => $title,
            'btntambah' => $btnadd
        );
        $this->template->load('template/template_v', 'narasumber/narasumber_view', $data);
    }


    public function add()
    {
        $title = 'Tambah Narasumber';
        $parent = 'Data Narasumber';

        $attr_form = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $attr_nama_narasumber = array(
            'type' => 'text',
            'name' => 'nama_narasumber',
            'class' => 'form-control',
            'value' => set_value('nama_narasumber'),
            'required' => 'required'
        );
        $attr_afiliasi_narasumber = array(
            'type' => 'text',
            'name' => 'afiliasi_narasumber',
            'class' => 'form-control',
            'value' => set_value('afiliasi_narasumber'),
            'required' => 'required'

        );
        $attr_email_narasumber = array(
            'type' => 'text',
            'name' => 'email_narasumber',
            'class' => 'form-control',
            'value' => set_value('email_narasumber'),
            'required' => 'required'

        );
        $attr_telp_narasumber = array(
            'type' => 'text',
            'name' => 'telp_narasumber',
            'class' => 'form-control',
            'value' => set_value('telp_narasumber'),
            'required' => 'required'

        );
        $attr_bidang_ilmu = array(
            'id' => 'bidang_ilmu',
            'class' => 'form-control'
        );
        $attr_provinsi = array(
            'id' => 'provinsi',
            'class' => 'form-control'
        );

        $attr_foto = array(
            'type' => 'file',
            'name' => 'foto',
            'value' => set_value('lampiran'),
            'placeholder' => 'Lampiran',
            'id' => 'input-file-now',
            'class' => 'dropify',
        );

        $attr_id = array(
            'type' => 'hidden',
            'id' => 'id_narasumber',
            'value' => set_value('id_narasumber')
        );


        $attr_submit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

        $get_bidang_ilmu = $this->nr->get_bidang_ilmu();
        $get_provinsi = $this->nr->get_provinsi();
        $form_open = form_open_multipart('narasumber/addaction', $attr_form);
        $form_close = form_close();
        $label_nama = form_label('Nama narasumber', 'nama_narasumber');
        $label_afiliasi_narasumber = form_label('afiliasi Narasumber', 'afiliasi_narasumber');
        $label_bidang_ilmu = form_label('bidang ilmu', 'bidang_ilmu');
        $label_provinsi = form_label('Provinsi', 'provinsi');
        $label_email_narasumber = form_label('email narasumber', 'email_narasumber');
        $label_telp_narasumber = form_label('telp narasumber', 'telp_narasumber');
        $label_foto = form_label('Foto narasumber', 'foto_narasumber');
        $input_nama = form_input($attr_nama_narasumber);
        $input_id = form_input($attr_id);
        $input_afiliasi_narasumber = form_input($attr_afiliasi_narasumber);
        $input_email_narasumber = form_input($attr_email_narasumber);
        $input_telp_narasumber = form_input($attr_telp_narasumber);
        $invalid_nama = 'Nama narasumber harus diisi!';
        $invalid_afiliasi_narasumber = 'afiliasi Narasumber harus diisi!';

        $bidang_ilmu = array();
        foreach ($get_bidang_ilmu as $s) {
            $bidang_ilmu[$s->id_bidang_ilmu] = $s->nama_bidang_ilmu;
        }
        $provinsi = array();
        foreach ($get_provinsi as $s) {
            $provinsi[$s->id_provinsi] = $s->nama_provinsi;
        }
        $ddbidang_ilmu = form_dropdown('bidang_ilmu', $bidang_ilmu, set_value('bidang_ilmu'), $attr_bidang_ilmu);
        $ddprovinsi = form_dropdown('provinsi', $provinsi, set_value('provinsi'), $attr_provinsi);
        $input_foto = form_input($attr_foto);
        $fe_nama = form_error('nama_narasumber');
        $submit = form_submit('Simpan', 'submit', $attr_submit);
        $data = array(
            'title' => $title,
            'parent' => $parent,
            'form_open' => $form_open,
            'form_close' => $form_close,
            'label_nama' => $label_nama,
            'label_afiliasi_narasumber' => $label_afiliasi_narasumber,
            'label_bidang_ilmu' => $label_bidang_ilmu,
            'label_provinsi' => $label_provinsi,
            'label_email_narasumber' => $label_email_narasumber,
            'label_telp_narasumber' => $label_telp_narasumber,
            'label_foto' => $label_foto,
            'input_nama' => $input_nama,
            'input_afiliasi_narasumber' => $input_afiliasi_narasumber,
            'input_email_narasumber' => $input_email_narasumber,
            'input_telp_narasumber' => $input_telp_narasumber,
            'ddbidang_ilmu' => $ddbidang_ilmu,
            'ddprovinsi' => $ddprovinsi,
            'input_foto' => $input_foto,
            'fe_nama' => $fe_nama,
            'input_id' => $input_id,
            'submit' => $submit,
            'invalid_nama' => $invalid_nama,
        );
        $this->template->load('template/template_v', 'narasumber/narasumber_form', $data);
    }

    public function update($id)
    {
        $id = $this->uri->segment(3);
        $get_row = $this->nr->get_row($id);
        if ($get_row->num_rows() > 0) {
            $row = $get_row->row();
            $nama_narasumber =  $row->nama_narasumber;
            $afiliasi_narasumber = $row->afiliasi_narasumber;
            $email_narasumber = $row->email_narasumber;
            $telp_narasumber = $row->telp_narasumber;
            $id_narasumber = $row->id_narasumber;
            $id_bidang_ilmu = $row->id_bidang_ilmu;
            $id_provinsi = $row->id_provinsi;
            $foto = $row->foto_narasumber;
            $title = 'Edit narasumber';
            $parent = 'Data narasumber';

            $attr_form = array(
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            );

            $attr_nama_narasumber = array(
                'type' => 'text',
                'name' => 'nama_narasumber',
                'class' => 'form-control',
                'value' => set_value('nama_narasumber', $nama_narasumber),
                'required' => 'required'
            );
            $attr_afiliasi_narasumber = array(
                'type' => 'text',
                'name' => 'afiliasi_narasumber',
                'class' => 'form-control',
                'value' => set_value('afiliasi_narasumber', $afiliasi_narasumber),
                'required' => 'required'
    
            );
            $attr_email_narasumber = array(
                'type' => 'text',
                'name' => 'email_narasumber',
                'class' => 'form-control',
                'value' => set_value('email_narasumber', $email_narasumber),
                'required' => 'required'
    
            );
            $attr_telp_narasumber = array(
                'type' => 'text',
                'name' => 'telp_narasumber',
                'class' => 'form-control',
                'value' => set_value('telp_narasumber', $telp_narasumber),
                'required' => 'required'
    
            );
            $attr_bidang_ilmu = array(
                'id' => 'bidang_ilmu',
                'class' => 'form-control'
            );
            $attr_provinsi = array(
                'id' => 'provinsi',
                'class' => 'form-control'
            );
    
            $attr_foto = array(
                'type' => 'file',
                'name' => 'foto',
                'value' => set_value('lampiran'),
                'placeholder' => 'Lampiran',
                'id' => 'input-file-now',
                'class' => 'dropify',
            );
    
            $attr_id = array(
                'type' => 'hidden',
                'id' => 'id_narasumber',
                'value' => set_value('id_narasumber', $id_narasumber)
            );


            $attr_submit = array(
                'id' => 'submit',
                'class' => 'btn btn-gradient-info'
            );

            $get_bidang_ilmu = $this->nr->get_bidang_ilmu();
            $get_provinsi = $this->nr->get_provinsi();
            $form_open = form_open_multipart('narasumber/editaction', $attr_form);
            $form_close = form_close();
            $label_nama = form_label('Nama narasumber', 'nama_narasumber');
            $label_afiliasi_narasumber = form_label('afiliasi Narasumber', 'afiliasi_narasumber');
            $label_bidang_ilmu = form_label('bidang ilmu', 'bidang_ilmu');
            $label_provinsi = form_label('Provinsi', 'provinsi');
            $label_email_narasumber = form_label('email narasumber', 'email_narasumber');
            $label_telp_narasumber = form_label('telp narasumber', 'telp_narasumber');
            $label_foto = form_label('Foto narasumber', 'foto_narasumber');
            $input_nama = form_input($attr_nama_narasumber);
            $input_id = form_input($attr_id);
            $input_afiliasi_narasumber = form_input($attr_afiliasi_narasumber);
            $input_email_narasumber = form_input($attr_email_narasumber);
            $input_telp_narasumber = form_input($attr_telp_narasumber);
            $invalid_nama = 'Nama narasumber harus diisi!';
            $invalid_afiliasi_narasumber = 'afiliasi Narasumber harus diisi!';

            $bidang_ilmu = array();
            foreach ($get_bidang_ilmu as $s) {
            $bidang_ilmu[$s->id_bidang_ilmu] = $s->nama_bidang_ilmu;
          }
            $provinsi = array();
            foreach ($get_provinsi as $s) {
            $provinsi[$s->id_provinsi] = $s->nama_provinsi;
          }
            $ddbidang_ilmu = form_dropdown('bidang_ilmu', $bidang_ilmu, set_value('bidang_ilmu'), $attr_bidang_ilmu);
            $ddprovinsi = form_dropdown('provinsi', $provinsi, set_value('provinsi'), $attr_provinsi);
            $input_foto = form_input($attr_foto);
            $fe_nama = form_error('nama_narasumber');
            $fe_afiliasi_narasumber = form_error('afiliasi_narasumber');
            $submit = form_submit('Simpan', 'submit', $attr_submit);
            $data = array(
            'title' => $title,
            'parent' => $parent,
            'form_open' => $form_open,
            'form_close' => $form_close,
            'label_nama' => $label_nama,
            'label_afiliasi_narasumber' => $label_afiliasi_narasumber,
            'label_bidang_ilmu' => $label_bidang_ilmu,
            'label_provinsi' => $label_provinsi,
            'label_email_narasumber' => $label_email_narasumber,
            'label_telp_narasumber' => $label_telp_narasumber,
            'label_foto' => $label_foto,
            'input_nama' => $input_nama,
            'input_afiliasi_narasumber' => $input_afiliasi_narasumber,
            'input_email_narasumber' => $input_email_narasumber,
            'input_telp_narasumber' => $input_telp_narasumber,
            'ddbidang_ilmu' => $ddbidang_ilmu,
            'ddprovinsi' => $ddprovinsi,
            'input_foto' => $input_foto,
            'fe_nama' => $fe_nama,
            'fe_afiliasi_narasumber' => $fe_afiliasi_narasumber,
            'input_id' => $input_id,
            'submit' => $submit,
            'invalid_nama' => $invalid_nama,
            'invalid_afiliasi_narasumber' => $invalid_afiliasi_narasumber,
        );
            $this->template->load('template/template_v', 'narasumber/narasumber_form', $data);
        }
    }

    public function addaction()
    {
        $this->_rules();
        $validasi = $this->form_validation->run();
        if ($validasi == FALSE) {
            $this->add();
        } else {
            $config['upload_path']   = FCPATH . '/uploads/narasumber/';
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
                $nama_narasumber = $this->input->post('nama_narasumber', TRUE);
                $afiliasi_narasumber = $this->input->post('afiliasi_narasumber', TRUE);
                $email_narasumber = $this->input->post('email_narasumber', TRUE);
                $telp_narasumber = $this->input->post('telp_narasumber', TRUE);
                $bidang_ilmu = $this->input->post('bidang_ilmu', TRUE);
                $provinsi = $this->input->post('provinsi', TRUE);
                $foto = $this->upload->data('file_name', TRUE);
                $data = array(
                    'nama_narasumber' => $nama_narasumber,
                    'afiliasi_narasumber' => $afiliasi_narasumber,
                    'email_narasumber' => $email_narasumber,
                    'telp_narasumber' => $telp_narasumber,
                    'id_bidang_ilmu' => $bidang_ilmu,
                    'id_provinsi' => $provinsi,
                    'foto_narasumber' => $foto,
                );
                $this->nr->insert_data($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('narasumber');
            }
        }
    }

    public function editaction()
    {
        
        $this->_rules();
        $validasi = $this->form_validation->run();
        if ($validasi == FALSE) {
            $this->update();
        } else {
            $config['upload_path']   = FCPATH . '/uploads/narasumber/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '1000';
            $config['max_width']  = '5000';
            $config['max_height']  = '5000';
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $foto = $this->upload->data('file_name', TRUE);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $id = $this->input->post('id_narasumber', TRUE);
                $nama_narasumber = $this->input->post('nama_narasumber', TRUE);
                $afiliasi_narasumber = $this->input->post('afiliasi_narasumber', TRUE);
                $email_narasumber = $this->input->post('email_narasumber', TRUE);
                $telp_narasumber = $this->input->post('telp_narasumber', TRUE);
                $bidang_ilmu = $this->input->post('bidang_ilmu', TRUE);
                $provinsi = $this->input->post('provinsi', TRUE);
                $data = array(
                    'nama_narasumber' => $nama_narasumber,
                    'afiliasi_narasumber' => $afiliasi_narasumber,
                    'email_narasumber' => $email_narasumber,
                    'telp_narasumber' => $telp_narasumber,
                    'id_bidang_ilmu' => $bidang_ilmu,
                    'id_provinsi' => $provinsi,
                    'foto_narasumber' => $foto,
                );
                $this->nr->update_data($id, $data);
                $this->session->set_flashdata('success', 'Data berhasil diubah!');
                redirect('narasumber');
            } 
        }
    }

    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $get_foto = $this->nr->get_row($id)->row()->foto;
        $folder = FCPATH . '/uploads/pembicara/';
        $uploads = $folder . $get_foto;
        if (unlink($uploads)) { } else {
            $this->session->set_flashdata('warning', 'data lama tidak ditemukan atau rusak!');
        }
        $this->nr->delete_data($id);
        redirect('narasumber');
    }

    public function _rules()
    {
        $attr_nama_narasumber = array(
            'required' => 'Nama seminar harus di isi!',
        );
        $attr_afiliasi_narasumber = array(
            'required' => 'Tanggal pelaksaan harus di isi!',
        );
        $this->form_validation->set_rules('nama_narasumber', 'Nama narasumber', 'trim|required', $attr_nama_narasumber);
        $this->form_validation->set_rules('afiliasi_narasumber', 'Afiliasi Narasumber', 'trim|required', $attr_afiliasi_narasumber);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
