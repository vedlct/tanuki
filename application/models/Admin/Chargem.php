<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Chargem extends CI_Model
{

    public  function  getAllCharge()
    {

        $this->db->select('id,deliveryfee,vat');
        $this->db->from('charges');
        $query=$this->db->get();
        return $query->result();

    }


    public  function insertCharge($data)
    {
        $this->security->xss_clean($data);
        $error=$this->db->insert('charges', $data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else {

            return $error = null;
        }
    }
    public  function getChargeById($charge_id)
    {
        $this->db->from('charges');
        $this->db->where('id',$charge_id)->select(['id','deliveryfee','vat']);
        $query = $this->db->get();

        return $query->result();

    }

    public  function updateChargeById($id, $data)
    {
        $error=$this->db->where('id',$id)->update('charges',$data);

        if (empty($error))
        {
            return $this->db->error();
        }
        else {

            return $error = null;
        }
    }

    public function deleteChargeById($id)
    {
        {
            $this->db->where('id',$id)->delete('charges');

        }
    }

}
