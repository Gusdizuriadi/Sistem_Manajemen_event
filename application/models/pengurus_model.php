<?php


defined('BASEPATH') or exit('No direct script access allowed');


class pengurus_model extends CI_Model
{

    
    function lihat_data()
    {
        $this->db->join('divisi', 'divisi.id_divisi = pengurus.id_divisi', 'left');
        $this->db->join('bidang_ilmu', 'bidang_ilmu.id_bidang_ilmu = pengurus.id_bidang_ilmu', 'left');
        $this->db->join('provinsi', 'provinsi.id_provinsi = pengurus.id_provinsi', 'left');
        $this->db->join('kabupaten', 'kabupaten.id_kabupaten = pengurus.id_kabupaten', 'left');
        return $this->db->get('pengurus')->result();
    }


    function get_divisi()
    {
        return $this->db->get('divisi')->result();
    }


    function get_bidang_ilmu()
    {
        return $this->db->get('bidang_ilmu')->result();
    }

    function get_provinsi()
    {
        return $this->db->get('provinsi')->result();
    }


    function get_kabupaten()
    {
        return $this->db->get('kabupaten')->result();
    }


    function insert_data($data)
    {
        return $this->db->insert('pengurus', $data);
    }

    function get_row($id)
    {
        $this->db->where('id_pengurus', $id);
        $this->db->join('divisi', 'divisi.id_divisi = pengurus.id_divisi', 'left');
        $this->db->join('bidang_ilmu', 'bidang_ilmu.id_bidang_ilmu = pengurus.id_bidang_ilmu', 'left');
        $this->db->join('provinsi', 'provinsi.id_provinsi = pengurus.id_provinsi', 'left');
        $this->db->join('kabupaten', 'kabupaten.id_kabupaten = pengurus.id_kabupaten', 'left');
        return   $this->db->get('pengurus');
    }

    function update_data($id, $data)
    {
        $this->db->where('id_pengurus', $id);
        return $this->db->update('pengurus', $data);
    }

    function delete_data($id)
    {
        $this->db->where('id_pengurus', $id);
        return $this->db->delete('pengurus');
    }
}

