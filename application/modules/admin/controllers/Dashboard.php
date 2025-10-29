<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends Admin_Base_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->model('vorder_all_model');
            $this->load->model('vorder_costum_all_model');
            $this->load->model('paidpaket_umrah_model');
            $this->load->model('paidpaket_umrahcostum_model');
            $this->load->model('vpaid_paketumroh_model');
            $this->load->model('vpaid_paketumroh_costum_model');
            $this->load->model('m_admin_dashboard');
            $this->load->model('order_umrah_model');
            $this->load->model('order_kostum_umroh_model');
            $this->load->model('qoutaumroh_model');
            $this->load->model('umroh_model');
            $this->load->model('agent_model');
            $this->load->model('jamaah_model');
            $this->load->library(array( 'ion_auth' ));
        }

        public function index()
        { 
            $this->data['title'] = 'Dashboard';
            $this->data['breadcrumbs'] = 'Dashboard';
            if ($this->ion_auth->is_agent())  {
                // cek agent
                $iduser = $_SESSION['user_id'];
                $getdtagent =  $this->agent_model->get([
                    'iduser'=>$iduser
                ]);
                $idagent= $getdtagent[0]['idagent'];
                //get sum data  order base on agent
                $data['totalorder']= $this->countrow_agent_void("order_umroh",$idagent);
                //get sum data jamaah base on agent
                $data['totaljamaah'] = $this->countrow_agent("jamaah",$idagent);
//            //get sum data expense cost base on agent
//            $totalcost= countrow_agent("order_umroh","idorder",$idgent);
                $this->data['title'] = 'Dashboard Agent';
                $this->data['breadcrumbs'] = 'Dashboard Agent';
                $this->load->view('admin/dashboard/agent',$data);
            }
            else {
                //get sum all data  order
                $data['totalorder']= $this->countrow_void("order_umroh");
                //get sum all data jamaah
                $data['totaljamaah'] = $this->countrow("jamaah");
                //get sum all data agent
                $data['totalagent'] = $this->countrow("agent");
                // get data order order paket umroh
                $data['lstorder_paketumroh'] = $this->vorder_all_model-> get_order(array(
                    'isvoid'=>0,
                    'status'=>0
                ));
                // get data order order paket costum umroh
                $data['lstorder_paketumroh_costum'] = $this->vorder_costum_all_model-> get_order(array(
                    'isvoid'=>0,
                    'status'=>0
                ));
                // get data paid order paket umroh
                $data['lstpaid_paketumroh'] = $this->vpaid_paketumroh_model->get_order(array(
                    'isvoid'=>0,
                    'status'=>1
                ));
                // get data paid order paket umroh costum
                $data['lstpaid_paketumroh_costum'] = $this->vpaid_paketumroh_costum_model->get_order(array(
                    'isvoid'=>0,
                    'status'=>1
                ));
                $this->data['title'] = 'Dashboard';
                $this->data['breadcrumbs'] = 'Dashboard';
                $this->load->view('admin/dashboard/staff',$data);
            }

        }

        public function profile()
        {
            $data['title'] = 'Profile';
            $data['breadcrumbs'] = 'Profile';
            $id = $this->ion_auth->get_user_id();
            $data['user'] = $this->ion_auth->user($id)->row();
            $this->load->view('admin/profile', $data);
        }

        public function edit_profile()
        {
            $data['title'] = 'Edit Profile';
            $data['breadcrumbs'] = 'Edit Profile';
            $id = $this->ion_auth->get_user_id();
            $data['user'] = $this->ion_auth->user($id)->row();
            $this->load->view('admin/edit_profile', $data);
        }


        //update or edit profile
        public function edit()
        {

            header('Content-Type: application/json');
            $this->setOutputMode(NORMAL);
            if ($this->input->is_ajax_request()) {

                if ($this->input->post('submit') == "Save") {

                    $id = $this->input->post('updateId');
                    $created_date = date('Y-m-d h:i:s');
                    $created_by = $this->ion_auth->get_user_id();
                    $file_path = $this->input->post('SelectedFileName');
                    $uploadOk = 1;


                    //set validations
                    $this->form_validation->set_rules('username', 'users Name', 'trim|required');

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
                                'last_name' => $this->input->post('last_name'),
                                'phone' => $this->input->post('user_phone'),
                                'created_on' => $created_date,
                                'created_by' => $created_by,
                                'file_path' => $file_path
                            );
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


        // change password
        public function change_password()
        {
            
            $this->data['title'] = 'Change Password';
            $this->data['breadcrumbs'] = 'Change Password';
            
            $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
            $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');
            
            
            $user = $this->ion_auth->user()->row();
            
            if ($this->form_validation->run() == false) {
                // display the form
                // set the flash data error message if there is one
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                
                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['old_password'] = array(
                    'name' => 'old',
                    'id' => 'old',
                    'maxlength' => '100',
                    'type' => 'password',
                );
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'maxlength' => '100',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'maxlength' => '100',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                
                // render
                $this->load->view('admin/change_password', $this->data);
            } else {
                $identity = $this->session->userdata('identity');
                
                $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new_confirm'));
                
                if ($change) {
                    //if the password was successfully changed
                    $this->session->set_flashdata('message', $this->ion_auth->messages());
                    $this->logout();
                } else {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
                    redirect('admin/dashboard/change_password', 'refresh');
                }
            }
        }
        
        public function change_pwd()
        {
            $identity = $this->session->userdata('identity');
            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));
            
            if ($change) {
                //if the password was successfully changed
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->logout();
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('admin/dashboard/change_password', 'refresh');
            }
          
        }

        // log the user out
        public function logout()
        {
            $this->data['title'] = "Logout";
            // log the user out
            $logout = $this->ion_auth->logout();
            // redirect them to the login page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect('auth/login', 'refresh');
        }

        private function countrow_agent($tabel,$idagent) {
            $this->db->select('*');
            $this->db->where('idagent',$idagent);
            $query = $this->db->get($tabel);
            $rows = $query->row();
            $rslt = $query->result_array();
            $jum = $query->num_rows();
            return $jum;
        }

        private function countrow_agent_void($tabel,$idagent) {
            $this->db->select('*');
            $this->db->where('idagent',$idagent);
            $this->db->where('isvoid',0);
            $query = $this->db->get($tabel);
            $rows = $query->row();
            $rslt = $query->result_array();
            $jum = $query->num_rows();
            return $jum;
        }
        private function countrow_void($tabel) {
            $this->db->select('*');
            $this->db->where('isvoid',0);
            $query = $this->db->get($tabel);
            $rows = $query->row();
            $rslt = $query->result_array();
            $jum = $query->num_rows();
            return $jum;
        }
        private function countrow($tabel) {
            $this->db->select('*');
            $query = $this->db->get($tabel);
            $rows = $query->row();
            $rslt = $query->result_array();
            $jum = $query->num_rows();
            return $jum;
        }
    }
