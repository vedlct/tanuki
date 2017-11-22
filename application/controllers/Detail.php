<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function details()

    {
        $this->load->view("detail_page");

    }
}