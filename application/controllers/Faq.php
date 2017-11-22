<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller
{
    public function faqs()

    {
        $this->load->view("faq");

    }
}