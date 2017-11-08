<?php defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Promotionsm');
    }

 public function testview(){
        echo "hello";
 }
}