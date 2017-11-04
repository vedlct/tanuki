<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Loginm');
        $this->load->model('Categorym');
    }


    public function index()
    {
        $this->load->view('index');
    }

   public function category()
   {
       if ($this->session->userdata('userType') == "Admin") {
           $id = $this->session->userdata('id');
           $this->load->view('catagory');
       }
       else{
           redirect('login');
       }


   }

   public  function  add_catgory()
   {

       {
           if ($this->session->userdata('userType') == "Admin") {
               $id = $this->session->userdata('id');
               $catagoryname = $this->input->post('catagoryname');

               $data = array(

                   'name' => $catagoryname,
                   'fkInsertBy' => $id,


               );
             $this->load->view('catagory');

               $cat_id= $this->Categorym->cateinsert($data);

               redirect('Admin/home');

           } else {
               redirect('login');
           }
       }





}

    public function view_category()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $id = $this->session->userdata('id');
            $data['catgory'] = $this->Categorym->get_all_catagory();
            $this->load->view('view_catagory', $data);

        } else {
            redirect('login');


        }


    }


    public function find_category()
    {


        if ($this->session->userdata('userType') == "Admin") {
            $id = $this->session->userdata('id');
            $cat_id = $this->input->post('id');
            $data['find'] = $this->Categorym->find_category($cat_id);
            // $data['find']=$data1;

            $this->load->view('update_catagory', $data);



        } else {
            redirect('login');


        }


    }


    public function update_cat()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $id = $this->session->userdata('id');
            $data = array(
                'name' => $this->input->post('catagoryname'),

            );

            $this->Categorym->update_cat($id, $data);
            redirect('Admin/home');

        } else {
            redirect('login');


        }
    }

    public function delete_cat()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $id = $this->input->post('id');
            $del = $this->Categorym->delete_cat_by_id($id);

            echo 1;


        }
        else{
            redirect('login');
        }
    }















}
