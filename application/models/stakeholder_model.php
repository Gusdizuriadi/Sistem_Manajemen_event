<?php

class stakeholder_model extends CI_Model
{

    function get_data()
    {
        return $this->db->get('stakeholder')->result();
    }
    
    function get_sponsor()
    {
        $this->db->select('*');
        return $this->db->get('stakeholder')->result();
    }


    function insert_data($data)
    {
        return $this->db->insert('stakeholder', $data);
    }

    function get_row($id)
    {
        return $this->db->where('id_sponsor', $id)->get('stakeholder');
    }

    function update_data($id, $data)
    {
        return $this->db->where('id_sponsor', $id)->update('stakeholder', $data);
    }

    function delete_data($id)
    {
        return $this->db->where('id_sponsor', $id)->delete('stakeholder');
    }
}