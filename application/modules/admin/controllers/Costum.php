<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Costum extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();

             $this->load->model('umroh_costum_model');
             $this->load->model('order_kostum_umroh_model');
             $this->load->model('refffree_model');
             $this->load->model('reffinclude_model');
             $this->load->model('hotelumroh_model');
             $this->load->model('airlinesumroh_model');
             $this->load->model('busumroh_model');
             $this->load->model('vumrohfree_costum_model');
             $this->load->model('vumrohinclude_costum_model');
             $this->load->model('vumroh_costum_airlines_model');
             $this->load->model('vumroh_costum_hotels_model');
             $this->load->model('vumroh_costum_bus_model');

            //check admin groups or not
            $group = array('admin','staff');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }

        public function index()
        {
            $this->data['title'] = 'Data Pengajuan Kostum Paket Umroh';
            $this->data['breadcrumbs'] = 'Data Pengajuan Kostum Paket Umroh';
            $this->load->view('admin/kostum/index', $this->data);
        }
        public function jadwal()
        {
            $this->data['title'] = 'Data Order Paket Umroh dalam Bentuk Kalendar';
            $this->data['breadcrumbs'] = 'Data Order Paket Umroh dalam Bentuk Kalendar';
            $this->load->view('admin/order/view', $this->data);
        }
        public function saveprice()
        {
            $idpaket = $this->input->post('txtidpaket_costum');
            $harga = str_replace(",","",$this->input->post('txtjumlah'));
            $total = str_replace(",","",$this->input->post('txtgrandtotal'));
            $createdby = $_SESSION['username'];
            $save = $this->umroh_costum_model->update([
                    'price'=>$harga,
                    'total_price'=>$total,
                    'status'=>2,
                    'status_costum'=>'Deal Harga',
                    'modifedby' =>$createdby
            ],$idpaket);
            redirect('admin/costum/');
        }

        public function convert_order($idpaket,$harga)
        {
            $createdby = $_SESSION['username'];
            $save = $this->umroh_costum_model->update([
                'status' =>4,
                'status_costum' =>'Selesai',
                'final_price' =>$harga,
                'modifedby'=>$createdby
            ],$idpaket);
            // insert costum paket umroh into order
            $getdt =  $this->umroh_costum_model->get([
                'idpackage'=>$idpaket
            ]);
            $orderno = $this->autoNumber("order_costum_umroh","orderno","NO-PKU0",7);
            $save = $this->order_kostum_umroh_model->insert([
                'orderno'=>$orderno,
                'idpackage'=>$idpaket,
                'package'=>$getdt[0]['costumpackage'],
                'codepackage'=>$getdt[0]['codepackage'],
                'idagent'=>$getdt[0]['idagent'],
                'agent'=>$getdt[0]['agent'],
                'tglorder'=>$getdt[0]['tglrequest'],
                'tglpaket'=> $getdt[0]['tglberangkat'],
                'harga'=>$getdt[0]['final_price'],
                'qty'=>$getdt[0]['jumlah_jemaah'],
                'total'=> $getdt[0]['total_price'],
                'status'=>0,
                'statusorder'=>'Booking',
                'createdby'=>$createdby
            ]);

            redirect('admin/costum/');
        }
        private function autoNumber($tabel, $kolom, $awalan, $str) {
            $this->db->order_by('idorder ', "desc");
            $this->db->limit(1);
            $query = $this->db->get($tabel);
            $rows = $query->row();
            $rslt = $query->result_array();
            $jum = $query->num_rows();
            if ($jum == 0) {
                $nomor = 1;
            } else {
                $nomor = intval(substr($rslt[0][$kolom],$str)) + 1;
            }
            $id = $awalan.$nomor;
            return $id;
        }
        private function autoNumberpaket($tabel, $kolom, $awalan, $str) {
            $this->db->order_by('idpackage ', "desc");
            $this->db->limit(1);
            $query = $this->db->get($tabel);
            $rows = $query->row();
            $rslt = $query->result_array();
            $jum = $query->num_rows();
            if ($jum == 0) {
                $nomor = 1;
            } else {
                $nomor = intval(substr($rslt[0][$kolom],$str)) + 1;
            }
            $id = $awalan.$nomor;
            return $id;
        }

    }
