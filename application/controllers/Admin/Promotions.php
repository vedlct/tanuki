<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Promotions extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Promotionsm');

    }
    public function index(){ echo 23434;}
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
            if ($promotype == "All Item"){
                $promotype="a";
            }else{
                $promotype="s";
            }
            //$textstatus = $this->input->post('textstatus[]');



                // if something need after image upload

//            $promotiondata = array(
//                    'campainTitle' => $campain,
//                    'promoCode' => $promocode,
//                    'startDate' => $startdate,
//                    'endDate' => $enddate,
//                    'promoType' => $promotype,
//                    'discountAmount' => $discount,
//                    'activationStatus' => $status,
//                );
//                $promotionId= $this->Promotionsm->insertPromotion($promotiondata);

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
}