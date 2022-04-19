<?php

class lembaga_model extends CI_Model
{

    function get_data()
    {
        return $this->db->get('lembaga')->result();
    }


    function insert_data($data)
    {
        return $this->db->insert('lembaga', $data);
    }

    function get_row($id)
    {
        return $this->db->where('id_lembaga', $id)->get('lembaga');
    }

    function update_data($id, $data)
    {
        return $this->db->where('id_lembaga', $id)->update('lembaga', $data);
    }

    function delete_data($id)
    {
        return $this->db->where('id_lembaga', $id)->delete('lembaga');
   
}
}