<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Userm extends CI_Model
{

    public function getUser()
    {
        $this->db->select('u.id,u.name,u.address,u.postalCode,u.fkCity as city,u.memberCardNo,u.contactNo,u.email,u.password,u.userActivationStatus,u.fkUserType, c.name as fkcity');
        $this->db->from('users u');
        $this->db->join('city c', 'c.id = u.fkCity', 'left');
        $this->db->order_by('u.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }


    public function getAllCity()
    {
        $query = $this->db->get('city');
        return $query->result();
    }

    public function getuserType()
    {
        $query = $this->db->get('usertype');
        return $query->result();
    }


    public function user($data)
    {
        $this->security->xss_clean($data);
        $error = $this->db->insert('users', $data);
        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }
    }

    public function getuserById($userid)
    {
        $this->db->from('users ');
        $this->db->where('id', $userid)->select(['id', 'name', 'address', ' postalCode', ' fkCity', 'memberCardNo', ' contactNo ', 'email ', 'password ', 'userActivationStatus', 'fkUserType']);
        $query = $this->db->get();
        return $query->result();
    }


    public function updateUserById($id, $data)
    {

        $error = $this->db->where('id', $id)->update('users', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }
    }


    public function deleteUserById($id)
    {
        $this->db->where('id', $id)->delete('users');

    }


    public function getAdmin()

    {
        $this->db->select('u.id,u.name,u.address,u.postalCode,u.fkCity as city,u.memberCardNo,u.contactNo,u.email,u.password,u.userActivationStatus,u.fkUserType, c.name as fkcity');
        $this->db->from('users u');
        $this->db->join('city c', 'c.id = u.fkCity', 'left');
        $this->db->where("fkUserType=", 'Admin');
        $query = $this->db->get();
        return $query->result();

    }


    public function getCustomer()
    {
        $this->db->select('u.id,u.name,u.address,u.postalCode,u.fkCity as city,u.memberCardNo,u.contactNo,u.email,u.password,u.userActivationStatus,u.fkUserType, c.name as fkcity');
        $this->db->from('users u');
        $this->db->join('city c', 'c.id = u.fkCity', 'left');
        $this->db->where("fkUserType", 'cus');
        $query = $this->db->get();
        return $query->result();

    }

    public  function getTotalUser()
    {
        $this->db->where("fkUserType", 'cus');
        $query = $this->db->get('users');
        return $query->num_rows();
    }


}