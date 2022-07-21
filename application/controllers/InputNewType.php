<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InputNewType extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
        $this->layout = 'template/container';
    }

    public function index()
    {
        $data['data'] = $this->User_m->distinct_type()->result();
        $data['content'] = 'inputNewType';
        $this->load->view($this->layout, $data);
    }

    public function NewType()
    {
        $type = $this->input->post('type');

        $data = array(
            'Type' => $type
        );
        $this->User_m->input_data($data, 'type_table');
        redirect(base_url('#'));
    }
}
