<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurantsubmition extends CI_Controller
{

    public function allRestaurant()
    {
        $this->load->view('submit_restaurant');
    }
}