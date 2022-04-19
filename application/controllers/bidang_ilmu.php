<?php

class bidang_ilmu extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('bidang_ilmu_model', 'bim');
    }

    public function index()
    {
        $title = 'Data bidang ilmu';
        $get_data = $this->bim->get_data();
        $attradd = array('class' => 'btn  btn-gradient-success');
        $btnadd = anchor('bidang_ilmu/add', '<i class="feather icon-user-plus"></i>Tambah Data', $attradd);
        $data = array(
            'bidang_ilmu' => $get_data,
            'title' => $title,
            'btntambah' => $btnadd
        );
        $this->template->load('template/template_v', 'bidang_ilmu/bidang_ilmu_view', $data);
    }

    public function add()
    {
        $title = 'Tambah bidang ilmu';
        $parent = 'Data bidang ilmu';

        $attr_form = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $attr_nama = array(
            'type' => 'text',
            'name' => 'nama_bidang_ilmu',
            'class' => 'form-control',
            'value' => set_value('nama_bidang_ilmu'),
            'required' => 'required'
        );

        $attr_rumpun = array(
            'type' => 'text',
            'name' => 'rumpun_bidang_ilmu',
            'class' => 'form-control',
            'value' => set_value('rumpun_bidang_ilmu'),
            'required' => 'required'

        );

        $attr_id = array(
            'type' => 'hidden',
            'id' => 'id_bidang_ilmu',
            'value' => set_value('id_bidang_ilmu')
        );


        $attr_submit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

        $form_open = form_open_multipart('bidang_ilmu/addaction', $attr_form);
        $form_close = form_close();
        $label_nama = form_label('Nama bidang ilmu', 'nama_bidang_ilmu');
        $label_rumpun = form_label('Rumpun bidang ilmu', 'rumpun_bidang_ilmu');
        $input_nama = form_input($attr_nama);
        $input_rumpun = form_input($attr_rumpun);
        $input_id = form_input($attr_id);
        $invalid_nama = 'Nama bidang ilmu harus diisi!';
        $fe_nama = form_error('nama_bidang_ilmu');
        $submit = form_submit('Simpan', 'submit', $attr_submit);
        $data = array(
            'title' => $title,
            'parent' => $parent,
            'form_open' => $form_open,
            'form_close' => $form_close,
            'label_nama' => $label_nama,
            'label_rumpun' => $label_rumpun,
            'input_nama' => $input_nama,
            'input_rumpun' => $input_rumpun,
            'fe_nama' => $fe_nama,
            'input_id' => $input_id,
            'submit' => $submit,
            'invalid_nama' => $invalid_nama,
        );
        $this->template->load('template/template_v', 'bidang_ilmu/bidang_ilmu_form', $data);
    }

    public function addaction()
    {
                $id = $this->input->post('id_bidang_ilmu', TRUE);
                $nama_bidang_ilmu = $this->input->post('nama_bidang_ilmu', TRUE);
                $rumpun_bidang_ilmu = $this->input->post('rumpun_bidang_ilmu', TRUE);
                $data = array(
                    'nama_bidang_ilmu' => $nama_bidang_ilmu,
                    'rumpun_bidang_ilmu' => $rumpun_bidang_ilmu,  
                );
                $this->bim->insert_data($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('bidang_ilmu');
    }  
    
    

    
    public function update($id)
    {
        $id = $this->uri->segment(3);
        $get_row = $this->bim->get_row($id);
        if ($get_row->num_rows() > 0) {
            $row = $get_row->row();
            $nama_bidang_ilmu =  $row->nama_bidang_ilmu;
            $id_bidang_ilmu = $row->id_bidang_ilmu;
            $title = 'Edit Bidang Ilmu';
            $parent = 'Data Bidang Ilmu';

            $attr_form = array(
                'class' => 'needs-validation',
                'novalidate' => 'novalidate'
            );

            $attr_nama = array(
                'type' => 'text',
                'name' => 'nama_bidang_ilmu',
                'class' => 'form-control',
                'value' => set_value('nama_bidang_ilmu', $nama_bidang_ilmu),
                'required' => 'required'
            );

            $attr_rumpun = array(
                'type' => 'text',
                'name' => 'rumpun_bidang_ilmu',
                'class' => 'form-control',
                'value' => set_value('rumpun_bidang_ilmu'),
                'required' => 'required'
                
            );

            $attr_id = array(
                'type' => 'hidden',
                'name' => 'id_bidang_ilmu',
                'id' => 'id_bidang_ilmu',
                'value' => set_value('id_bidang_ilmu', $id_bidang_ilmu)
            );


            $attr_submit = array(
                'id' => 'submit',
                'class' => 'btn btn-gradient-info'
            );

            $form_open = form_open_multipart('bidang_ilmu/editaction', $attr_form);
            $form_close = form_close();
            $label_nama = form_label('Nama Bidang Ilmu', 'nama_bidang_ilmu');
            $label_rumpun= form_label('rumpun Bidang Ilmu', 'rumpun_bidang_ilmu');
            $input_nama = form_input($attr_nama);
            $input_rumpun= form_input($attr_rumpun);
            $input_id = form_input($attr_id);
            $invalid_nama = 'Nama Bidang Ilmu harus diisi!';
            $fe_nama = form_error('nama_bidang_ilmu');
            $submit = form_submit('Simpan', 'submit', $attr_submit);
            $data = array(
                'title' => $title,
                'parent' => $parent,
                'form_open' => $form_open,
                'form_close' => $form_close,
                'label_nama' => $label_nama,
                'label_rumpun' => $label_rumpun,
                'input_nama' => $input_nama,
                'input_rumpun' => $input_rumpun,
                'fe_nama' => $fe_nama,
                'input_id' => $input_id,
                'submit' => $submit,
                'invalid_nama' => $invalid_nama,
            );
            $this->template->load('template/template_v', 'bidang_ilmu/bidang_ilmu_form', $data);
        }
    }

    public function editaction()
    {
        $this->_rules();
        $validation = $this->form_validation->run();
       
        if ($validation == FALSE) {
            $this->update();
        } else {
                $id = $this->input->post('id_bidang_ilmu', TRUE);
                $nama_bidang_ilmu = $this->input->post('nama_bidang_ilmu', TRUE);
                $rumpun_bidang_ilmu = $this->input->post('rumpun_bidang_ilmu', TRUE);
                $data = array(
                    'nama_bidang_ilmu' => $nama_bidang_ilmu,
                    'rumpun_bidang_ilmu' => $rumpun_bidang_ilmu,  
                );
                $this->bim->update_data($id,$data);
                $this->session->set_flashdata('success', 'Data berhasil diubah!');
            }    redirect('bidang_ilmu');
    }
        
    

    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $this->bim->delete_data($id);
        redirect('bidang_ilmu');
    }

    public function _rules()
    {
        $attr_nama = array(
            'required' => 'Nama bidang_ilmu harus di isi!',
        );
        $this->form_validation->set_rules('nama_bidang_ilmu', 'Nama bidang_ilmu', 'trim|required', $attr_nama);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
