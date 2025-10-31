<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Json extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cabang_model');
        $this->load->model('provinsi_model');
        $this->load->model('kabupaten_model');
        $this->load->model('kecamatan_model');
        $this->load->model('kelurahan_model');
        $this->load->model('vjamaah_model');
        $this->load->model('notif_model');
        $this->load->model('gateway_model');
        $this->load->model('adminwa_model');
        $this->load->model('bank_model');
        $this->load->model('paidpaket_umrah_model');
        $this->load->model('jenispaket_umroh_model');
        $this->load->model('jamaah_model');
        $this->load->model('agent_model');
        $this->load->model('order_umrah_model');
        $this->load->model('order_kostum_umroh_model');
        $this->load->model('qoutaumroh_model');
        $this->load->model('umroh_model');
        $this->load->model('umroh_costum_model');
        $this->load->model('airlines_model');
        $this->load->model('hotels_model');
        $this->load->model('bus_model');
        $this->load->model('free_model');
        $this->load->model('include_model');
        $this->load->model('refffree_model');
        $this->load->model('reffinclude_model');
        $this->load->model('vumrohfree_model');
        $this->load->model('vumrohinclude_model');
        $this->load->model('vumrohfree_costum_model');
        $this->load->model('vumrohinclude_costum_model');
        $this->load->model('vumroh_airlines_model');
        $this->load->model('vumroh_hotels_model');
        $this->load->model('vumroh_bus_model');
        $this->load->model('vumroh_costum_airlines_model');
        $this->load->model('vumroh_costum_hotels_model');
        $this->load->model('vumroh_costum_bus_model');
        $this->load->model('vumroh_jamaah_model');
        $this->load->model('vumroh_costum_jamaah_model');
        $this->load->model('vorder_all_model');
        $this->load->model('vorder_costum_all_model');
        $this->load->model('vpaid_paketumroh_model');
        $this->load->model('vpaid_paketumroh_costum_model');
        $this->load->library(array( 'ion_auth' ));
        // check admin groups or not
        $group = array('admin','staff','agent','ceo');
        if (!$this->ion_auth->in_group($group)) {
            $this->session->set_flashdata('message', 'You must be an administrator to view the users page.');
            redirect('admin/dashboard/access_denied');
        }
    }

    public function savefree()
    {
        $pilitemfree = $this->input->post('txtpilitemfree');
        $kodepaket = $this->input->post('txtkodepaketfree');
        $idpaket = $this->input->post('txtidpaketfree');

        $strpilitem= explode(",", $pilitemfree);
        foreach($strpilitem as $str)
        {
            if(!empty($str)){
                $save = $this->refffree_model->insert([
                    'codepackage' =>$kodepaket,
                    'idfree'=>intval($str),
                    'idpackage'=>$idpaket
                ]);
            }
        }
        print_r($save);
    }

    public function getdatalokasi()
    {
        $data['lstdt'] = $this->cabang_model->get();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    
    public function getloaddtlokasi($id)
    {
        $data['lstdt'] = $this->cabang_model -> get(array(
            'idpackage' => $id
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtjamaah_agent()
    {
        // cek agent
        $iduser = $_SESSION['user_id'];
        $getdtagent =  $this->agent_model->get([
            'iduser'=>$iduser
        ]);
        $query = $this->jamaah_model->get([
            'idagent'=> $getdtagent[0]['idagent']
        ]);
            if(!empty($query)){
                foreach ($query as $row)
                {
                    //count age base on birth date
                    $today = date("Y-m-d");
                    $diff = date_diff(date_create($row['tgl_lahir']), date_create($today));
                    //echo 'Age is '.$diff->format('%y');
                    if ($row['idgender']==1) {
                        $gender='Lk';
                    }else {
                        $gender='Pr';
                    }
                    $ary[] = array(
                        'idjamaah'=> $row['idjamaah'],
                        'nama' => $row['nama']." (".$gender."), Umur:".$diff->format('%y').", Kota Imigrasi:".$row['kota_imigrasi'].", No Pasport:".$row['no_pasport']
                    );
                }
            } else {
                $ary[]='';
            }

        $this->output->set_content_type('application_json');
        $result = $this->output->set_output(json_encode($ary));
        return $result;
    }
    public function getdtaorder_jamaah()
    {
        // cek agent
        $iduser = $_SESSION['user_id'];
        $getdtagent =  $this->agent_model->get([
            'iduser'=>$iduser
        ]);
        $data['lstdt'] = $this->vumroh_jamaah_model->get([
            'idagent'=>$getdtagent[0]['idagent']
        ]);
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtaorder_costum_jamaah()
    {
        // cek agent
        $iduser = $_SESSION['user_id'];
        $getdtagent =  $this->agent_model->get([
            'iduser'=>$iduser
        ]);
        $data['lstdt'] = $this->vumroh_costum_jamaah_model->get([
            'idagent'=>$getdtagent[0]['idagent']
        ]);
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }
    public function getdtaorderall_jamaah()
    {
        $data['lstdt'] = $this->vumroh_jamaah_model->get();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }


    public function getdt_provinsi()
    {
        $data['lstdt'] = $this->provinsi_model->get_order();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }
    public function getdt_kabupaten()
    {
        $data['lstdt'] = $this->kabupaten_model->get_order();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdt_kecamatan()
    {
        $data['lstdt'] = $this->kecamatan_model->get_order();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdt_kelurahan()
    {
        $data['lstdt'] = $this->kelurahan_model->get_order();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtall_jamaah()
    {
        $data['lstdt'] = $this->vjamaah_model->get_order();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }
    public function getdt_jamaah_byagent()
    {
        // cek agent
        $iduser = $_SESSION['user_id'];
        $getdtagent =  $this->agent_model->get([
            'iduser'=>$iduser
        ]);
        $data['lstdt'] = $this->vjamaah_model->get_order([
            'idagent'=>$getdtagent[0]['idagent']
        ]);
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }
    public function getdataorder_all()
    {
        $data['lstdt'] = $this->vorder_all_model->get_order(array(
            'isvoid' => 0,
            'status<' => 4,
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdataorder_finish_all()
    {
        $data['lstdt'] = $this->vorder_all_model->get_order(array(
            'isvoid' => 0,
            'status>=' => 4,
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }
    public function getdataorder_costum_agent()
    {
        $iduser = $_SESSION['user_id'];
        $getdtagent =  $this->agent_model->get([
            'iduser'=>$iduser
        ]);
        $data['lstdt'] = $this->order_kostum_umroh_model-> get_order(array(
            'idagent' => $getdtagent[0]['idagent'],
            'isvoid'=>0,
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdataorder_costum()
    {
        $data['lstdt'] = $this->order_kostum_umroh_model-> get_order(array(
            'isvoid'=>0,
            'status<' => 4,
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdataorder_finish_costum()
    {
        $data['lstdt'] = $this->order_kostum_umroh_model-> get_order(array(
            'isvoid'=>0,
            'status>=' => 4,
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }
    public function getdataorder_agent()
    {
        $iduser = $_SESSION['user_id'];
        $getdtagent =  $this->agent_model->get([
            'iduser'=>$iduser
        ]);
        $data['lstdt'] = $this->order_umrah_model-> get_order(array(
            'idagent' => $getdtagent[0]['idagent'],
            'isvoid'=>0
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_free($nmr)
    {
        $data['lstdt'] = $this->vumrohfree_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_costum_free($nmr)
    {
        $data['lstdt'] = $this->vumrohfree_costum_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_free_costum($nmr)
    {
        $data['lstdt'] = $this->vumrohfree_costum_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_include($nmr)
    {
        $data['lstdt'] = $this->vumrohinclude_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_costum_include($nmr)
    {
        $data['lstdt'] = $this->vumrohinclude_costum_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_include_costum($nmr)
    {
        $data['lstdt'] = $this->vumrohinclude_costum_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_bus($nmr)
    {
        $data['lstdt'] = $this->vumroh_bus_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_costum_bus($nmr)
    {
        $data['lstdt'] = $this->vumroh_costum_bus_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_bus_costum($nmr)
    {
        $data['lstdt'] = $this->vumroh_costum_bus_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_hotels($nmr)
    {
        $data['lstdt'] = $this->vumroh_hotels_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_costum_hotels($nmr)
    {
        $data['lstdt'] = $this->vumroh_costum_hotels_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_hotels_costum($nmr)
    {
        $data['lstdt'] = $this->vumroh_costum_hotels_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_mairlines($nmr)
    {
        $data['lstdt'] = $this->vumroh_airlines_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_costum_airlines($nmr)
    {
        $data['lstdt'] = $this->vumroh_costum_airlines_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }


    public function getloaddt_airlines_costum($nmr)
    {
        $data['lstdt'] = $this->vumroh_costum_airlines_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtgridumrohinclude($nmr)
    {
        $data['lstdt'] = $this->vumrohinclude_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtgridumrohinclude_costum($nmr)
    {
        $data['lstdt'] = $this->vumrohinclude_costum_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtgridumrohfree($nmr)
    {
        $data['lstdt'] = $this->vumrohfree_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtgridumrohfree_costum($nmr)
    {
        $data['lstdt'] = $this->vumrohfree_costum_model-> get(array(
            'idpackage' => $nmr
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtitemfree()
    {
        $data['lstdt'] = $this->free_model-> get();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtiteminclude()
    {
        $data['lstdt'] = $this->include_model-> get();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtjenispaket_umroh()
    {
        $data['lstdt'] = $this->jenispaket_umroh_model-> get();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtbus()
    {
        $data['lstdt'] = $this->bus_model-> get();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }
    public function getdthotelmekkah()
    {
        $data['lstdt'] = $this->hotels_model-> get(array(
            'Address' => 'Makkah'
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtadminwa()
    {
        $data['lstdt'] = $this->adminwa_model-> get();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtnotifwa()
    {
        $data['lstdt'] = $this->notif_model-> get_order();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }
    public function getdthotelmadinah()
    {
        $data['lstdt'] = $this->hotels_model-> get(array(
            'Address' => 'Madinah'
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdthotelturki()
    {
        $data['lstdt'] = $this->hotels_model-> get(array(
            'Address' => 'Turki'
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdtairlines()
    {
        $data['lstdt'] = $this->airlines_model->get();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdataqouta()
    {
        $data['lstdt'] = $this->qoutaumroh_model->get_order();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdt_agent()
    {
        $data['lstdt'] = $this->agent_model->get();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddt_bayar_byid($idorder)
    {
        $data['lstdt'] = $this->vpaid_paketumroh_model-> get_order(array(
            'idorder' => $idorder,
            'isvoid'=>0
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }
    public function getdt_byrpaket_umroh()
    {
        $data['lstdt'] = $this->vpaid_paketumroh_model->get_order([
            'status'=>1
        ]);
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdt_byrpaket_umroh_finish()
    {
        $data['lstdt'] = $this->vpaid_paketumroh_model->get_order([
            'status'=>2
        ]);
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdt_byrpaket_umroh_costum()
    {
        $data['lstdt'] = $this->vpaid_paketumroh_costum_model->get_order([
            'status'=>1
        ]);
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }
    public function getdt_byrpaket_umrohfinisih_costum()
    {
        $data['lstdt'] = $this->vpaid_paketumroh_costum_model->get_order([
            'status'=>2
        ]);
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }
    public function getdt_byrpaket_umroh_agent()
    {
        $iduser = $_SESSION['user_id'];
        $getdtagent =  $this->agent_model->get([
            'iduser'=>$iduser
        ]);
        $data['lstdt'] = $this->vpaid_paketumroh_model->get_order(array(
            'idagent' => $getdtagent[0]['idagent'],
            'isvoid'=>0
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdt_byrpaket__costum_umroh_agent()
    {
        $iduser = $_SESSION['user_id'];
        $getdtagent =  $this->agent_model->get([
            'iduser'=>$iduser
        ]);
        $data['lstdt'] = $this->vpaid_paketumroh_costum_model->get_order(array(
            'idagent' => $getdtagent[0]['idagent'],
            'isvoid'=>0
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }
    public function getdataumroh()
    {
        $data['lstdt'] = $this->qoutaumroh_model->get();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdatapaket_umroh()
    {
        $data['lstdt'] = $this->umroh_model->get();
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdatapaket_umroh_costum()
    {
        $data['lstdt'] = $this->umroh_costum_model->get_order([
            'status<'=>4
        ]);
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdatapaket_umroh_finish_costum()
    {
        $data['lstdt'] = $this->umroh_costum_model->get_order([
            'status>='=>4
        ]);
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdatapaket_umroh_costum_agent()
    {
        $iduser = $_SESSION['user_id'];
        $getdtagent =  $this->agent_model->get([
            'iduser'=>$iduser
        ]);
        $data['lstdt'] = $this->umroh_costum_model->get_order([
            'idagent' => $getdtagent[0]['idagent'],
            'status<' => 4,
        ]);
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getdatapaket_umroh_costum_finish_agent()
    {
        $iduser = $_SESSION['user_id'];
        $getdtagent =  $this->agent_model->get([
            'iduser'=>$iduser
        ]);
        $data['lstdt'] = $this->umroh_costum_model->get_order([
            'idagent' => $getdtagent[0]['idagent'],
            'status>=' => 4,
        ]);
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddtumroh($id)
    {
        $data['lstdt'] = $this->umroh_model -> get(array(
            'idpackage' => $id
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
    }

    public function getloaddtqouta($id)
    {
        $data['lstdt'] = $this->qouta_model -> get(array(
            'Idqouta' => $id
        ));
        $result = $data['lstdt'];
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($result));
        return $result;
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

    public function getdtpaket_costum_umroh($id)
    {
        //get dt package umroh
        $data['lstdtpaket_umroh'] = $this->umroh_costum_model -> get(array(
            'idpackage' => $id
        ));
        //get dt airline
        $data['lstdtairlines'] = $this->vumroh_costum_airlines_model -> get(array(
            'idpackage' => $id
        ));
        //get dt bus
        $data['lstdtbus'] = $this->vumroh_costum_bus_model -> get(array(
            'idpackage' => $id
        ));
        //get dt hotel
        $data['lstdthotel'] = $this->vumroh_costum_hotels_model -> get(array(
            'idpackage' => $id
        ));
        //get dt free
        $data['lstdtitem_free'] = $this->vumrohfree_costum_model -> get(array(
            'idpackage' => $id
        ));
        //get dt include
        $data['lstdtitem_include'] = $this->vumrohinclude_costum_model -> get(array(
            'idpackage' => $id
        ));
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($data));
        return $data;

    }

    public function render_event_order()
    {
        $query = $this->vorder_all_model -> get_order(array(
            'isvoid'=>0
        ));
        foreach ($query as $row)
        {
            $cal[] = array(
                'id'=> $row['idorder']."-".$row['idpackage'],
               // 'title' => $row['package']."\nHarga: Rp. ".number_format($row['price'])."\nJumlah Qouta: ".$row['qouta'] ." Orang\nBooking Qouta: ".$row['book']."\nSisa Qouta: ".$row['sisa'],
                'title' => "No Order :".$row['orderno']."\n".$row['nama']."\n".$row['package']."\nHarga Paket :".number_format($row['harga'])."\nJumlah Jamaah :".number_format($row['qty'])."\nTotal :".number_format($row['total']),
                'start' => $row['tglpaket']." 00:00:00",
                'end' => $row['tglpaket']." 00:00:00",
                'allday' => 'true',
                'backgroundColor' => 'green',
                'borderColor' => 'red'
            );
        }
        $this->output->set_content_type('application/json');
        $result = $this->output->set_output(json_encode($cal));
        return $result;
    }

    public function getdtpaket_umroh_costum($id)
    {
        //get dt package umroh
        $data['lstdtpaket_umroh'] = $this->umroh_costum_model -> get(array(
            'idpackage' => $id
        ));
        //get dt airline
        $data['lstdtairlines'] = $this->vumroh_costum_airlines_model -> get(array(
            'idpackage' => $id
        ));
        //get dt bus
        $data['lstdtbus'] = $this->vumroh_costum_bus_model -> get(array(
            'idpackage' => $id
        ));
        //get dt hotel
        $data['lstdthotel'] = $this->vumroh_costum_hotels_model -> get(array(
            'idpackage' => $id
        ));
        //get dt free
        //get dt free
        $data['lstdtitem_free'] = $this->vumrohfree_costum_model -> get(array(
            'idpackage' => $id
        ));
        //get dt include
        $data['lstdtitem_include'] = $this->vumrohinclude_costum_model -> get(array(
            'idpackage' => $id
        ));
        $this->output->set_content_type('application_json');
        $this->output->set_output(json_encode($data));
        return $data;

    }

    public function render_event_order_costum()
    {
        $query = $this->vorder_costum_all_model -> get_order(array(
            'isvoid'=>0
        ));
        foreach ($query as $row)
        {
            $cal[] = array(
                'id'=> $row['idorder']."-".$row['idpackage'],
                // 'title' => $row['package']."\nHarga: Rp. ".number_format($row['price'])."\nJumlah Qouta: ".$row['qouta'] ." Orang\nBooking Qouta: ".$row['book']."\nSisa Qouta: ".$row['sisa'],
                'title' => "No Order :".$row['orderno']."\n".$row['nama']."\n".$row['package']."\nHarga Paket :".number_format($row['harga'])."\nJumlah Jamaah :".number_format($row['qty'])."\nTotal :".number_format($row['total']),
                'start' => $row['tglpaket']." 00:00:00",
                'end' => $row['tglpaket']." 00:00:00",
                'allday' => 'true',
                'backgroundColor' => 'green',
                'borderColor' => 'red'
            );
        }
        $this->output->set_content_type('application/json');
        $result = $this->output->set_output(json_encode($cal));
        return $result;
    }
    public function getdatabank()
    {
        $query = $this->bank_model ->get_all();
        foreach ($query as $row)
        {
            $ary[] = array(
                'idbank'=> $row['idbank'],
                'bank' => $row['name']."-".$row['owner']."-".$row['number']
            );
        }
        $this->output->set_content_type('application_json');
        $result = $this->output->set_output(json_encode($ary));
        return $result;
    }
    public function render_event()
    {
        $query = $this->qoutaumroh_model -> get_all();
        foreach ($query as $row)
        {
            $cal[] = array(
                'id'=> $row['Idqouta']."-".$row['idpackage'],
                'title' => $row['package']."\nHarga: Rp. ".number_format($row['price'])."\nJumlah Qouta: ".$row['qouta'] ." Orang\nBooking Qouta: ".$row['book']."\nSisa Qouta: ".$row['sisa'],
                'start' => $row['start'],
                'end' => $row['end'],
                'sisa' => $row['sisa'],
                'allday' => 'true',
                'backgroundColor' => $row['color'],
                'borderColor' => 'red'
            );
        }
        $this->output->set_content_type('application/json');
        $result = $this->output->set_output(json_encode($cal));
        return $result;
    }
    public function event_order_agent()
    {
        $iduser = $_SESSION['user_id'];
        $getdtagent =  $this->agent_model->get([
            'iduser'=>$iduser
        ]);
        $query = $this->order_umrah_model -> get(array(
            'idagent'=>$getdtagent[0]['idagent'],
            'isvoid'=>0
        ));
        foreach ($query as $row)
        {
            $cal[] = array(
                'id'=> $row['idorder']."-".$row['idpackage'],
                'title' => "No Order :".$row['orderno']."\n".$row['package']."\nJumlah Jemaah: ".$row['qty'] ." Orang" ."\nHarga: Rp. ".number_format($row['harga'])."\nTotal: Rp. ".number_format($row['total']),
                'start' => $row['tglpaket'].' 00:00:00',
                'end' => $row['tglpaket'].' 00:00:00',
                'allday' => 'true',
                'backgroundColor' => 'green',
                'borderColor' => 'red'
            );
        }
        $this->output->set_content_type('application/json');
        $result = $this->output->set_output(json_encode($cal));
        return $result;
    }

    public function event_order_costum_agent()
    {
        $iduser = $_SESSION['user_id'];
        $getdtagent =  $this->agent_model->get([
            'iduser'=>$iduser
        ]);
        $query = $this->order_kostum_umroh_model -> get(array(
            'idagent'=>$getdtagent[0]['idagent'],
            'isvoid'=>0
        ));
        foreach ($query as $row)
        {
            $cal[] = array(
                'id'=> $row['idorder']."-".$row['idpackage'],
                'title' => "No Order :".$row['orderno']."\n".$row['package']."\nJumlah Jemaah: ".$row['qty'] ." Orang" ."\nHarga: Rp. ".number_format($row['harga'])."\nTotal: Rp. ".number_format($row['total']),
                'start' => $row['tglpaket'].' 00:00:00',
                'end' => $row['tglpaket'].' 00:00:00',
                'allday' => 'true',
                'backgroundColor' => 'green',
                'borderColor' => 'red'
            );
        }
        $this->output->set_content_type('application/json');
        $result = $this->output->set_output(json_encode($cal));
        return $result;
    }
}
