<?php

class kabupaten_model extends CI_Model
{
    function get_data()
    {
        return $this->db->join('provinsi', 'provinsi.id_provinsi = kabupaten.id_provinsi', 'left')
            ->get('kabupaten')->result();
    }

    function get_provinsi()
    {
        return $this->db->get('provinsi')->result();
    }

    function insert_data($data)
    {
        return $this->db->insert('kabupaten', $data);
    }

    function get_row($id)
    {
        return $this->db->where('id_kabupaten', $id)->get('kabupaten');
    }

    function update_data($id, $data)
    {
        return $this->db->where('id_kabupaten', $id)->update('kabupaten', $data);
    }

    function delete_data($id)
    {
        return $this->db->where('id_kabupaten', $id)->delete('kabupaten');
    }
}
