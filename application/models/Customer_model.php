<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {



	public function save($data)
	{
		$this->db->insert('shop', $data);
		return $this->db->insert_id();
	}
    function count_customer() {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $id = $this->db->get()->num_rows();
        return $id;
    }
    public function get_all() {
		$this->db->select('*');
		$this->db->from('tbl_customer');
		$query = $this->db->get();
		return $query->result_array();
	 }

	 public function record_count() {
        return $this->db->count_all("shop");
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


}
