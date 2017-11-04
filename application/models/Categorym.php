<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Categorym extends CI_Model{


      public function insertCategorym($data)

      {
          $this->db->insert('catagory',$data);

          return $this->db->insert_id();
      }



      public  function getAllCategorym()

      {
         $this->db->from('catagory');
         $query=$this->db->get();
         return $query->result();
      }

    public function manageCatagorym($cat_id)

    {
         $this->db->from('catagory');
         $this->db->where('id',$cat_id)
                ->select(['id','name']);
           $query = $this->db->get();

         return $query->result();
    }


      public function updateCategoryByIdm($id, $data)
          {

              $this->db->where('id',$id)
                       ->update('catagory',$data);

          }


    public function deleteCategoryByIdm($id)
    {
        $this->db->where('id',$id)
            ->delete('catagory');

    }






}