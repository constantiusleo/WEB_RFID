<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InputNewType extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rfid_table');
        $this->load->model('Type_table');
        $this->load->model('Crud');
        $this->layout = 'template/container';
    }

    public function index()
    {
        $data['data'] = $this->Type_table->get()->result();
        $data['content'] = 'inputNewType';
        $this->load->view($this->layout, $data);
    }

    public function NewType()
    {
        $type = $this->input->post('type');

        $data = array(
            'Type' => $type
        );
        $this->Crud->input_data($data, 'Type_table');
        redirect(base_url('InputNewType'));
    }

    public function del()
    {
        $id = $this->input->post('type');
        $this->Crud->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert( 'Type berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('InputNewType') . "';</script>";
    }
}
