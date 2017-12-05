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

            if ($result->userType == "cus" && $result->userActivationStatus == "0")
            {
                echo "<script>
                    alert('Your Id is not Active Yet Please Try again Sometime');
                    window.location.href= '" . base_url()."';
                    </script>";
            }
            else if ($result->userType == "cus" && $result->userActivationStatus == "1") {


                $data1 = array(

                    'sourceIp' => $this->input->ip_address(),
                    'fkUserId' => $result->userId,
                    'browser' => $this->agent->browser()

                );
                $loginId = $this->loginm->loginInfo($data1);

                $data = array(
                    'name' => $result->name,
                    'email' => $result->email,
                    'id' => $result->userId,
                    'userType' => $result->userType,
                    'loggedin' => "true",
                    'loginId' => $loginId,
                );

                $this->session->set_userdata($data);

                redirect('Items/itemShow');

            }
        }
        else{
            echo "<script>
                        alert('wrong username or password');
                     window.location.href='". base_url() ."';  
					
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

    public function showRegitration()
    {
        $this->load->view('userRegistration');
    }

    public function registerUser()
    {
        $this->load->library('form_validation');

        if (!$this->form_validation->run('userRes')) {

            $this->load->view('userRegistration');

        }
        else {
            $name = $this->input->post('Name');
            $address = $this->input->post('address');
            $city = $this->input->post('city');
            $postal = $this->input->post('pcode');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $conPassword = $this->input->post('conPassword');
            $phone = $this->input->post('phone');

            if ($password == $conPassword) {

                $data=array(
                    'name'=>$name,
                    'address'=>$address,
                    'postalCode'=>$postal,
                    'fkCity'=>$city,
                    'contactNo'=>$phone,
                    'email'=>$email,
                    'password'=>$conPassword,
                    'userActivationStatus'=>'0',
                    'fkUserType'=>'cus',

                );

                $this->data['error']=$this->loginm->customerRegister($data);

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Customer Created Successfully');
                    redirect('Login/showRegitration');

                } else {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Login/showRegitration');

                }

            }
        }
    }







}



