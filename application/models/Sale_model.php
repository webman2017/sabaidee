<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sale_model extends CI_Model {
    public function record_count() {
        return $this->db->count_all("tbl_sale_channel");
    }

    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('id','desc')->get("tbl_sale_channel");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}