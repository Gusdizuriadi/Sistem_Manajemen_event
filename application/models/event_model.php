<?php


defined('BASEPATH') or exit('No direct script access allowed');


class event_model extends CI_Model
{

    
    function get_data()
    {
        $this->db->join('narasumber', 'narasumber.id_narasumber = event.id_narasumber', 'left');
        $this->db->join('kategori_agenda', 'kategori_agenda.id_kategori_agenda = event.id_kategori_agenda', 'left');
        $this->db->join('bidang_ilmu', 'bidang_ilmu.id_bidang_ilmu = event.id_bidang_ilmu', 'left');
        $this->db->join('lembaga', 'lembaga.id_lembaga = event.id_lembaga', 'left');
        return $this->db->get('event')->result();
    }

    function event_utama()
    {
        
        $this->db->join('narasumber', 'narasumber.id_narasumber = event.id_narasumber', 'left');
        $this->db->join('kategori_agenda', 'kategori_agenda.id_kategori_agenda = event.id_kategori_agenda', 'left');
        $this->db->join('bidang_ilmu', 'bidang_ilmu.id_bidang_ilmu = event.id_bidang_ilmu', 'left');
        $this->db->join('lembaga', 'lembaga.id_lembaga = event.id_lembaga', 'left');
        return $this->db->get('event')->result();
    }

    function detail_event($id_event)
    {
        $this->db->where('id_event', $id_event);
        $this->db->join('narasumber', 'narasumber.id_narasumber = event.id_narasumber', 'left');
        $this->db->join('kategori_agenda', 'kategori_agenda.id_kategori_agenda = event.id_kategori_agenda', 'left');
        $this->db->join('bidang_ilmu', 'bidang_ilmu.id_bidang_ilmu = event.id_bidang_ilmu', 'left');
        $this->db->join('lembaga', 'lembaga.id_lembaga = event.id_lembaga', 'left');
        return$this->db->get('event')->result();
    }


    function get_narasumber()
    {
        return $this->db->get('narasumber')->result();
    }


    function get_kategori_agenda()
    {
        return $this->db->get('kategori_agenda')->result();
    }

    function get_bidang_ilmu()
    {
        return $this->db->get('bidang_ilmu')->result();
    }


    function get_lembaga()
    {
        return $this->db->get('lembaga')->result();
    }


    function insert_data($data)
    {
        return $this->db->insert('event', $data);
    }

    function get_row($id)
    {
        $this->db->where('id_event', $id);
        $this->db->join('narasumber', 'narasumber.id_narasumber = event.id_narasumber', 'left');
        $this->db->join('kategori_agenda', 'kategori_agenda.id_kategori_agenda = event.id_kategori_agenda', 'left');
        $this->db->join('bidang_ilmu', 'bidang_ilmu.id_bidang_ilmu = event.id_bidang_ilmu', 'left');
        $this->db->join('lembaga', 'lembaga.id_lembaga = event.id_lembaga', 'left');
        return$this->db->get('event');
    }

    function update_data($id, $data)
    {
        $this->db->where('id_event', $id);
        return $this->db->update('event', $data);
    }

    function delete_data($id)
    {
        $this->db->where('id_event', $id);
        return $this->db->delete('event');
    }
}

