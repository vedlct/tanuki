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

    public function OrderBillPdf($orderId)
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->load->model('Admin/Ordersm');
            $this->load->model('Admin/Chargem');

            $this->data['orders'] = $this->Ordersm->viewOrderInfoByOrderIdForPrint($orderId);
            $this->data['ordersItems'] = $this->Ordersm->getAllOrdersItemsForPrint($orderId);
            $this->data['ordersStatus'] = $this->Ordersm->getAllOrdersStatus();
            $this->data['charge'] = $this->Chargem->getAllCharge();
            $this->data['pointUsed'] = $this->Ordersm->getUsedPointForOrder($orderId);

            $html = $this->load->view('Admin/invoicePdf', $this->data, true);
            $filename = 'testPdf';
            $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');


        } else {
            redirect('Login');
        }

    }

}
