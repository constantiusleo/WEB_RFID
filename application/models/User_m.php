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
}
