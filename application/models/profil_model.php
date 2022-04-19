<?php

class profil_model extends CI_Model
{

    function get_data()
    {
        return $this->db->get('profil')->result();
    }


    function insert_data($data)
    {
        return $this->db->insert('profil', $data);
    }

    function get_row($id)
    {
        return $this->db->where('id_profil', $id)->get('profil');
    }

    function update_data($id, $data)
    {
        return $this->db->where('id_profil', $id)->update('profil', $data);
    }

    function delete_data($id)
    {
        return $this->db->where('id_profil', $id)->delete('profil');
   
}
}