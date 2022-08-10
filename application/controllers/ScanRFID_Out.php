<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScanRFID_Out extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rfid_table');
        $this->load->model('Header_table');
        $this->load->model('Crud');
        $this->layout = 'template/container_scan';
    }

    public function index()
    {
        $data['content'] = 'scanRFID_out';
        $data['customer'] = $this->input->post('customer');
        $this->load->view($this->layout, $data);
    }

    public function TagScanned()
    {
        if (isset($_POST['epc_send'])) {
            if (!empty($_POST['epc_send'])) {
                $epc = $this->input->post('epc_send');
                $date = new DateTime("now", new DateTimeZone("Asia/Jakarta"));
                $curr_date = $date->format('Y-m-d');

                $data['status'] = true;
                $data['epc_type'] = $this->Rfid_table->check_Type($epc);
                $data['epc_customer'] = $this->Rfid_table->check_Customer($epc);
                $data['epc_status'] = $this->Rfid_table->check_Status($epc);
                $data['epc_time'] = $curr_date;
                if ('IS_AJAX') {
                    echo json_encode($data);
                }
            }
        }
    }

    public function TagUpdate()
    {
        $date = new DateTime("now", new DateTimeZone("Asia/Jakarta"));
        $curr_date = $date->format('Y-m-d');
        $header_date = $date->format('Ymd');
        $cust_received = $this->input->post('epc_customer');
        $total_received = $this->input->post('epc_total');
        $id_header = $this->Header_table->date_check($curr_date, $header_date);

        $data_header = array(
            'id' => $id_header,
            'Customer' => $cust_received,
            'Transaksi' => "Keluar AISIN",
            'total_tag' => $total_received
        );

        $this->Crud->input_data($data_header, 'header_table');

        foreach ($this->input->post('epc_data_send') as $value) {
            $epc_data = array(
                'epc_send' => $value,
                'customer' => $cust_received,
                'time' => $curr_date,
                'status_change' => "IN_DELIVERY"
            );
            $this->Rfid_table->update_TagsScanned_out($epc_data);

            $data_item = array(
                'id' => $id_header,
                'EPC' => $value,
                'Type' => $this->Rfid_table->check_Type($value),
                'Customer' => $cust_received,
                'Transaksi' => "Keluar AISIN"
            );

            $this->Crud->input_data($data_item, 'item_table');
        }

        $data['status'] = true;
        if ('IS_AJAX') {
            echo json_encode($data);
        }
    }
}
