<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class History extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('paidpaket_umrah_model');
            $this->load->model('paidpaket_umrahcostum_model');
            $this->load->model('qoutaumroh_model');
            $this->load->model('umroh_model');
            $this->load->model('order_umrah_model');
            $this->load->model('order_kostum_umroh_model');
            // check admin groups or not
            $group = array('admin','staff');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }
        
        public function index()
        {
            $this->data['title'] = 'Data Riwayat Pembayaran Paket Umroh';
            $this->data['breadcrumbs'] = 'Data Riwayat Pembayaran Paket Umroh';
            $this->load->view('admin/history/index', $this->data);
        }

        public function costum()
        {
            $this->data['title'] = 'Data Riwayat Pembayaran Kostum Paket Umroh';
            $this->data['breadcrumbs'] = 'Data Riwayat Pembayaran Kostum Paket Umroh';
            $this->load->view('admin/history/costum', $this->data);
        }

        public function konfirm_bayar($idpaid,$idorder)
        {
            //cek date order paket umroh
            $getdtorder =  $this->order_umrah_model->get([
                'idorder'=>$idorder
            ]);
            //cek date paid_paket_umroh
            $getdtpaid =  $this->paidpaket_umrah_model->get([
                'idpaid'=>$idpaid
            ]);
            //check payment
            if($getdtpaid[0]['tipe_pembayaran']==1) {
                $isdp=1;
                $dp= $getdtpaid[0]['jumlah'];
                $sisa = $getdtorder[0]['total'] - $getdtpaid[0]['jumlah'];
                $lunas=0;
                $statusbayar ="Pembayaran DP";
                $islunas=0;
                $status =2;
                $staorder='Pembayaran DP';
            } else if ($getdtpaid[0]['tipe_pembayaran']==2) {
                $isdp=1;
                $dp= $getdtorder[0]['totaldp'];
                $sisa = $getdtorder[0]['sisa'] - $getdtpaid[0]['jumlah'];
                $lunas= $getdtpaid[0]['jumlah'] ;
                $statusbayar ="Pelunasan";
                $islunas=1;
                $status =3;
                $staorder='Pelunasan DP';
            } else if ($getdtpaid[0]['tipe_pembayaran']==3) {
                $isdp=0;
                $dp= 0;
                $sisa = 0;
                $lunas=$getdtpaid[0]['jumlah'] ;
                $statusbayar ="Pembayaran Full";
                $islunas=1;
                $status =3;
                $staorder='Pembayaran Penuh';
            }
            //update table order paket umroh
            $save = $this->order_umrah_model->update([
                'isdp' =>$isdp,
                'islunas' =>$islunas,
                'totaldp'=>$dp,
                'status'=>$status,
                'sisa'=>$sisa,
                'lunas'=>$lunas,
                'statusbayar'=>$statusbayar,
                'statusorder'=>$staorder,
            ],$idorder);
            //update table paid paket umroh
            $createdby = $_SESSION['username'];
            $save = $this->paidpaket_umrah_model->update([
                'status' =>2,
                'status_bayar'=>"Pembayaran diterima",
                'modifedby'=>$createdby
            ],$idpaid);
            redirect('admin/history/');
        }

        public function hapus_bayar($idpaid,$alasan)
        {
            //update table paid paket umroh
            $createdby = $_SESSION['username'];
            $save = $this->paidpaket_umrah_model->update([
                'isvoid' =>1,
                'status_bayar'=>"Pembayaran ditolak",
                'alasan_reject'=>$alasan,
                'modifedby'=>$createdby
            ],$idpaid);
            redirect('admin/history/');
        }

        public function konfirm_bayar_costum($idpaid,$idorder)
        {
            //cek date order paket umroh
            $getdtorder =  $this->order_kostum_umroh_model->get([
                'idorder'=>$idorder
            ]);
            //cek date paid_paket_umroh
            $getdtpaid =  $this->paidpaket_umrahcostum_model->get([
                'idpaid'=>$idpaid
            ]);
            //check payment
            if($getdtpaid[0]['tipe_pembayaran']==1) {
                $isdp=1;
                $dp= $getdtpaid[0]['jumlah'];
                $sisa = $getdtorder[0]['total'] - $getdtpaid[0]['jumlah'];
                $lunas=0;
                $statusbayar ="Pembayaran DP";
                $islunas=0;
                $status =2;
                $staorder='Pembayaran DP';
            } else if ($getdtpaid[0]['tipe_pembayaran']==2) {
                $isdp=1;
                $dp= $getdtorder[0]['totaldp'];
                $sisa = $getdtorder[0]['sisa'] - $getdtpaid[0]['jumlah'];
                $lunas= $getdtpaid[0]['jumlah'] ;
                $statusbayar ="Pelunasan";
                $islunas=1;
                $status =3;
                $staorder='Pelunasan DP';
            } else if ($getdtpaid[0]['tipe_pembayaran']==3) {
                $isdp=0;
                $dp= 0;
                $sisa = 0;
                $lunas=$getdtpaid[0]['jumlah'] ;
                $statusbayar ="Pembayaran Full";
                $islunas=1;
                $status =3;
                $staorder='Pembayaran Penuh';
            }
            //update table order paket umroh
            $save = $this->order_kostum_umroh_model->update([
                'isdp' =>$isdp,
                'islunas' =>$islunas,
                'totaldp'=>$dp,
                'status'=>$status,
                'sisa'=>$sisa,
                'lunas'=>$lunas,
                'statusbayar'=>$statusbayar,
                'statusorder'=>$staorder,
            ],$idorder);
            //update table paid paket umroh
            $createdby = $_SESSION['username'];
            $save = $this->paidpaket_umrahcostum_model->update([
                'status' =>2,
                'status_bayar'=>"Pembayaran diterima",
                'modifedby'=>$createdby
            ],$idpaid);
            redirect('admin/history/costum');
        }

        public function hapus_bayar_costum($idpaid,$alasan)
        {
            //update table paid paket umroh
            $createdby = $_SESSION['username'];
            $save = $this->paidpaket_umrahcostum_model->update([
                'isvoid' =>1,
                'status_bayar'=>"Pembayaran ditolak",
                'alasan_reject'=>$alasan,
                'modifedby'=>$createdby
            ],$idpaid);
            redirect('admin/history/costum');
        }

    }
