<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller
{


    public function carts()
    {
        $this->load->view('cart');
    }
}