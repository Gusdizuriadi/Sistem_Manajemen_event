<?php

class stakeholder extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('stakeholder_model', 'st');
    }

    public function index()
    {
        $title = 'Data Stakeholder';
        $get_data = $this->st->get_data();
        $attradd = array('class' => 'btn  btn-gradient-success');
        $btnadd = anchor('stakeholder/add', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $data = array(
            'stakeholder' => $get_data,
            'title' => $title,
            'btntambah' => $btnadd
        );
        $this->template->load('template/template_v', 'stakeholder/stakeholder_view', $data);
    }

    public function add()
    {
        $title = 'Tambah Stakeholder';
        $parent = 'Data Stakeholder';

        $attr_form = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $attr_nama = array(
            'type' => 'text',
            'name' => 'nama_sponsor',
            'class' => 'form-control',
            'value' => set_value('nama_sponsor'),
            'required' => 'required'
        );

        $attr_jenis = array(
            'type' => 'text',
            'name' => 'jenis_stakeholder',
            'class' => 'form-control',
            'value' => set_value('jenis_stakeholder'),
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

        $attr_link = array(
            'type' => 'text',
            'name' => 'link_stakeholder',
            'class' => 'form-control',
            'value' => set_value('link_stakeholder'),
            'required' => 'required'
        );

        $attr_keterangan = array(
            'type' => 'text',
            'name' => 'keterangan_stakeholder',
            'class' => 'form-control',
            'value' => set_value('keterangan_stakeholder'),
            'required' => 'required'
        );
          

        $attr_id = array(
            'type' => 'hidden',
            'id' => 'id_sponsor',
            'value' => set_value('id_sponsor')
        );


        $attr_submit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

        $form_open = form_open_multipart('stakeholder/addaction', $attr_form);
        $form_close = form_close();
        $label_nama = form_label('Nama Stakeholder', 'nama_sponsor');
        $label_jenis = form_label('Jenis Stakeholder', 'jenis_stakeholder');
        $label_foto = form_label('Gambar Stakeholder', 'foto');
        $label_link = form_label('link Stakeholder', 'link_stakeholder');
        $label_keterangan = form_label('keterangan Stakeholder', 'keterangan_stakeholder');
        $input_nama = form_input($attr_nama);
        $input_jenis = form_input($attr_jenis);
        $input_link = form_input($attr_link);
        $input_keterangan = form_input($attr_keterangan);
        $input_id = form_input($attr_id);
        $invalid_nama = 'Nama Stakeholder harus diisi!';

        $input_foto = form_input($attr_foto);
        $fe_nama = form_error('nama_sponsor');
        $submit = form_submit('Simpan', 'submit', $attr_submit);
        $data = array(
            'title' => $title,
            'parent' => $parent,
            'form_open' => $form_open,
            'form_close' => $form_close,
            'label_nama' => $label_nama,
            'label_jenis' => $label_jenis,
            'label_foto' => $label_foto,
            'label_link' => $label_link,
            'label_keterangan' => $label_keterangan,
            'input_nama' => $input_nama,
            'input_jenis' => $input_jenis,
            'input_link' => $input_link,
            'input_keterangan' => $input_keterangan,
            'input_foto' => $input_foto,
            'fe_nama' => $fe_nama,
            'input_id' => $input_id,
            'submit' => $submit,
            'invalid_nama' => $invalid_nama,
        );
        $this->template->load('template/template_v', 'stakeholder/stakeholder_form', $data);
    }

    public function addaction()
    {
        $this->_rules();
        $validasi = $this->form_validation->run();
        if ($validasi == FALSE) {
            $this->add();
        } else {
            $config['upload_path']   = FCPATH . '/uploads/sponsor/';
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
                $nama = $this->input->post('nama_sponsor', TRUE);
                $jenis = $this->input->post('jenis_stakeholder', TRUE);
                $foto = $this->upload->data('file_name', TRUE);
                $link = $this->input->post('link_stakeholder', TRUE);
                $keterangan = $this->input->post('keterangan_stakeholder', TRUE);
                $data = array(
                    'nama_sponsor' => $nama,
                    'jenis_stakeholder' => $jenis,
                    'logo_stakeholder' => $foto,
                    'link_stakeholder' => $link,
                    'keterangan_stakeholder' => $keterangan,
                );
                $this->st->insert_data($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('stakeholder');
            }
        }
    }

    
    public function update($id)
    {
        $id = $this->uri->segment(3);
        $get_row = $this->st->get_row($id);
        if ($get_row->num_rows() > 0) {
            $row = $get_row->row();
            $nama_sponsor =  $row->nama_sponsor;
            $id_sponsor = $row->id_sponsor;
            $jenis_stakeholder = $row->jenis_stakeholder;
            $foto = $row->logo_stakeholder;
            $link_stakeholder = $row->link_stakeholder;
            $keterangan_stakeholder = $row->keterangan_stakeholder;
            $title = 'Edit Sponsor';
            $parent = 'Data Sponsor';

            $attr_form = array(
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            );

            $attr_nama = array(
                'type' => 'text',
                'name' => 'nama_sponsor',
                'class' => 'form-control',
                'value' => set_value('nama_sponsor', $nama_sponsor),
                'required' => 'required'
            );

            $attr_jenis = array(
                'type' => 'text',
                'name' => 'jenis_sponsor',
                'class' => 'form-control',
                'value' => set_value('jenis_sponsor'),
                'required' => 'required'
            );

            $attr_foto = array(
                'type' => 'file',
                'name' => 'foto',
                'value' => set_value('lampiran'),
                'placeholder' => 'Lampiran',
                'id' => 'input-file-now',
                'class' => 'dropify',
            );
            
            $attr_link = array(
                'type' => 'text',
                'name' => 'link_sponsor',
                'class' => 'form-control',
                'value' => set_value('link_sponsor',),
                'required' => 'required'
            );

            $attr_keterangan = array(
                'type' => 'text',
                'name' => 'keterangan_sponsor',
                'class' => 'form-control',
                'value' => set_value('keterangan_sponsor',),
                'required' => 'required'
            );

            $attr_id = array(
                'type' => 'hidden',
                'name' => 'id_sponsor',
                'id' => 'id_sponsor',
                'value' => set_value('id_sponsor', $id_sponsor)
            );


            $attr_submit = array(
                'id' => 'submit',
                'class' => 'btn btn-gradient-info'
            );

            $form_open = form_open_multipart('stakeholder/editaction', $attr_form);
            $form_close = form_close();
            $label_nama = form_label('Nama Stakeholder', 'nama_stakeholder');
            $label_jenis = form_label('jenis stakeholder', 'jenis_stakeholder');
            $label_foto = form_label('Foto Stakeholder', 'foto');
            $label_link = form_label('link stakeholder', 'link_stakeholder');
            $label_keterangan = form_label('keterangan stakeholder', 'keterangan_stakeholder');
            $input_nama = form_input($attr_nama);
            $input_jenis = form_input($attr_jenis);
            $input_link = form_input($attr_link);
            $input_keterangan = form_input($attr_keterangan);
            $input_id = form_input($attr_id);
            $invalid_nama = 'Nama Stakeholder harus diisi!';
            $input_foto = form_input($attr_foto);
            $fe_nama = form_error('nama_sponsor');
            $submit = form_submit('Simpan', 'submit', $attr_submit);
            $data = array(
                'title' => $title,
                'parent' => $parent,
                'form_open' => $form_open,
                'form_close' => $form_close,
                'label_nama' => $label_nama,
                'label_jenis' => $label_jenis,
                'label_foto' => $label_foto,
                'label_link' => $label_link,
                'label_keterangan' => $label_keterangan,
                'input_nama' => $input_nama,
                'input_jenis' => $input_jenis,
                'input_link' => $input_link,
                'input_keterangan' => $input_keterangan,
                'input_foto' => $input_foto,
                'fe_nama' => $fe_nama,
                'input_id' => $input_id,
                'submit' => $submit,
                'invalid_nama' => $invalid_nama,
            );
            $this->template->load('template/template_v', 'stakeholder/stakeholder_form', $data);
        }
    }

    public function editaction()
    {
        $id = $this->input->post('id_sponsor', TRUE);
        $nama_sponsor = $this->input->post('nama_sponsor', TRUE);
        $jenis_stakeholder = $this->input->post('jenis_stakeholder', TRUE);
        $foto = $this->upload->data('file_name', TRUE);
        $link_stakeholder = $this->input->post('link_stakeholder', TRUE);
        $keterangan_stakeholder = $this->input->post('keterangan_stakeholder', TRUE);
        $this->_rules();
        $validasi = $this->form_validation->run();
        if ($validasi == FALSE) {
            $this->update($id);
        } else {
            $config['upload_path']   = FCPATH . '/uploads/sponsor/';
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
                    'nama_sponsor' => $nama_sponsor,
                    'jenis_stakeholder' => $jenis_stakeholder,
                    'logo_stakeholder' => $foto,
                    'link_stakeholder' => $link_stakeholder,
                    'keterangan_stakeholder' => $keterangan_stakeholder,
                );
                $this->st->update_data($id, $data);
                $this->session->set_flashdata('success', 'Data berhasil diubah!');
                redirect('stakeholder');
            } else {
                $foto = $this->upload->data('file_name', TRUE);
                $get_foto = $this->st->get_row($id)->row()->logo_stakeholder;
                $folder = FCPATH . '/uploads/sponsor/';
                $uploads = $folder . $get_foto;
                if (unlink($uploads)) { } else {
                    $this->session->set_flashdata('warning', 'data lama tidak ditemukan atau rusak!');
                }
                $data = array(
                    'nama_sponsor' => $nama_sponsor,
                    'jenis_stakeholder' => $jenis_stakeholder,
                    'logo_stakeholder' => $foto,
                    'link_stakeholder' => $link_stakeholder,
                    'keterangan_stakeholder' => $keterangan_stakeholder,
                );
                $this->st->update_data($id, $data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('stakeholder');
            }
        }
    }

    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $get_foto = $this->st->get_row($id)->row()->logo_stakeholder;
        $folder = FCPATH . '/uploads/sponsor/';
        $uploads = $folder . $get_foto;
        if (unlink($uploads)) { } else {
            $this->session->set_flashdata('warning', 'data lama tidak ditemukan atau rusak!');
        }
        $this->st->delete_data($id);
        redirect('stakeholder');
    }

    public function _rules()
    {
        $attr_nama = array(
            'required' => 'Nama Sponsor harus di isi!',
        );
        $this->form_validation->set_rules('nama_sponsor', 'Nama sponsor', 'trim|required', $attr_nama);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
