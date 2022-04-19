<?php


class pendaftaran_peserta extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
   if (!$this->ion_auth->logged_in()) {
        redirect('auth');
    }        $this->load->model('pendaftaran_peserta_model', 'pp');
    }

    public function index()
    {
        $title = 'Data Pendaftaran Peserta';
        $attradd = array('class' => 'btn  btn-gradient-success');
        $btnadd = anchor('pendaftaran_peserta/add', '<i class="feather icon-user-plus"></i>Tambah Peserta', $attradd);
        $get_data = $this->pp->get_data();
        $data = array(
            'pendaftaran_peserta' => $get_data,
            'title' => $title,
            'btntambah' => $btnadd
        );
        $this->template->load('template/template_v', 'pendaftaran_peserta/pendaftaran_peserta_view', $data);
    }


    public function add()
    {
        $title = 'Daftar Peserta';
        $parent = 'Data peserta';

        $attr_form = array(
            'class' => 'needs-validation',
            'novalidate' => 'novalidate'
        );

        $attr_nama_peserta = array(
            'type' => 'text',
            'name' => 'nama_peserta',
            'class' => 'form-control',
            'value' => set_value('nama_peserta'),
            'required' => 'required'
        );
        $attr_jenis_kelamin_peserta = array(
            'type' => 'text',
            'name' => 'jenis_kelamin_peserta',
            'class' => 'form-control',
            'value' => set_value('jenis_kelamin_peserta'),
            'required' => 'required'

        );
        $attr_pendidikan_peserta = array(
            'type' => 'text',
            'name' => 'pendidikan_peserta',
            'class' => 'form-control',
            'value' => set_value('pendidikan_peserta'),
            'required' => 'required'

        );
        $attr_afiliasi_peserta = array(
            'type' => 'text',
            'name' => 'afiliasi_peserta',
            'class' => 'form-control',
            'value' => set_value('afiliasi_peserta'),
            'required' => 'required'

        );
        $attr_email_peserta = array(
            'type' => 'text',
            'name' => 'email_peserta',
            'class' => 'form-control',
            'value' => set_value('email_peserta'),
            'required' => 'required'

        );
        $attr_telp_peserta = array(
            'type' => 'text',
            'name' => 'telp_peserta',
            'class' => 'form-control',
            'value' => set_value('telp_peserta'),
            'required' => 'required'

        );
        $attr_alamat_peserta = array(
            'type' => 'text',
            'name' => 'alamat_peserta',
            'class' => 'form-control',
            'value' => set_value('alamat_peserta'),
            'required' => 'required'

        );
        $attr_provinsi = array(
            'id' => 'provinsi',
            'class' => 'form-control'
        );
        $attr_kabupaten = array(
            'id' => 'kabupaten',
            'class' => 'form-control'
        );
        $attr_event = array(
            'id' => 'event',
            'class' => 'form-control'
        );
        $attr_status_peserta = array(
            'type' => 'text',
            'name' => 'status_peserta',
            'class' => 'form-control',
            'value' => set_value('status_peserta'),
            'required' => 'required'

        );

        $attr_id = array(
            'type' => 'hidden',
            'id' => 'id_pendaftaran_peserta',
            'value' => set_value('id_pendaftaran_peserta')
        );

        $attr_submit = array(
            'id' => 'submit',
            'class' => 'btn btn-gradient-info'
        );

        $get_provinsi = $this->pp->get_provinsi();
        $get_kabupaten = $this->pp->get_kabupaten();
        $get_event = $this->pp->get_event();
        $form_open = form_open_multipart('pendaftaran_peserta/addaction', $attr_form);
        $form_close = form_close();
        $label_nama = form_label('Nama peserta', 'nama_peserta');
        $label_jenis_kelamin_peserta = form_label('Jenis Kelamin', 'jenis_kelamin_peserta');
        $label_pendidikan_peserta = form_label('Pendidikan', 'pendidikan_peserta');
        $label_afiliasi_peserta = form_label('Afiliasi', 'afiliasi_peserta');
        $label_email_peserta = form_label('Email', 'email_peserta');
        $label_telp_peserta = form_label('No Telepon', 'telp_peserta');
        $label_alamat_peserta = form_label('Alamat', 'alamat_peserta');
        $label_provinsi = form_label('Provinsi', 'provinsi');
        $label_kabupaten = form_label('kabupaten', 'kabupaten');
        $label_event = form_label('event', 'event');
        $label_status_peserta = form_label('Status', 'status_peserta');
        $input_nama = form_input($attr_nama_peserta);
        $input_id = form_input($attr_id);
        $input_pendidikan_peserta = form_input($attr_pendidikan_peserta);
        $input_afiliasi_peserta = form_input($attr_afiliasi_peserta);
        $input_jenis_kelamin_peserta = form_input($attr_jenis_kelamin_peserta);
        $input_email_peserta = form_input($attr_email_peserta);
        $input_telp_peserta = form_input($attr_telp_peserta);
        $input_alamat_peserta = form_input($attr_alamat_peserta);
        $input_status_peserta = form_input($attr_status_peserta);
        $invalid_nama = 'Nama peserta harus diisi!';

        $provinsi = array();
        foreach ($get_provinsi as $s) {
            $provinsi[$s->id_provinsi] = $s->nama_provinsi;
        }

        $kabupaten = array();
        foreach ($get_kabupaten as $s) {
            $kabupaten[$s->id_kabupaten] = $s->nama_kabupaten;
        }

        $event = array();
        foreach ($get_event as $s) {
            $event[$s->id_event] = $s->nama_event;
        }
        
        $ddprovinsi = form_dropdown('provinsi', $provinsi, set_value('provinsi'), $attr_provinsi);
        $ddkabupaten = form_dropdown('kabupaten', $kabupaten, set_value('kabupaten'), $attr_kabupaten);
        $ddevent = form_dropdown('event', $event, set_value('event'), $attr_event);
        $fe_nama = form_error('nama_pserta');
        $submit = form_submit('Simpan', 'submit', $attr_submit);
        $data = array(
            'title' => $title,
            'parent' => $parent,
            'form_open' => $form_open,
            'form_close' => $form_close,
            'label_nama' => $label_nama,
            'label_jenis_kelamin_peserta' => $label_jenis_kelamin_peserta,
            'label_pendidikan_peserta' => $label_pendidikan_peserta,
            'label_afiliasi_peserta' => $label_afiliasi_peserta,
            'label_email_peserta' => $label_email_peserta,
            'label_telp_peserta' => $label_telp_peserta,
            'label_alamat_peserta' => $label_alamat_peserta,
            'label_kabupaten' => $label_kabupaten,
            'label_provinsi' => $label_provinsi,
            'label_event' => $label_event,
            'label_status_peserta' => $label_status_peserta,
            'input_nama' => $input_nama,
            'input_jenis_kelamin_peserta' => $input_jenis_kelamin_peserta,
            'input_pendidikan_peserta' => $input_pendidikan_peserta,
            'input_afiliasi_peserta' => $input_afiliasi_peserta,
            'input_email_peserta' => $input_email_peserta,
            'input_telp_peserta' => $input_telp_peserta,
            'input_alamat_peserta' => $input_alamat_peserta,
            'ddkabupaten' => $ddkabupaten,
            'ddprovinsi' => $ddprovinsi,
            'ddevent' => $ddevent,
            'input_status_peserta' => $input_status_peserta,
            'fe_nama' => $fe_nama,
            'input_id' => $input_id,
            'submit' => $submit,
            'invalid_nama' => $invalid_nama,
        );
        $this->template->load('template/template_v', 'pendaftaran_peserta/pendaftaran_peserta_form', $data);
    }

    public function addaction()
    {
                $nama_peserta = $this->input->post('nama_peserta', TRUE);
                $jenis_kelamin_peserta = $this->input->post('jenis_kelamin_peserta', TRUE);
                $pendidikan_peserta = $this->input->post('pendidikan_peserta', TRUE);
                $afiliasi_peserta = $this->input->post('afiliasi_peserta', TRUE);
                $email_peserta = $this->input->post('email_peserta', TRUE);
                $telp_peserta = $this->input->post('telp_peserta', TRUE);
                $alamat_peserta = $this->input->post('alamat_peserta', TRUE);
                $kabupaten = $this->input->post('kabupaten', TRUE);
                $provinsi = $this->input->post('provinsi', TRUE);
                $event = $this->input->post('event', TRUE);
                $status_peserta = $this->input->post('status_peserta', TRUE);
                $data = array(
                    'nama_peserta' => $nama_peserta,
                    'jenis_kelamin_peserta' => $jenis_kelamin_peserta,
                    'pendidikan_peserta' => $pendidikan_peserta,
                    'afiliasi_peserta' => $afiliasi_peserta,
                    'email_peserta' => $email_peserta,
                    'alamat_peserta' => $alamat_peserta,
                    'telp_peserta' => $telp_peserta,
                    'id_kabupaten' => $kabupaten,
                    'id_provinsi' => $provinsi,
                    'id_event' => $event,
                    'status_peserta' => $status_peserta,
                    
                );
                $this->pp->insert_data($data);
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                redirect('pendaftaran_peserta');
        
    }


    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $this->pp->delete_data($id);
        redirect('pendaftaran_peserta');
    }

    public function _rules()
    {
        $attr_nama_peserta = array(
            'required' => 'Nama seminar harus di isi!',
        );
        
        $this->form_validation->set_rules('nama_peserta', 'Nama peserta', 'trim|required', $attr_nama_peserta);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
