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
         //$this->data['allItem'] = $this->Feedbackm->getitemByIdAll();
         //$this->data['avgrating']= $this->Feedbackm->ratingavgAll();
        $this->data['userFeedback'] = $this->Feedbackm->allResturantUserfeedback();

        //print_r($this->data['userFeedback']);
        $this->load->view('allRestaurantsReview', $this->data);

     }

     public function newRestuirantreview()
     {
         $name = $this->input->post('name');
         $review = $this->input->post('review_text');


         $data =array(
             'name'=>$name,
           'feedback'=>$review


         );

         $this->Feedbackm->newRestuirantreview($data);
         redirect("Items");



     }



    public function getReview($itemid)
           {
            $this->data['allItem'] = $this->Feedbackm->getitemById($itemid);
           //$this->data['userFeedback'] = $this->Feedbackm->allUserfeedback();

            $this->data['userFeedback'] = $this->Feedbackm->feedbackbyitem($itemid);
            $this->data['avgrating']= $this->Feedbackm->ratingavg($itemid);
             $this->load->view('customerReview', $this->data);


           }

           public function allReview()
           {
               $data = $this->Feedbackm->allUserfeedback();


               print_r($data);

               //$this->load->view('userReview',$this->data);
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



         $data['userFeedback'] = $this->Feedbackm->insertFeedback($data);
         redirect("Feedback/getReview/" . $id);


       }






}