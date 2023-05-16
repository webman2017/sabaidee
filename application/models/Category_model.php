<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

public function category_all(){
	$this->db->select('*');
	$this->db->from('tbl_category');
	$query =$this->db->get();
	return $query->result();  
}
	public function save($data)
	{
		$this->db->insert('tbl_category', $data);
		return $this->db->insert_id();
	}
	public function get_all() {
		$this->db->select('*');
		$this->db->from('tbl_category');
		$query = $this->db->get();
		return $query->result_array();
	 }

	 public function record_count() {
        return $this->db->count_all("tbl_category");
    }


	public function categoryid($id){
		$this->db->select('*');
		$this->db->from('tbl_category');
		$this->db->where('id',$id);
		$query =$this->db->get();
		return $query->row(); 
	}

    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('id','desc')->get("tbl_category");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

   public function update($id,$data)
	{
		$this->db->update('tbl_category', $data,$id);
		//$this->db->where('id', 37);
		// return $this->db->insert_id();
	}

	public function primary_category_all(){
		$this->db->select('*');
		$this->db->from('tbl_category_primary');
		$query =$this->db->get();
		return $query->result();  
	}
	 
}