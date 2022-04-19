<?php

class kategori_agenda extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('kategori_agenda_model', 'kat');
    }

    public function index()
    {
        $title = 'Data kategori_agenda';
        $get_data = $this->kat->get_data();
        $attradd = array('class' => 'btn  btn-gradient-success');
        $btnadd = anchor('kategori_agenda/add', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $data = array(
            'kategori_agenda' => $get_data,
            'title' => $title,
            'btntambah' => $btnadd
        );
        $this->template->load('template/template_v', 'kategori_agenda/kategori_agenda_view', $data);
    }

    public function add()
    {
        $title = 'Tambah kategori_agenda';
        $parent = 'Data kategori_agenda';

        $attr_form = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $attr_nama = array(
            'type' => 'text',
            'name' => 'nama_kategori_agenda',
            'class' => 'form-control',
            'value' => set_value('nama_kategori_agenda'),
            'required' => 'required'
        );

        $attr_deskripsi = array(
            'type' => 'text',
            'name' => 'deskripsi_kategori_agenda',
            'class' => 'form-control',
            'value' => set_value('deskripsi_kategori_agenda'),
            'required' => 'required'

        );

        $attr_id = array(
            'type' => 'hidden',
            'id' => 'id_kategori_agenda',
            'value' => set_value('id_kategori_agenda')
        );


        $attr_submit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

        $form_open = form_open_multipart('kategori_agenda/addaction', $attr_form);
        $form_close = form_close();
        $label_nama = form_label('Nama kategori agenda', 'nama_kategori_agenda');
        $label_deskripsi = form_label('Deskripsi kategori agenda', 'deskripsi_kategori_agenda');
        $input_nama = form_input($attr_nama);
        $input_deskripsi = form_input($attr_deskripsi);
        $input_id = form_input($attr_id);
        $invalid_nama = 'Nama kategori agenda harus diisi!';
        $fe_nama = form_error('nama_kategori_agenda');
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
        $this->template->load('template/template_v', 'kategori_agenda/kategori_agenda_form', $data);
    }

    public function addaction()
    {
                $id = $this->input->post('id_kategori_agenda', TRUE);
                $nama_kategori_agenda = $this->input->post('nama_kategori_agenda', TRUE);
                $deskripsi_kategori_agenda = $this->input->post('deskripsi_kategori_agenda', TRUE);
                $data = array(
                    'nama_kategori_agenda' => $nama_kategori_agenda,
                    'deskripsi_kategori_agenda' => $deskripsi_kategori_agenda,  
                );
                $this->kat->insert_data($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('kategori_agenda');
    }  
    
    

    
    public function update($id)
    {
        $id = $this->uri->segment(3);
        $get_row = $this->kat->get_row($id);
        if ($get_row->num_rows() > 0) {
            $row = $get_row->row();
            $nama_kategori_agenda =  $row->nama_kategori_agenda;
            $id_kategori_agenda = $row->id_kategori_agenda;
            $title = 'Edit kategori agenda';
            $parent = 'Data kategori agenda';

            $attr_form = array(
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            );

            $attr_nama = array(
                'type' => 'text',
                'name' => 'nama_kategori_agenda',
                'class' => 'form-control',
                'value' => set_value('nama_kategori_agenda', $nama_kategori_agenda),
                'required' => 'required'
            );

            $attr_deskripsi = array(
                'type' => 'text',
                'name' => 'deskripsi_kategori_agenda',
                'class' => 'form-control',
                'value' => set_value('deskripsi_kategori_agenda'),
                'required' => 'required'
                
            );

            $attr_id = array(
                'type' => 'hidden',
                'name' => 'id_kategori_agenda',
                'id' => 'id_kategori_agenda',
                'value' => set_value('id_kategori_agenda', $id_kategori_agenda)
            );


            $attr_submit = array(
                'id' => 'submit',
                'class' => 'btn btn-gradient-info'
            );

            $form_open = form_open_multipart('kategori_agenda/editaction', $attr_form);
            $form_close = form_close();
            $label_nama = form_label('Nama kategori agenda', 'nama_kategori_agenda');
            $label_deskripsi= form_label('Deskripsi Kategori Agenda', 'deskripsi_kategori_agenda');
            $input_nama = form_input($attr_nama);
            $input_deskripsi= form_input($attr_deskripsi);
            $input_id = form_input($attr_id);
            $invalid_nama = 'Nama kategori agenda harus diisi!';
            $fe_nama = form_error('nama_kategori_agenda');
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
            $this->template->load('template/template_v', 'kategori_agenda/kategori_agenda_form', $data);
        }
    }

    public function editaction()
    {
        $this->_rules();
        $validation = $this->form_validation->run();
       
        if ($validation == FALSE) {
            $this->update();
        } else {
                $id = $this->input->post('id_kategori_agenda', TRUE);
                $nama_kategori_agenda = $this->input->post('nama_kategori_agenda', TRUE);
                $deskripsi_kategori_agenda = $this->input->post('deskripsi_kategori_agenda', TRUE);
                $data = array(
                    'nama_kategori_agenda' => $nama_kategori_agenda,
                    'deskripsi_kategori_agenda' => $deskripsi_kategori_agenda,  
                );
                $this->kat->update_data($id,$data);
                $this->session->set_flashdata('success', 'Data berhasil diubah!');
            }    redirect('kategori_agenda');
    }
        
    

    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $this->kat->delete_data($id);
        redirect('kategori_agenda');
    }

    public function _rules()
    {
        $attr_nama = array(
            'required' => 'Nama kategori_agenda harus di isi!',
        );
        $this->form_validation->set_rules('nama_kategori_agenda', 'Nama kategori_agenda', 'trim|required', $attr_nama);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
