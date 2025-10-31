<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Cabang extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();

             $this->load->model('cabang_model');
            //check admin groups or not
            $group = array('admin','staff');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }

        public function index()
        {
            $this->data['title'] = 'Data Cabang Travel';
            $this->data['breadcrumbs'] = 'Data Cabang Travel';
            $this->load->view('admin/cabang/index', $this->data);
        }


        public function add()
        {
            $this->data['title'] = 'Tambah Cabang Travel';
            $this->data['breadcrumbs'] = 'Tambah Cabang Travel';
            $kodepaket= $this->autoNumber("packages_umroh","codepackage","PU0",3);
            $this->data['kodepaket']= $kodepaket;
            $this->data['idpaket']= $this->countrow('packages_umroh','idpackage');
            $this->data['userlogin']=$this->ion_auth->user()->row()->username;
            $this->load->view('admin/cabang/add', $this->data);
        }

        public function edit($id)
        {
            $this->data['title'] = 'Edit Cabang Travel';
            $this->data['breadcrumbs'] = 'Edit Cabang Travel';
            //get data from idpaket
            $getdt =  $this->cabang_model->get([
                'id_cabang'=>$id
            ]);
            $this->data['idlokasi']= $id;
            //get data edit
            $this->data["edit"]= $this->cabang_model->get_order([
                'id_cabang'=>$id
            ]);
            $this->data['userlogin']=$this->ion_auth->user()->row()->username;
            $this->load->view('admin/cabang/edit', $this->data);
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
            $this->load->view('admin/cabang/view', $this->data);
        }


        public function save()
        {
            $nama = $this->input->post('txtnama');
            $pic = $this->input->post('txtpic');
            $pichp = $this->input->post('txtpichp');
            $tlp= $this->input->post('txttlp');
            $email = $this->input->post('txtemail');
            $alamat= $this->input->post('txtalamat');
            $idprov = $this->input->post('txtprov');
            $idkab = $this->input->post('txtkab');
            $idkec  = $this->input->post('txtkec');
            $idkel = $this->input->post('txtkel');
            $createdby = $_SESSION['username'];

            //save into packages_umroh
            $save = $this->cabang_model->insert([
                'nama'=>$nama,
                'telepon'=>$tlp,
                'email'=>$email,
                'alamat'=>$alamat,
                'pic'=>$pic,
                'pic_hp'=>$pichp,
                'id_provinsi'=>$idprov,
                'id_kabupaten'=>$idkab,
                'id_kecamatan'=>$idkec,
                'id_kelurahan'=>$idkel,
                'createdby' =>$createdby
            ]);
            redirect('admin/cabang/index');
        }

        public function update()
        {
            $nama = $this->input->post('txtnama');
            $pic = $this->input->post('txtpic');
            $pichp = $this->input->post('txtpichp');
            $tlp= $this->input->post('txttlp');
            $email = $this->input->post('txtemail');
            $alamat= $this->input->post('txtalamat');
            $idprov = $this->input->post('txtprov');
            $idkab = $this->input->post('txtkab');
            $idkec  = $this->input->post('txtkec');
            $idkel = $this->input->post('txtkel');
            $idlokasi= $this->input->post('txtidlokasi');
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

            //save into packages_umroh
            $save = $this->cabang_model->update([
                'nama'=>$nama,
                'telepon'=>$tlp,
                'email'=>$email,
                'alamat'=>$alamat,
                'pic'=>$pic,
                'pic_hp'=>$pichp,
                'id_provinsi'=>$idprov,
                'id_kabupaten'=>$idkab,
                'id_kecamatan'=>$idkec,
                'id_kelurahan'=>$idkel,
                'modifedby' =>$createdby
            ],$idlokasi);
            redirect('admin/cabang/index');
        }


        public function delete($id)
        {
            //empty table
            $data = $this->cabang_model->delete(array(
                'id_cabang' =>$id
            ));
            redirect('admin/cabang/');
        }



    }
