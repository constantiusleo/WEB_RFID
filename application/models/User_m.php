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

    public function distinct_type()
    {
        $this->db->select('Type');
        $this->db->distinct();
        return $this->db->get('user');
    }
}
