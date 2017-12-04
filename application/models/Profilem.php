<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Profilem extends CI_Model
{
    public function getAllCity()
    {
        $query = $this->db->get('city');
        return $query->result();
    }

    public function getuser($userId){

    $this->db->select(['id', 'name', 'address', ' postalCode', ' fkCity', 'memberCardNo', ' contactNo ', 'email ', 'password ', 'userActivationStatus', 'fkUserType']);
//        $this->db->from('users ');

//        $this->db->select('u.id,u.name as name,u.address,u.postalCode,u.fkCity as fkCity,u.memberCardNo,u.contactNo,u.email,u.password,u.userActivationStatus,u.fkUserType, c.name as fkcity');
        $this->db->from('users');
        $this->db->where('id', $userId);
        $query = $this->db->get();
        return $query->result();
    }


    public function updateuser($id,$name,$email,$password,$address,$fkCity,$contactNo,$postalCode,$memberCardNo){

//updateuser($id,$name,$email,$password,$address,$fkCity,$contactNo,$postalCode)

        $data = array(
            'name' => $name,
            'password' => $password,
            'password' => $password,
            'address' => $address,
            'fkCity' => $fkCity,
            'postalCode' => $postalCode,
            'memberCardNo' => $memberCardNo,
            //'country' => country
        );

        $data = $this->security->xss_clean($data);
        $this->db->where('id', $id);
        $this->db->where('email',$email);
        $this->db->update('users', $data);
    }
}