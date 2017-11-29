<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdfgenerator');
        //$this->load->library("Pdf");


    }
    public function index()
    {


    }

    public function testPdf()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data='';

            $html = $this->load->view('Admin/testPdf', $data, true);
            $filename = 'testPdf';
            $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');



        } else {
            redirect('Login');
        }

    }

//    public function testPdf()
//    {
//        if ($this->session->userdata('userType') == "Admin") {
//
//
//            $data='';
//
//            $html= $this->load->view('Admin/testPdf',$data, true);
//
//            $this->Printmodel->create_pdf($data, $html);
//
//
//
//        } else {
//            redirect('Login');
//        }
//
//    }
}
