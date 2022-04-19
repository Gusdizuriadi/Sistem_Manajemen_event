<?php

class donwload_model extends CI_Model
{

    function get_data()
    {
        return $this->db->get('donwload')->result();
    }


    function insert_data($data)
    {
        return $this->db->insert('donwload', $data);
    }

    function get_row($id)
    {
        return $this->db->where('id_donwload', $id)->get('donwload');
    }

    function update_data($id, $data)
    {
        return $this->db->where('id_donwload', $id)->update('donwload', $data);
    }

    function delete_data($id)
    {
        return $this->db->where('id_donwload', $id)->delete('donwload');
    }
}