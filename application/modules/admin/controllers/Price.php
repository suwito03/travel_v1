<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Price extends Admin_Base_Controller
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
                $crud = $this->getGroceryCRUD('airlines_rate', 'Maskapai Penerbangan', 'Data Harga Maskapai Penerbangan', 'Manage Data Harga Maskapai Penerbangan');
                //set relation table
                $crud->set_relation('Idairlines','airlines','name');
                // data Grid view fields
                $crud->columns('Idairlines','class','price');
                //   $crud->unset_add()
                //$crud->unset_export()->unset_print();
                $crud->unset_delete();
                $crud->field_type('class','dropdown',
                    array('Economy' => 'Economy', 'Business' => 'Business','First Class'=>'First Class'));
                // Insert form
                $crud->add_fields('Idairlines','class','price');
                // Update form
                $crud->edit_fields('Idairlines','class','price');
                // Required fields
                $crud->required_fields('Idairlines','class','price');
                // Rename field level
                $crud->display_as('Idairlines', 'Nama Maskapai Penerbangan')
                    ->display_as('class', 'Kelas Penerbangan')
                    ->display_as('price', 'Harga');

                $crud->callback_column('price', function ($value, $row) {
                    return "Rp. ".number_format($value);
                });
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
                $crud = $this->getGroceryCRUD('addons_rate', 'Paket Tambahan', 'Data Harga Paket Tambahan', 'Manage Data Paket Tambahan');
                //set relation table
                $crud->set_relation('idaddons','addons','Name');
                // data Grid view fields
                $crud->columns('idaddons','price');
                //   $crud->unset_add()
                //$crud->unset_export()->unset_print();
                $crud->unset_delete();

                // Insert form
                $crud->add_fields('idaddons','price');
                // Update form
                $crud->edit_fields('idaddons','price');
                // Required fields
                $crud->required_fields('idaddons','price');
                // Rename field level
                $crud->display_as('idaddons', 'Nama Paket Tambahan')
                    ->display_as('price', 'Harga');

                $crud->callback_column('price', function ($value, $row) {
                    return "Rp. ".number_format($value);
                });
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
                $crud = $this->getGroceryCRUD('addtour_rate', 'Tour Tambahan', 'Data Harga Tour Tambahan', 'Manage Data Tour Tambahan');
                //set relation table
                $crud->set_relation('idtour','additional_tour','Name');
                // data Grid view fields
                $crud->columns('idtour','price');
                //   $crud->unset_add()
                //$crud->unset_export()->unset_print();
                $crud->unset_delete();

                // Insert form
                $crud->add_fields('idtour','price');
                // Update form
                $crud->edit_fields('idtour','price');
                // Required fields
                $crud->required_fields('idtour','price');
                // Rename field level
                $crud->display_as('idtour', 'Nama Tour Tambahan')
                    ->display_as('price', 'Harga');

                $crud->callback_column('price', function ($value, $row) {
                    return "Rp. ".number_format($value);
                });
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
                $crud = $this->getGroceryCRUD('hotel_rate', 'Hotel Rate', 'Data Harga Hotel', 'Manage Data Harga Hotel');
                //set relation table
                $crud->set_relation('idhotel','hotels','name');
                // data Grid view fields
                $crud->columns('idhotel','price');
                //   $crud->unset_add()
                //$crud->unset_export()->unset_print();
                $crud->unset_delete();

                // Insert form
                $crud->add_fields('idhotel','price');
                // Update form
                $crud->edit_fields('idhotel','price');
                // Required fields
                $crud->required_fields('idhotel','price');
                // Rename field level
                $crud->display_as('idhotel', 'Nama Hotel')
                    ->display_as('price', 'Harga Hotel');

                $crud->callback_column('price', function ($value, $row) {
                        return "Rp. ".number_format($value);
                });
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
                $crud = $this->getGroceryCRUD('lounge_rate', 'Lounge Bandara', 'Data Harga Lounge Bandara', 'Manage Data Lounge Bandara');
                //set relation table
                $crud->set_relation('idlounge','lounges','Name');
                // data Grid view fields
                $crud->columns('idlounge','price');
                //   $crud->unset_add()
                //$crud->unset_export()->unset_print();
                $crud->unset_delete();

                // Insert form
                $crud->add_fields('idlounge','price');
                // Update form
                $crud->edit_fields('idlounge','price');
                // Required fields
                $crud->required_fields('idlounge','price');
                // Rename field level
                $crud->display_as('idlounge', 'Nama Lounge Bandara')
                    ->display_as('price', 'Harga');

                $crud->callback_column('price', function ($value, $row) {
                    return "Rp. ".number_format($value);
                });
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
