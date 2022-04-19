<?php

class Provinsi_model extends CI_Model
{

    function get_data()
    {
        return $this->db->get('provinsi')->result();
    }


    function insert_data($data)
    {
        return $this->db->insert('provinsi', $data);
    }

    function get_row($id)
    {
        return $this->db->where('id_provinsi', $id)->get('provinsi');
    }

    function update_data($id, $data)
    {
        return $this->db->where('id_provinsi', $id)->update('provinsi', $data);
    }

    function delete_data($id)
    {
        return $this->db->where('id_provinsi', $id)->delete('provinsi');
   
}
}