<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ScanRFID extends CI_Controller
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
        $data['content'] = 'scanRFID';
        $data_temp = $this->Rfid_table->check_Type("0C00 2802 9C13 0124 9000 3B3B 2C01")->result();
        $data['data'] = $data_temp->Type;
        $data['customer'] = $this->input->post('customer');
        $this->load->view($this->layout, $data);
    }

    public function TagScanned()
    {
        $type = $this->input->post('costumer_data');
        for ($i = 1; $i <= $this->input->post('number'); $i++) {
            $EPC = $this->input->post("epc_" . $i);
            $data = array(
                'EPC' => $EPC,
                'Status' => 'IN_DELIVERY',
                'Last_Seen' => 'current_timestamp()'
            );
            $this->Crud->input_data($data, 'master');
        }
        redirect(base_url('#'));
    }
    public function TagType()
    {
        if (isset($_POST['epc_send'])) {
            if (!empty($_POST['epc_send'])) {
                $epc = $_POST['epc_send'];
                $data_type = $this->Rfid_table->check_Type($epc)->result();
                $data_type_a = $data_type["Type"];
                echo $data_type_a;
            }
        }
    }
}
