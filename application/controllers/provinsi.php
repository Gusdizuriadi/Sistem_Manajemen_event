<?php

class provinsi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('Provinsi_model', 'pr');
    }

    public function index()
    {
        $title = 'Data Provinsi';
        $get_data = $this->pr->get_data();
        $attradd = array('class' => 'btn  btn-gradient-success');
        $btnadd = anchor('provinsi/add', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $data = array(
            'provinsi' => $get_data,
            'title' => $title,
            'btntambah' => $btnadd
        );
        $this->template->load('template/template_v', 'provinsi/provinsi_view', $data);
    }

    public function add()
    {
        $title = 'Tambah Provinsi';
        $parent = 'Data Provinsi';

        $attr_form = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $attr_nama = array(
            'type' => 'text',
            'name' => 'nama_provinsi',
            'class' => 'form-control',
            'value' => set_value('nama_provinsi'),
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
            'id' => 'id_provinsi',
            'value' => set_value('id_provinsi')
        );


        $attr_submit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

        $form_open = form_open_multipart('provinsi/addaction', $attr_form);
        $form_close = form_close();
        $label_nama = form_label('Nama Provinsi', 'nama_provinsi');
        $label_foto = form_label('Logo Provinsi', 'foto');
        $input_nama = form_input($attr_nama);
        $input_id = form_input($attr_id);
        $invalid_nama = 'Nama Provinsi harus diisi!';
        $input_foto = form_input($attr_foto);
        $fe_nama = form_error('nama_provinsi');
        $submit = form_submit('Simpan', 'submit', $attr_submit);
        $data = array(
            'title' => $title,
            'parent' => $parent,
            'form_open' => $form_open,
            'form_close' => $form_close,
            'label_nama' => $label_nama,
            'label_foto' => $label_foto,
            'input_nama' => $input_nama,
            'input_foto' => $input_foto,
            'fe_nama' => $fe_nama,
            'input_id' => $input_id,
            'submit' => $submit,
            'invalid_nama' => $invalid_nama,
        );
        $this->template->load('template/template_v', 'provinsi/provinsi_form', $data);
    }

    public function addaction()
    {
        $this->_rules();
        $validasi = $this->form_validation->run();
        if ($validasi == FALSE) {
            $this->add();
        } else {
            $config['upload_path']   = FCPATH . '/uploads/provinsi/';
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
                $nama_provinsi = $this->input->post('nama_provinsi', TRUE);
                $foto = $this->upload->data('file_name', TRUE);
                $data = array(
                    'nama_provinsi' => $nama_provinsi,
                    'logo_provinsi' => $foto,
                );
                $this->pr->insert_data($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('provinsi');
            }
        }
    }

    
    public function update($id)
    {
        $id = $this->uri->segment(3);
        $get_row = $this->pr->get_row($id);
        if ($get_row->num_rows() > 0) {
            $row = $get_row->row();
            $nama_provinsi =  $row->nama_provinsi;
            $id_provinsi = $row->id_provinsi;
            $foto = $row->logo_provinsi;
            $title = 'Edit Provinsi';
            $parent = 'Data Provinsi';

            $attr_form = array(
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            );

            $attr_nama = array(
                'type' => 'text',
                'name' => 'nama_sponsor',
                'class' => 'form-control',
                'value' => set_value('nama_provinsi', $nama_provinsi),
                'required' => 'required'
            );

            $attr_foto = array(
                'type' => 'file',
                'name' => 'foto',
                'value' => set_value('foto'),
                'placeholder' => 'Logo Provinsi',
                'id' => 'input-file-now',
                'class' => 'dropify',
            );

            $attr_id = array(
                'type' => 'hidden',
                'name' => 'id_provinsi',
                'id' => 'id_provinsi',
                'value' => set_value('id_provinsi', $id_provinsi)
            );


            $attr_submit = array(
                'id' => 'submit',
                'class' => 'btn btn-gradient-info'
            );

            $form_open = form_open_multipart('provinsi/editaction', $attr_form);
            $form_close = form_close();
            $label_nama = form_label('Nama Provinsi', 'nama_provinsi');
            $label_foto = form_label('Logo Provinsi', 'foto');
            $input_nama = form_input($attr_nama);
            $input_id = form_input($attr_id);
            $invalid_nama = 'Nama Provinsi harus diisi!';

            
            $input_foto = form_input($attr_foto);
            $fe_nama = form_error('nama_provinsi');
            $submit = form_submit('Simpan', 'submit', $attr_submit);
            $data = array(
                'title' => $title,
                'parent' => $parent,
                'form_open' => $form_open,
                'form_close' => $form_close,
                'label_nama' => $label_nama,
                'label_foto' => $label_foto,
                'input_nama' => $input_nama,
                'input_foto' => $input_foto,
                'fe_nama' => $fe_nama,
                'input_id' => $input_id,
                'submit' => $submit,
                'invalid_nama' => $invalid_nama,
            );
            $this->template->load('template/template_v', 'provinsi/provinsi_form', $data);
        }
    }

    public function editaction()
    {
        $id = $this->input->post('id_provinsi', TRUE);
        $nama_provinsi = $this->input->post('nama_provinsi', TRUE);
        $this->_rules();
        $validasi = $this->form_validation->run();
        if ($validasi == FALSE) {
            $this->update($id);
        } else {
            $config['upload_path']   = FCPATH . '/uploads/provinsi/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '1000';
            $config['max_width']  = '5000';
            $config['max_height']  = '5000';
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $data = array(
                    'nama_provinsi' => $nama_provinsi,
                    'logo_provinsi' => $foto,
                );
                $this->pr->update_data($id, $data);
                $this->session->set_flashdata('success', 'Data berhasil diubah!');
                redirect('provinsi');
            } else {
                $foto = $this->upload->data('file_name', TRUE);
                $get_foto = $this->pr->get_row($id)->row()->logo_provinsi;
                $folder = FCPATH . '/uploads/provinsi/';
                $uploads = $folder . $get_foto;
                if (unlink($uploads)) { } else {
                    $this->session->set_flashdata('warning', 'data lama tidak ditemukan atau rusak!');
                }
                $data = array(
                    'nama_provinsi' => $nama_provinsi,
                    'logo_provinsi' => $foto,
                );
                $this->pr->update_data($id, $data);
                $this->session->set_flashdata('success', 'Data berhasil Edit!');
                redirect('provinsi');
            }
        }
    }

    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $get_foto = $this->pr->get_row($id)->row()->logo_provinsi;
        $folder = FCPATH . '/uploads/provinsi/';
        $uploads = $folder . $get_foto;
        if (unlink($uploads)) { } else {
            $this->session->set_flashdata('warning', 'data lama tidak ditemukan atau rusak!');
        }
        $this->pr->delete_data($id);
        redirect('provinsi');
    }

    public function _rules()
    {
        $attr_nama = array(
            'required' => 'Nama provinsi harus di isi!',
        );
        $this->form_validation->set_rules('nama_provinsi', 'Nama Provinsi', 'trim|required', $attr_nama);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
