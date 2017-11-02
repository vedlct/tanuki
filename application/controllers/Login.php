<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('loginm');
    }


    public function index()
    {
        $this->load->view('login');
    }


    public function check_user()
    {

        $this->load->library('user_agent');
        $result = $this->loginm->validate_user($_POST);

        if (!empty($result)) {

            $data = array(
                'name' => $result->name,
                'email' => $result->email,
                'id' => $result->userId,
                'userType' => $result->userType,
                'loggedin' => "true",
            );

            $this->session->set_userdata($data);

            $this->session->userdata('id');


            $data1=array(
                'sourceIp'=>$this->input->ip_address(),
                'fkUserId'=>$result->userId,
                'browser'=>$this->agent->browser()

            );
            $this->loginm->loginInfo($data1);

            if ($this->session->userdata('userType') == "Admin"){
                redirect('Admin/Home');
            }
            elseif ($this->session->userdata('userType') == "Customer")
            {
                redirect('Admin/Home');
            }

        }
        else{
            echo "<script>
                        alert('wrong username or password');
                     window.location=\"/tanuki/Login\";  
					
                </script>";

        }

    }






}



