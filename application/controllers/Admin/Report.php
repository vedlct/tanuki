<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Reportm');

    }

    public function viewReport(){
        $this->data['allreport']= $this->Reportm->viewAllReport();
        $this->data['allItemreport']= $this->Reportm->viewAllItemReport();
        $this->load->view('Admin/allReport', $this->data);
    }
    public function searchByDate(){

    }

    public function filterByCustomer(){
        $this->data['allreportcus']= $this->Reportm->filterByCustomer();
        //$this->data['allItemreport']= $this->Reportm->viewAllItemReport();
        $this->load->view('Admin/ReportFilterByCustomer', $this->data);
    }
}
?>