<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Agents extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('paidpaket_umrahcostum_model');
            $this->load->model('paidpaket_umrah_model');
            $this->load->model('order_kostum_umroh_model');
            $this->load->model('order_umrah_model');
            $this->load->model('qoutaumroh_model');
            $this->load->model('user_model');
            $this->load->model('umroh_model');
            $this->load->model('umroh_costum_model');
            $this->load->model('agent_model');
            $this->load->model('jamaah_model');
            $this->load->model('umroh_jamaah_model');
            $this->load->model('umroh_costum_jamaah_model');
            $this->load->model('refffree_model');
            $this->load->model('reffinclude_model');
            $this->load->model('refffree_costum_model');
            $this->load->model('reffinclude_costum_model');
            $this->load->model('hotelumroh_costum_model');
            $this->load->model('busumroh_costum_model');
            $this->load->model('airlinesumroh_costum_model');
            $this->load->model('hotelumroh_model');
            $this->load->model('airlinesumroh_model');
            $this->load->model('busumroh_model');
            $this->load->model('vumrohfree_model');
            $this->load->model('vumrohfree_costum_model');
            $this->load->model('vumrohinclude_model');
            $this->load->model('vumrohinclude_costum_model');
            $this->load->model('vumroh_airlines_model');
            $this->load->model('vumroh_hotels_model');
            $this->load->model('vumroh_bus_model');
            $this->load->model('vumroh_costum_jamaah_model');
            $this->load->model('vumroh_jamaah_model');
            $this->load->model('vumroh_costum_airlines_model');
            $this->load->model('vumroh_costum_hotels_model');
            $this->load->model('vumroh_costum_bus_model');
            $this->load->library('upload');
            // check admin groups or not
            $group = array('admin','staff','agent');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }
        
        public function index()
        {
            $this->data['title'] = 'Data Order PaketUmroh';
            $this->data['breadcrumbs'] = 'Data Order Paket Umroh';
            $this->load->view('admin/agents/index', $this->data);
        }

        public function login()
        {
            $this->data['title'] = 'Manage users';
            $this->data['breadcrumbs'] = 'Manage users';
            $this->load->view('admin/agents/manage', $this->data);
        }

        public function get_all_agent()
        {
            $this->setOutputMode(NORMAL);
            if ($this->input->is_ajax_request()) {
                //check if user admin or not admin
                $this->data['all'] = $this->user_model->get_all_users_agent();
                $view = $this->load->view('admin/agents/all', $this->data, true);
                $this->output->set_output($view);
            } else {
                redirect('admin/dashboard');
            }
        }

        //update form
        public function edit_form()
        {

            $this->setOutputMode(NORMAL);

            if ($this->input->is_ajax_request()) {
                $id = $this->input->post('id');
                $this->data['groups'] = $this->ion_auth->groups()->result();
                $this->data['user'] = $this->ion_auth->user($id)->row();
                $this->data['user_group'] = $this->ion_auth->get_users_groups($id)->row();
                $view = $this->load->view('admin/agents/edit', $this->data, true);
                $this->output->set_output($view);
            } else {
                redirect('admin/dashboard');
            }
        }


        //update or edit records
        public function edit()
        {

            header('Content-Type: application/json');
            $this->setOutputMode(NORMAL);
            if ($this->input->is_ajax_request()) {

                if ($this->input->post('submit') == "Save") {

                    $id = $this->input->post('updateId');
                    $username = $this->input->post('username');
                    $created_date = date('Y-m-d h:i:s');
                    $created_by = $this->ion_auth->get_user_id();
                    $group_id = $this->input->post('group_id');
                    $file_path = $this->input->post('SelectedFileName');
                    $active = $this->input->post('status');
                    $uploadOk = 1;


                    //set validations
                    $this->form_validation->set_rules('username', 'users Name', 'trim|required|callback_users_name_check');

                    if ($this->form_validation->run() == false) {
                        $errors = array();
                        foreach ($this->input->post() as $key => $value) {
                            $errors[$key] = form_error($key);
                        }
                        $response_array['errors'] = array_filter($errors);

                        $response_array['type'] = 'danger';
                        $response_array['message'] = '<div class="alert alert-danger alert-dismissable"><i class="icon fa fa-times"></i> <strong class="alert  alert-dismissable"> Sorry!  Validation errors occurs. </strong></div>';
                        echo json_encode($response_array);

                    } else {

                        if (!empty($_FILES)) {

                            $new_file = $_FILES["user_image"]["name"];
                        } else {
                            $new_file = "";
                        }

                        if (!empty($new_file)) {
                            $config['upload_path'] = './assets/images/user/';    // APPPATH . 'assets/uploads/';   //'./assets/uploads/';
                            $config['allowed_types'] = 'jpg|jpeg|png';
                            $config['max_size'] = 5000;
                            $config['max_width'] = 1000;
                            $config['max_height'] = 1000;
                            $time = time();
                            $config['file_name'] = $time;

                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);

                            if (!$this->upload->do_upload('user_image')) {

                                $uploadOk = 0;
                                $errors = $this->upload->display_errors('', '');
                                $response_array['type'] = 'danger';
                                $response_array['message'] = '<i class="icon fa fa-warning"></i> <strong class="alert  alert-dismissable">' . $errors . '</strong>';

                            } else {

                                $data = $this->upload->data();
                                $file_path = 'assets/images/user/' . $time . $data['file_ext'];
                                $uploadOk = 1;
                            }
                        }


                        if ($uploadOk == 0) {
                            $response_array['type'] = 'danger';
                            $response_array['message'] = $response_array['message']; //'<i class="icon fa fa-times"></i> <strong class="alert  alert-dismissable">' . $response_array['message']. '</strong>';
                            echo json_encode($response_array);
                            // if everything is ok, try to upload file
                        } else {

                            $additional_data = array(
                                'first_name' => $this->input->post('first_name'),
                                'username' => $username,
                                'last_name' => $this->input->post('last_name'),
                                'phone' => $this->input->post('user_phone'),
                                'created_on' => $created_date,
                                'created_by' => $created_by,
                                'file_path' => $file_path,
                                'active' => $active,
                            );

                            $this->ion_auth->remove_from_group('', $id);
                            $this->ion_auth->add_to_group($group_id, $id);

                            $results = $this->ion_auth->update($id, $additional_data);

                            if ($results) {
                                $response_array['type'] = 'success';
                                $response_array['message'] = '<div class="alert alert-success alert-dismissable"><i class="icon fa fa-check"></i><strong>  Congratulations! </strong> Successfully Updated. </div>';
                                echo json_encode($response_array);

                            } else {
                                $response_array['type'] = 'danger';
                                $response_array['message'] = '<div class="alert alert-danger alert-dismissable"><i class="icon fa fa-times"></i><strong> Sorry! </strong>  Failed.</div>';
                                echo json_encode($response_array);
                            }
                        }
                    }
                } else {
                    redirect('admin/dashboard');
                }
            } else {
                redirect('admin/dashboard');
            }
        }


        public function order()
        {
            $this->data['title'] = 'Data Order Kostum Paket Umroh';
            $this->data['breadcrumbs'] = 'Data Order Kostum Paket Umroh';
            $this->load->view('admin/agents/kostum_order', $this->data);
        }

        public function kostum()
        {
            $this->data['title'] = 'Data Pengajuan Kostum Paket Umroh';
            $this->data['breadcrumbs'] = 'Data Pengajuan Kostum Paket Umroh';
            $this->load->view('admin/agents/paket_costum', $this->data);
        }

        public function view()
        {
            $this->data['title'] = 'Data Order Paket Umroh dalam Bentuk Kalendar';
            $this->data['breadcrumbs'] = 'Data Order Paket Umroh dalam Bentuk Kalendar';
            $this->load->view('admin/agents/order_cal', $this->data);
        }

        public function viewcostum()
        {
            $this->data['title'] = 'Data Order Paket Umroh dalam Bentuk Kalendar';
            $this->data['breadcrumbs'] = 'Data Order Paket Umroh dalam Bentuk Kalendar';
            $this->load->view('admin/agents/order_costum', $this->data);
        }

        public function harga()
        {
            $this->data['title'] = 'Daftar Harga Paket Umroh';
            $this->data['breadcrumbs'] = 'Daftar Harga Paket Umroh';
            $this->load->view('admin/agents/harga', $this->data);
        }


        public function riwayat_transfer()
        {
            $this->data['title'] = 'Data Riwayat Pembayaran Paket Umroh';
            $this->data['breadcrumbs'] = 'Data Riwayat Pembayaran Paket Umroh';
            $this->load->view('admin/agents/historypaid_paket', $this->data);
        }

        public function paid_costum()
        {
            $this->data['title'] = 'Data Riwayat Pembayaran Paket Umroh';
            $this->data['breadcrumbs'] = 'Data Riwayat Pembayaran Paket Umroh';
            $this->load->view('admin/agents/paid_paket_costum', $this->data);
        }

        public function costum($idpaket,$tglbook) {
            $this->data['title'] = 'Kostum Paket Umroh';
            $this->data['breadcrumbs'] = 'Kostum Paket Umroh';
            $kodepaket_costum= $this->autoNumberpaket("packages_umroh_costum","codepackage","PKU",3);
            $this->data['kodepaket_costum']= $kodepaket_costum;
            $this->data['idpaket_costum']= $this->countrow('packages_umroh_costum','idpackage');
            $idpaket_costum =  $this->data['idpaket_costum'];
            $tgl=date_create($tglbook);
            $this->data['tglbooking']= date_format($tgl,'d M Y');
            $this->data['userlogin']=$this->ion_auth->user()->row()->username;
            //get data from idpaket
            $getdt =  $this->umroh_model->get([
                'idpackage'=>$idpaket
            ]);
            $this->data['tglbook']= $tglbook;
            $this->data['kodepaket']= $getdt[0]['codepackage'];
            $this->data['idpaket']= $idpaket;
            //get data edit
            $this->data["edit"]= $this->umroh_model->get_order([
                'idpackage'=>$idpaket
            ]);
            //get data airlines
            $this->data["editairlines"]= $this->vumroh_airlines_model->get_order([
                'idpackage'=>$idpaket
            ]);
            //get data bus
            $this->data["editbus"]= $this->vumroh_bus_model->get_order([
                'idpackage'=>$idpaket
            ]);
            //get data hotel madinah
            $this->data["edithotelmadinah"]= $this->vumroh_hotels_model->get_order([
                'idpackage'=>$idpaket,
                'Address'=>'Madinah',
            ]);
            //get data hotel makkah
            $this->data["edithotelmakkah"]= $this->vumroh_hotels_model->get_order([
                'idpackage'=>$idpaket,
                'Address'=>'Makkah',
            ]);
            //get data hotel turki
            $this->data["edithotelturki"]= $this->vumroh_hotels_model->get_order([
                'idpackage'=>$idpaket,
                'Address'=>'Turki',
            ]);
            //get data free and save to temp table before save
            $cekdtfree = $this->vumrohfree_model-> get(array(
                'idpackage' => $idpaket
            ));
            foreach ($cekdtfree as $lstfree):
                $checkitem= $this->refffree_costum_model->existitem($lstfree['idfree'],$idpaket_costum);
                if($checkitem) {
                    $savefree = $this->refffree_costum_model->insert([
                        'codepackage' =>$kodepaket_costum,
                        'idfree' =>$lstfree['idfree'],
                        'idpackage' =>$idpaket_costum,
                    ]);
                }

            endforeach;

            //get data include and save to temp table before save
            $cekdtinclude = $this->vumrohinclude_model-> get(array(
                'idpackage' => $idpaket
            ));
            foreach ($cekdtinclude as $lstinclude):
                $checkitem= $this->reffinclude_costum_model->existitem($lstinclude['idinclude'],$idpaket_costum);
                if($checkitem) {
                    $saveinclude = $this->reffinclude_costum_model->insert([
                        'codepackage' =>$kodepaket_costum,
                        'idinclude' =>$lstinclude['idinclude'],
                        'idpackage' =>$idpaket_costum,
                    ]);
                }
            endforeach;

            $this->data['userlogin']=$this->ion_auth->user()->row()->username;
            $this->load->view('admin/agents/kostum_umroh', $this->data);
        }

        public function editcostum($idpaket) {
            $this->data['title'] = 'Kostum Paket Umroh';
            $this->data['breadcrumbs'] = 'Kostum Paket Umroh';
            $kodepaket_costum= $idpaket;
            //get data from idpaket
            $getdt =  $this->umroh_costum_model->get([
                'idpackage'=>$idpaket
            ]);
            $this->data['kodepaket_costum']= $getdt[0]['codepackage'];
            $this->data['idpaket_costum']= $idpaket;
            $idpaket_costum =  $this->data['idpaket_costum'];
            $this->data['userlogin']=$this->ion_auth->user()->row()->username;

            $this->data['tglbook']= $getdt[0]['tglrequest'];
            $tgl=date_create($getdt[0]['tglrequest']);
            $this->data['tglbooking']= date_format($tgl,'d M Y');
            $this->data['kodepaket']= $getdt[0]['codepackage'];
            $this->data['idpaket']= $idpaket;
            //get data edit
            $this->data["edit"]= $this->umroh_costum_model->get_order([
                'idpackage'=>$idpaket
            ]);
            //get data airlines
            $this->data["editairlines"]= $this->vumroh_costum_airlines_model->get_order([
                'idpackage'=>$idpaket
            ]);
            //get data bus
            $this->data["editbus"]= $this->vumroh_costum_bus_model->get_order([
                'idpackage'=>$idpaket
            ]);
            //get data hotel madinah
            $this->data["edithotelmadinah"]= $this->vumroh_costum_hotels_model->get_order([
                'idpackage'=>$idpaket,
                'Address'=>'Madinah',
            ]);
            //get data hotel makkah
            $this->data["edithotelmakkah"]= $this->vumroh_costum_hotels_model->get_order([
                'idpackage'=>$idpaket,
                'Address'=>'Makkah',
            ]);
            //get data hotel turki
            $this->data["edithotelturki"]= $this->vumroh_costum_hotels_model->get_order([
                'idpackage'=>$idpaket,
                'Address'=>'Turki',
            ]);
            //get data free and save to temp table before save
            $cekdtfree = $this->vumrohfree_costum_model-> get(array(
                'idpackage' => $idpaket
            ));
            foreach ($cekdtfree as $lstfree):
                $checkitem= $this->refffree_costum_model->existitem($lstfree['idfree'],$idpaket_costum);
                if($checkitem) {
                    $savefree = $this->refffree_costum_model->insert([
                        'codepackage' =>$kodepaket_costum,
                        'idfree' =>$lstfree['idfree'],
                        'idpackage' =>$idpaket_costum,
                    ]);
                }

            endforeach;

            //get data include and save to temp table before save
            $cekdtinclude = $this->vumrohinclude_costum_model-> get(array(
                'idpackage' => $idpaket
            ));
            foreach ($cekdtinclude as $lstinclude):
                $checkitem= $this->reffinclude_costum_model->existitem($lstinclude['idinclude'],$idpaket_costum);
                if($checkitem) {
                    $saveinclude = $this->reffinclude_costum_model->insert([
                        'codepackage' =>$kodepaket_costum,
                        'idinclude' =>$lstinclude['idinclude'],
                        'idpackage' =>$idpaket_costum,
                    ]);
                }
            endforeach;
            $this->load->view('admin/agents/edit_kostum_umroh', $this->data);
        }
        public function save_costum()
        {
            $namapaket = $this->input->post('txtnama');
            $tglbook = $this->input->post('tglbook');
            $kodepaket = $this->input->post('txtcodepaket');
            $jenispaket = $this->input->post('cmbtotalday');
            $hargapaket = str_replace(",","",$this->input->post('txthrg'));
            $idairlines = $this->input->post('txtpilairlines');
            $idbus = $this->input->post('txtpilbus');
            $catatan= $this->input->post('txtcatatan');
            $jmlhjemaah = $this->input->post('txtjmlh');
            $pilhotelmakkah = $this->input->post('txtpilhotelmakkah');
            $mekkahday = $this->input->post('txtdaymekkah');
            $pilhotelmadinah  = $this->input->post('txtpilhotelmadinah');
            $madinahday = $this->input->post('txtdaymadinah');
            $pilhotelturki  = $this->input->post('txtpilhotelturki');
            $turkiday = $this->input->post('txtdayturki');
            $idpaket= $this->countrow('packages_umroh_costum','idpackage');
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
                $save = $this->hotelumroh_costum_model->insert([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idhotel'=>$pilhotelmakkah,
                    'day'=>$mekkahday
                ]);
            }
            if ($pilhotelmadinah !='' ) {
                $save = $this->hotelumroh_costum_model->insert([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idhotel'=>$pilhotelmadinah,
                    'day'=>$madinahday
                ]);
            }
            if ($pilhotelturki !='' ) {
                $save = $this->hotelumroh_costum_model->insert([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idhotel'=>$pilhotelturki,
                    'day'=>$turkiday
                ]);
            }
            //save into airlines umroh
            if ($idairlines !='' ) {
                $save = $this->airlinesumroh_costum_model->insert([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idairlines'=>$idairlines
                ]);
            }
            //save into bus umroh
            if ($idbus !='' ) {
                $save = $this->busumroh_costum_model->insert([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idbus'=>$idbus
                ]);
            }
            //get id agent
            $iduser = $_SESSION['user_id'];
            $getdtagent =  $this->agent_model->get([
                'iduser'=>$iduser
            ]);
            //save into
            $tglsekarang=date("Y-m-d");
            $kostum_name = strtoupper($createdby)."X".$kodepaket."".$idpaket;
            $save = $this->umroh_costum_model->insert([
                'idagent'=>$getdtagent[0]['idagent'],
                'agent'=>$getdtagent[0]['nama'],
                'tglrequest'=>$tglsekarang,
                'tglberangkat'=>$tglbook,
                'codepackage'=>$kodepaket,
                'costumpackage'=>$kostum_name,
                'basispackage'=>$namapaket,
                'type'=>$type,
                'day'=>$jenispaket,
                'jumlah_jemaah'=>$jmlhjemaah,
                'price'=>0,
                'final_price'=>0,
                'total_price'=>0,
                'status'=>1,
                'isvoid'=>0,
                'status_costum'=>"Draft",
                'isasuransi'=>$isasuransi,
                'remarks'=>$catatan,
                'createdby' =>$createdby
            ]);
            redirect('admin/agents/kostum');
        }

        public function save_editcostum()
        {
            $namapaket = $this->input->post('txtnama');
            $tglbook = $this->input->post('tglbook');
            $kodepaket = $this->input->post('txtcodepaket');
            $jenispaket = $this->input->post('cmbtotalday');
            $hargapaket = str_replace(",","",$this->input->post('txthrg'));
            $pilairlines = $this->input->post('txtpilairlines');
            $pilbus = $this->input->post('txtpilbus');
            $catatan= $this->input->post('txtcatatan');
            $jmlhjemaah = $this->input->post('txtjmlh');
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
                $save = $this->hotelumroh_costum_model->update([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idhotel'=>$pilhotelmakkah,
                    'day'=>$mekkahday
                ],$idmakkah);
            }
            if ($pilhotelmadinah !='' ) {
                $save = $this->hotelumroh_costum_model->update([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idhotel'=>$pilhotelmadinah,
                    'day'=>$madinahday
                ],$idmadinah);
            }
            if ($pilhotelturki !='' ) {
                $save = $this->hotelumroh_costum_model->update([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idhotel'=>$pilhotelturki,
                    'day'=>$turkiday
                ],$idturki);
            }
            //save into airlines umroh
            if ($idairlines !='' ) {
                $save = $this->airlinesumroh_costum_model->update([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idairlines'=>$idairlines
                ],$idairlines);
            }
            //save into bus umroh
            if ($idbus !='' ) {
                $save = $this->busumroh_costum_model->insert([
                    'idpackage'=>$idpaket,
                    'codepackage'=>$kodepaket,
                    'idbus'=>$idbus
                ],$idbus);
            }
            //get id agent
            $iduser = $_SESSION['user_id'];
            $getdtagent =  $this->agent_model->get([
                'iduser'=>$iduser
            ]);
            //save into
            $tglsekarang=date("Y-m-d");
            $kostum_name = strtoupper($createdby)."X".$kodepaket."".$idpaket;
            $save = $this->umroh_costum_model->update([
                'idagent'=>$getdtagent[0]['idagent'],
                'agent'=>$getdtagent[0]['nama'],
//                'tglrequest'=>$tglsekarang,
//                'tglberangkat'=>$tglbook,
//                'codepackage'=>$kodepaket,
//                'costumpackage'=>$kostum_name,
                //'basispackage'=>$namapaket,
                'type'=>$type,
                'day'=>$jenispaket,
                'jumlah_jemaah'=>$jmlhjemaah,
//                'price'=>0,
//                'final_price'=>0,
//                'total_price'=>0,
                'status'=>1,
                'isvoid'=>0,
                'status_costum'=>"Konfirmasi Harga",
                'isasuransi'=>$isasuransi,
                'remarks'=>$catatan,
                'modifedby' =>$createdby
            ],$idpaket);
            redirect('admin/agents/kostum');
        }
        public function jadwal()
        {
            $this->data['title'] = 'Data Qouta Paket Umroh dalam Bentuk Kalendar';
            $this->data['breadcrumbs'] = 'Data Qouta Paket Umroh dalam Bentuk Kalendar';
            $this->load->view('admin/agents/view', $this->data);
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
            $tipe= $getdt[0]['type'];
            if ($cektgl) {
                $save = $this->qoutaumroh_model->insert([
                    'tanggal'=>$tgl,
                    'idpackage'=>$idpaket,
                    'package'=>$nmpaket,
                    'qouta'=>$qouta,
                    'desc'=>$qouta." Orang",
                    'color'=>$warna,
                    'calendar'=>$tipe,
                    'start'=>$tgl." 00:00:00",
                    'end'=>$tgl." 00:00:00",
                    'allday'=>'true',
                    'createdby' =>$createdby
                ]);
            }
            redirect('admin/agents/index');
        }

        public function savebook()
        {
            $orderno = $this->autoNumber("order_umroh","orderno","NO-PU00",7);
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
                'Idqouta'=>$Idqouta
            ]);
            //= $this->order_umrah_model->existitem($idqouta,$tgl, $createdby);
           // if($checkitem) {
            $save = $this->order_umrah_model->insert([
                'idqouta' =>$Idqouta,
                'orderno'=>$orderno,
                'idpackage'=>$idpaket,
                'idagent'=>$idagent,
                'harga'=>$getdt[0]['price'],
                'package'=>$getdt[0]['name'],
                'qty'=>$jumlah,
                'total'=> $total,
                'tglorder'=>$tgl,
                'tglpaket'=> $getdtqouta[0]['tanggal'],
                'status'=>0,
                'statusorder'=>'Booking',
                'createdby'=>$createdby
            ]);
            //format date
            $tglorder=date_create($tgl);
            $ordertgl= date_format($tglorder,'d M Y');
            $tglpaket=date_create($getdtqouta[0]['tanggal']);
            $tglberangkat= date_format($tglpaket,'d M Y');
            // send notif and save notif into table
            $message ="لسَّلاَمُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ\n\nTerimah kasih Bapak/Ibu, *".$getdtagent[0]['nama']."*, 🙏\nAnda sudah berhasil melakukan booking pemesanan paket umroh\n\nTanggal Pesan : ".$ordertgl."\nNama Paket : ".$getdt[0]['name']."\nTanggal Keberangkatan : ".$tglberangkat."\nJumlah Jemaah : ".$jumlah."\nHarga Paket : Rp. ". number_format($getdt[0]['price'])."\nTotal Harga : Rp. ".number_format($total)."\nStatus : Menunggu konfirmasi dari pihak travel\n\nSilahkan login ke aplikasi untuk mengecek status terupdate \nhttps://travel.sahr-ds.com\n\nHormat Kami, \n*BS-Travel*";
            $nmrhp=$getdtagent[0]['tlp'];
            $this->load->library('notif');
            $kirim = $this->notif->send($message,$nmrhp);
            if($kirim) {
                //save into db
                $savedb = $this->notif->savedb_agent($idagent,$getdtagent[0]['nama'],$message,$nmrhp,'Booking Paket Umroh');
                //send notif to admin travel

            } else {
                echo "Pesan gagal terkirim";
            }
            print_r($save);
        }

        public function savejamaah()
        {
            $pilitemjamaah = $this->input->post('txtpilitemjamaah');
            $idorder = $this->input->post('txtidorderjamaah');
            $idqouta = $this->input->post('txtidqoutajamaah');
            $idpaket = $this->input->post('txtidpaketjamaah');
            $idagent = $this->input->post('txtidagent');
            $maxjamaah   = $this->input->post('txtmaxjamaah');
            $strpilitem= explode(",", $pilitemjamaah);
            foreach($strpilitem as $str)
            {
                if(!empty($str)){
                    $check= $this->umroh_jamaah_model->checkqouta($idorder,$idagent,$maxjamaah);
                    if($check) {
                        $checkitem=$this->umroh_jamaah_model->existitem($idorder,$idpaket, intval($str));
                        if($checkitem) {
                            $save = $this->umroh_jamaah_model->insert([
                                'idorder' =>$idorder,
                                'idqouta'=>$idqouta,
                                'idpackage'=>$idpaket,
                                'idagent'=>$idagent,
                                'idjamaah'=>intval($str)
                            ]);
                        }
                    }
                }
            }
            print_r($save);
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
                        $checkitem=$this->umroh_costum_jamaah_model->existitem($idorder,$idpaket, intval($str));
                         if($checkitem) {
                             $save = $this->umroh_costum_jamaah_model->insert([
                                 'idorder' =>$idorder,
                                 'idpackage'=>$idpaket,
                                 'idagent'=>$idagent,
                                 'idjamaah'=>intval($str)
                             ]);
                          }

                    }
                }
            }
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

        public function savefree_costum()
        {
            $pilitemfree = $this->input->post('txtpilitemfree');
            $kodepaket = $this->input->post('txtkodepaketfree');
            $idpaket = $this->input->post('txtidpaketfree');

            $strpilitem= explode(",", $pilitemfree);
            foreach($strpilitem as $str)
            {
                if(!empty($str)){
                    $checkitem= $this->refffree_costum_model->existitem(intval($str),$idpaket);
                    if($checkitem) {
                        $save = $this->refffree_costum_model->insert([
                            'codepackage' =>$kodepaket,
                            'idfree'=>intval($str),
                            'idpackage'=>$idpaket
                        ]);
                    }
                }
            }
            print_r($save);
        }
        public function saveinclude_costum()
        {
            $piliteminclude = $this->input->post('txtpiliteminclude');
            $kodepaket = $this->input->post('txtkodepaketinclude');
            $idpaket = $this->input->post('txtidpaketinclude');

            $strpilitem= explode(",", $piliteminclude);
            foreach($strpilitem as $str)
            {
                if(!empty($str)){
                    $checkitem= $this->reffinclude_costum_model->existitem(intval($str),$idpaket);
                    if($checkitem) {
                        $save = $this->reffinclude_costum_model->insert([
                            'codepackage' =>$kodepaket,
                            'idinclude'=>intval($str),
                            'idpackage'=>$idpaket
                        ]);
                    }
                }
            }
            print_r($save);
        }

        public function hapusitemfree_costum()
        {
            $idreff = $this->input->post('idreff');
            $data = $this->refffree_costum_model->delete(array(
                'idreff' =>$idreff
            ));
            print_r($data);
        }

        public function hapusiteminclude_costum()
        {
            $idreff = $this->input->post('idreff');
            $data = $this->reffinclude_costum_model->delete(array(
                'idreff' =>$idreff
            ));
            print_r($data);
        }

        public function savebayar()

        {
            $txttgl =$this->input->post('txttgl');
            $txtpilidbank=$this->input->post('txtpilidbank');
            $txtorderno=$this->input->post('txtorderno');
            $txtidagentbyr=$this->input->post('txtidagentbyr');
            $txtidqoutabyr=$this->input->post('txtidqoutabyr');
            $txtidpackagebyr=$this->input->post('txtidpackagebyr');
            $txtidorder=$this->input->post('txtidorder');
            $txtpilnamabank=$this->input->post('txtpilnamabank');
            $txtpilidjenisbayar=$this->input->post('txtpilidjenisbayar');
            $txtbanksumber= $this->input->post('txtbanksumber');
            $txtnoreksumber = $this->input->post('txtnoreksumber');
            $txtjumlah = str_replace(",","",$this->input->post('txtjumlahtf'));
            $txtpemelik_rek = $this->input->post('txtpemelik_rek');
            //check file upload
            $this->load->helper('string');
            $nmrandom = random_string('alnum', 7);
            //check file payment
            if ($_FILES['filebukti']['tmp_name']!='') {
                $fileconfirms=$_FILES['filebukti']['tmp_name'];
                $realpathfile = $_SERVER['DOCUMENT_ROOT']."/uploads/pembayaran/paket_umroh/";
                $filerandom = explode(".",$_FILES['filebukti']['name']);
                $nmfile = str_replace(" ","_",$nmrandom."_".$txtorderno.".".$filerandom[1]);
                move_uploaded_file($_FILES["filebukti"]["tmp_name"],$realpathfile.$nmfile);
                $virpath = "https://".$_SERVER['HTTP_HOST']."/uploads/pembayaran/paket_umroh/".$nmfile;
            }else {
                $nmfile = "";
                $virpath = "";
            }

            if ($txtpilidjenisbayar==1) {
                $isdp=1;
                $islunas=0;
                $totalbyr=$txtjumlah;
                $jenisbyr= "Bayar DP";
            } else if ($txtpilidjenisbayar==2) {
                $jenisbyr= "Pelunasan DP";
                $islunas=1;
                $totalbyr=$txtjumlah;
            } else {
                $jenisbyr= "Pelunasan Full";
                $islunas=1;
                $totalbyr=$txtjumlah;
            }
            $user = $_SESSION['username'];
            $save = $this->paidpaket_umrah_model->insert([
                'idbank' =>$txtpilidbank,
                'bank_tujuan' =>$txtpilnamabank,
                'bank_sumber' =>$txtbanksumber." ".$txtpemelik_rek." ".$txtnoreksumber,
                'idorder'=>$txtidorder,
                'orderno'=>$txtorderno,
                'idagent'=>$txtidagentbyr,
                'idqouta'=>$txtidqoutabyr,
                'idpackage'=>$txtidpackagebyr,
                'datepaid'=>$txttgl,
                'tipe_pembayaran' =>$txtpilidjenisbayar,
                'jenis_bayar' =>$jenisbyr,
                'jumlah'=>$txtjumlah,
                'status'=>1,
                'status_bayar'=>"Butuh konfirmasi",
                'nmfile'=>$nmfile,
                'pathfile'=>$virpath,
                'isvoid' =>0,
                'createdby'=>$user
            ]);

            redirect('admin/agents/');
        }

        public function savebayarcostum()

        {
            $txttgl =$this->input->post('txttgl');
            $txtpilidbank=$this->input->post('txtpilidbank');
            $txtorderno=$this->input->post('txtorderno');
            $txtidagentbyr=$this->input->post('txtidagentbyr');
            $txtidqoutabyr=$this->input->post('txtidqoutabyr');
            $txtidpackagebyr=$this->input->post('txtidpackagebyr');
            $txtidorder=$this->input->post('txtidorder');
            $txtpilnamabank=$this->input->post('txtpilnamabank');
            $txtpilidjenisbayar=$this->input->post('txtpilidjenisbayar');
            $txtbanksumber= $this->input->post('txtbanksumber');
            $txtnoreksumber = $this->input->post('txtnoreksumber');
            $txtjumlah = str_replace(",","",$this->input->post('txtjumlahtf'));
            $txtpemelik_rek = $this->input->post('txtpemelik_rek');
            //check file upload
            $this->load->helper('string');
            $nmrandom = random_string('alnum', 7);
            //check file payment
            if ($_FILES['filebukti']['tmp_name']!='') {
                $fileconfirms=$_FILES['filebukti']['tmp_name'];
                $realpathfile = $_SERVER['DOCUMENT_ROOT']."/uploads/pembayaran/paket_umroh_kostum/";
                $filerandom = explode(".",$_FILES['filebukti']['name']);
                $nmfile = str_replace(" ","_",$nmrandom."_".$txtorderno.".".$filerandom[1]);
                move_uploaded_file($_FILES["filebukti"]["tmp_name"],$realpathfile.$nmfile);
                $virpath = "https://".$_SERVER['HTTP_HOST']."/uploads/pembayaran/paket_umroh_kostum/".$nmfile;
            }else {
                $nmfile = "";
                $virpath = "";
            }

            if ($txtpilidjenisbayar==1) {
                $isdp=1;
                $islunas=0;
                $totalbyr=$txtjumlah;
                $jenisbyr= "Bayar DP";
            } else if ($txtpilidjenisbayar==2) {
                $jenisbyr= "Pelunasan DP";
                $islunas=1;
                $totalbyr=$txtjumlah;
            } else {
                $jenisbyr= "Pelunasan Full";
                $islunas=1;
                $totalbyr=$txtjumlah;
            }
            $user = $_SESSION['username'];
            $save = $this->paidpaket_umrahcostum_model->insert([
                'idbank' =>$txtpilidbank,
                'bank_tujuan' =>$txtpilnamabank,
                'bank_sumber' =>$txtbanksumber." ".$txtpemelik_rek." ".$txtnoreksumber,
                'idorder'=>$txtidorder,
                'orderno'=>$txtorderno,
                'idagent'=>$txtidagentbyr,
                'idqouta'=>$txtidqoutabyr,
                'idpackage'=>$txtidpackagebyr,
                'datepaid'=>$txttgl,
                'tipe_pembayaran' =>$txtpilidjenisbayar,
                'jenis_bayar' =>$jenisbyr,
                'jumlah'=>$txtjumlah,
                'status'=>1,
                'status_bayar'=>"Butuh konfirmasi",
                'nmfile'=>$nmfile,
                'pathfile'=>$virpath,
                'isvoid' =>0,
                'createdby'=>$user
            ]);

            redirect('admin/agents/order');
        }

        // delete a record
        public function togleactive()
        {
            header('Content-Type: application/json');
            $this->setOutputMode(NORMAL);
            if ($this->input->is_ajax_request()) {
                $id = $this->input->post('id');
                $status = $this->input->post('status');
                if ($status==1) {
                    $result = $this->user_model->update([
                        'active' =>0
                    ],$id);
                } elseif ($status==0) {
                    $result = $this->user_model->update([
                        'active' =>1
                    ],$id);
                }
                if ($result) {
                  //  $this->ion_auth->remove_from_group('', $id);
                    $response_array['type'] = 'success';
                    $response_array['message'] = '<div class="alert alert-success alert-dismissable"><i class="icon fa fa-check"></i> Successfully Deleted. </div>';
                    echo json_encode($response_array);
                } else {
                    $response_array['type'] = 'danger';
                    $response_array['message'] = '<div class="alert alert-danger alert-dismissable"><i class="icon fa fa-times"></i> Sorry! Failed.</div>';
                    echo json_encode($response_array);
                }
            }
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

        private function countrow_agent($tabel,$kolom,$idagent) {
            $this->db->where('idagent', $idagent);
            $this->db->order_by($kolom, "desc");
            $this->db->limit(1);
            $query = $this->db->get($tabel);
            $rows = $query->row();
            $rslt = $query->result_array();
            $jum = $query->num_rows();
            if ($jum == 0) {
                $nomor = 0;
            } else {
                $nomor = $rslt[0][$kolom] ;
            }
            return $nomor;
        }

        public function hapus($id)
        {
            $data = $this->qoutaumroh_model->delete(array(
                'Idqouta' =>$id
            ));
            redirect('admin/agents/index');
        }

        public function deldtjamaah($id)
        {
            $data = $this->umroh_jamaah_model->delete(array(
                'idreff' =>$id
            ));
            redirect('admin/agents/index');
        }

        public function deldtjamaah_costum($id)
        {
            $data = $this->umroh_costum_jamaah_model->delete(array(
                'idreff' =>$id
            ));
            redirect('admin/agents/order');
        }

        public function delpaket_costum($id)
        {
            //update table umroh costum paket
            $createdby = $_SESSION['username'];
            $save = $this->umroh_costum_model->update([
                'isvoid' =>1,
                'modifedby'=>$createdby
            ],$id);
            redirect('admin/agents/kostum');
        }

        public function convert_order($idpaket,$harga)
        {
            $createdby = $_SESSION['username'];
            $save = $this->umroh_costum_model->update([
                'status' =>3,
                'status_costum' =>'Konversi Menjadi Order',
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

            redirect('admin/agents/kostum');
        }


    }
