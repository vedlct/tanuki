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
        $this->db->from('users');
        $this->db->where('id', $userId);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCustomerInfo($userId){

        $this->db->select(['users.id', 'users.name', 'address', ' postalCode', 'memberCardNo', ' contactNo ','email ','city.name as cityName ']);
        $this->db->from('users');
        $this->db->join('city ','city.id = users.fkCity ','left');
        $this->db->where('users.id', $userId);
        $query = $this->db->get();
        return $query->result();
    }

    public function userDeliveryAddress($user){

        $this->db->select(['address', 'postalCode','city.name as cityName','country','contactNo']);
        $this->db->from('userdeliveryaddress');
        $this->db->join('city ','city.id = userdeliveryaddress.fkCity ','left');
        $this->db->where('userId', $user);
        $this->db->where('status', "1");
        $query = $this->db->get();
        return $query->result();
    }

    public function changeUserDeliveryAddress($userId,$AddressId){

        $this->db->select(['id']);
        $this->db->from('userdeliveryaddress');
        $this->db->where('userId', $userId);
        $this->db->where('status', "1");
        $query = $this->db->get();
        foreach ($query->result() as $userId){
            $id=$userId->id;
        }
        $data1=array(
            'status'=>"0"
        );

        $data1 = $this->security->xss_clean($data1);
        $this->db->where('id',$id);

        $this->db->update('userdeliveryaddress', $data1);

        $data = array(

            'status'=>"1"

        );
        $data = $this->security->xss_clean($data);
        $this->db->where('id', $AddressId);
        $this->db->where('userId',$userId);
        $this->db->update('userdeliveryaddress', $data);

    }


    public function updateuser($id,$name,$email,$password,$address,$fkCity,$contactNo,$postalCode){

        $data = array(
            'name' => $name,
            'password' => $password,
            'address' => $address,
            'fkCity' => $fkCity,
            'postalCode' => $postalCode,
            'contactNo'=>$contactNo

        );

        $data = $this->security->xss_clean($data);
        $this->db->where('id', $id);
        $this->db->where('email',$email);
        $this->db->update('users', $data);

        $data1 = array(
            'name' => $name,
        );

        $this->session->set_userdata($data1);
    }
}