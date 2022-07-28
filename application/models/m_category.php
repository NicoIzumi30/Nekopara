<?php
class m_category extends CI_Model {
    public function category(){
        return $this->db->get('category_product')->result_array();
     } 
     public function delete_category($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
     }
}