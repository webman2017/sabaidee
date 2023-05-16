<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop_model extends CI_Model {

    public function shop_all(){
        $this->db->select('*');
        $this->db->from('shop');
        $query =$this->db->get();
        return $query->result(); 
       }
       public function save($data)
       {
           $this->db->insert('shop', $data);
           return $this->db->insert_id();
       }

       public function record_count() {
        return $this->db->count_all("shop");
    }

    public function product_shop($id){
  $this->db->select('*');
        $this->db->from('shop_product');
        $this->db->where('shop_id',$id);
        $query =$this->db->get();
        return $query->result(); 
    }

    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->from('shop')->order_by('shop.id','desc')->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   public function save_shop_product($data){
$exit=$this->check_exit_product($data['pd_id'],$data['shop_id']);
if($exit){

}else{
    $id=$this->db->insert('shop_product', $data);
    return $this->db->insert_id();
}
       
   
}

public function check_exit_product($pd_id,$shop_id){
 
        $this->db->select('*');
        $this->db->from('shop_product');
        $this->db->where('pd_id',$pd_id);
        $this->db->where('shop_id',$shop_id);
        $query =$this->db->get();
        return $query->result_array(); 
  
}

public function save_user($data){
    $id=$this->db->insert('user', $data);
    return $this->db->insert_id();
}
public function search($searchtxt){
 
    $this->db->select('*');
    $this->db->from('product');
  
    $this->db->or_like('pd_code',$searchtxt);
    $this->db->or_like('pd_name',$searchtxt);
    $query =$this->db->get();
    return $query->result(); 

}
}