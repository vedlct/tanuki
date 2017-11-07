<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Userm extends CI_Model
{

    public function getUser()
    {
        $query = $this->db->get('users');
        return $query->result();
    }


    public function getAllCity()
    {
        $query = $this->db->get('city');
        return $query->result();
    }


    public function user($data)
    {
        $this->security->xss_clean($data);
        $this->db->from('users' );
        //$this->db->select('u.id as id','u.fkCity as city');

        $error = $this->db->insert('users', $data);

        if (empty($error)) {
            return $this->db->error();
        } else {

            return $error = null;
        }
    }

    public function getuserById($userid)
    {
        $this->db->from('users u');
        $this->db->where('u.id',$userid)->select(['u.id as id','u.name as  name','u.address  as address','u.postalCode as postalCode','u.fkCity as fkCity','u.memberCardNo as memberCardNo','u.contactNo as contactNo ','u.email as email ','u.password as password ','userActivationStatus']);

        $query = $this->db->get();
        return $query->result();
    }
//
public function updateUserById($id, $data)
{

    $error=$this->db->where('id',$id)->update('users',$data);

    if (empty($error))
    {
        return $this->db->error();
    }
    else {

        return $error = null;
    }
}


    public function deleteUserById($id)
    {
        $this->db->where('id',$id)->delete('Users');

    }




}