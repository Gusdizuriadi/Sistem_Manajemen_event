<?php

class bidang_ilmu_model extends CI_Model
{

    function get_data()
    {
        return $this->db->get('bidang_ilmu')->result();
    }


    function insert_data($data)
    {
        return $this->db->insert('bidang_ilmu', $data);
    }

    function get_row($id)
    {
        return $this->db->where('id_bidang_ilmu', $id)->get('bidang_ilmu');
    }

    function update_data($id, $data)
    {
        return $this->db->where('id_bidang_ilmu', $id)->update('bidang_ilmu', $data);
    }

    function delete_data($id)
    {
        return $this->db->where('id_bidang_ilmu', $id)->delete('bidang_ilmu');
   
}
}