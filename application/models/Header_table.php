<?php

class Header_table extends CI_Model
{
    private $table = 'header_table';

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get($this->table);
    }

    public function date_check($date_curr_send, $date_header_send)
    {
        $this->db->like('timestamp', $date_curr_send);
        $this->db->from($this->table);

        $count_hasil = $this->db->count_all_results();
        $count_hasil++;

        $item_str = strval($count_hasil);
        return $date_header_send . "_" . sprintf("%03d", $item_str);
    }

    public function get_id($date_curr_send, $customer_send)
    {
        $this->db->select('id');
        $this->db->from($this->table);
        $this->db->like('timestamp', $date_curr_send);
        $this->db->like('Customer', $customer_send);
        return $this->db->get()->row()->id;
    }
}
