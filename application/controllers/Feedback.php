<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Feedbackm');
//        $this->load->model('Admin/Promotionsm');
//        $this->load->model('Admin/Userm');

    }

    public function index()
    {
        $data['userFeedback'] = $this->Feedbackm->allUserfeedback();
        $this->load->view('userReview', $data);


    }


    public function newReview()
    {

        if ($this->session->userdata('userType') == "Cus") {
            $userId = $this->session->userdata('id');




        $data = array(
            'fkUserId' => $userId,


        );

    }

    else
     {
     echo "registation first";
     }

    }

}