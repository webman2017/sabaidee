<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Feature_model extends CI_Model {
	public function save($data)
	{
		$this->db->insert('product_feature', $data);
		return $this->db->insert_id();
	}
}
