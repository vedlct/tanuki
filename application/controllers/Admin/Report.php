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

        $startdate= $this->input->post('startdate');
        $enddate= $this->input->post('enddate');
        $this->data['allreport']= $this->Reportm->viewAllReportBydate($startdate, $enddate);
        $this->data['allItemreport']= $this->Reportm->viewAllItemReport();
        $this->load->view('Admin/allReport', $this->data);
    }

    public function filterByCustomer(){
        $this->data['allreportcus']= $this->Reportm->filterByCustomer();
        $this->data['allorder']= $this->Reportm->getTotalorderCustomer();
        $this->load->view('Admin/ReportFilterByCustomer', $this->data);
    }
    public function filterByEmployee(){
        $this->data['allreportemp']= $this->Reportm->filterByEmployee();
        $this->data['allorder']= $this->Reportm->getTotalorderEmployee();
        $this->load->view('Admin/ReportFilterByEmployee', $this->data);
    }

    public function filterByItems(){
        $this->data['allreportitem']= $this->Reportm->filterByItems();
        $this->data['allreportitemsize']= $this->Reportm->filterByItemsSize();
        $this->load->view('Admin/ReportFilterByItems', $this->data);
    }

    public function filterByPoints(){
        $this->data['allreportearnpoint']= $this->Reportm->earnPointCount();
        $this->data['allreportexpensepoint']= $this->Reportm->expensePointCount();
        $this->load->view('Admin/ReportFilterByPoint', $this->data);
    }

}
?>