<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Notif extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('gateway_model');
            $this->load->model('adminwa_model');
            $this->load->model('notif_model');

            //check admin groups or not
            $group = array('admin','staff');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }

        public function index()
        {
            $this->data['title'] = 'Data Notifikasi WhatsApp';
            $this->data['breadcrumbs'] = 'Data Notifikasi WhatsApp';
            $this->load->view('admin/notifikasi/index', $this->data);
        }



    }
