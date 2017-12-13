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
         $this->data['allItem'] = $this->Feedbackm->getitemByIdAll();
         $this->data['avgrating']= $this->Feedbackm->ratingavgAll();
        $data['userFeedback'] = $this->Feedbackm->allUserfeedback();
        $this->load->view('userReview', $data);

     }


    public function getReview($itemid)
           {
            $this->data['allItem'] = $this->Feedbackm->getitemById($itemid);
           //$this->data['userFeedback'] = $this->Feedbackm->allUserfeedback();

            $this->data['userFeedback'] = $this->Feedbackm->feedbackbyitem($itemid);
            $this->data['avgrating']= $this->Feedbackm->ratingavg($itemid);
             $this->load->view('customerReview', $this->data);


           }


         public function newReview($id)
         {

         $userId = $this->session->userdata('id');
         $review = $this->input->post('review_text');
         $rating = $this->input->post('rating');

            $data = array(
            'fkItemId' => $id,
            'fkUserId' => $userId,
            'feedback' => $review,
             'userRating' =>$rating

            );

            print_r($data);


         $data['userFeedback'] = $this->Feedbackm->insertFeedback($data);
         redirect("Feedback/getReview/" . $id);


       }






}