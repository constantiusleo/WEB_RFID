<?php

class Type_table extends CI_Model
{

    private $table = 'Type_table';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get($this->table);
    }
}
