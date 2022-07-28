<?php
class m_product extends CI_Model {
    public function get_data(){
        return $this->db->get('product')->result_array();
    }
    
 public function get_category($idc){
    $this->db->where_in('id_category', $idc);
     return $this->db->get('category_product');
 }   
 public function get_count()
   {
   return $this->db->count_all_results('product');
   }
   public function get_count1()
   {
   return $this->db->count_all_results('category_product');
   }
   public function get_count2()
   {
   return $this->db->count_all_results('suppliers');
   }
 public function get_suppliers($ids){
    $this->db->where_in('id_suppliers', $ids);
     return $this->db->get('suppliers');
 }  
 public function suppliers(){
    return $this->db->get('suppliers')->result_array();
 } 
 public function category(){
    return $this->db->get('category_product')->result_array();
 } 
public function get_data_where($id){
    $this->db->where_in('id_product', $id);
    return $this->db->get('product');
}
 public function delete_product($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
 }
 public function delete_category($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
 }
 public function update_product($where,$table){
    return $this->db->get_where($table,$where);
 }
 public function update_category($where,$table){
    return $this->db->get_where($table,$where);
 }
 public function update_suppliers($where,$table){
   return $this->db->get_where($table,$where);
}
 public function update_product2($where,$table,$data){
    $this->db->where($where);
    $this->db->update($table,$data);
 }
 public function update($where,$table,$data){
    $this->db->where($where);
    $this->db->update($table,$data);
 }
}