<?php

class kategori_agenda_model extends CI_Model
{

    function get_data()
    {
        return $this->db->get('kategori_agenda')->result();
    }


    function insert_data($data)
    {
        return $this->db->insert('kategori_agenda', $data);
    }

    function get_row($id)
    {
        return $this->db->where('id_kategori_agenda', $id)->get('kategori_agenda');
    }

    function update_data($id, $data)
    {
        return $this->db->where('id_kategori_agenda', $id)->update('kategori_agenda', $data);
    }

    function delete_data($id)
    {
        return $this->db->where('id_kategori_agenda', $id)->delete('kategori_agenda');
   
}
}