<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('loginm');
    }


    public function check_user()
    {

        $this->load->library('user_agent');
        $result = $this->loginm->validate_user($_POST);

        if (!empty($result)) {

            $data1=array(

                'sourceIp'=>$this->input->ip_address(),
                'fkUserId'=>$result->userId,
                'browser'=>$this->agent->browser()

            );
            $loginId=$this->loginm->loginInfo($data1);

            $data = array(
                'name' => $result->name,
                'email' => $result->email,
                'id' => $result->userId,
                'userType' => $result->userType,
                'loggedin' => "true",
                'loginId'=>$loginId,
            );

            $this->session->set_userdata($data);

            if ($this->session->userdata('userType') == "cus")
            {
                redirect('Items/itemShow');
            }


        }
        else{
            echo "<script>
                        alert('wrong username or password');
                     window.location=\"/tanuki\";  
					
                </script>";

        }

    }
    public function logout()
    {
        $data = array(
            'logOutTime'=>date('Y-m-d H:i:s')
        );

        $id=$this->session->userdata('loginId');
        $this->loginm->logout($id,$data);
        $this->session->sess_destroy();

        redirect('Items/itemShow');

    }

    public function registerUser()
    {
        $this->load->library('form_validation');

        if (!$this->form_validation->run('userRes')) {

            $this->load->model('Admin/Departmentm');
            $this->data['departmentName'] = $this->Departmentm->gellDepartmentName();
            $this->load->view('Admin/newCourse', $this->data);

        }
        $name = $this->input->post('Name');
        $address = $this->input->post('address');
        $city = $this->input->post('city');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $conPassword = $this->input->post('conPassword');
        $phone = $this->input->post('phone');

        if ($password==$conPassword){


        }



        redirect('Login');
    }







}



