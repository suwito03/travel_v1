<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Tour extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('qouta_model');
            $this->load->model('tour_model');
            // check admin groups or not
            $group = array('admin','staff');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }
        
        public function index()
        {
            $this->data['title'] = 'Data Paket Tour';
            $this->data['breadcrumbs'] = 'Data Paket Tour';
            $this->load->view('admin/tour/index', $this->data);
        }

        public function view()
        {
            $this->data['title'] = 'Data Calendar Tour';
            $this->data['breadcrumbs'] = 'Data Calendar Tour';
            $this->load->view('admin/tour/view', $this->data);
        }

        public function add()
        {
            $this->data['title'] = 'Tambah Data Paket Tour';
            $this->data['breadcrumbs'] = 'Tambah Paket Tour';
            $this->load->view('admin/tour/add', $this->data);
        }

        public function save()
        {
            $tgl = $this->input->post('txttgl');
            $qouta = $this->input->post('txtjumlah');
            $createdby = $_SESSION['username'];
            $cektgl = $this->qouta_model->dateexist($tgl);
            if ($cektgl) {
                $save = $this->qouta_model->insert([
                    'tanggal'=>$tgl,
                    'qouta'=>$qouta,
                    'start'=>$tgl." 00:00:00",
                    'end'=>$tgl." 00:00:00",
                    'allday'=>'true',
                    'createdby' =>$createdby
                ]);
            }
            redirect('admin/tour/index');
        }

        public function update()
        {
            $idqouta = $this->input->post('txtidqouta');
            $tgl = $this->input->post('txttgledit');
            $qouta = $this->input->post('txtjumlahedit');
            $createdby = $_SESSION['username'];
            $cektgl = $this->qouta_model->dateexist($tgl);
            if ($cektgl) {
                $save = $this->qouta_model->update([
                    'tanggal'=>$tgl,
                    'qouta'=>$qouta,
                    'start'=>$tgl." 00:00:00",
                    'end'=>$tgl." 00:00:00",
                    'modifedby' =>$createdby
                ],$idqouta);
            }
            redirect('admin/tour/index');
        }

        public function hapus($id)
        {
            $data = $this->qouta_model->delete(array(
                'Idqouta' =>$id
            ));
            redirect('admin/tour/index');
        }


    }
