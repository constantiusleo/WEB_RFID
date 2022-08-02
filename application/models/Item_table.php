<?php

class Item_table extends CI_Model
{

    private $table = 'item_table';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get($this->table);
    }

    public function get_table_by_id($id_send)
    {
        $this->db->where('id', $id_send);
        return $this->db->get($this->table);
    }

    public function update_waktu_masuk($data)
    {
        extract($data);
        $this->db->where('EPC', $epc_send);
        $this->db->where('id', $id_send);
        $this->db->update($this->table, array(
            'Waktu_Masuk' => $waktu_masuk_send
        ));
        return true;
    }
}
