<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Umroh extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();

             $this->load->model('umroh_model');
             $this->load->model('refffree_model');
             $this->load->model('reffinclude_model');
             $this->load->model('hotelumroh_model');
             $this->load->model('airlinesumroh_model');
             $this->load->model('busumroh_model');
             $this->load->model('vumrohfree_model');
             $this->load->model('vumrohinclude_model');
             $this->load->model('vumroh_airlines_model');
             $this->load->model('vumroh_hotels_model');
             $this->load->model('vumroh_bus_model');
            //check admin groups or not
            $group = array('admin','staff');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }

        public function index()
        {
            $this->data['title'] = 'Data Paket Umroh';
            $this->data['breadcrumbs'] = 'Data Paket Umroh';
            $this->load->view('admin/umroh/index', $this->data);
        }


        public function add()
        {
            $this->data['title'] = 'Tambah Paket Umroh';
            $this->data['breadcrumbs'] = 'Tambah Paket Umroh';
            $kodepaket= $this->autoNumber("packages_umroh","codepackage","PU0",3);
            $this->data['kodepaket']= $kodepaket;
            $this->data['idpaket']= $this->countrow('packages_umroh','idpackage');
            $this->data['userlogin']=$this->ion_auth->user()->row()->username;
            $this->load->view('admin/umroh/add', $this->data);
        }

        public function edit($id)
        {
            $this->data['title'] = 'Edit Paket Umroh';
            $this->data['breadcrumbs'] = 'Edit Paket Umroh';
            //get data from idpaket
            $getdt =  $this->umroh_model->get([
                'idpackage'=>$id
            ]);
            $this->data['kodepaket']= $getdt[0]['codepackage'];
            $this->data['idpaket']= $id;
            //get data edit
            $this->data["edit"]= $this->umroh_model->get_order([
                'idpackage'=>$id
            ]);
            //get data airlines
            $this->data["editairlines"]= $this->vumroh_airlines_model->get_order([
                'idpackage'=>$id
            ]);
           //get data bus
            $this->data["editbus"]= $this->vumroh_bus_model->get_order([
                'idpackage'=>$id
            ]);
            //get data hotel madinah
            $this->data["edithotelmadinah"]= $this->vumroh_hotels_model->get_order([
                'idpackage'=>$id,
                'Address'=>'Madinah',
            ]);
            //get data hotel makkah
            $this->data["edithotelmakkah"]= $this->vumroh_hotels_model->get_order([
                'idpackage'=>$id,
                'Address'=>'Makkah',
            ]);
            //get data hotel turki
            $this->data["edithotelturki"]= $this->vumroh_hotels_model->get_order([
                'idpackage'=>$id,
                'Address'=>'Turki',
            ]);
            $this->data['userlogin']=$this->ion_auth->user()->row()->username;
            $this->load->view('admin/umroh/edit', $this->data);
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

        private function countrow($tabel,$kolom) {
            $this->db->order_by($kolom, "desc");
            $this->db->limit(1);
            $query = $this->db->get($tabel);
            $rows = $query->row();
            $rslt = $query->result_array();
            $jum = $query->num_rows();
            if ($jum == 0) {
                $nomor = 1;
            } else {
                $nomor = $rslt[0][$kolom] + 1;
            }
            return $nomor;
        }

        private function countmaxjamaah($idorder,$idagent) {
            $this->db->select('qty');
            $this->db->where('idorder', $idorder);
            $this->db->where('idagent', $idagent);
            $this->db->order_by('idoder', "desc");
            $this->db->limit(1);
            $query = $this->db->get('qouta_umroh');
            $rows = $query->row();
            $rslt = $query->result_array();
            $jum = $query->num_rows();
            if ($jum == 0) {
                $nomor = 0;
            } else {
                $nomor = $rslt[0]['qty'];
            }
            return $nomor;
        }

        public function view()
        {
            $this->data['title'] = 'Data Jadwal Paket Umroh dalam Bentuk Kalendar';
            $this->data['breadcrumbs'] = 'Data Jadwal Paket Umroh dalam Bentuk Kalendar';
            $this->load->view('admin/umroh/view', $this->data);
        }


        public function save()
        {
            $namapaket = $this->input->post('txtnama');
            $kodepaket = $this->input->post('txtcodepaket');
            $jenispaket = $this->input->post('txtcmbjenis');
            $hargapaket = str_replace(",","",$this->input->post('txthrg'));
            $idairlines = $this->input->post('txtpilairlines');
            $idbus = $this->input->post('txtpilbus');
            $catatan= $this->input->post('txtcatatan');
           // $chkasuransi = $this->input->post('chkasuransi');
            $pilhotelmakkah = $this->input->post('txtpilhotelmakkah');
            $mekkahday = $this->input->post('txtdaymekkah');
            $pilhotelmadinah  = $this->input->post('txtpilhotelmadinah');
            $madinahday = $this->input->post('txtdaymadinah');
            $pilhotelturki  = $this->input->post('txtpilhotelturki');
            $turkiday = $this->input->post('txtdayturki');
            $idpaket= $this->countrow('packages_umroh','idpackage');
            $createdby = $_SESSION['username'];
            if (isset($_POST['chkasuransi'])) {
                $isasuransi =1;
            } else {
                $isasuransi =0;
            }
            if ($jenispaket==9) {
                $type="Paket 9 Hari";
            } else if ($jenispaket==12) {
                $type="Paket 12 Hari";
            } else {
                $type="Paket 15 Hari";
            }


            //save into hotel umroh
            if ($pilhotelmakkah !='' ) {
                $save = $this->hotelumroh_model->insert([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idhotel'=>$pilhotelmakkah,
                    'day'=>$mekkahday
                ]);
            }
            if ($pilhotelmadinah !='' ) {
                $save = $this->hotelumroh_model->insert([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idhotel'=>$pilhotelmadinah,
                    'day'=>$madinahday
                ]);
            }
            if ($pilhotelturki !='' ) {
                $save = $this->hotelumroh_model->insert([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idhotel'=>$pilhotelturki,
                    'day'=>$turkiday
                ]);
            }
            //save into airlines umroh
            if ($idairlines !='' ) {
                $save = $this->airlinesumroh_model->insert([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idairlines'=>$idairlines
                ]);
            }
            //save into bus umroh
            if ($idbus !='' ) {
                $save = $this->busumroh_model->insert([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idbus'=>$idbus
                ]);
            }

            //save into packages_umroh
            $save = $this->umroh_model->insert([
                'codepackage'=>$kodepaket,
                'name'=>$namapaket,
                'type'=>$type,
                'day'=>$jenispaket,
                'price'=>$hargapaket,
                'isasuransi'=>$isasuransi,
                'remarks'=>$catatan,
                'createdby' =>$createdby
            ]);
            redirect('admin/umroh/index');
        }

        public function update()
        {
            $namapaket = $this->input->post('txtnama');
            $kodepaket = $this->input->post('txtcodepaket');
            $jenispaket = $this->input->post('txtcmbjenis');
            $hargapaket = str_replace(",","",$this->input->post('txthrg'));
            $pilairlines = $this->input->post('txtpilairlines');
            $pilbus = $this->input->post('txtpilbus');
            $catatan= $this->input->post('txtcatatan');
            $pilhotelmakkah = $this->input->post('txtpilhotelmakkah');
            $mekkahday = $this->input->post('txtdaymekkah');
            $pilhotelmadinah  = $this->input->post('txtpilhotelmadinah');
            $madinahday = $this->input->post('txtdaymadinah');
            $pilhotelturki  = $this->input->post('txtpilhotelturki');
            $turkiday = $this->input->post('txtdayturki');
            $idpaket= $this->input->post('txtidpaket');
            $createdby = $_SESSION['username'];
            if (isset($_POST['chkasuransi'])) {
                $isasuransi =1;
            } else {
                $isasuransi =0;
            }
            if ($jenispaket==9) {
                $type="Paket 9 Hari";
            } else if ($jenispaket==12) {
                $type="Paket 12 Hari";
            } else {
                $type="Paket 15 Hari";
            }

            //get id base on table
            $idairlines=$this->input->post('txtidairlines');
            $idbus=$this->input->post('txtidbus');
            $idmakkah=$this->input->post('txtidmekkah');
            $idmadinah=$this->input->post('txtidmadinah');
            $idturki=$this->input->post('txtidturki');
            //save into hotel umroh
            if ($pilhotelmakkah !='' ) {
                $save = $this->hotelumroh_model->update([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idhotel'=>$pilhotelmakkah,
                    'day'=>$mekkahday
                ],$idmakkah);
            }
            if ($pilhotelmadinah !='' ) {
                $save = $this->hotelumroh_model->update([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idhotel'=>$pilhotelmadinah,
                    'day'=>$madinahday
                ],$idmadinah);
            }
            if ($pilhotelturki !='' ) {
                $save = $this->hotelumroh_model->update([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idhotel'=>$pilhotelturki,
                    'day'=>$turkiday
                ],$idturki);
            }
            //save into airlines umroh
            if ($idairlines !='' ) {
                $save = $this->airlinesumroh_model->update([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idairlines'=>$pilairlines
                ],$idairlines);
            }
            //save into bus umroh
            if ($idbus !='' ) {
                $save = $this->busumroh_model->update([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idbus'=>$pilbus
                ],$idbus);
            }

            //save into packages_umroh
            $save = $this->umroh_model->update([
                'codepackage'=>$kodepaket,
                'name'=>$namapaket,
                'type'=>$type,
                'day'=>$jenispaket,
                'price'=>$hargapaket,
                'isasuransi'=>$isasuransi,
                'remarks'=>$catatan,
                'modifedby' =>$createdby
            ],$idpaket);
            redirect('admin/umroh/index');
        }

        public function savefree()
        {
            $pilitemfree = $this->input->post('txtpilitemfree');
            $kodepaket = $this->input->post('txtkodepaketfree');
            $idpaket = $this->input->post('txtidpaketfree');

            $strpilitem= explode(",", $pilitemfree);
            foreach($strpilitem as $str)
            {
                if(!empty($str)){
                    $checkitem= $this->refffree_model->existitem(intval($str),$idpaket);
                    if($checkitem) {
                        $save = $this->refffree_model->insert([
                            'codepackage' =>$kodepaket,
                            'idfree'=>intval($str),
                            'idpackage'=>$idpaket
                        ]);
                    }
                }
            }
            print_r($save);
        }


        public function saveinclude()
        {
            $piliteminclude = $this->input->post('txtpiliteminclude');
            $kodepaket = $this->input->post('txtkodepaketinclude');
            $idpaket = $this->input->post('txtidpaketinclude');

            $strpilitem= explode(",", $piliteminclude);
            foreach($strpilitem as $str)
            {
                if(!empty($str)){
                    $checkitem= $this->reffinclude_model->existitem(intval($str),$idpaket);
                    if($checkitem) {
                        $save = $this->reffinclude_model->insert([
                            'codepackage' =>$kodepaket,
                            'idinclude'=>intval($str),
                            'idpackage'=>$idpaket
                        ]);
                    }
                }
            }
            print_r($save);
        }


        public function delall($id)
        {
            //empty table reff_free
            $data = $this->refffree_model->delete(array(
                'idpackage' =>$id
            ));
            //empty table reff_include
            $data = $this->reffinclude_model->delete(array(
                'idpackage' =>$id
            ));
            //empty table umroh bus
            $data = $this->busumroh_model->delete(array(
                'idpackage' =>$id
            ));
            //empty table umroh hotel
            $data = $this->hotelumroh_model->delete(array(
                'idpackage' =>$id
            ));
            //empty table umroh airlines
            $data = $this->airlinesumroh_model->delete(array(
                'idpackage' =>$id
            ));
            //empty table packages_umroh
            $data = $this->umroh_model->delete(array(
                'idpackage' =>$id
            ));
            redirect('admin/umroh/');
        }


        public function hapusitemfree()
        {
            $idreff = $this->input->post('idreff');
            $data = $this->refffree_model->delete(array(
                'idreff' =>$idreff
            ));
            print_r($data);
        }

        public function hapusiteminclude()
        {
            $idreff = $this->input->post('idreff');
            $data = $this->reffinclude_model->delete(array(
                'idreff' =>$idreff
            ));
            print_r($data);
        }


        public function getdtgridumrohfree($nmr)
        {
            $data['lstdt'] = $this->vumrohfree_model-> get(array(
                'idpackage' => $nmr
            ));
            $result = $data['lstdt'];
            $this->output->set_content_type('application_json');
            $this->output->set_output(json_encode($result));
            return $result;
        }



    }
