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
//////////////////////////////ALL search CODE/////////////////////
    public function searchByDate(){

        $startdate= $this->input->post('startdate');
        $enddate= $this->input->post('enddate');
        $this->data['allreport']= $this->Reportm->viewAllReportBydate($startdate, $enddate);
        $this->data['allItemreport']= $this->Reportm->viewAllItemReport();
        $this->load->view('Admin/allReport', $this->data);
    }
    public function searchByOrderId(){
        $orderID= $this->input->post('orderid');
        $this->data['allreport']= $this->Reportm->viewAllReportByorderid($orderID);
//        print_r($this->data['allreport']);
        $this->data['allItemreport']= $this->Reportm->viewAllItemReport();
        $this->load->view('Admin/allReport', $this->data);
    }
    public function searchByMemberId(){
        $memberID= $this->input->post('memberid');
        $this->data['allreport']= $this->Reportm->viewAllReportBymemberid($memberID);
        $this->data['allItemreport']= $this->Reportm->viewAllItemReport();
        $this->load->view('Admin/ReportFilterByMemberId', $this->data);
    }
    public function searchByEmployeeId(){
        $employeeID= $this->input->post('employeeid');
        $this->data['allreport']= $this->Reportm->viewAllReportByemployeeid($employeeID);
        $this->data['allItemreport']= $this->Reportm->viewAllItemReport();
        $this->load->view('Admin/ReportFilterByEmloyeeId.php', $this->data);
    }

    public function searchByItemsDate(){
        $startdate= $this->input->post('startdate');
        $enddate= $this->input->post('enddate');
        $this->data['allreportitem']= $this->Reportm->filterByItemsDate($startdate,$enddate );
        $this->data['allreportitemsize']= $this->Reportm->filterByItemsSize();
        $this->load->view('Admin/ReportFilterByItems', $this->data);
    }

//// everyday earinig ////////////////////////////////////////////////////////////////////////

    public  function getTotaltransactiondetail()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $totalearning= 0;
            $totalvat= 0;

            //  echo 1;
            $this->data['totalearning'] = $this->Reportm->totalEaring();
            $this->data['totalvat']= $this->Reportm->totalvat();
            foreach ($this->data['totalearning'] as $totalTransection){
                $earning=(($totalTransection->totalquantity * $totalTransection->totalrate) - $totalTransection->totaldiscount);
            $totalearning = $earning+$totalearning;
            }
            foreach ($this->data['totalvat'] as $totalVat){
               // $earning=(($totalTransection->totalquantity * $totalTransection->totalrate) - $totalTransection->totaldiscount);
                $totalvat = $totalVat->totalvat;
            }


            //$totalearning = $totalearning+ $totalTransection->totalvat;
            echo $totalearning+$totalvat;


        }

        else {

            redirect('Login');
        }

    }

}
?>