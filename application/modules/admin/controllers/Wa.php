<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Wa extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('gateway_model');
            $this->load->model('adminwa_model');
            // check admin groups or not
            $group = array('admin','staff');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }
        
        public function index()
        {
            $this->data['title'] = 'Data Notifikasi Pesan WhatsApp';
            $this->data['breadcrumbs'] = 'Data Notifikasi Pesan WhatsApp';
            $this->load->view('admin/wa/index', $this->data);
        }

        public function gateway()
        {

            $this->data['title'] = 'Setting Gateway dan Admin WA';
            $this->data['breadcrumbs'] = 'Setting Gateway dan Admin WA';
            //get data from idpaket
            $getdt =  $this->gateway_model->get();
            if (!empty($getdt)) {
                $this->data['nmrwa']= $getdt[0]['api_key'];
                $this->data['idwa']= $getdt[0]['id'];
            } else {
                $this->data['nmrwa']="";
                $this->data['idwa']= "";
            }
            $this->load->view('admin/wa/gateway', $this->data);
        }

        public function savenadminwa()
        {
            $nmr = $this->input->post('txtnmradminwa');
            $nama = $this->input->post('txtowner');
            $save = $this->adminwa_model->insert([
                'nmr'=>$nmr,
                'owner'=>$nama
            ]);
            print_r($save);
        }

        public function save_gateway()
        {
            $id = $this->input->post('txtid');
            $nmr = $this->input->post('txtnmrwa');
            if ($id<>'' ) {
                $update = $this->gateway_model->update([
                    'api_key'=>$nmr
                ],$id);
            } else {
                $save = $this->gateway_model->insert([
                    'api_key'=>$nmr
                ]);
            }
            redirect('admin/wa/gateway');
        }




        public function hapusitemwa()
        {
            $id = $this->input->post('id');
            $data = $this->adminwa_model->delete(array(
                'id' =>$id
            ));
            print_r($data);
        }


    }
