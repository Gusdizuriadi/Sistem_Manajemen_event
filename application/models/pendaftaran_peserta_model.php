<?php

class pendaftaran_peserta_model extends CI_Model
{
    function get_data()
    {
            $this->db->join('provinsi', 'provinsi.id_provinsi = pendaftaran_peserta.id_provinsi', 'left');
            $this->db->join('kabupaten', 'kabupaten.id_kabupaten = pendaftaran_peserta.id_kabupaten', 'left');
            $this->db->join('event', 'event.id_event = pendaftaran_peserta.id_event', 'left');
         return $this->db->get('pendaftaran_peserta')->result();
    }

    function get_provinsi()
    {
        return $this->db->get('provinsi')->result();
    }

    function get_kabupaten()
    {
        return $this->db->get('kabupaten')->result();
    }

    function get_event()
    {
        return $this->db->get('event')->result();
    }

    function insert_data($data)
    {
        return $this->db->insert('pendaftaran_peserta', $data);
    }

    function get_row($id)
    {
        return $this->db->where('id_peserta', $id)->get('pendaftaran_peserta');
    }

    function update_data($id, $data)
    {
        return $this->db->where('id_peserta', $id)->update('pendaftaran_peserta', $data);
    }

    function delete_data($id)
    {
        return $this->db->where('id_peserta', $id)->delete('pendaftaran_peserta');
    }
}
