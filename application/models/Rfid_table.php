<?php

class Rfid_table extends CI_Model
{

    private $table = 'master';

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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function count_in_delivery()
    {
        $this->db->like('Status', 'IN_DELIVERY');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function count_type($data_type)
    {
        $this->db->like('Type', $data_type);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function count_type_available($data_type)
    {
        $this->db->like('Type', $data_type);
        $this->db->like('Status', 'AVAILABLE');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function count_type_in_delivery($data_type)
    {
        $this->db->like('Type', $data_type);
        $this->db->like('Status', 'IN_DELIVERY');
        $this->db->from($this->table);
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
