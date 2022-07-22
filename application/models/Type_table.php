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

    public function del($id)
    {
        $this->db->where('Type',$id);
        $this->db->delete('type_table');
    }
}
