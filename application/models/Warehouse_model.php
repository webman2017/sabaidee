
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Warehouse_model extends CI_Model {
public function record_count() {
        return $this->db->count_all("tbl_warehouse");
    }
    public function fetch_countries($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("tbl_warehouse");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   public function save($data){
    $this->db->insert('tbl_warehouse', $data);
}

public function get_warehouse(){
    $this->db->select('*');
	$this->db->from('tbl_warehouse');
	$query =$this->db->get();
	return $query->result();  
	}
}