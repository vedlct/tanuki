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
                    'userActivationStatus'=>'1',
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

    public function newUserRegFromResturant()
    {

        $name = $this->input->post('Name');
        $address = $this->input->post('address');
        $city = $this->input->post('city');
        $postal = $this->input->post('pcode');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // $conPassword = $this->input->post('conPassword');
        $phone = $this->input->post('phone');

        $data=array(
            'name'=>$name,
            'address'=>$address,
            'postalCode'=>$postal,
            'fkCity'=>$city,
            'contactNo'=>$phone,
            'email'=>$email,
            'password'=>$password,
            'userActivationStatus'=>'1',
            'fkUserType'=>'cus',
        );
        $this->data['customerId']=$this->loginm->customerRegisterFromResturant($data);

        $data = array(
            'memberuserid' => $this->data['customerId'],
        );
        $this->session->set_userdata($data);
        redirect('Items');

    }

    public function showNewUserReg()
    {
        $this->load->view('newUserRegistration');
    }

//    public function test(){
//
//        date_default_timezone_set("Asia/Dhaka");
//        $now = date('Y-m-d H:i:s');
//        echo $now."<br>";
//        $newtimestamp = strtotime('+30 minutes', strtotime($now));
//        echo date('Y-m-d H:i:s', $newtimestamp);
//
//        if ($now < $newtimestamp){
//            echo 1;
//        }
//    }
    public function ChangePassword($userId)
    {
        $nowDate=date('Y-m-d H:i:s');
        $this->data['customerPassChangeReq']=$this->loginm->customerpassChangeReq($userId);
        if (!empty($this->data['customerPassChangeReq'])){
            foreach ($this->data['customerPassChangeReq'] as $changeReq){
                $requestDate=$changeReq->passwordChangeRequestTime;
                $requestId=$changeReq->userId;
            }
            $newtimestamp = strtotime('+30 minutes', strtotime($requestDate));
            if ($nowDate < $newtimestamp){

                $this->load->view('newUserRegistration');

            }
        }

    }

    public function forgetPassMail()
    {
        $forgetemail = $this->input->post('forgetemail');
        $customerEmail=$this->loginm->checkCustomerEmailAvailabe($forgetemail);
       // echo $customerEmail->userId;

        if (!empty($customerEmail)){
            $this->loginm->passwordChangeRequestSubmit($forgetemail);

            $this->load->helper(array('email'));
            $this->load->library(array('email'));

            $this->email->set_mailtype("html");
            $this->email->from('tanukiva@host16.registrar-servers.com', 'Tanuki');
            $this->email->to($forgetemail);
            $this->email->subject('Forget PassWord Request');
            $message = "Dear User,<br /><br />Please click on the below activation link to Change your password.<br /><br /> <a href='".base_url()."Login/ChangePassword/" .$customerEmail->userId."'>ChangePass For -" .$forgetemail."</a><br /><br /><br />Thanks<br />[Tanuki Team]";
//        $message = $this->load->view('invoicePdf', $this->data,true);
            $this->email->message($message);
            //$this->email->send();

            if ($this->email->send()){

                $this->session->set_flashdata('successMessage','Forget PassWord Request Sent SuccessFully');
                redirect('Items');

            }else{
                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Items');
            }

        }

    }
    
    public function CheckUser()
    {
        $userEmail=$this->input->post('mail');
        $this->data['customerEmail']=$this->loginm->checkCustomerEmailAvailabe($userEmail);
        
        if (!empty($this->data['customerEmail'])){
            
            echo "1";
            
        }
        else{
            echo "0";
        }


    }

//    public function mailInvoice($forgetemail)
//    {
//        $this->load->helper(array('email'));
//        $this->load->library(array('email'));
//        $this->load->model('Userorderm');
//        $this->email->set_mailtype("html");
//        $this->email->from('tanukiva@host16.registrar-servers.com', 'Tanuki');
//        $this->email->to($forgetemail);
//        $this->email->subject('Forget PassWord Request');
//        $message = "Dear User,<br /><br />Please click on the below activation link to update your password.<br /><br /> <a href='".base_url()."Login/ChangePass/" . $forgetemail ."'>ChangePass-" .$forgetemail."</a><br /><br /><br />Thanks<br />[Tanuki Team]";
////        $message = $this->load->view('invoicePdf', $this->data,true);
//        $this->email->message($message);
//        $this->email->send();
//    }
}