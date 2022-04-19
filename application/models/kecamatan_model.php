<?php

class kecamatan_model extends CI_Model
{
    function get_data()
    {
        return $this->db->join('kabupaten', 'kabupaten.id_kabupaten = kecamatan.id_kabupaten', 'left')
            ->get('kecamatan')->result();
    }

    function get_kabupaten()
    {
        return $this->db->get('kabupaten')->result();
    }

    function insert_data($data)
    {
        return $this->db->insert('kecamatan', $data);
    }

    function get_row($id)
    {
        return $this->db->where('id_kecamatan', $id)->get('kecamatan');
    }

    function update_data($id, $data)
    {
        return $this->db->where('id_kecamatan', $id)->update('kecamatan', $data);
    }

    function delete_data($id)
    {
        return $this->db->where('id_kecamatan', $id)->delete('kecamatan');
    }
}
