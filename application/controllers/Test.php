<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
      //  $this->load->library('whatsva');
        header("Content-Type: application/json");
        $this->load->model('messages_model');
        $this->load->model('setting_model');

    }
	public function index()
	{
       // $curl = curl_init();
        $message ="kirim pesan menggunakan \nwhatsva using web local";
        $nmrhp='6285242671313';
        $this->load->library('notif');
        $kirim = $this->notif->send($message,$nmrhp);
        if($kirim) {
            echo "Pesan sukses terkirim";
        } else {
            echo "Pesan gagal terkirim";
        }
//        $data = [
//            "message" => $message,
//            "jid" => $nmrhp,
//            "apikey"=> $apikey
//        ];
//        $payload = json_encode($data);
//
//        $ch = curl_init("https://whatsva.com/api/sendMessageText");
//        # Setup request to send json via POST.
//
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
//
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//        # Return response instead of printing.
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        //    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        # Send request.
//        $result = curl_exec($ch);
//        curl_close($ch);
//        # Print response.
//        $cekstatus = json_decode($result);
//        //print_r($cekstatus);
//        if ($cekstatus->success==1) {
//            echo "Pesan terkirim";
//        }

	}
    public function kirimwa()
    {

        // Takes raw data from the request
//        $json = file_get_contents('php://input');
//        $data = json_decode($json);

//        if (!@$data->instance_key) {
//            $response = ["success" => false, "message" => "instance_key empty"];
//        } else if (!@$data->jid) {
//            $response = ["success" => false, "message" => "jid empty"];
//        } else if (!@$data->message) {
//            $response = ["success" => false, "message" => "message empty"];
//        } else {
//           // $datasetting = $this->setting_model->getSetting();
            $instance_key='0Nbaxu2xPXPr';
            $jid='085242671313';
            $message='test kirm wa';
            $datasetting = $this->setting_model->getSetting();
            $cekstatus = $this->whatsva->instancecData($instance_key,$datasetting->panel_key);
            $cekstatus = json_decode($cekstatus);

           // if($cekstatus->success){
              //  if($cekstatus->data->instance_status){
                    $response = $this->whatsva->sendMessageText($instance_key, $jid, $message,$datasetting->panel_key);
                    $response = json_decode($response);
                    if($response){
                        if ($response->success) {
                            $type = "chat-text";
                            $status = "received";
                            $date_time = Date('Y-m-d h:m:s');
                            $this->messages_model->insert($instance_key, $message, $jid,$type, $status, $date_time, $response);
                        }
                    }else{
                        $response = ["success"=>false,"message"=>"cant connect to server"];
                    }

             //   }else{
                 //   $response =["success" => false, "message" => "your instance/ device is disconnect"];
               // }
          //  }else{
          //      $response = ["success" => false, "message" => "can't connect server "];
          //  }


        echo json_encode($response);
    }
}
