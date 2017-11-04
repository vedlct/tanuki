<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Categorym');

    }

    public function addCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->load->view('addCategory');
        }
        else{
            redirect('Login');
        }

    }

    public  function  insertCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $id = $this->session->userdata('id');
            $catagoryname = $this->input->post('catagoryname');

            $data = array(

                'name' => $catagoryname,
                'fkInsertBy' => $id,


            );
            $cat_id= $this->Categorym->insertCategorym($data);

            redirect('Admin/Category/allCategory');

        } else {
            redirect('Login');
        }


    }


    public function allCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data['catgory'] = $this->Categorym->getAllCategorym();
            $this->load->view('allCategory', $data);

        } else {
            redirect('Login');


        }


    }



    public function manageCatagory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data['catgory'] = $this->Categorym->manageCatagorym();
            $this->load->view('allCategory', $data);

        } else {
            redirect('Login');


        }


    }


    public function getCatgoryById()
    {


        if ($this->session->userdata('userType') == "Admin") {

            $cat_id = $this->input->post('id');
            $data['find'] = $this->Categorym->getCatgoryByIdm($cat_id);
            $this->load->view('updateCategory', $data);



        } else {
            redirect('Login');


        }


    }


    public function updateCategoryById($id)
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data = array(
                'name' => $this->input->post('catagoryname')

            );

            $this->Categorym->updateCategoryById($id, $data);
            redirect('Admin/Category/allCategory');

        } else {
            redirect('login');


        }
    }
    public function deleteCategoryById()
    {
        if ($this->session->userdata('userType') == "Admin") {
            $id = $this->input->post('id');
            $del = $this->Categorym->deleteCategoryByIdm($id);
            echo 1;


        }
        else{
            redirect('Login');
        }
    }


}