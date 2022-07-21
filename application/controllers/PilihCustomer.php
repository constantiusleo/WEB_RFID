<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PilihCustomer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
        $this->layout = 'template/container';
    }

    public function index()
    {
        $data['data'] = $this->User_m->distinct_Customer()->result();
        $data['content'] = 'pilihCustomer';
        $this->load->view($this->layout, $data);
    }
}
