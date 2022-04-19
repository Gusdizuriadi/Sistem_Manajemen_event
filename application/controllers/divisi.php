<?php

class divisi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('divisi_model', 'div');
    }

    public function index()
    {
        $title = 'Data divisi';
        $get_data = $this->div->get_data();
        $attradd = array('class' => 'btn  btn-gradient-success');
        $btnadd = anchor('divisi/add', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $data = array(
            'divisi' => $get_data,
            'title' => $title,
            'btntambah' => $btnadd
        );
        $this->template->load('template/template_v', 'divisi/divisi_view', $data);
    }

    public function add()
    {
        $title = 'Tambah Divisi';
        $parent = 'Data Divisi';

        $attr_form = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $attr_nama = array(
            'type' => 'text',
            'name' => 'nama_divisi',
            'class' => 'form-control',
            'value' => set_value('nama_divisi'),
            'required' => 'required'
        );

        $attr_lembaga = array(
            'id' => 'lembaga',
            'class' => 'form-control'
        );

        $attr_deskripsi = array(
            'type' => 'text',
            'name' => 'deskripsi_divisi',
            'class' => 'form-control',
            'value' => set_value('deskripsi_divisi'),
            'required' => 'required'

        );

        $attr_id = array(
            'type' => 'hidden',
            'id' => 'id_divisi',
            'value' => set_value('id_divisi')
        );


        $attr_submit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

        $get_lembaga = $this->div->get_lembaga();
        $form_open = form_open_multipart('divisi/addaction', $attr_form);
        $form_close = form_close();
        $label_nama = form_label('Nama Divisi', 'nama_Divisi');
        $label_lembaga = form_label('lembaga', 'lembaga');
        $label_deskripsi= form_label('Deskripsi Divisi', 'deskripsi_Divisi');
        $input_nama = form_input($attr_nama);
        $input_deskripsi = form_input($attr_deskripsi);
        $input_id = form_input($attr_id);
        $invalid_nama = 'Nama Divisi harus diisi!';

        $lembaga = array();
        foreach ($get_lembaga as $s) {
            $lembaga[$s->id_lembaga] = $s->nama_lembaga;
        }
        $ddlembaga = form_dropdown('lembaga', $lembaga, set_value('lembaga'), $attr_lembaga);
        $fe_nama = form_error('nama_divisi');
        $submit = form_submit('Simpan', 'submit', $attr_submit);
        $data = array(
            'title' => $title,
            'parent' => $parent,
            'form_open' => $form_open,
            'form_close' => $form_close,
            'label_nama' => $label_nama,
            'label_deskripsi' => $label_deskripsi,
            'label_lembaga' => $label_lembaga,
            'input_nama' => $input_nama,
            'input_deskripsi' => $input_deskripsi,
            'ddlembaga' => $ddlembaga,
            'fe_nama' => $fe_nama,
            'input_id' => $input_id,
            'submit' => $submit,
            'invalid_nama' => $invalid_nama,
        );
        $this->template->load('template/template_v', 'divisi/divisi_form', $data);
    }

    public function addaction()
    {
        
                $id = $this->input->post('id_divisi', TRUE);
                $nama_divisi = $this->input->post('nama_divisi', TRUE);
                $deskripsi_divisi = $this->input->post('deskripsi_divisi', TRUE);
                $lembaga = $this->input->post('lembaga', TRUE);
                $data = array(
                    'nama_divisi' => $nama_divisi,
                    'deskripsi_divisi' => $deskripsi_divisi,
                    'id_lembaga' => $lembaga,
                );
                $this->div->insert_data($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('divisi');
            
            }
    

    public function update($id)
    {
        $id = $this->uri->segment(3);
        $get_row = $this->div->get_row($id);
        if ($get_row->num_rows() > 0) {
            $row = $get_row->row();
            $nama_divisi =  $row->nama_divisi;
            $id_divisi = $row->id_divisi;
            $id_lembaga = $row->id_lembaga;
            $title = 'Edit divisi';
            $parent = 'Data divisi';

            $attr_form = array(
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            );

            $attr_nama = array(
                'type' => 'text',
                'name' => 'nama_divisi',
                'class' => 'form-control',
                'value' => set_value('nama_divisi', $nama_divisi),
                'required' => 'required'
            );

            $attr_lembaga = array(
                'id' => 'lembaga',
                'class' => 'form-control'
            );

            $attr_deskripsi = array(
                'type' => 'text',
                'name' => 'deskripsi_divisi',
                'class' => 'form-control',
                'value' => set_value('deskripsi_divisi'),
                'required' => 'required'
            );


            $attr_id = array(
                'type' => 'hidden',
                'name' => 'id_divisi',
                'id' => 'id_divisi',
                'value' => set_value('id_divisi', $id_divisi)
            );


            $attr_submit = array(
                'id' => 'submit',
                'class' => 'btn btn-gradient-info'
            );

            $get_lembaga = $this->div->get_lembaga();
            $form_open = form_open_multipart('divisi/editaction', $attr_form);
            $form_close = form_close();
            $label_nama = form_label('Nama divisi', 'nama_divisi');
            $label_lembaga = form_label('lembaga', 'lembaga');
            $label_deskripsi= form_label('deskripsi Divisi', 'deskripsi_Divisi');
            $input_nama = form_input($attr_nama);
            $input_deskripsi = form_input($attr_deskripsi);
            $input_id = form_input($attr_id);
            $invalid_nama = 'Nama divisi harus diisi!';

            $lembaga = array();
            foreach ($get_lembaga as $s) {
                $lembaga[$s->id_lembaga] = $s->nama_lembaga;
            }
            $ddlembaga = form_dropdown('lembaga', $lembaga, set_value('lembaga', $id_lembaga), $attr_lembaga);
            $fe_nama = form_error('nama_divisi');
            $submit = form_submit('Simpan', 'submit', $attr_submit);
            $data = array(
                'title' => $title,
                'parent' => $parent,
                'form_open' => $form_open,
                'form_close' => $form_close,
                'label_nama' => $label_nama,
                'label_deskripsi' => $label_deskripsi,
                'label_lembaga' => $label_lembaga,
                'input_nama' => $input_nama,
                'input_deskripsi' => $input_deskripsi,
                'ddlembaga' => $ddlembaga,
                'fe_nama' => $fe_nama,
                'input_id' => $input_id,
                'submit' => $submit,
                'invalid_nama' => $invalid_nama,
            );
            $this->template->load('template/template_v', 'divisi/divisi_form', $data);
        }
    }

    public function editaction()
    {
        $this->_rules();
        $validation = $this->form_validation->run();
        if ($validation == FALSE) {
        $this->update();
     } else {
        $id = $this->input->post('id_divisi', TRUE);
        $nama_divisi = $this->input->post('nama_divisi', TRUE);
        $deskripsi_divisi = $this->input->post('deskripsi_divisi', TRUE);
        $lembaga = $this->input->post('lembaga', TRUE);
        $data = array(
            'nama_divisi' => $nama_divisi,
            'deskripsi_divisi' => $deskripsi_divisi,
            'id_lembaga' => $lembaga,
        );
        $this->div->update_data($id,$data);
        $this->session->set_flashdata('success', 'Data berhasil diubah!');
        redirect('divisi');
    }
 }


    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $this->div->delete_data($id);
        redirect('divisi');
    }

    public function _rules()
    {
        $attr_nama = array(
            'required' => 'Nama divisi harus di isi!',
        );
        $this->form_validation->set_rules('nama_divisi', 'Nama divisi', 'trim|required', $attr_nama);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
    