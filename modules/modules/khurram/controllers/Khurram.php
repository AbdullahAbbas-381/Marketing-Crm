<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Khurram extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('khurram/Khurram_model');
        $this->load->model('clients_model');
    }

    public function index()
    {
        if ($this->input->post()) {
            $this->Khurram_model->add($this->input->post());
            set_alert('success', _l('khurram_added_successfully'));
            redirect(admin_url('khurram'));
        }

        $data['title']   = _l('khurram');
        $data['clients'] = $this->clients_model->get();
        $data['items']   = $this->Khurram_model->get();

        $this->load->view('khurram/manage', $data);
    }
}
