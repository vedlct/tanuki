<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }


    public function index()
    {

    }
    public function userEmailToResturant()
    {
        $email=$this->input->post('email');
        $name=$this->input->post('name');
        $details=$this->input->post('details');

        $this->load->helper(array('email'));
        $this->load->library(array('email'));

        $this->email->set_mailtype("html");
        $this->email->from('tanukiva@host16.registrar-servers.com',$name);
        $this->email->to("mujtaba.rumi1@gmail.com");
        $this->email->subject('Customer Inquery');

        $this->email->message($email."<br>".$details);
        $this->email->send();

        redirect('Items');

    }
}
