<?php

class User_m extends CI_Model
{

    private $table = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get($this->table);
    }

    public function count_row()
    {
        return $this->db->count_all_results($this->table);
    }

    public function count_available()
    {
        $this->db->like('Status', 'AVAILABLE');
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function count_in_delivery()
    {
        $this->db->like('Status', 'IN_DELIVERY');
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function count_palet_biru()
    {
        $this->db->like('Type', 'PALET_BIRU');
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function count_palet_hijau()
    {
        $this->db->like('Type', 'PALET_HIJAU');
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function count_box_331()
    {
        $this->db->like('Type', 'BOX_331');
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function count_palet_biru_available()
    {
        $this->db->like('Type', 'PALET_BIRU');
        $this->db->like('Status', 'AVAILABLE');
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function count_palet_hijau_available()
    {
        $this->db->like('Type', 'PALET_HIJAU');
        $this->db->like('Status', 'AVAILABLE');
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function count_box_331_available()
    {
        $this->db->like('Type', 'BOX_331');
        $this->db->like('Status', 'AVAILABLE');
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function count_palet_biru_in_delivery()
    {
        $this->db->like('Type', 'PALET_BIRU');
        $this->db->like('Status', 'IN_DELIVERY');
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function count_palet_hijau_in_delivery()
    {
        $this->db->like('Type', 'PALET_HIJAU');
        $this->db->like('Status', 'IN_DELIVERY');
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function count_box_331_in_delivery()
    {
        $this->db->like('Type', 'BOX_331');
        $this->db->like('Status', 'IN_DELIVERY');
        $this->db->from('user');
        return $this->db->count_all_results();
    }

    public function distinct_type()
    {
        $this->db->select('Type');
        $this->db->distinct();
        return $this->db->get($this->table);
    }

    public function distinct_Customer()
    {
        $this->db->select('Customer');
        $this->db->distinct();
        return $this->db->get($this->table);
    }
}
