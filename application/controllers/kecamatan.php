<?php

class kecamatan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('kecamatan_model', 'kc');
    }

    public function index()
    {
        $title = 'Data kecamatan';
        $get_data = $this->kc->get_data();
        $attradd = array('class' => 'btn  btn-gradient-success');
        $btnadd = anchor('kecamatan/add', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $data = array(
            'kecamatan' => $get_data,
            'title' => $title,
            'btntambah' => $btnadd
        );
        $this->template->load('template/template_v', 'kecamatan/kecamatan_view', $data);
    }

    public function add()
    {
        $title = 'Tambah kecamatan';
        $parent = 'Data kecamatan';

        $attr_form = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $attr_nama = array(
            'type' => 'text',
            'name' => 'nama_kecamatan',
            'class' => 'form-control',
            'value' => set_value('nama_kecamatan'),
            'required' => 'required'
        );

        $attr_kabupaten = array(
            'id' => 'kabupaten',
            'class' => 'form-control'
        );

        $attr_id = array(
            'type' => 'hidden',
            'id' => 'id_kecamatan',
            'value' => set_value('id_kecamatan')
        );


        $attr_submit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

        $get_kabupaten = $this->kc->get_kabupaten();
        $form_open = form_open_multipart('kecamatan/addaction', $attr_form);
        $form_close = form_close();
        $label_nama = form_label('Nama kecamatan', 'nama_kecamatan');
        $label_kabupaten = form_label('Nama Kabupaten', 'kabupaten');
        $input_nama = form_input($attr_nama);
        $input_id = form_input($attr_id);
        $invalid_nama = 'Nama kecamatan harus diisi!';

        $kabupaten = array();
        foreach ($get_kabupaten as $s) {
            $kabupaten[$s->id_kabupaten] = $s->nama_kabupaten;
        }
        $ddkabupaten = form_dropdown('kabupaten', $kabupaten, set_value('kabupaten'), $attr_kabupaten);
        $fe_nama = form_error('nama_kecamatan');
        $submit = form_submit('Simpan', 'submit', $attr_submit);
        $data = array(
            'title' => $title,
            'parent' => $parent,
            'form_open' => $form_open,
            'form_close' => $form_close,
            'label_nama' => $label_nama,
            'label_kabupaten' => $label_kabupaten,
            'input_nama' => $input_nama,
            'ddkabupaten' => $ddkabupaten,
            'fe_nama' => $fe_nama,
            'input_id' => $input_id,
            'submit' => $submit,
            'invalid_nama' => $invalid_nama,
        );
        $this->template->load('template/template_v', 'kecamatan/kecamatan_form', $data);
    }

    public function addaction()
    {
                $id = $this->input->post('id_kecamatan', TRUE);
                $nama_kecamatan = $this->input->post('nama_kecamatan', TRUE);
                $kabupaten = $this->input->post('kabupaten', TRUE);
                $data = array(
                    'nama_kecamatan' => $nama_kecamatan,
                    'id_kabupaten' => $kabupaten,
                );
                $this->kc->insert_data($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('kecamatan');
            
        }
    
    public function update($id)
    {
        $id = $this->uri->segment(3);
        $get_row = $this->kc->get_row($id);
        if ($get_row->num_rows() > 0) {
            $row = $get_row->row();
            $nama_kecamatan =  $row->nama_kecamatan;
            $id_kecamatan = $row->id_kecamatan;
            $id_kabupaten = $row->id_kabupaten;
            $title = 'Edit kecamatan';
            $parent = 'Data kecamatan';

            $attr_form = array(
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            );

            $attr_nama = array(
                'type' => 'text',
                'name' => 'nama_kecamatan',
                'class' => 'form-control',
                'value' => set_value('nama_kecamatan', $nama_kecamatan),
                'required' => 'required'
            );

            $attr_kabupaten = array(
                'id' => 'kabupaten',
                'class' => 'form-control'
            );


            $attr_id = array(
                'type' => 'hidden',
                'name' => 'id_kecamatan',
                'id' => 'id_kecamatan',
                'value' => set_value('id_kecamatan', $id_kecamatan)
            );


            $attr_submit = array(
                'id' => 'submit',
                'class' => 'btn btn-gradient-info'
            );

            $get_kabupaten = $this->kc->get_kabupaten();
            $form_open = form_open_multipart('kecamatan/editaction', $attr_form);
            $form_close = form_close();
            $label_nama = form_label('Nama kecamatan', 'nama_kecamatan');
            $label_kabupaten = form_label('kabupaten', 'kabupaten');
            $input_nama = form_input($attr_nama);
            $input_id = form_input($attr_id);
            $invalid_nama = 'Nama kabupaten harus diisi!';

            $kabupaten = array();
            foreach ($get_kabupaten as $s) {
                $kabupaten[$s->id_kabupaten] = $s->nama_kabupaten;
            }
            $ddkabupaten = form_dropdown('kabupaten', $kabupaten, set_value('kabupaten', $id_kabupaten), $attr_kabupaten);
            $fe_nama = form_error('nama_kecamatan');
            $submit = form_submit('Simpan', 'submit', $attr_submit);
            $data = array(
                'title' => $title,
                'parent' => $parent,
                'form_open' => $form_open,
                'form_close' => $form_close,
                'label_nama' => $label_nama,
                'label_kabupaten' => $label_kabupaten,
                'input_nama' => $input_nama,
                'ddkabupaten' => $ddkabupaten,
                'fe_nama' => $fe_nama,
                'input_id' => $input_id,
                'submit' => $submit,
                'invalid_nama' => $invalid_nama,
            );
            $this->template->load('template/template_v', 'kecamatan/kecamatan_form', $data);
        }
    }

    public function editaction()
    {
        $this->_rules();
        $validation = $this->form_validation->run();
        if ($validation == FALSE) {
        $this->update();
     } else {
        $id = $this->input->post('id_kecamatan', TRUE);
        $nama_kecamatan = $this->input->post('nama_kecamatan', TRUE);
        $kabupaten = $this->input->post('kabupaten', TRUE);
        $data = array(
            'nama_kecamatan' => $nama_kecamatan,
            'id_kabupaten' => $kabupaten,
        );
        $this->kc->update_data($id,$data);
        $this->session->set_flashdata('success', 'Data berhasil diubah!');
        redirect('kecamatan');
    }
 }


    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $this->kc->delete_data($id);
        redirect('kabupaten');
    }

    public function _rules()
    {
        $attr_nama = array(
            'required' => 'Nama kecamatan harus di isi!',
        );
        $this->form_validation->set_rules('nama_kecamatan', 'Nama kecamatan', 'trim|required', $attr_nama);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}



    