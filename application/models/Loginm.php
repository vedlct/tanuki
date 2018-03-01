<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Loginm extends CI_Model{

    public function validate_user($data){

        $userEmail=$this->input->post('email');
        $password=$this->input->post('password');
        $this->db->select('u.id as userId,u.name,u.email,u.fkUserType as userType,u.userActivationStatus');
        $this->db->where('email',$userEmail);
        $this->db->where('password',$password);
        $this->db->where('fkUserType',"cus");

        $this->db->from('users u');

        $query = $this->db->get();

        return $query->row();

    }

    public function checkCustomerEmailAvailabe($userEmail){


        $this->db->select('u.id as userId');
        $this->db->where('u.email',$userEmail);
        $this->db->where('u.userActivationStatus',"1");
        $this->db->where('fkUserType',"cus");
        $this->db->from('users u');
        $query = $this->db->get();
        return $query->row();

    }

    public function customerpassChangeReq($userId){


        $this->db->select('u.id as userId, u.passwordChangeRequestTime');
        $this->db->where('u.id',$userId);
        $this->db->where('u.userActivationStatus',"1");
        $this->db->where('fkUserType',"cus");
        $this->db->from('users u');
        $query = $this->db->get();
        return $query->result();

    }

    public function loginInfo($data1){


        $this->db->insert('logininfo',$data1);
        $insert_id = $this->db->insert_id();
        return $insert_id;


    }
    public function loginInfoForRegisterUser($data1,$data3){

        $this->db->insert('userdeliveryaddress',$data3);
        $this->db->insert('logininfo',$data1);
        $insert_id = $this->db->insert_id();
        return $insert_id;


    }



    public function logout($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('logininfo',$data);

    }
    public function passwordChangeRequestSubmit($forgetemail)
    {
        $data=array(
            'passwordChangeRequestTime'=>date('Y-m-d H:i:s'),
        );
        $this->db->where('email',$forgetemail);
        $this->db->update('users',$data);

    }

    public function customerRegister($data)
    {
        $this->security->xss_clean($data) ;

        $error=$this->db->insert('users',$data);


        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            $customerId=$this->db->insert_id();

            $data1=array(
                'memberCardNo'=>$customerId,
            );

            $this->db->where('id',$customerId);
            $error=$this->db->update('users',$data1);

            if (empty($error))
            {
                return $this->db->error();
            }
            else {

                return $error = null;
            }
        }


    }

    public function guestRegister($data)
    {
        $this->security->xss_clean($data) ;

        $error=$this->db->insert('users',$data);


        if (empty($error))
        {
            return $this->db->error();
        }
        else
        {
            $customerId=$this->db->insert_id();

            $data1=array(
                'memberCardNo'=>$customerId,
            );

            $this->db->where('id',$customerId);
            $error=$this->db->update('users',$data1);

            if (empty($error))
            {

                return $this->db->error();
            }
            else {
                $this->session->set_userdata('id', $customerId);
                return $error = null;
            }
        }


    }

    public function customerRegisterFromResturant($data)
    {
        $this->security->xss_clean($data) ;

        $this->db->insert('users',$data);


            $customerId=$this->db->insert_id();

            $data1=array(
                'memberCardNo'=>$customerId,
            );

            $this->db->where('id',$customerId);
            $this->db->update('users',$data1);

            return $customerId;



    }







}