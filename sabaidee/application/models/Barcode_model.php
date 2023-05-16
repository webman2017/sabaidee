<?php
class Barcode_model extends CI_Model {
    
public function search_product($id){
    $this->db->select('*');
    $this->db->from('tbl_product');
  $this->db->like('pd_name',$id);
    $religion=$this->db->get();
    return $religion->result();
 }
}


