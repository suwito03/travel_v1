<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Paket extends Admin_Base_Controller
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

        public function includes()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('umroh_include', 'Item Include Paket Umroh', 'Data Item Include Paket Umroh', 'Pengaturan Data Item Include Paket Umroh');

                // data Grid view fields

                $crud->columns('nama');

                // $crud->unset_add()
                //      ->unset_export()
                //      ->unset_print()
                //      ->unset_delete();

                // Insert form
                $crud->add_fields('nama');


                // Update form
                $crud->edit_fields('nama');


                // Required fields
                $crud->required_fields('nama');

                // Rename field level
                $crud->display_as('nama', 'Nama Item Include');

                // render output result

                $output = $crud->render();
                $this->load->view('admin/vrender', (array) $output);

                // error handle
            } catch (Exception $e) {
                show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            }
        }

        public function free()
        {
            try {

                // Grocery settings getGroceryCRUD( $TableName, $Subject, $PageTitle, $Breadcrumbs )
                $crud = $this->getGroceryCRUD('umroh_free', 'Item Free Paket Umroh', 'Data Item Free Paket Umroh', 'Pengaturan Data Item Free Paket Umroh');

                // data Grid view fields

                $crud->columns('nama');

                // $crud->unset_add()
                //      ->unset_export()
                //      ->unset_print()
                //      ->unset_delete();

                // Insert form
                $crud->add_fields('nama');


                // Update form
                $crud->edit_fields('nama');


                // Required fields
                $crud->required_fields('nama');

                // Rename field level
                $crud->display_as('nama', 'Nama Item Free');

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
