<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PdfMaker extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdfgenerator');

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

    public function OrderBillPdf()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data='';

            $html = $this->load->view('Admin/invoicePdf', $data, true);
            $filename = 'testPdf';
            $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');


        } else {
            redirect('Login');
        }

    }
}
