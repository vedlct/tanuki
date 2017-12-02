<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profilem');


    }


    public function showuser($userId)
    {
        $this->data['profile'] = $this->Profilem->getuser($userId);
        $this->data['city']=$this->Profilem->getAllCity();
        $this->load->view('userprofile', $this->data);
    }

    public function update_user(){

        /* $email=$this->input->post('email');
         print_r($email);*/

        $id =$this->input->post('id');
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $address=$this->input->post('address');
        $fkCity=$this->input->post('city');
        $contactNo=$this->input->post('contactNo');
        $postalCode=$this->input->post('postalCode');
        $memberCardNo=$this->input->post('memberCardNo');
        //$country=$this->input->post('country');
        //print_r($memberCardNo);


        $this->Profilem->updateuser($id,$name,$email,$password,$address,$fkCity,$contactNo,$postalCode,$memberCardNo,$memberCardNo);
        redirect( 'Profile/showuser/'.$id);

    }


}