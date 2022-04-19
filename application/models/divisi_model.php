<?php

class divisi_model extends CI_Model
{
    function get_data()
    {
        return $this->db->join('lembaga', 'lembaga.id_lembaga = divisi.id_lembaga', 'left')
            ->get('divisi')->result();
    }

    function get_lembaga()
    {
        return $this->db->get('lembaga')->result();
    }

    function insert_data($data)
    {
        return $this->db->insert('divisi', $data);
    }

    function get_row($id)
    {
        return $this->db->where('id_divisi', $id)->get('divisi');
    }

    function update_data($id, $data)
    {
        return $this->db->where('id_divisi', $id)->update('divisi', $data);
    }

    function delete_data($id)
    {
        return $this->db->where('id_divisi', $id)->delete('divisi');
    }
}
