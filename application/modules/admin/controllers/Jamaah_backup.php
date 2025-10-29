<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Jamaah_backup extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->library('grocery_CRUD');
            $this->setTemplateFile('grocery_view');
            // check admin groups or not
            $group = array('admin','staff');
            if (!$this->ion_auth->in_group($group)) {
                $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
                redirect('admin/dashboard/access_denied');
            }
        }

        public function index()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('jamaah', 'Jamaah', 'Data Jamaah', 'Manage Data Jamaah');
                $crud->set_relation('idgender','gender','gender');
                $crud->set_relation('idagent','agent','nama');
                // data Grid view fields
                $crud->columns('idagent','idgender','tempat_lahir','tgl_lahir','tlp','alamat','kota_imigrasi','no_ktp','no_kk','no_pasport','file_ktp','file_kk','file_pasport');
                //   $crud->unset_add()
                // $crud->unset_export()->unset_print();
                //$crud->unset_delete();
//                $crud->field_type('Route','dropdown',
//                    array('1' => 'Direct', '2' => 'Transit'));
                $crud->set_field_upload('file_ktp','uploads/jamaah/ktp');
                $crud->set_field_upload('file_kk','uploads/jamaah/kk');
                $crud->set_field_upload('file_pasport','uploads/jamaah/pasport');
                // Insert form
                $crud->add_fields('idagent','nama','idgender','tempat_lahir','tgl_lahir','tlp','alamat','kota_imigrasi','no_ktp','no_kk','no_pasport','file_ktp','file_kk','file_pasport','createdby');
                // Update form
                $crud->edit_fields('idagent','nama','idgender','tempat_lahir','tgl_lahir','tlp','alamat','kota_imigrasi','no_ktp','no_kk','no_pasport','file_ktp','file_kk','file_pasport','modifedby');
                // Required fields
                $createdby = $_SESSION['username'];
               // $age = $this->getAge($tgl_lahir);
              //  $crud->callback_field('umur',array($this,'example_callback'));
                $crud->field_type('createdby', 'hidden', $createdby);
                $crud->field_type('modifedby', 'hidden', $createdby);
                //$crud->field_type('umur', 'hidden', $age);

                $crud->required_fields('nama','idgender','tempat_lahir','tgl_lahir','tlp','alamat','kota_imigrasi','no_ktp','no_kk','no_pasport');
                // Rename field level
                $crud->display_as('idagent', 'Nama Agent')
                    ->display_as('nama', 'Nama Jamaah')
                    ->display_as('idgender', 'Jenis Kelamin')
                    ->display_as('tempat_lahir', 'Tempat Lahir')
                    ->display_as('tgl_lahir', 'Tgl Lahir')
                    ->display_as('tlp', 'Telepon')
                    ->display_as('alamat', 'Alamat')
                    ->display_as('kota_imigrasi', 'Kota Asal Imigrasi')
                    ->display_as('no_ktp', 'No KTP')
                    ->display_as('no_kk', 'No KK')
                    ->display_as('no_pasport', 'No Pasport')
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
                    $dif = $dif." Happy Birthday!";
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
