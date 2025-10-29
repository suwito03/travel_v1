<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notif {
    private $_CI;
    public function __construct()
    {
        $this->_CI = & get_instance();
        $this->_CI->load->model('adminwa_model');
        $this->_CI->load->model('gateway_model');
        $this->_CI->load->model('notif_model');
        $this->_CI->load->model('notif_admin_model');
    }


    public function send($message, $recipient)
    {
        $getdt =  $this->_CI->gateway_model->get();
        if (!empty($getdt)) {
            $apikey=$getdt[0]['api_key'];
        } else {
            $apikey='0xTOwFJrrCKL';
        }
        $data = [
            "message" => $message,
            "jid" => $recipient,
            "apikey"=> $apikey
        ];
        $payload = json_encode($data);
        $ch = curl_init("https://whatsva.com/api/sendMessageText");
        # Setup request to send json via POST.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        # Send request.
        $result = curl_exec($ch);
        curl_close($ch);
        # Print response.
        $cekstatus = json_decode($result);
        //print_r($cekstatus);
        if ($cekstatus->success==1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function savedb_agent($idagent,$agent,$pesan,$tujuan,$tipe)
    {
        $save =$this->_CI->notif_model->insert([
            'idagent'=>$idagent,
            'agent'=>$agent,
            'recipient'=>$tujuan,
            'type'=>$tipe,
            'message'=>$pesan,
            'status'=>'terkirim'
        ]);
    }
    public function savedb_admin($admin,$pesan,$tujuan,$tipe)
    {
        $save =$this->_CI->notif_admin_model->insert([
            'admin'=>$admin,
            'recipient'=>$tujuan,
            'type'=>$tipe,
            'message'=>$pesan,
            'status'=>'terkirim'
        ]);
    }
}
/***** End of Notif.php ***********/