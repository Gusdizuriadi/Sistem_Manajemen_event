<?php

class profil extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('profil_model', 'pr');
    }

    public function index()
    {
        $title = 'Data profil';
        $get_data = $this->pr->get_data();
        $attradd = array('class' => 'btn  btn-gradient-success');
        $btnadd = anchor('profil/add', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $data = array(
            'profil' => $get_data,
            'title' => $title,
            'btntambah' => $btnadd
        );
        $this->template->load('template/template_v', 'profil/profil_view', $data);
    }

    public function add()
    {
        $title = 'Tambah profil';
        $parent = 'Data profil';

        $attr_form = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $attr_nama = array(
            'type' => 'text',
            'name' => 'nama_profil',
            'class' => 'form-control',
            'value' => set_value('nama_profil'),
            'required' => 'required'
        );

        $attr_deskripsi = array(
            'type' => 'text',
            'name' => 'deskripsi_profil',
            'class' => 'form-control',
            'value' => set_value('deskripsi_profil'),
            'required' => 'required'

        );

        $attr_foto = array(
            'type' => 'file',
            'name' => 'foto',
            'value' => set_value('foto'),
            'placeholder' => 'foto',
            'id' => 'input-file-now',
            'class' => 'dropify',
        );

        $attr_id = array(
            'type' => 'hidden',
            'id' => 'id_profil',
            'value' => set_value('id_profil')
        );


        $attr_submit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

        $form_open = form_open_multipart('profil/addaction', $attr_form);
        $form_close = form_close();
        $label_nama = form_label('Nama profil', 'nama_profil');
        $label_deskripsi = form_label('Deskripsi profil', 'deskripsi_profil');
        $label_foto = form_label('Logo Profil', 'gambar');
        $input_nama = form_input($attr_nama);
        $input_deskripsi = form_input($attr_deskripsi);
        $input_foto = form_input($attr_foto);
        $input_id = form_input($attr_id);
        $invalid_nama = 'Nama profil harus diisi!';
        $fe_nama = form_error('nama_profil');
        $submit = form_submit('Simpan', 'submit', $attr_submit);
        $data = array(
            'title' => $title,
            'parent' => $parent,
            'form_open' => $form_open,
            'form_close' => $form_close,
            'label_nama' => $label_nama,
            'label_deskripsi' => $label_deskripsi,
            'label_foto' => $label_foto,
            'input_nama' => $input_nama,
            'input_deskripsi' => $input_deskripsi,
            'input_foto' => $input_foto,
            'fe_nama' => $fe_nama,
            'input_id' => $input_id,
            'submit' => $submit,
            'invalid_nama' => $invalid_nama,
        );
        $this->template->load('template/template_v', 'profil/profil_form', $data);
    }

    public function addaction()
    {

        $this->_rules();
        $validasi = $this->form_validation->run();
        if ($validasi == FALSE) {
            $this->add();
        } else {
            $config['upload_path']   = FCPATH . '/uploads/profil/';
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
                $id = $this->input->post('id_profil', TRUE);
                $nama_profil = $this->input->post('nama_profil', TRUE);
                $foto = $this->upload->data('file_name', TRUE);
                $deskripsi_profil = $this->input->post('deskripsi_profil', TRUE);
                $data = array(
                    'nama_profil' => $nama_profil,
                    'deskripsi_profil' => $deskripsi_profil,
                    'gambar' => $foto,  
                );
                $this->pr->insert_data($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('profil');
          }  
    } 
 }
    
    

    
    public function update($id)
    {
        $id = $this->uri->segment(3);
        $get_row = $this->pr->get_row($id);
        if ($get_row->num_rows() > 0) {
            $row = $get_row->row();
            $nama_profil =  $row->nama_profil;
            $id_profil = $row->id_profil;
            $title = 'Edit profil';
            $parent = 'Data profil';

            $attr_form = array(
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            );

            $attr_nama = array(
                'type' => 'text',
                'name' => 'nama_profil',
                'class' => 'form-control',
                'value' => set_value('nama_profil', $nama_profil),
                'required' => 'required'
            );

            $attr_deskripsi = array(
                'type' => 'text',
                'name' => 'deskripsi_profil',
                'class' => 'form-control',
                'value' => set_value('deskripsi_profil'),
                'required' => 'required'
                
            );

            $attr_id = array(
                'type' => 'hidden',
                'name' => 'id_profil',
                'id' => 'id_profil',
                'value' => set_value('id_profil', $id_profil)
            );


            $attr_submit = array(
                'id' => 'submit',
                'class' => 'btn btn-gradient-info'
            );

            $form_open = form_open_multipart('profil/editaction', $attr_form);
            $form_close = form_close();
            $label_nama = form_label('Nama profil', 'nama_profil');
            $label_deskripsi= form_label('Deskripsi profil', 'deskripsi_profil');
            $input_nama = form_input($attr_nama);
            $input_deskripsi= form_input($attr_deskripsi);
            $input_id = form_input($attr_id);
            $invalid_nama = 'Nama profil harus diisi!';
            $fe_nama = form_error('nama_profil');
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
            $this->template->load('template/template_v', 'profil/profil_form', $data);
        }
    }

    public function editaction()
    {
        $this->_rules();
        $validation = $this->form_validation->run();
       
        if ($validation == FALSE) {
            $this->update();
        } else {
                $id = $this->input->post('id_profil', TRUE);
                $nama_profil = $this->input->post('nama_profil', TRUE);
                $deskripsi_profil = $this->input->post('deskripsi_profil', TRUE);
                $data = array(
                    'nama_profil' => $nama_profil,
                    'deskripsi_profil' => $deskripsi_profil,  
                );
                $this->pr->update_data($id,$data);
                $this->session->set_flashdata('success', 'Data berhasil diubah!');
            }    redirect('profil');
    }
        
    

    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $this->pr->delete_data($id);
        redirect('profil');
    }

    public function _rules()
    {
        $attr_nama = array(
            'required' => 'Nama profil harus di isi!',
        );
        $this->form_validation->set_rules('nama_profil', 'Nama profil', 'trim|required', $attr_nama);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
