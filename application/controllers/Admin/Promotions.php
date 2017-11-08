<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Promotions extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Promotionsm');

    }
    public function index(){ echo 23434;}
    public function addPromotions(){

        if ($this->session->userdata('userType') == "Admin") {

            $this->data['allItem'] = $this->Promotionsm->getAllItem();
            $this->load->view('Admin/addPromotions', $this->data );

        }
        else
        {
            redirect('Login');
        }
    }

    public function insertPromotions(){
        if ($this->session->userdata('userType') == "Admin") {

            $this->Promotionsm->insertPromotion();
          redirect('Admin/Promotions/addPromotions');

        }
        else
        {
            redirect('Login');
        }
    }
}