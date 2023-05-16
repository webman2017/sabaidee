<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Category_model extends CI_Model
{
	public function save($data)
	{
		$this->db->insert('product_category', $data);
		return $this->db->insert_id();
	}

	public function update_category($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('product_category', $data);
	}
}