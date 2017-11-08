<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Promotions extends CI_Controller
{

//    public function __construct()
//    {
//        parent::__construct();
//        $this->load->model('Admin/Promotionsm');
//
//    }
    public function index(){ echo 23434;}
    public function addPromotions(){

        if ($this->session->userdata('userType') == "Admin") {

           // $this->data['categoryNameId'] = $this->Categorym->getAllCategoryNameId();
            $this->load->view('Admin/addPromotions' );

        }
        else
        {
            redirect('Login');
        }
    }
}