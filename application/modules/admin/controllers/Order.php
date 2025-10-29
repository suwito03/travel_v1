<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Order extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('qoutaumroh_model');
            $this->load->model('order_umrah_model');
            $this->load->model('order_kostum_umroh_model');
            $this->load->model('umroh_model');
            $this->load->model('umroh_costum_jamaah_model');
            $this->load->model('agent_model');
            $this->load->model('vorder_all_model');
            // check admin groups or not
            $group = array('admin','staff','agent');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }
        
        public function index()
        {
            $this->data['title'] = 'Data Order Paket Umroh';
            $this->data['breadcrumbs'] = 'Data Order Paket Umroh';
            $this->load->view('admin/order/index', $this->data);
        }

        public function costum()
        {
            $this->data['title'] = 'Data Order Kostum Paket Umroh';
            $this->data['breadcrumbs'] = 'Data Order Kostum Paket Umroh';
            $this->load->view('admin/order/kostum', $this->data);
        }

        public function jadwal()
        {
            $this->data['title'] = 'Data Order Paket Umroh dalam Bentuk Kalendar';
            $this->data['breadcrumbs'] = 'Data Order Paket Umroh dalam Bentuk Kalendar';
            $this->load->view('admin/order/view', $this->data);
        }

        public function viewcostum()
        {
            $this->data['title'] = 'Data Order Kostum Paket Umroh dalam Bentuk Kalendar';
            $this->data['breadcrumbs'] = 'Data Order Kostum Paket Umroh dalam Bentuk Kalendar';
            $this->load->view('admin/order/viewcostum', $this->data);
        }


        public function saveorder_via_agent()
        {
            $orderno = $this->autoNumber("order_umroh","orderno","NO-PU00",7);
            $jumlah = $this->input->post('txtjumlah');
            $idagent = $this->input->post('txtpilidagent');
            $nmpaket = $this->input->post('txtpilnama_paket');
            $Idqouta= $this->input->post('txtpilidqouta');
            $createdby = $_SESSION['username'];
            //check data qouta
            $getdt =  $this->qoutaumroh_model->get([
                'Idqouta'=>$Idqouta
            ]);
            $total = intval($getdt[0]['price']) * $jumlah ;
            $tgl=date("Y-m-d");


            //= $this->order_umrah_model->existitem($idqouta,$tgl, $createdby);
            // if($checkitem) {
            $save = $this->order_umrah_model->insert([
                'idqouta' =>$Idqouta,
                'orderno'=>$orderno,
                'idpackage'=>$getdt[0]['idpackage'],
                'idagent'=>$idagent,
                'harga'=>$getdt[0]['price'],
                'package'=>$nmpaket,
                'qty'=>$jumlah,
                'total'=> $total,
                'tglorder'=>$tgl,
                'tglpaket'=> $getdt[0]['tanggal'],
                'status'=>0,
                'statusorder'=>'Booking',
                'createdby'=>$createdby
            ]);
            redirect('admin/order/index');
        }

        public function konfirmasi($idorder,$idqouta)
        {
            //update table order
            $createdby = $_SESSION['username'];
            $save = $this->order_umrah_model->update([
                'status' =>1,
                'statusorder'=>'Proses',
                'modifedby'=>$createdby
            ],$idorder);
            //get data from table order
            $getdtorder =  $this->order_umrah_model->get([
                'idorder'=>$idorder
            ]);
            //get data from table qouta
            $getdtqouta =  $this->qoutaumroh_model->get([
                'Idqouta'=>$idqouta
            ]);
            if ($getdtqouta[0]['sisa'] == 0) {
                 $sisa= $getdtqouta[0]['qouta'] - $getdtorder[0]['qty'];
                 $book = $getdtorder[0]['qty'];
            } else {
                 $sisa= intval($getdtqouta[0]['sisa']) - intval($getdtorder[0]['qty']);
                 $book = intval($getdtqouta[0]['book']) - intval($getdtorder[0]['qty']);
            }

            //update table qouta
            $save = $this->qoutaumroh_model->update([
                'book'=>$book,
                'sisa'=>$sisa,
                'modifedby'=>$createdby
            ],$idqouta);
            redirect('admin/order/index');
        }

        public function konfirmasi_costum($idorder,$idqouta)
        {
            //update table order
            $createdby = $_SESSION['username'];
            $save = $this->order_kostum_umroh_model->update([
                'status' =>1,
                'statusorder'=>'Proses',
                'modifedby'=>$createdby
            ],$idorder);

            redirect('admin/order/costum');
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
            // cek agent
            $iduser = $_SESSION['user_id'];
            $getdtagent =  $this->agent_model->get([
                'iduser'=>$iduser
            ]);
            if ($getdtagent[0]['idagent']=='') {
                $idagent='';
            } else {
                $idagent=$getdtagent[0]['idagent'];
            }
            //cek date qouta package
            $getdtqouta =  $this->qoutaumroh_model->get([
                'idpackage'=>$idpaket
            ]);
            //= $this->order_umrah_model->existitem($idqouta,$tgl, $createdby);
           // if($checkitem) {
                $save = $this->order_umrah_model->insert([
                    'idqouta' =>$Idqouta,
                    'idpackage'=>$idpaket,
                    'idagent'=>$idagent,
                    'harga'=>$getdt[0]['price'],
                    'package'=>$getdt[0]['name'],
                    'qty'=>$jumlah,
                    'total'=> $total,
                    'tglorder'=>$tgl,
                    'tglpaket'=> $getdtqouta[0]['tanggal'],
                    'status'=>0,
                    'statusorder'=>'booking',
                    'createdby'=>$createdby
                ]);
           // }
            print_r($save);
        }

        public function getdtpaket_umroh($id)
        {
            //get dt package umroh
            $data['lstdtpaket_umroh'] = $this->umroh_model -> get(array(
                'idpackage' => $id
            ));
            //get dt airline
            $data['lstdtairlines'] = $this->vumroh_airlines_model -> get(array(
                'idpackage' => $id
            ));
            //get dt bus
            $data['lstdtbus'] = $this->vumroh_bus_model -> get(array(
                'idpackage' => $id
            ));
            //get dt hotel
            $data['lstdthotel'] = $this->vumroh_hotels_model -> get(array(
                'idpackage' => $id
            ));
            //get dt free
            $data['lstdtitem_free'] = $this->vumrohfree_model -> get(array(
                'idpackage' => $id
            ));
            //get dt include
            $data['lstdtitem_include'] = $this->vumrohinclude_model -> get(array(
                'idpackage' => $id
            ));
            $this->output->set_content_type('application_json');
            $this->output->set_output(json_encode($data));
            return $data;

        }

        public function render_event_agent()
        {
            $query = $this->qoutaumroh_model -> get_all();
            foreach ($query as $row)
            {
                $cal[] = array(
                    'id'=> $row['Idqouta']."-".$row['idpackage'],
                    'title' => $row['package']."\nJumlah Qouta: ".$row['qouta'] ." Orang" ."\nHarga: Rp. ".number_format($row['price']),
                    'start' => $row['start'],
                    'end' => $row['end'],
                    'allday' => 'true',
                    'backgroundColor' => $row['color'],
                    'borderColor' => 'red'
                );
            }
            $this->output->set_content_type('application/json');
            $result = $this->output->set_output(json_encode($cal));
            return $result;
        }

        public function hapus($id)
        {
            $createdby = $_SESSION['username'];
            $save = $this->order_umrah_model->update([
                'isvoid' =>1,
                'modifedby'=>$createdby
            ],$id);
            redirect('admin/order/index');
        }

        public function konfirmasi_selesai($idorder)
        {
            $createdby = $_SESSION['username'];
            $save = $this->order_umrah_model->update([
                'status' =>4,
                'statusorder' =>'Selesai',
                'modifedby'=>$createdby
            ],$idorder);
            redirect('admin/order/index');
        }

        public function konfirmasi_selesai_costum($idorder)
        {
            $createdby = $_SESSION['username'];
            $save = $this->order_kostum_umroh_model->update([
                'status' =>4,
                'statusorder' =>'Selesai',
                'modifedby'=>$createdby
            ],$idorder);
            redirect('admin/order/costum');
        }


        public function void($id)
        {
            $createdby = $_SESSION['username'];
            $save = $this->order_umrah_model->update([
                'isvoid' =>1,
                'modifedby'=>$createdby
            ],$id);
            redirect('admin/order/index');
        }

        public function void_costum($id)
        {
            $createdby = $_SESSION['username'];
            $save = $this->order__kostum_umrah_model->update([
                'isvoid' =>1,
                'modifedby'=>$createdby
            ],$id);
            redirect('admin/order/costum');
        }

        public function savejamaah_costum()
        {
            $pilitemjamaah = $this->input->post('txtpilitemjamaah');
            $idorder = $this->input->post('txtidorderjamaah');
            $idpaket = $this->input->post('txtidpaketjamaah');
            $idagent = $this->input->post('txtidagent');
            $maxjamaah   = $this->input->post('txtmaxjamaah');
            $strpilitem= explode(",", $pilitemjamaah);
            foreach($strpilitem as $str)
            {
                if(!empty($str)){
                    $check= $this->umroh_costum_jamaah_model->checkqouta($idorder,$idagent,$maxjamaah);
                    if($check) {
                        $save = $this->umroh_costum_jamaah_model->insert([
                            'idorder' =>$idorder,
                            'idpackage'=>$idpaket,
                            'idagent'=>$idagent,
                            'idjamaah'=>intval($str)
                        ]);
                    }
                }
            }
            print_r($save);
        }

        private function autoNumber($tabel, $kolom, $awalan, $str) {
            $this->db->order_by('created ', "desc");
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
