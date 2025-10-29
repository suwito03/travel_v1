<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Qouta extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('qoutaumroh_model');
            $this->load->model('umroh_model');
            $this->load->model('order_umrah_model');
            // check admin groups or not
            $group = array('admin','staff');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }
        
        public function index()
        {
            $this->data['title'] = 'Data Qouta Paket Umroh';
            $this->data['breadcrumbs'] = 'Data Qouta Paket Umroh';
            $this->load->view('admin/qouta/index', $this->data);
        }

        public function view()
        {
            $this->data['title'] = 'Data Qouta Paket Umroh dalam Bentuk Kalendar';
            $this->data['breadcrumbs'] = 'Data Qouta Paket Umroh dalam Bentuk Kalendar';
            $this->load->view('admin/qouta/view', $this->data);
        }
        public function viewcal()
        {
            $this->data['title'] = 'Data Qouta Paket Umroh dalam Bentuk Kalendar';
            $this->data['breadcrumbs'] = 'Data Qouta Paket Umroh dalam Bentuk Kalendar';
            $this->load->view('admin/qouta/view-cal', $this->data);
        }


        public function save()
        {
            $tgl = $this->input->post('txttgl');
            $qouta = $this->input->post('txtjumlah');
            $idpaket = $this->input->post('txtpilidpaket');
            $nmpaket = $this->input->post('txtpilnama_paket');
            $warna = $this->input->post('txtpilwarna');
            $createdby = $_SESSION['username'];
            $cektgl = $this->qoutaumroh_model->dateexist_idpackage($tgl,$idpaket);
            //get data package
            $getdt =  $this->umroh_model->get([
                'idpackage'=>$idpaket
            ]);
            if ($cektgl) {
                $save = $this->qoutaumroh_model->insert([
                    'tanggal'=>$tgl,
                    'idpackage'=>$idpaket,
                    'package'=>$nmpaket,
                    'qouta'=>$qouta,
                    'sisa'=>$qouta,
                    'book'=>0,
                    'price'=>$getdt[0]['price'],
                    'desc'=>$qouta." Orang",
                    'color'=>$warna,
                    'calendar'=>$getdt[0]['type'],
                    'start'=>$tgl." 00:00:00",
                    'end'=>$tgl." 00:00:00",
                    'allday'=>'true',
                    'createdby' =>$createdby
                ]);
            }
            redirect('admin/qouta/index');
        }

        public function savebook()
        {
            $jumlah = $this->input->post('txtjumlah');
            $Idqouta= $this->input->post('txtidqouta');
            $idpaket = $this->input->post('txtidpaket');
            $createdby = $_SESSION['username'];
            $getdt =  $this->umroh_model->get([
                'idpackage'=>$idpaket
            ]);
            $total = intval($getdt[0]['price']) * $jumlah ;
            $tgl=date("Y-m-d");
            //= $this->order_umrah_model->existitem($idqouta,$tgl, $createdby);
           // if($checkitem) {
                $save = $this->order_umrah_model->insert([
                    'idqouta' =>$Idqouta,
                    'idpackage'=>$idpaket,
                    'idagent'=>0,
                    'harga'=>$getdt[0]['price'],
                    'package'=>$getdt[0]['name'],
                    'qty'=>$jumlah,
                    'total'=> $total,
                    'tglorder'=>$tgl,
                    'status'=>0,
                    'statusorder'=>'booking',
                    'createdby'=>$createdby
                ]);
           // }
            print_r($save);
        }

//        public function update()
//        {
//            $idqouta = $this->input->post('txtidqouta');
//            $tgl = $this->input->post('txttgledit');
//            $qouta = $this->input->post('txtjumlahedit');
//            $createdby = $_SESSION['username'];
//            $cektgl = $this->qouta_model->dateexist($tgl);
//            if ($cektgl) {
//                $save = $this->qouta_model->update([
//                    'tanggal'=>$tgl,
//                    'qouta'=>$qouta,
//                    'start'=>$tgl." 00:00:00",
//                    'end'=>$tgl." 00:00:00",
//                    'modifedby' =>$createdby
//                ],$idqouta);
//            }
//            redirect('admin/qouta/index');
//        }

        public function hapus($id)
        {
            $data = $this->qoutaumroh_model->delete(array(
                'Idqouta' =>$id
            ));
            redirect('admin/qouta/index');
        }


    }
