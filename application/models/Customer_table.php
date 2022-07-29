<?php

class Customer_table extends CI_Model
{

    private $table = 'Customer_table';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get($this->table);
    }
}
