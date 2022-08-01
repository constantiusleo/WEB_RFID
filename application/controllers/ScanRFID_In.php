<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScanRFID_In extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rfid_table');
        $this->load->model('Crud');
        $this->layout = 'template/container';
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
                $curr_date = $date->format('Y-m-d ');

                $epc_data = array(
                    'epc_send' => $epc,
                    'time' => $curr_date,
                    'status_change' => "AVAILABLE"
                );

                $this->Rfid_table->update_TagsScanned_in($epc_data);

                $data['status'] = true;
                $data['epc_received'] = $this->Rfid_table->check_Type($epc);
                $data['epc_time'] = $curr_date;
                if ('IS_AJAX') {
                    echo json_encode($data);
                }
            }
        }
    }
}
