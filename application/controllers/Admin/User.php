<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Userm');

    }



//  public  function index()
//  {
//
//
//
// }


    public function allUser()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data['user'] = $this->Userm->getUser();
            $this->load->view('Admin/User', $data);
        }
        else
        {
            redirect('Login');
        }

    }

    public  function newUser()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $data['city']=$this->Userm->getAllCity();
         $this->load->view('Admin/addNewUser',$data);
        }
        else
        {
            redirect('Login');
        }
    }

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
                'fkUserType' => $userId
            );

            $this->Userm->user($data);

            redirect('Admin/User/allUser');
        }

        else
        {
            redirect('Login');
        }

    }



    public function getUserById()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $userid = $this->input->post('id');
            $data['city']=$this->Userm->getAllCity();
            $data['userInfo'] = $this->Userm->getuserById($userid);
            //print_r($data['userInfo']);
            $this->load->view("Admin/updateUser",$data);
        } else {
            redirect('Login');
        }
    }


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


            );

           // print_r($data ,$id );

            $data['error']= $this->Userm->updateUserById($id, $data);

           // print_r($data);

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




}