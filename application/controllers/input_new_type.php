<?php
defined('BASEPATH') or exit('No direct script access allowed');

class input_new_type extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
        $this->layout = 'template/container';
    }

    public function index()
    {
        $data['content'] = 'new_type';
        $this->load->view($this->layout, $data);
    }
}
