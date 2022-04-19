<?php

class kabupaten extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('kabupaten_model', 'kb');
    }

    public function index()
    {
        $title = 'Data kabupaten';
        $get_data = $this->kb->get_data();
        $attradd = array('class' => 'btn  btn-gradient-success');
        $btnadd = anchor('kabupaten/add', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $data = array(
            'kabupaten' => $get_data,
            'title' => $title,
            'btntambah' => $btnadd
        );
        $this->template->load('template/template_v', 'kabupaten/kabupaten_view', $data);
    }

    public function add()
    {
        $title = 'Tambah kabupaten';
        $parent = 'Data kabupaten';

        $attr_form = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $attr_nama = array(
            'type' => 'text',
            'name' => 'nama_kabupaten',
            'class' => 'form-control',
            'value' => set_value('nama_kabupaten'),
            'required' => 'required'
        );

        $attr_provinsi = array(
            'id' => 'provinsi',
            'class' => 'form-control'
        );

        $attr_id = array(
            'type' => 'hidden',
            'id' => 'id_kabupaten',
            'value' => set_value('id_kabupaten')
        );


        $attr_submit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

        $get_provinsi = $this->kb->get_provinsi();
        $form_open = form_open_multipart('kabupaten/addaction', $attr_form);
        $form_close = form_close();
        $label_nama = form_label('Nama kabupaten', 'nama_kabupaten');
        $label_provinsi = form_label('Provinsi', 'provinsi');
        $input_nama = form_input($attr_nama);
        $input_id = form_input($attr_id);
        $invalid_nama = 'Nama kabupaten harus diisi!';

        $provinsi = array();
        foreach ($get_provinsi as $s) {
            $provinsi[$s->id_provinsi] = $s->nama_provinsi;
        }
        $ddprovinsi = form_dropdown('provinsi', $provinsi, set_value('provinsi'), $attr_provinsi);
        $fe_nama = form_error('nama_kabupaten');
        $submit = form_submit('Simpan', 'submit', $attr_submit);
        $data = array(
            'title' => $title,
            'parent' => $parent,
            'form_open' => $form_open,
            'form_close' => $form_close,
            'label_nama' => $label_nama,
            'label_provinsi' => $label_provinsi,
            'input_nama' => $input_nama,
            'ddprovinsi' => $ddprovinsi,
            'fe_nama' => $fe_nama,
            'input_id' => $input_id,
            'submit' => $submit,
            'invalid_nama' => $invalid_nama,
        );
        $this->template->load('template/template_v', 'kabupaten/kabupaten_form', $data);
    }

    public function addaction()
    {
        
                $id = $this->input->post('id_kabupaten', TRUE);
                $nama_kabupaten = $this->input->post('nama_kabupaten', TRUE);
                $provinsi = $this->input->post('provinsi', TRUE);
                $data = array(
                    'nama_kabupaten' => $nama_kabupaten,
                    'id_provinsi' => $provinsi,
                );
                $this->kb->insert_data($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('kabupaten');
            
            }
    

    public function update($id)
    {
        $id = $this->uri->segment(3);
        $get_row = $this->kb->get_row($id);
        if ($get_row->num_rows() > 0) {
            $row = $get_row->row();
            $nama_kabupaten =  $row->nama_kabupaten;
            $id_kabupaten = $row->id_kabupaten;
            $id_provinsi = $row->id_provinsi;
            $title = 'Edit kabupaten';
            $parent = 'Data kabupaten';

            $attr_form = array(
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            );

            $attr_nama = array(
                'type' => 'text',
                'name' => 'nama_kabupaten',
                'class' => 'form-control',
                'value' => set_value('nama_kabupaten', $nama_kabupaten),
                'required' => 'required'
            );

            $attr_provinsi = array(
                'id' => 'provinsi',
                'class' => 'form-control'
            );


            $attr_id = array(
                'type' => 'hidden',
                'name' => 'id_kabupaten',
                'id' => 'id_kabupaten',
                'value' => set_value('id_kabupaten', $id_kabupaten)
            );


            $attr_submit = array(
                'id' => 'submit',
                'class' => 'btn btn-gradient-info'
            );

            $get_provinsi = $this->kb->get_provinsi();
            $form_open = form_open_multipart('kabupaten/editaction', $attr_form);
            $form_close = form_close();
            $label_nama = form_label('Nama kabupaten', 'nama_kabupaten');
            $label_provinsi = form_label('provinsi', 'provinsi');
            $input_nama = form_input($attr_nama);
            $input_id = form_input($attr_id);
            $invalid_nama = 'Nama kabupaten harus diisi!';

            $provinsi = array();
            foreach ($get_provinsi as $s) {
                $provinsi[$s->id_provinsi] = $s->nama_provinsi;
            }
            $ddprovinsi = form_dropdown('provinsi', $provinsi, set_value('provinsi', $id_provinsi), $attr_provinsi);
            $fe_nama = form_error('nama_kabupaten');
            $submit = form_submit('Simpan', 'submit', $attr_submit);
            $data = array(
                'title' => $title,
                'parent' => $parent,
                'form_open' => $form_open,
                'form_close' => $form_close,
                'label_nama' => $label_nama,
                'label_provinsi' => $label_provinsi,
                'input_nama' => $input_nama,
                'ddprovinsi' => $ddprovinsi,
                'fe_nama' => $fe_nama,
                'input_id' => $input_id,
                'submit' => $submit,
                'invalid_nama' => $invalid_nama,
            );
            $this->template->load('template/template_v', 'kabupaten/kabupaten_form', $data);
        }
    }

    public function editaction()
    {
        $this->_rules();
        $validation = $this->form_validation->run();
        if ($validation == FALSE) {
        $this->update();
     } else {
        $id = $this->input->post('id_kabupaten', TRUE);
        $nama_kabupaten = $this->input->post('nama_kabupaten', TRUE);
        $provinsi = $this->input->post('provinsi', TRUE);
        $data = array(
            'nama_kabupaten' => $nama_kabupaten,
            'id_provinsi' => $provinsi,
        );
        $this->kb->update_data($id,$data);
        $this->session->set_flashdata('success', 'Data berhasil diubah!');
        redirect('kabupaten');
    }
 }


    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $this->kb->delete_data($id);
        redirect('kabupaten');
    }

    public function _rules()
    {
        $attr_nama = array(
            'required' => 'Nama kabupaten harus di isi!',
        );
        $this->form_validation->set_rules('nama_kabupaten', 'Nama kabupaten', 'trim|required', $attr_nama);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
    