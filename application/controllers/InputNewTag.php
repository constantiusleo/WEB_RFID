<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InputNewTag extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rfid_table');
        $this->load->model('Type_table');
        $this->load->model('Crud');
        $this->layout = 'template/container';
        $this->load->helper('form');
    }

    public function index()
    {
        $data['data'] = $this->Type_table->get()->result();
        $data['content'] = 'inputNewTag';
        $this->load->view($this->layout, $data);
    }

    public function NewTag()
    {
        $type = $this->input->post('select_type');
        for ($i = 1; $i <= $this->input->post('number'); $i++) {
            $EPC = $this->input->post("epc_" . $i);
            $data = array(
                'EPC' => $EPC,
                'Type' => $type,
                'Status' => 'AVAILABLE'
            );
            $this->Crud->input_data($data, 'master');
        }
        redirect(base_url('#'));
    }
}
