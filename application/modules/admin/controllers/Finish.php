<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Finish extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();

            //check admin groups or not
            $group = array('admin','staff');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }

        public function index()
        {
            $this->data['title'] = 'History Data Order Paket Umroh';
            $this->data['breadcrumbs'] = 'History Data Order Paket Umroh';
            $this->load->view('admin/finish/index', $this->data);
        }

        public function costum()
        {
            $this->data['title'] = 'History Data Order Kostum Paket Umroh';
            $this->data['breadcrumbs'] = 'History Data Order Paket Umroh';
            $this->load->view('admin/finish/kostum', $this->data);
        }


    }
