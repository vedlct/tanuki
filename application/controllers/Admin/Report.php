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
    public function filterByEmployee(){
        $this->data['allreportemp']= $this->Reportm->filterByEmployee();
        //$this->data['allItemreport']= $this->Reportm->viewAllItemReport();
        $this->load->view('Admin/ReportFilterByEmployee', $this->data);
    }

    public function filterByItems(){
        $this->data['allreportitem']= $this->Reportm->filterByItems();
        $this->data['allreportitemsize']= $this->Reportm->filterByItemsSize();
        $this->load->view('Admin/ReportFilterByItems', $this->data);
    }

}
?>