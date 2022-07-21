<?php

class Tambah_type extends CI_Model
{

    private $table = 'add_type';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get($this->table);
    }

}