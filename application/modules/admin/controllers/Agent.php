<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Agent extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('agent_model');
            $this->load->model('user_model');
            $this->load->library('ion_auth');
            $this->load->library('grocery_CRUD');
            $this->setTemplateFile('grocery_view');
            // check admin groups or not
            $group = array('admin','staff','agent');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }

        public function index()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('agent', 'Agent', 'Data Agent Non Badan', 'Pengaturan Data Agent Non Badan');

                //$crud->set_relation('iduser','users','username');
                //$crud->set_relation('iduser','users','username',array('id>' => '1'));
                // data Grid view fields

                $crud->where([
                    'jenis' => 'Non Badan'
                ]);
                $crud->set_field_upload('file_ktp','uploads/non-badan/foto');
                $crud->set_field_upload('file_kk','uploads/non-badan/kk');
                $crud->set_field_upload('file_foto','uploads/non-badan/ktp');

                $crud->columns('nama','nama_user','ktp','tlp','alamat','email','file_ktp','file_kk','file_foto');

                // $crud->unset_add()
                //      ->unset_export()
                //      ->unset_print()
                //      ->unset_delete();
                $iduser=$this->countrow('users','id');
                $crud->field_type('jenis', 'hidden', 'Non Badan');
                $crud->field_type('iduser', 'hidden', $iduser);

                // Insert form
                $crud->add_fields('iduser','nama','nama_user','password','jenis','ktp','tlp','alamat','email','file_ktp','file_kk','file_foto');


                // Update form
                $crud->edit_fields('nama','nama_user','password','ktp','tlp','alamat','email','file_ktp','file_kk','file_foto');


                // Required fields
                $crud->required_fields('nama','nama_user','password','ktp','tlp','alamat','file_ktp','file_kk','file_foto');


                //$crud->field_type('idssb','hidden',$idssb);
                // Rename field level
                $crud->display_as('nama', 'Nama')
                    ->display_as('nama_user', 'Nama Login')
                    ->display_as('ktp', 'No KTP')
                    ->display_as('tlp', 'Telepon /WA')
                    ->display_as('email', 'Email')
                    ->display_as('alamat', 'Alamat')
                    ->display_as('file_ktp', 'File KTP')
                    ->display_as('file_kk', 'File KK')
                    ->display_as('file_foto', 'Pas Foto');

                // get value after insert and update
                $crud->callback_after_insert(function ($post_array,$primary_key) {
                    $username =  $post_array['nama_user'];
                    $password = $post_array['password'];
                    $email = $post_array['nama'].'_agent_bstravel@gmail.com';
                    $additional_data = array(
                        'first_name' =>  $post_array['nama'],
                        'last_name' =>  '',
                    );
                    $group = array('2'); // Sets user to admin.
                    $this->ion_auth->register($username, $password, $email, $additional_data, $group);


                    return true;
                });
                // render output result
                $output = $crud->render();
                $this->load->view('admin/vrender', (array) $output);

                // error handle
            } catch (Exception $e) {
                show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            }
        }

        public function badan()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('agent', 'Agent', 'Data Agent Non Badan', 'Pengaturan Data Agent Non Badan');


                // data Grid view fields
                $crud->where([
                    'jenis' => 'Badan'
                ]);
                //$crud->getModel()->set_add_value('jenis', 'Non Badan');
                $crud->set_field_upload('file_ktp','uploads/badan/foto');
                $crud->set_field_upload('file_kk','uploads/badan/kk');
                $crud->set_field_upload('file_foto','uploads/badan/ktp');
                $crud->set_field_upload('npwp_badan','uploads/badan/npwp_badan');
                $crud->set_field_upload('siup_badan','uploads/badan/siup_badan');

                $crud->columns('nama','nama_badan','nama_user','ktp','tlp','tlp_badan','alamat','alamat_badan','email','file_ktp','file_kk','file_foto','npwp_badan','siup_badan');

                // $crud->unset_add()
                //      ->unset_export()
                //      ->unset_print()
                //      ->unset_delete();

                $iduser=$this->countrow('users','id');
                $crud->field_type('jenis', 'hidden', 'Badan');
                $crud->field_type('iduser', 'hidden', $iduser);
                // Insert form
                $crud->add_fields('nama','nama_user','password','jenis','nama_badan','ktp','tlp','tlp_badan','alamat','alamat_badan','email','file_ktp','file_kk','file_foto','npwp_badan','siup_badan');

                // Update form
                $crud->edit_fields('nama','nama_user','password','nama_badan','ktp','tlp','tlp_badan','alamat','alamat_badan','email','file_ktp','file_kk','file_foto','npwp_badan','siup_badan');


                // Required fields
                $crud->required_fields('nama','nama_user','password','nama_badan','ktp','tlp','tlp_badan','alamat','alamat_badan','file_ktp','file_kk','file_foto','npwp_badan','siup_badan');

                // Rename field level
                $crud->display_as('nama', 'Nama')
                    ->display_as('nama_user', 'Nama Login')
                    ->display_as('nama_badan', 'Nama Badan')
                    ->display_as('ktp', 'No KTP')
                    ->display_as('tlp', 'Telepon /WA')
                    ->display_as('tlp_badan', 'Telepon Badan')
                    ->display_as('email', 'Email')
                    ->display_as('alamat', 'Alamat')
                    ->display_as('alamat_badan', 'Alamat Badan')
                    ->display_as('file_ktp', 'File KTP')
                    ->display_as('file_kk', 'File KK')
                    ->display_as('file_foto', 'Pas Foto')
                    ->display_as('npwp_badan', 'NPWP Badan')
                    ->display_as('siup_badan', 'SIUP Badan');

                // render output result

                $output = $crud->render();
                $this->load->view('admin/vrender', (array) $output);

                // error handle
            } catch (Exception $e) {
                show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            }
        }

        public function jamaah()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('jamaah', 'Jamaah', 'Data Jamaah', 'Manage Data Jamaah');
                $crud->set_relation('idgender','gender','gender');
                // data Grid view fields
                $crud->columns('nama','idgender','tempat_lahir','tgl_lahir','tlp','alamat','kota_imigrasi','no_ktp','no_kk','no_pasport','file_ktp','file_kk','file_pasport');

                //   $crud->unset_add()
                // $crud->unset_export()->unset_print();
                // $crud->unset_delete();
                //  $crud->field_type('Route','dropdown',
                //   array('1' => 'Direct', '2' => 'Transit'));
                $crud->set_field_upload('file_ktp','uploads/jamaah/ktp');
                $crud->set_field_upload('file_kk','uploads/jamaah/kk');
                $crud->set_field_upload('file_pasport','uploads/jamaah/pasport');
                // Insert form
                $crud->add_fields('nama','idagent','idgender','tempat_lahir','tgl_lahir','tlp','alamat','kota_imigrasi','no_ktp','no_kk','no_pasport','file_ktp','file_kk','file_pasport','createdby');
                // Update form
                $crud->edit_fields('nama','idgender','tempat_lahir','tgl_lahir','tlp','alamat','kota_imigrasi','no_ktp','no_kk','no_pasport','file_ktp','file_kk','file_pasport','modifedby');
                // Required fields
                $createdby = $_SESSION['username'];
                // $age = $this->getAge($tgl_lahir);
                //  $crud->callback_field('umur',array($this,'example_callback'));
                $iduser = $_SESSION['user_id'];
                $getdtagent =  $this->agent_model->get([
                    'iduser'=>$iduser
                ]);
                $crud->where([
                    'idagent' => $getdtagent[0]['idagent']
                ]);
                $crud->field_type('idagent', 'hidden', $getdtagent[0]['idagent']);
                $crud->field_type('createdby', 'hidden', $createdby);
                $crud->field_type('modifedby', 'hidden', $createdby);
                //$crud->field_type('umur', 'hidden', $age);

                $crud->required_fields('nama','idgender','tempat_lahir','tgl_lahir','tlp','alamat','kota_imigrasi','no_ktp','no_kk','no_pasport');
                // Rename field level
                $crud->display_as('nama', 'Nama Jamaah')
                    ->display_as('idgender', 'Jenis Kelamin')
                    ->display_as('tempat_lahir', 'Tempat Lahir')
                    ->display_as('tgl_lahir', 'Tgl Lahir')
                    ->display_as('tlp', 'Telepon')
                    ->display_as('alamat', 'Alamat')
                    ->display_as('kota_imigrasi', 'Kota Asal Imigrasi')
                    ->display_as('no_ktp', 'No KTP')
                    ->display_as('no_kk', 'No KK')
                    ->display_as('no_no_pasport', 'No Pasport')
                    ->display_as('file_ktp', 'File KTP')
                    ->display_as('file_kk', 'File KK')
                    ->display_as('file_pasport', 'File Pasport');
                // $config['grocery_crud_default_per_page'] = 5;
                // $config['grocery_crud_paging_options'] = array('5','10','20','50','100','150');
                // render output result
                $output = $crud->render();
                $this->load->view('admin/vrender', (array) $output);
                // error handle
            } catch (Exception $e) {
                show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            }
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




        public function getGroceryCRUD($TableName, $Subject, $PageTitle, $Breadcrumbs)
        {
            $crud = new grocery_CRUD();
            $this->data['title'] = $PageTitle;
            $this->data['breadcrumbs'] = $Breadcrumbs;
            $crud->set_theme('bootstrap');
            $crud->set_table($TableName);
            $crud->set_subject($Subject);

            return $crud;
        }



    }
