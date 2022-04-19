<?php

class lembaga extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('lembaga_model', 'lem');
    }

    public function index()
    {
        $title = 'Data lembaga';
        $get_data = $this->lem->get_data();
        $attradd = array('class' => 'btn  btn-gradient-success');
        $btnadd = anchor('lembaga/add', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $data = array(
            'lembaga' => $get_data,
            'title' => $title,
            'btntambah' => $btnadd
        );
        $this->template->load('template/template_v', 'lembaga/lembaga_view', $data);
    }

    public function add()
    {
        $title = 'Tambah Lembaga';
        $parent = 'Data Lembaga';

        $attr_form = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $attr_nama = array(
            'type' => 'text',
            'name' => 'nama_lembaga',
            'class' => 'form-control',
            'value' => set_value('nama_lembaga'),
            'required' => 'required'
        );

        $attr_deskripsi = array(
            'type' => 'text',
            'name' => 'deskripsi_lembaga',
            'class' => 'form-control',
            'value' => set_value('deskripsi_kategori_agenda'),
            'required' => 'required'

        );

        $attr_id = array(
            'type' => 'hidden',
            'id' => 'id_lembaga',
            'value' => set_value('id_lembaga')
        );


        $attr_submit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

        $form_open = form_open_multipart('lembaga/addaction', $attr_form);
        $form_close = form_close();
        $label_nama = form_label('Nama Lembaga', 'nama_lembaga');
        $label_deskripsi = form_label('Deskripsi Lembaga', 'deskripsi_lembaga');
        $input_nama = form_input($attr_nama);
        $input_deskripsi = form_input($attr_deskripsi);
        $input_id = form_input($attr_id);
        $invalid_nama = 'Nama Lembaga harus diisi!';
        $fe_nama = form_error('nama_lembaga');
        $submit = form_submit('Simpan', 'submit', $attr_submit);
        $data = array(
            'title' => $title,
            'parent' => $parent,
            'form_open' => $form_open,
            'form_close' => $form_close,
            'label_nama' => $label_nama,
            'label_deskripsi' => $label_deskripsi,
            'input_nama' => $input_nama,
            'input_deskripsi' => $input_deskripsi,
            'fe_nama' => $fe_nama,
            'input_id' => $input_id,
            'submit' => $submit,
            'invalid_nama' => $invalid_nama,
        );
        $this->template->load('template/template_v', 'lembaga/lembaga_form', $data);
    }

    public function addaction()
    {
                $id = $this->input->post('id_lembaga', TRUE);
                $nama_lembaga = $this->input->post('nama_lembaga', TRUE);
                $deskripsi_lembaga = $this->input->post('deskripsi_lembaga', TRUE);
                $data = array(
                    'nama_lembaga' => $nama_lembaga,
                    'deskripsi_lembaga' => $deskripsi_lembaga,  
                );
                $this->lem->insert_data($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('lembaga');
    }  
    
    

    
    public function update($id)
    {
        $id = $this->uri->segment(3);
        $get_row = $this->lem->get_row($id);
        if ($get_row->num_rows() > 0) {
            $row = $get_row->row();
            $nama_lembaga =  $row->nama_lembaga;
            $id_lembaga = $row->id_lembaga;
            $title = 'Edit Lembaga';
            $parent = 'Data Lembaga';

            $attr_form = array(
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            );

            $attr_nama = array(
                'type' => 'text',
                'name' => 'nama_lembaga',
                'class' => 'form-control',
                'value' => set_value('nama_lembaga', $nama_lembaga),
                'required' => 'required'
            );

            $attr_deskripsi = array(
                'type' => 'text',
                'name' => 'deskripsi_lembaga',
                'class' => 'form-control',
                'value' => set_value('deskripsi_lembaga'),
                'required' => 'required'
                
            );

            $attr_id = array(
                'type' => 'hidden',
                'name' => 'id_lembaga',
                'id' => 'id_lembaga',
                'value' => set_value('id_lembaga', $id_lembaga)
            );


            $attr_submit = array(
                'id' => 'submit',
                'class' => 'btn btn-gradient-info'
            );

            $form_open = form_open_multipart('lembaga/editaction', $attr_form);
            $form_close = form_close();
            $label_nama = form_label('Nama Lembaga', 'nama_lembaga');
            $label_deskripsi= form_label('Deskripsi Lembaga', 'deskripsi_lembaga');
            $input_nama = form_input($attr_nama);
            $input_deskripsi= form_input($attr_deskripsi);
            $input_id = form_input($attr_id);
            $invalid_nama = 'Nama Lembaga harus diisi!';
            $fe_nama = form_error('nama_lembaga');
            $submit = form_submit('Simpan', 'submit', $attr_submit);
            $data = array(
                'title' => $title,
                'parent' => $parent,
                'form_open' => $form_open,
                'form_close' => $form_close,
                'label_nama' => $label_nama,
                'label_deskripsi' => $label_deskripsi,
                'input_nama' => $input_nama,
                'input_deskripsi' => $input_deskripsi,
                'fe_nama' => $fe_nama,
                'input_id' => $input_id,
                'submit' => $submit,
                'invalid_nama' => $invalid_nama,
            );
            $this->template->load('template/template_v', 'lembaga/lembaga_form', $data);
        }
    }

    public function editaction()
    {
        $this->_rules();
        $validation = $this->form_validation->run();
       
        if ($validation == FALSE) {
            $this->update();
        } else {
                $id = $this->input->post('id_lembaga', TRUE);
                $nama_lembaga = $this->input->post('nama_lembaga', TRUE);
                $deskripsi_lembaga = $this->input->post('deskripsi_lembaga', TRUE);
                $data = array(
                    'nama_lembaga' => $nama_lembaga,
                    'deskripsi_lembaga' => $deskripsi_lembaga,  
                );
                $this->lem->update_data($id,$data);
                $this->session->set_flashdata('success', 'Data berhasil diubah!');
            }    redirect('lembaga');
    }
        
    

    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $this->lem->delete_data($id);
        redirect('lembaga');
    }

    public function _rules()
    {
        $attr_nama = array(
            'required' => 'Nama lembaga harus di isi!',
        );
        $this->form_validation->set_rules('nama_lembaga', 'Nama lembaga', 'trim|required', $attr_nama);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
