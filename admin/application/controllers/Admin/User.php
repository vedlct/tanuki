<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Userm');

    }



//showing  All user info  for showing  the city in insert  form and update form
    public function allUser()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data['user'] = $this->Userm->getUser();
            //print_r($data);
            $this->load->view('Admin/allUser', $data);
        }
        else
        {
            redirect('Login');
        }

    }

    //User Adding View form
    public  function newUser()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $data['city']=$this->Userm->getAllCity();
            $data['userTypeinfo']=$this->Userm->getuserType();
         $this->load->view('Admin/addNewUser',$data);
        }
        else
        {
            redirect('Login');
        }


    }
//Inserting User  from value into database
    public function insertUser()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $userId = $this->session->userdata('id');
            $username = $this->input->post('username');
            $address = $this->input->post('address');
            $postcode = $this->input->post('postcode');
            $city = $this->input->post('city');
            $membercardnumber = $this->input->post('membercardnumber');
            $contactNo = $this->input->post('contactno');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $status = $this->input->post('status');
            $usertype=$this->input->post('usertype');
            $data = array(
                'name' => $username,
                'address' => $address,
                'postalCode' => $postcode,
                'fkCity' => $city,
                'memberCardNo' => $membercardnumber,
                'contactNo' => $contactNo,
                'email' => $email,
                'password' => $password,
                'userActivationStatus' => $status,
                'fkUserType' => $usertype
            );

            $this->data['error'] = $this->Userm->user($data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','User Added Successfully');
                redirect('Admin/user/allUser');

            } else {

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/user/allUser');
            }
        }

        else
        {
            redirect('Login');
        }

    }


//Calling particular User detail in view form
    public function getUserById()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $userid = $this->input->post('id');
            $data['city']=$this->Userm->getAllCity();
            $data['userTypeinfo']=$this->Userm->getuserType();
            $data['userInfo'] = $this->Userm->getuserById($userid);
            $this->load->view("Admin/updateUser",$data);
        } else {
            redirect('Login');
        }
    }

//Updating Particular User Detail
    public function updateUserById($id)
    {
        if ($this->session->userdata('userType') == "Admin") {
            $username = $this->input->post('username');
            $address = $this->input->post('address');
            $postcode = $this->input->post('postcode');
            $city = $this->input->post('city');
            $membercardnumber = $this->input->post('membercardnumber');
            $contactNo = $this->input->post('contactno');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $status = $this->input->post('status');
            $usertype=$this->input->post('usertype');
            $data = array(
                'name' => $username,
                'address' => $address,
                'postalCode' => $postcode,
                'fkCity' => $city,
                'memberCardNo' => $membercardnumber,
                'contactNo' => $contactNo,
                'email' => $email,
                'password' => $password,
                'userActivationStatus' => $status,
                'fkUserType'=> $usertype
            );
            $data['error']= $this->Userm->updateUserById($id, $data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','User Updated Successfully');
                redirect('Admin/User/allUser');

            } else {

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/User/allUser');
            }
        } else {
            redirect('login');
        }

    }

//Deleting Particular User id
      public function deleteUseryById()
   {


            if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
             $this->Userm->deleteUserById($id);
         }
         else{
           redirect('Login');
           }
  }


    public function  allAdmin()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $data['city']=$this->Userm->getAllCity();
            $data['userTypeinfo']=$this->Userm->getuserType();
            $data['user'] = $this->Userm-> getAdmin();
            $this->load->view('Admin/allAdmin', $data);
        }

        else{
            redirect('Login');
        }
    }

    public  function allCustomer()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data['city']=$this->Userm->getAllCity();
            $data['userTypeinfo']=$this->Userm->getuserType();
            $data['user'] = $this->Userm->getCustomer();
            $this->load->view('Admin/allcustomer', $data);
        }

        else{
            redirect('Login');
        }

    }

    public function getTotalUser()
    {
        if ($this->session->userdata('userType') == "Admin") {

        echo $result = $this->Userm->getTotalUser();
        }
        else
        {
            redirect('Login');
        }


    }

}