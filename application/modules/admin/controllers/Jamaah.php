<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Jamaah extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('jamaah_model');
            $this->load->model('agent_model');
            $this->load->model('vjamaah_model');
            $this->load->library('ion_auth');
            $this->load->library('upload');
            // check admin groups or not
            $group = array('admin','staff','agent','ceo');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }

        public function index()
        {
            $this->data['title'] = 'Data Jamaah';
            $this->data['breadcrumbs'] = 'Data Jamaah';
            $groupagent = array('admin','agent');
            if ($this->ion_auth->in_group($groupagent)) {
                $this->data['lvluser']= 'agent';
                $this->load->view('admin/jamaah/index', $this->data);
            } else {
                $this->data['lvluser']= 'staff';
                $this->load->view('admin/jamaah/all', $this->data);
            }
        }

        public function add()
        {
            $this->data['title'] = 'Tambah Data Jamaah';
            $this->data['breadcrumbs'] = 'Tambah Data Jamaah';
            $groupagent = array('admin','agent');
            if ($this->ion_auth->in_group($groupagent)) {
                $this->data['lvluser']= 'agent';
            } else {
                $this->data['lvluser']= 'staff';
            }
            $this->load->view('admin/jamaah/add', $this->data);
        }

        public function edit($id)
        {
            $this->data['title'] = 'Edit Data Jamaah';
            $this->data['breadcrumbs'] = 'Edit Data Jamaah';
            $this->data["dtjamaah"]= $this->jamaah_model->get([
                'idjamaah'=>$id,
            ]);
            $this->load->view('admin/jamaah/edit', $this->data);
        }

        public function save()
        {
            $tgl_lahir = $this->input->post('tgl_lahir');
            $txtnamaktp = $this->input->post('txtnamaktp');
            $txtnama = $this->input->post('txtnama');
            $txtnmayah = $this->input->post('txtnmayah');
            $txttempatlahir = $this->input->post('txttempatlahir');
            $cmbgender = $this->input->post('cmbgender');
            $cmbgol_darah = $this->input->post('cmbgol_darah');
            $cmbidentitas = $this->input->post('cmbidentitas');
            $txtnmridentitas = $this->input->post('txtnmridentitas');
            $txtnmrtlp = $this->input->post('txtnmrtlp');
            $txtnmrhp = $this->input->post('txtnmrhp');
            $cmbnegara = $this->input->post('cmbnegara');
            $cmbukuran_baju = $this->input->post('cmbukuran_baju');
            $txttb = $this->input->post('txttb');
            $txtbb = $this->input->post('txtbb');
            $txtcr2_rambut = $this->input->post('txtcr2_rambut');
            $txtcr2_alis = $this->input->post('txtcr2_alis');
            $txtcr2_hidung = $this->input->post('txtcr2_hidung');
            $txtcr2_muka = $this->input->post('txtcr2_muka');
            $txtalamat = $this->input->post('txtalamat');
            $txtnmrrumah = $this->input->post('txtnmrrumah');
            $txtrt = $this->input->post('txtrt');
            $txtrw = $this->input->post('txtrw');
            $txtprov = $this->input->post('txtprov');
            $txtkab= $this->input->post('txtkab');
            $txtkec = $this->input->post('txtkec');
            $txtkel = $this->input->post('txtkel');
            $txtkdpos = $this->input->post('txtkdpos');
            $cmbpendidikan = $this->input->post('cmbpendidikan');
            $cmbpekerjaan = $this->input->post('cmbpekerjaan');
            $cmbstatus_nikah = $this->input->post('cmbstatus_nikah');
            $txtnm_mahramt = $this->input->post('txtnm_mahram');
            $cmbhub_mahram = $this->input->post('cmbhub_mahram');
            $cmbstatus_jamaah = $this->input->post('cmbstatus_jamaah');
            $cmbishaji = $this->input->post('cmbishaji');
            $txtkode_kandepag = $this->input->post('txtkode_kandepag');
            $txtkode_kec = $this->input->post('txtkode_kec');
            $createdby = $_SESSION['username'];
            //check file upload
            $this->load->helper('string');
            $nmrandom = random_string('alnum', 7);
            //check file payment
            if ($_FILES['filefoto']['tmp_name']!='') {
                $fileconfirms=$_FILES['filefoto']['tmp_name'];
                $realpathfile = $_SERVER['DOCUMENT_ROOT']."/uploads/jamaah/foto/";
                $filerandom = explode(".",$_FILES['filefoto']['name']);
                $nmfile = str_replace(" ","_",$nmrandom."_".$txtnamaktp.".".$filerandom[1]);
                move_uploaded_file($_FILES["filefoto"]["tmp_name"],$realpathfile.$nmfile);
                $virpath = "https://".$_SERVER['HTTP_HOST']."/uploads/jamaah/foto/".$nmfile;
            }else {
                $nmfile = "";
                $virpath = "";
            }
            $iduser = $_SESSION['user_id'];
            $getdtagent =  $this->agent_model->get([
                'iduser'=>$iduser
            ]);
            $idagent=$getdtagent[0]['idagent'];
                $save = $this->jamaah_model->insert([
                    'idagent'=>$idagent,
                    'nama'=>$txtnama,
                    'nama_paspor'=>$txtnamaktp,
                    'idgender'=>$cmbgender,
                    'nama_ayah'=>$txtnmayah,
                    'tgl_lahir'=>$tgl_lahir,
                    'tempat_lahir'=>$txttempatlahir,
                    'jenis_identitas'=>$cmbidentitas,
                    'nomor_identitas'=>$txtnmridentitas,
                    'tlp'=>$txtnmrtlp,
                    'hp'=>$txtnmrhp,
                    'alamat'=>$txtalamat,
                    'nmr_rmh'=>$txtnmrrumah,
                    'rt_rumah'=>$txtrt,
                    'rw_rumah'=>$txtrw,
                    'provinsi'=>$txtprov,
                    'kabupaten'=>$txtkab,
                    'kecamatan'=>$txtkec,
                    'kelurahan'=>$txtkel,
                    'kode_pos'=>$txtkdpos,
                    'kewarganegaraan'=>$cmbnegara,
                    'status_pendidikan'=>$cmbpendidikan,
                    'jenis_pekerjaan'=>$cmbpekerjaan,
                    'nama_mahram'=>$txtnm_mahramt,
                    'hubungan_mahram'=>$cmbhub_mahram,
                    'gol_darah'=>$cmbgol_darah,
                    'status_menikah'=>$cmbstatus_nikah,
                    'ukuran_baju'=>$cmbukuran_baju,
                    'ciri2_rambut'=>$txtcr2_rambut,
                    'ciri2_alis'=>$txtcr2_alis,
                    'ciri2_hidung'=>$txtcr2_hidung,
                    'ciri2_muka'=>$txtcr2_muka,
                    'tinggi'=>$txttb,
                    'bb'=>$txtbb,
                    'path_foto'=>$virpath,
                    'nm_foto'=>$nmfile,
                    'ishaji'=>$cmbishaji,
                    'kodekandepag'=>$txtkode_kandepag,
                    'kode_kecamatan'=>$txtkode_kec,
                    'status_jamaah'=>$cmbstatus_jamaah,
                    'createdby' =>$createdby
                ]);
            redirect('admin/jamaah/index');
        }

        public function update()
        {

        }

        public function import()
        {

        }

        public function hapus_jamaah($id)
        {
            $save = $this->jamaah_model->delete([
                'idjamaah' =>$id,
            ]);
            redirect('admin/jamaah/');
        }

        function getAge($date) { // Y-m-d format
            $now = explode("-", date('Y-m-d'));
            $dob = explode("-", $date);
            $dif = $now[0] - $dob[0];
            if ($dob[1] > $now[1]) { // birthday month has not hit this year
                $dif -= 1;
            }
            elseif ($dob[1] == $now[1]) { // birthday month is this month, check day
                if ($dob[2] > $now[2]) {
                    $dif -= 1;
                }
                elseif ($dob[2] == $now[2]) { // Happy Birthday!
                    $dif = $dif;
                };
            };
            return $dif;
        }
        function callback_age($value, $row)
        {
            $diff = abs(strtotime(date('Y-m-d')) - strtotime($value));
            $years = floor($diff / (365*60*60*24));
            return $years;
        }



    }
