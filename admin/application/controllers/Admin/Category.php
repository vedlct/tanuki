<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Categorym');

    }

    public function index()
    {

    }

    public function allCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data['category'] = $this->Categorym->getAllCategory();
            $this->load->view('Admin/allCategory', $data);
        }
        else
        {
            redirect('Login');
        }

    }

    public function newCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $this->load->view('Admin/newCategory');
        }
        else{
            redirect('Login');
        }

    }

    public  function  addCategory()
    {

        if ($this->session->userdata('userType') == "Admin")
        {

            $categoryName = $this->input->post('catagoryname');
            $description = $this->input->post('description');
            $catStatus = $this->input->post('catStatus');

            $userId=$this->session->userdata('id');

            $data = array(
                'name' => $categoryName,
                'fkInsertBy' =>$userId,
                'description'=>$description,
                'categoryStatus'=>$catStatus
            );
            $this->data['error'] = $this->Categorym->insertCategory($data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Category Added Successfully');
                redirect('Admin-Category');

            } else {

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin-Category');

            }

        }
        else {
            redirect('Login');
        }
    }


    public function getCategoryById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $cat_id = $this->input->post('id');
            $data['categoryInfo'] = $this->Categorym->getCatgoryById($cat_id);
            $this->load->view('Admin/updateCategory',$data);

        } else {
            redirect('Login');
        }
    }

    public function checkCategory()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $catName = $this->input->post('catName');
            $data['categoryInfo'] = $this->Categorym->checkCategoryName($catName);
            if (empty($data['categoryInfo'])){
                echo "0";
            }
            else{
                echo "1";
            }
            //$this->load->view('Admin/updateCategory',$data);

        } else {
            redirect('Login');
        }
    }

    public function updateCategoryById($id)
    {
        if ($this->session->userdata('userType') == "Admin") {

            $data = array(
            'name'=> $this->input->post('catagoryname'),
            'description'=> $this->input->post('description'),
            'categoryStatus'=> $this->input->post('catStatus'),

            );

            $this->data['error'] = $this->Categorym->updateCategoryById($id, $data);

            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage','Category Updated Successfully');
                redirect('Admin-Category');

            } else {

                $this->session->set_flashdata('errorMessage','Some thing Went Wrong !! Please Try Again!!');
                redirect('Admin-Category');

            }

        } else {
            redirect('login');
        }
    }

    public function deleteCategoryById()
    {
        if ($this->session->userdata('userType') == "Admin") {

            $id = $this->input->post('id');
            $this->Categorym->deleteCategoryById($id);

        }
        else{
            redirect('Login');
        }
    }

}
