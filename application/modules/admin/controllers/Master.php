<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Master extends Admin_Base_Controller
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

        public function airlines()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('airlines', 'Maskapai Penerbangan', 'Data Maskapai Penerbangan', 'Manage Data Maskapai Penerbangan');
                // data Grid view fields
                $crud->columns('Name','group','Email','Phone');
                //   $crud->unset_add()
               // $crud->unset_export()->unset_print();
                //$crud->unset_delete();
                $crud->field_type('group','dropdown',
                    array('1' => 'Direct', '2' => 'Transit'));
                // Insert form
                $crud->add_fields('Name','group','Email','Phone');
                // Update form
                $crud->edit_fields('Name','group','Email','Phone');
                // Required fields
                $crud->required_fields('Name','Route');
                // Rename field level
                $crud->display_as('Name', 'Maskapai Penerbangan')
                    ->display_as('group', 'Jenis Rute')
                    ->display_as('Email', 'Email')
                    ->display_as('Phone', 'Nomor Telepon');
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

        public function bus()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('bus', 'Armada Bus', 'Data Armada Bus', 'Manage Data Armada Bus');
                // data Grid view fields
                $crud->columns('brand','group','license_plate','capasity','remarks');
                //   $crud->unset_add()
                // $crud->unset_export()->unset_print();
                //$crud->unset_delete();
                // Insert form
                $crud->add_fields('brand','group','license_plate','capasity','remarks');
                // Update form
                $crud->edit_fields('brand','group','license_plate','capasity','remarks');
                // Required fields
                $crud->required_fields('brand','group','capasity');
                // Rename field level
                $crud->display_as('brand', 'Merk Bus')
                    ->display_as('group', 'Tahun Kendaraan')
                    ->display_as('license_plate', 'Plat No Polisi')
                    ->display_as('capasity', 'Kapasitas Penumpang')
                    ->display_as('remarks', 'Catatan');
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

        public function addons()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('addons', 'Paket Tambahan', 'Data Paket Tambahan', 'Manage Data Paket Tambahan');
                // data Grid view fields
                $crud->columns('Name','Remarks');
                //   $crud->unset_add()
                // $crud->unset_export()->unset_print();
                //$crud->unset_delete();
                // Insert form
                $crud->add_fields('Name','Remarks');
                // Update form
                $crud->edit_fields('Name','Remarks');
                // Required fields
                $crud->required_fields('Name');
                // Rename field level
                $crud->display_as('Name', 'Nama Paket')
                    ->display_as('Remarks', 'Catatan');
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

        public function addtours()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('additional_tour', 'Tour Tambahan', 'Data Tour Tambahan', 'Manage Data Tour Tambahan');
                // data Grid view fields
                $crud->columns('Name','Day');
                //   $crud->unset_add()
                // $crud->unset_export()->unset_print();
                //$crud->unset_delete();
                // Insert form
                $crud->add_fields('Name','Day');
                // Update form
                $crud->edit_fields('Name','Day');
                // Required fields
                $crud->required_fields('Name','Day');
                // Rename field level
                $crud->display_as('Name', 'Nama Tour')
                    ->display_as('Day', 'Jumlah Hari');
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


        public function packages()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('packages', 'Paket Tour', 'Data Paket Tour', 'Manage Data Paket Tour');
                // data Grid view fields
                $crud->columns('Name','Type','Day');
                //   $crud->unset_add()
                // $crud->unset_export()->unset_print();
                //$crud->unset_delete();
                $crud->field_type('Type','dropdown',
                    array('1' => 'Standard', '2' => 'Plus'));
                // Insert form
                $crud->add_fields('Name','Type','Day');
                // Update form
                $crud->edit_fields('Name','Type','Day');
                // Required fields
                $crud->required_fields('Name','Type','Day');
                // Rename field level
                $crud->display_as('Name', 'Nama Tour')
                    ->display_as('Type', 'Jenis Tour')
                    ->display_as('Day', 'Jumlah Hari Tour');
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

        public function hotels()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('hotels', 'Hotel', 'Data Hotel', 'Manage Data Hotel');
                // data Grid view fields
                $crud->columns('Name','group','Address','Email','Phone');
                //   $crud->unset_add()
                // $crud->unset_export()->unset_print();
                //$crud->unset_delete();
                $crud->field_type('group','dropdown',
                    array('Bintang 5' => 'Bintang 5', 'Bintang 4' => 'Bintang 4', 'Bintang 3' => 'Bintang 3', 'Bintang 2' => 'Bintang 2'));
                // Insert form
                $crud->add_fields('Name','group','Address','Email','Phone');
                // Update form
                $crud->edit_fields('Name','group','Address','Email','Phone');
                // Required fields
                $crud->required_fields('Name','group','Address','Email','Phone');
                // Rename field level
                $crud->display_as('Name', 'Nama Hotel')
                    ->display_as('group', 'Kelas Hotel')
                    ->display_as('Address', 'Alamat')
                    ->display_as('Email', 'Email')
                    ->display_as('Phone', 'Nomor Telepon');
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

        public function banks()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('banks', 'Bank', 'Data Bank', 'Manage Data Bank');
                // data Grid view fields
                $crud->columns('name','kurs','owner','number','swift','address');
                //   $crud->unset_add()
                // $crud->unset_export()->unset_print();
                //$crud->unset_delete();
                // Insert form
                $crud->add_fields('name','kurs','owner','number','swift','address');
                // Update form
                $crud->edit_fields('name','kurs','owner','number','swift','address');
                // Required fields
                $crud->required_fields('name','kurs','owner','number');
                // Rename field level
                $crud->display_as('name', 'Nama Bank')
                    ->display_as('kurs', 'Mata Uang')
                    ->display_as('owner', 'Nama Pemilik')
                    ->display_as('number', 'Nomor Rekening')
                    ->display_as('swift', 'Kode Swift')
                    ->display_as('address', 'Alamat');
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

        public function lounges()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('lounges', 'Lounge Keberangkatan', 'Data Lounge Keberangkatan', 'Manage Data Lounge Keberangkatan');
                // data Grid view fields
                $crud->columns('Name','Address','Email','Phone');
                //   $crud->unset_add()
                // $crud->unset_export()->unset_print();
                //$crud->unset_delete();
                // Insert form
                $crud->add_fields('Name','Address','Email','Phone');
                // Update form
                $crud->edit_fields('Name','Address','Email','Phone');
                // Required fields
                $crud->required_fields('Name','Address');
                // Rename field level
                $crud->display_as('Name', 'Nama Lounge')
                    ->display_as('Address', 'Alamat')
                    ->display_as('Email', 'Email')
                    ->display_as('Phone', 'Nomor Telepon');
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
