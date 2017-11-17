<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller
{
    public function __construct()
    {
       parent::__construct();
       $this->load->model('Admin/Feedbackm');
       $this->load->model('Admin/Promotionsm');
       $this->load->model('Admin/Userm');

    }
    public  function allUserfeedback()
    {
        if ($this->session->userdata('userType') == "Admin") {


            $data['userFeedback'] = $this->Feedbackm->allUserfeedback();

            $this->load->view('Admin/userFeedBackDetail', $data);
        } else {
            redirect('Login');

        }
    }


    public  function updateUserFeedback()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $id = $this->input->post('id');
            $data['itemsinfo']=$this->Promotionsm->getAllItem();
            $data['user'] = $this->Feedbackm->getCustomer();
            $data['userFeedbackinfo']=$this->Feedbackm->feedbackId($id);
            $this->load->view('Admin/updateUserFeedback',$data);
        }
        else {
            redirect('Login');

        }


        }

        public  function UpdateUserFeedbackById($id)
        {

            if ($this->session->userdata('userType') == "Admin") {
            $itemlist = $this->input->post('itemlist');
            $customer= $this->input->post('customer');
            $rating = $this->input->post('rating');
            $detail=$this->input->post('detail');
            $data = array(
                'fkItemId' => $itemlist,
                'fkUserId' => $customer,
                'userRating' => $rating,
                'feedback'=> $detail
            );


            $data['error']= $this->Promotionsm->updatefeedbackById($id, $data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Feedback  Updated Successfully');
                redirect('Admin/Feedback/allUserfeedback');

            } else {

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Feedback/allUserfeedback');
            }
        } else {
            redirect('login');
        }
        }






    public function deleteUserfeedbackById()
    {



        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
            $this->Feedbackm->deleteFeedbackById($id);
            //echo $id;
        }
        else{
            redirect('Login');
        }
    }





}





