<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Promotions extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Promotionsm');

    }

    public function index()
    {
    }
    public function addPromotions()
    {

        if ($this->session->userdata('userType') == "Admin") {

            $this->data['allItem'] = $this->Promotionsm->getAllItem();
            $this->load->view('Admin/addPromotions', $this->data);

        } else {
            redirect('Login');
        }
    }

    public function insertPromotions()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $campain = $this->input->post('campain');
            $promocode = $this->input->post('promocode');
            $startdate = $this->input->post('startdate');
            $enddate = $this->input->post('enddate');
            $promotype = $this->input->post('promotype');
            $discount = $this->input->post('discount');
            $userid = $this->session->userdata('id');
            $status = $this->input->post('itemStatus');

            $itemlist = $this->input->post('itemlist[]');
            $itemDiscount = $this->input->post('itemDiscount[]');
            if ($promotype == "1") {

                $promotype = "a";

            } else {

                $promotype = "s";

            }

            if (array_filter($itemlist) == null && array_filter($itemDiscount) == null) {

                $promotiondata = array(
                    'campainTitle' => $campain,
                    'promoCode' => $promocode,
                    'startDate' => $startdate,
                    'endDate' => $enddate,
                    'promoType' => $promotype,
                    'discountAmount' => $discount,
                    'activationStatus' => $status,
                );
                $this->Promotionsm->insertPromotion($promotiondata);
            }

            else {

                    $promotiondata = array(
                       'campainTitle' => $campain,
                       'promoCode' => $promocode,
                      'startDate' => $startdate,
                      'endDate' => $enddate,
                      'promoType' => $promotype,
                     'activationStatus' => $status,
                    );
                        $promotionId = $this->Promotionsm->insertPromotion($promotiondata);
                        for ($i = 0; $i < count($itemlist); $i++) {
                         $promotionItemdata = array(
                           'fkPromotionId' => $promotionId,
                          'fkItemId' => $itemlist[$i],
                           'discountAmount' => $itemDiscount[$i],
                    );


                     $this->Promotionsm->insertPromotionItemdata($promotionItemdata);

                }
            }

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'Promotions Added Successfully');
                redirect('Admin/Promotions/addPromotions');
            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Promotions/addPromotions');
            }

        } else {
            redirect('Login');
        }
    }

    public function allPromotions()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $this->load->view('Admin/allPromotions');
        } else {

            redirect('Login');

        }

    }

    public function getPromotionById()
    {

        if ($this->session->userdata('userType') == "Admin") {
            $id = $this->input->post('id');
            $this->data['allItem'] = $this->Promotionsm->getAllItem();
            $this->data['promotioninfo'] = $this->Promotionsm->getPromotionById($id);
            $this->load->view('Admin/updatePromotion', $this->data);
        } else {
            redirect('Login');
        }

    }

    public function updatePromotionById($id)
    {

        if ($this->session->userdata('userType') == "Admin") {

            $campainTitle = $this->input->post('campain');
            $promocode = $this->input->post('promocode');
            $startdate = $this->input->post("startdate");
            $enddate = $this->input->post('enddate');
//            $promotype = $this->input->post('promotype');
            $discount = $this->input->post('discount');
            $status = $this->input->post('itemStatus');
            $promotiondata = array(
                'campainTitle' => $campainTitle,
                'promoCode' => $promocode,
                'startDate' => $startdate,
                'endDate' => $enddate,
//                'promoType' => $promotype,
                'discountAmount' => $discount,
                'activationStatus' => $status,
            );

            $this->data['error']= $this->Promotionsm->updatePromotionById($id,$promotiondata);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'Promotions Update  Successfully');
                redirect('Admin/Promotions/allPromotions');
            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Promotions/allPromotions');
            }
        } else {

            redirect('Login');

        }


    }


    public function getAllPromotions($type)
    {
        if ($this->session->userdata('userType') == "Admin") {

            if ($type == "a"){


                $this->data['promotions'] = $this->Promotionsm->getAllPromotionsByType($type);
                $this->load->view('Admin/allPromotionsByType', $this->data);

            }else{

                $this->data['promotions'] = $this->Promotionsm->getAllPromotionsByType($type);
                $this->data['promotionsItem'] = $this->Promotionsm->getAllPromotionsByTypeForItem();
                $this->load->view('Admin/allPromotionsByTypeForItem', $this->data);

            }
        }else {

            redirect('Login');

        }
    }

    public function deletePromotionById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
            $this->Promotionsm->deletePromotionById($id);

        }
        else{
            redirect('Login');
        }
    }
//add new selction  promotion view
    public  function addNewselectId()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $this->data['promotionId']=$this->input->post('id');

            $this->data['allItem'] = $this->Promotionsm->getAllItem();

            $this->load->view('Admin/addNewItemSelection',$this->data);
        }
        else{
            redirect('Login');
        }

    }

//inserting new promotion   id into database
    public  function addNewselectIdinsert($promotionId)
    {
        if ($this->session->userdata('userType') == "Admin") {


            $ItemId=$this->input->post('itemlist');
            $discount=$this->input->post('discount');

            $data = array(
               'fkPromotionId'=>$promotionId,
                'fkItemId' => $ItemId,
                'discountAmount' => $discount
            );
            $this->data['error'] = $this->Promotionsm->insertSelctionItemdata($data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'Selected items Promotion  added  Successfully');
                redirect('Admin/Promotions/allPromotions');
            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Promotions/allPromotions');
            }

        } else {
            redirect('Login');
        }
    }
//selecting the particley  selection promtion for update
    public function PromotionItemGetselectId()
    {

        if ($this->session->userdata('userType') == "Admin") {
           $data['itemsinfo']=$this->Promotionsm->getAllItem();
            $id = $this->input->post('id');
            $data['PromotionSelected'] = $this->Promotionsm->PromotionItemGetselectId($id);
            $this->load->view('Admin/updateSelectionItemByid',$data);

        } else {
            redirect('Login');
        }
    }



//Updating the selected  promotion id

    public  function  updateSelectionId($id)
    {
        if ($this->session->userdata('userType') == "Admin") {
            $fkItemId = $this->input->post('itemlist');
            $discount = $this->input->post('discount');

            $data=array(
                'fkItemId'=>$fkItemId,
                'discountAmount'=>$discount
            );
            $this->data['error']= $this->Promotionsm->updateSelectionById($id,$data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', 'Selected items  Update  Successfully');
                redirect('Admin/Promotions/allPromotions');
            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin/Promotions/allPromotions');
            }
        } else {

            redirect('Login');

        }


    }
//deleting particlur promtion id
    public  function deleteSelectedById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
            $this->Promotionsm->deleteSelectedById($id);

        }
        else{
            redirect('Login');
        }
    }


}