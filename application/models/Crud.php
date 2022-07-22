<?php

class Crud extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($data, $table)
    {
        $this->db->where($data);
        $this->db->delete($table);
    }    
}
