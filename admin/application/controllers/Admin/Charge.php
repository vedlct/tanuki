<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Charge extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Chargem');

    }


    public function allCharges()
    {
        if ($this->session->userdata('userType') == "Admin") {

        $this->data['charge'] = $this->Chargem->getAllCharge();
        if (empty($this->data['charge'])){
            $this->load->view("Admin/newCharge");
        }
        else{
            $this->load->view("Admin/allCharge", $this->data);
        }


    }
    else{
        redirect('Login');
    }

    }

    public  function insertCharge()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $deliveryfee = $this->input->post('deliveryfee');
            $vat = $this->input->post('vat');

            $data = array(
                'deliveryfee' => $deliveryfee,
                'vat' => $vat,
            );
           $this->data['error'] = $this->Chargem->insertCharge($data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Charge Added Successfully');
                redirect('Admin/Charge/allCharges');

            } else {

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Charge/allCharges');

            }

        }
        else {
            redirect('Login');
        }
    }

    public  function getChargeById()
    {

        if ($this->session->userdata('userType') == "Admin") {

            $charge_id = $this->input->post('id');
            $data['chageInfo'] = $this->Chargem->getChargeById($charge_id);
            $this->load->view('Admin/updateCharge',$data);

        } else {
            redirect('Login');
        }
    }

    public  function  updateCharge($id)
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data = array(
                'deliveryfee' => $this->input->post('deliveryfee'),
                'vat' => $this->input->post('vat'),

            );

          $this->data['error'] = $this->Chargem->updateChargeById($id, $data);


            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Charge Updated Successfully');
                redirect('Admin/Charge/allCharges');;

            } else {

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Charge/allCharges');

            }

        } else {
            redirect('login');
        }
    }

    public function deleteChargeById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
          $this->Chargem->deleteChargeById($id);

        }
        else{
            redirect('Login');
        }
    }


}