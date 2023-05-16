<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webcatelog_model extends CI_Model {
    public function record_count_web() {
        return $this->db->count_all("tbl_product");
    }
    public function fetch_countries_web($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('pd_id','desc')->get("tbl_product");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}