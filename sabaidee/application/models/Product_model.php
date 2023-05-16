<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product_model extends CI_Model {
	public function save($data)
	{
		$this->db->insert('product', $data);
		return $this->db->insert_id();
	}

	public function save_images($data)
	{
		$this->db->insert('product_image', $data);
		return $this->db->insert_id();
	}


    public function save_description($data){
        $this->db->insert('product_description', $data);
    }

	function count_product() {
        $this->db->select('*');
        $this->db->from('product');
        $id = $this->db->get()->num_rows();
        return $id;
    }
    public function get_all_by_user() {
        $shop_id= $this->session->userdata('us_shop');
		$this->db->select('*');
		$this->db->from('shop_product');
        $this->db->join('product','shop_product.pd_id=product.pd_id');
        $this->db->where('shop_product.shop_id',$shop_id);
		$query = $this->db->get();
		return $query->result();
	 }

	public function get_all() {
		$this->db->select('*');
		$this->db->from('product');
		$query = $this->db->get();
		return $query->result_array();
	 }


     public function product() {
		$this->db->select('*');
		$this->db->from('product');
        $this->db->where('pd_status',0);
		$query = $this->db->get();
		return $query->result();
	 }
  public function del_product($id) {
      $data=array(
          'pd_status'=>1,
      );
	$this->db->where('pd_id', $id);
    $this->db->update('product', $data);
	 }
     public function search_product($product_search) {
		$this->db->select('*');
		$this->db->from('product');
     $this->db->or_like('pd_code',$product_search);
     $this->db->or_like('pd_name',$product_search);
  $this->db->where('pd_status',0);
		$query = $this->db->get();
		return $query->result();
	 }

        public function search_product_all($product_search) {
		$this->db->select('*');
		$this->db->from('product');

  $this->db->where('pd_status',0);
		$query = $this->db->get();
		return $query->result();
	 }

       public function search_product_in($product_search) {
		$this->db->select('*');
		$this->db->from('product');

  $this->db->where('pd_name',$product_search);
  $this->db->or_where('pd_code',$product_search);

		$query = $this->db->get();
		return $query->result();
	 }
	 public function record_count() {
        return $this->db->count_all("product");
    }

    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->where('pd_type',1)->order_by('pd_id','desc')->get("product");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }


   public function record_count_select() {
    return $this->db->count_all("product");
}

public function fetch_countries_select($limit, $start) {
    $this->db->limit($limit, $start);
    $query = $this->db->where('pd_type',2)->order_by('pd_id','desc')->get("product");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}


public function record_count_set() {
    return $this->db->count_all("product");
}

public function fetch_countries_set($limit, $start) {
    $this->db->limit($limit, $start);
    $query = $this->db->where('pd_status','0')->order_by('pd_id','desc')->get("product");

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    return false;
}

public function pd_image($id){
    $this->db->select('*');
    $this->db->from('product_image');
    $this->db->where('product_id',$id);
    $query =$this->db->get();
    return $query->result(); 
}


   public function productid($id){
    $this->db->select('*');
    $this->db->from('product');
 
    $this->db->where('pd_id',$id);
    $query =$this->db->get();
    return $query->row(); 
}

public function product_search($id){
    $this->db->select('*');
    $this->db->from('product');
        
  $this->db->or_like('pd_name',$id, 'both'); 
  $this->db->or_like('pd_code',$id, 'both'); 
    $this->db->where('pd_status',0);

  $this->db->order_by('pd_id','desc');
    $result=$this->db->get();
    return $result->result();
 }

  public function feature_update($id,$data){
    $this->db->where('id', $id);
    $this->db->update('product_feature', $data);
 }
 public function update_product($id,$data){
    $this->db->where('pd_id', $id);
    $this->db->update('product', $data);
 }

 public function delproduct($id,$data){
    $this->db->where('pd_id', $id);
    $this->db->update('product', $data);
 }
}