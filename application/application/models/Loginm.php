<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Loginm extends CI_Model{

    public function validate_user($data){

        $userEmail=$this->input->post('email');
        $password=$this->input->post('password');
        $this->db->select('u.id as userId,u.name,u.email,u.fkUserType as userTypeId,ut.typeTitle as userType');
        $this->db->where('email',$userEmail);
        $this->db->where('password',$password);
        $this->db->from('users u');
        $this->db->join('usertype ut', 'ut.id = u.fkUserType','left');
        $query = $this->db->get();

        return $query->row();

    }

    public function loginInfo($data1){

        $this->db->insert('logininfo',$data1);


    }




}