<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Promotions extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Promotionsm');

    }
    public function index(){}
    public function addPromotions(){

        if ($this->session->userdata('userType') == "Admin") {

            $this->data['allItem'] = $this->Promotionsm->getAllItem();
            $this->load->view('Admin/addPromotions', $this->data );

        }
        else
        {
            redirect('Login');
        }
    }

    public function insertPromotions(){
        if ($this->session->userdata('userType') == "Admin") {

            $campain=$this->input->post('campain');
            $promocode=$this->input->post('promocode');
            $startdate=$this->input->post('startdate');
            $enddate=$this->input->post('enddate');
            $promotype=$this->input->post('promotype');
            $discount=$this->input->post('discount');
            $userid=$this->session->userdata('id');
            $status  = $this->input->post('itemStatus');

            $itemlist = $this->input->post('itemlist[]');
            $itemDiscount = $this->input->post('itemDiscount[]');
            if ($promotype == "1"){

                $promotype="a";

            }else{

                $promotype="s";

            }


                if(array_filter($itemlist)==null && array_filter($itemDiscount) ==null) {

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
                   // $this->data['error'] = $this->Promotionsm->insertItemSizedata($promotionItemdata);
                    $promotiondata = array(
                        'campainTitle' => $campain,
                        'promoCode' => $promocode,
                        'startDate' => $startdate,
                        'endDate' => $enddate,
                        'promoType' => $promotype,
                        'activationStatus' => $status,
                    );
                    $promotionId= $this->Promotionsm->insertPromotion($promotiondata);
                    for ($i = 0; $i < count($itemlist); $i++) {

                        $promotionItemdata = array(
                            'fkPromotionId'=>$promotionId,
                            'fkItemId'=>$itemlist[$i],
                            'discountAmount' => $itemDiscount[$i],

                        );

                       // print_r($promotionItemdata);

                        $this->data['error'] = $this->Promotionsm->insertPromotionItemdata($promotionItemdata);

                    }
                }

                if (empty($this->data['error'])) {

                    $this->session->set_flashdata('successMessage','Promotions Added Successfully');
                    redirect('Admin/Promotions/addPromotions');
                } else {

                    $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                    redirect('Admin/Promotions/addPromotions');
                }

        }
           else
         {
             redirect('Login');
         }
    }

    public function allPromotions(){
        if ($this->session->userdata('userType') == "Admin") {
            $this->load->view('Admin/allPromotions');
        }else{

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

}