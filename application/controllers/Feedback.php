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


           public function getReview($itemid)
         {
            $this->data['allItem'] = $this->Feedbackm->getitemById($itemid);
            $this->data['userFeedback'] = $this->Feedbackm->allUserfeedback();
             $this->load->view('customerReview', $this->data);


        }


         public function newReview($id)
         {

        $userId = $this->session->userdata('id');
        $review = $this->input->post('review_text');

            $data = array(
            'fkItemId' => $id,
            'fkUserId' => $userId,
            'feedback' => $review,
             'userRating' => '',

            );

         $data['userFeedback'] = $this->Feedbackm->insertFeedback($data);
         redirect("Feedback/getReview/" . $id);


       }






}