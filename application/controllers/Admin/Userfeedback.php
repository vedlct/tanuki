<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Userfeedback extends CI_Controller
{
    public function __construct()
    {
       parent::__construct();
       $this->load->model('Admin/Feedback');

    }
    public  function allUserfeedback()
    {
        if ($this->session->userdata('userType') == "Admin") {


            $data['userFeedback'] = $this->Feedback->allUserfeedback();

            $this->load->view('Admin/userFeedBack', $data);
        } else {
            redirect('Login');

        }
    }


    public  function updateUserFeedback()
    {
        if ($this->session->userdata('userType') == "Admin") {


          $this->load->view('Admin/updateUserFeedback');
        }
        else {
            redirect('Login');

        }


        }


    public function deleteUserfeedbackById()
    {


        if ($this->session->userdata('userType') == "Admin") {
            $id = $this->input->post('fid');
            print_r($id);
//           $this->Feedback->deleteFeedbackById($id);

        }
        else{
            redirect('Login');
        }
    }





}





