<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScanRFID_In extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rfid_table');
        $this->load->model('Header_table');
        $this->load->model('Item_table');
        $this->load->model('Crud');
        $this->layout = 'template/container_scan';
    }

    public function index()
    {
        $data['content'] = 'scanRFID_in';
        $this->load->view($this->layout, $data);
    }

    public function TagScanned()
    {
        if (isset($_POST['epc_send'])) {
            if (!empty($_POST['epc_send'])) {
                $epc = $this->input->post('epc_send');
                $date = new DateTime("now");
                $curr_date = $date->format('Y-m-d');
                $waktu_masuk = $date->setTimezone(new DateTimeZone('Asia/Jakarta'))->format('Y-m-d H:i:s');

                $epc_data = array(
                    'epc_send' => $epc,
                    'time' => $curr_date,
                    'status_change' => "AVAILABLE"
                );

                $this->Rfid_table->update_TagsScanned_in($epc_data);

                $test_Customer = $this->Rfid_table->check_Customer($epc);
                $test_LS = $this->Rfid_table->check_LastSeen($epc);
                $data_id = $this->Header_table->get_id($test_LS, $test_Customer);

                $item_data = array(
                    'epc_send' => $epc,
                    'id_send' => $data_id,
                    'waktu_masuk_send' => $waktu_masuk
                );

                $this->Item_table->update_waktu_masuk($item_data);

                $data['status'] = true;
                $data['epc_type'] = $this->Rfid_table->check_Type($epc);
                $data['epc_customer'] = $this->Rfid_table->check_Customer($epc);
                $data['epc_time'] = $curr_date;
                if ('IS_AJAX') {
                    echo json_encode($data);
                }
            }
        }
    }
}
