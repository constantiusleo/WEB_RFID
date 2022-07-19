<?php

class Total extends CI_Model
{
    private $table = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    public function count_row()
    {
        return $this->db->count_all_results($this->table);
    }
}
