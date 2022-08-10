<?php

use LDAP\Result;

class Rfid_table extends CI_Model
{

    private $table = 'master';

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
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function count_in_delivery()
    {
        $this->db->like('Status', 'IN_DELIVERY');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function count_type($data_type)
    {
        $this->db->like('Type', $data_type);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function count_type_available($data_type)
    {
        $this->db->like('Type', $data_type);
        $this->db->like('Status', 'AVAILABLE');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function count_type_in_delivery($data_type)
    {
        $this->db->like('Type', $data_type);
        $this->db->like('Status', 'IN_DELIVERY');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function distinct_type()
    {
        $this->db->select('Type');
        $this->db->distinct();
        return $this->db->get($this->table);
    }

    public function distinct_Customer()
    {
        $this->db->select('Customer');
        $this->db->distinct();
        return $this->db->get($this->table);
    }

    public function update_TagsScanned_in($data)
    {
        extract($data);
        $this->db->where('EPC', $epc_send);
        $this->db->update($this->table, array(
            'Status' => $status_change,
            'Last_Seen' => $time
        ));
        return true;
    }

    public function update_TagsScanned_out($data)
    {
        extract($data);
        $this->db->where('EPC', $epc_send);
        $this->db->update($this->table, array(
            'Status' => $status_change,
            'Customer' => $customer,
            'Last_Seen' => $time
        ));
        return true;
    }

    public function check_Type($epc_to_check)
    {
        $this->db->select('Type');
        $this->db->from($this->table);
        $this->db->where('EPC', $epc_to_check);
        return $this->db->get()->row()->Type;
    }

    public function check_Customer($epc_to_check)
    {
        $this->db->select('Customer');
        $this->db->from($this->table);
        $this->db->where('EPC', $epc_to_check);
        return $this->db->get()->row()->Customer;
    }

    public function check_Status($epc_to_check)
    {
        $this->db->select('Status');
        $this->db->from($this->table);
        $this->db->where('EPC', $epc_to_check);
        return $this->db->get()->row()->Status;
    }

    public function check_LastSeen($epc_to_check)
    {
        $this->db->select('Last_Seen');
        $this->db->from($this->table);
        $this->db->where('EPC', $epc_to_check);
        return $this->db->get()->row()->Last_Seen;
    }
}
