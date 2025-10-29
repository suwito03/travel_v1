<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mobile extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        
         if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
            header('Access-Control-Allow-Headers: token, Content-Type');
            header('Access-Control-Max-Age: 1728000');
            header('Content-Length: 0');
            header('Content-Type: text/plain');
            die();
        }
        
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
    }


    

   
    public function mobilelogin()
    {
        $input = json_decode(file_get_contents('php://input'), true);
        header('Content-Type: application/json');
        $user = $input['txtuser'];
        $pass = $input['txtpass'];
        // Validate the post data
        if(!empty($user) && !empty($pass)){
          
            if ($this->ion_auth->login($user, $pass,FALSE)) {
               
                $this->get_settings_data();
                $group = 'admin';
                if ($this->ion_auth->in_group($group)) {
                    $data['message'] = "User not authorized'";
                    echo json_encode($data);
                }else{
                    $data['message'] = "login successful";
                    echo json_encode($data);
                }

            }else{
                $data['message'] = "login failed'";
                 echo json_encode($data);
            }
        }else{
            $data['message'] = "usename and password must be filled'";
            echo json_encode($data);
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
    
    public function get_settings_data()
    {

        $this->load->model('admin/settings_model');

        $settings_data = $this->settings_model->get_active_data(1);

        if ($settings_data) { //active user record is present

            foreach ($settings_data as $key => $value) {
                $settings_name = $value['name'];
                $settings_id = $value['id'];
                $reg = $value['reg'];
                $established = $value['established'];
                $settings_address = $value['address'];
                $founder = $value['founder'];
                $settings_email = $value['email'];
                $settings_file_path = $value['file_path'];
                $settings_contact = $value['contact'];
            }
            $data_array = array(
                'settings_id' => $settings_id,
                'settings_name' => $settings_name,
                'settings_email' => $settings_email,
                'reg' => $reg,
                'established' => $established,
                'settings_address' => $settings_address,
                'founder' => $founder,
                'settings_contact' => $settings_contact,
                'settings_file_path' => $settings_file_path,
            );
            $this->session->set_userdata('settings_data', $data_array);
        }
    }

    public function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    public function _valid_csrf_nonce()
    {
        $csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
        if ($csrfkey && $csrfkey == $this->session->flashdata('csrfvalue')) {
            return true;
        } else {
            return false;
        }
    }


}
