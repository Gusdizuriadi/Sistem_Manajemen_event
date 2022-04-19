<?php

class narasumber_model extends CI_Model
{
    function get_data()
    {
            $this->db->join('bidang_ilmu', 'bidang_ilmu.id_bidang_ilmu = narasumber.id_bidang_ilmu', 'left');
            $this->db->join('provinsi', 'provinsi.id_provinsi = narasumber.id_provinsi', 'left');
         return $this->db->get('narasumber')->result();
    }

    function get_bidang_ilmu()
    {
        return $this->db->get('bidang_ilmu')->result();
    }

    function get_provinsi()
    {
        return $this->db->get('provinsi')->result();
    }

    function insert_data($data)
    {
        return $this->db->insert('narasumber', $data);
    }

    function get_row($id)
    {
        return $this->db->where('id_narasumber', $id)->get('narasumber');
    }

    function update_data($id, $data)
    {
        return $this->db->where('id_narasumber', $id)->update('narasumber', $data);
    }

    function delete_data($id)
    {
        return $this->db->where('id_narasumber', $id)->delete('narasumber');
    }
}
