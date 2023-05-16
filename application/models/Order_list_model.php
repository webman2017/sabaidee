<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order_list_model extends CI_Model
{
    public function save($data)
    {
        $this->db->insert('product', $data);
        return $this->db->insert_id();
    }

    public function save_images($data)
    {
        $this->db->insert('tbl_product_image', $data);
        return $this->db->insert_id();
    }
    function search_product($title)
    {
        $this->db->or_like('product_name', $title);
        $this->db->or_like('product_id', $title);
        // $this->db->order_by('pd_id', 'ASC');
        // $this->db->limit(10);
        return $this->db->get('product')->result();
    }

    public function getData($rowno, $rowperpage, $search = "")
    {

        $this->db->select('*');
        $this->db->from('orders');
        $this->db->join('shop', 'orders.shop_id=shop.id');
        $this->db->join('state', 'orders.state=state.id');
        $this->db->join('order_status', 'orders.status_order=order_status.id');
        if ($search != '') {
            $this->db->like('invoice_no', $search);
            $this->db->or_like('order_id', $search);
            $this->db->or_like('facebook', $search);
            $this->db->or_like('phone', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        $this->db->order_by('order_id', 'desc');
        $query = $this->db->get();

        return $query->result_array();
    }

    // Select total records
    public function getrecordCount($search = '')
    {

        $this->db->select('count(*) as allcount');
        $this->db->from('orders');

        if ($search != '') {
            $this->db->like('invoice_no', $search);
            $this->db->or_like('facebook', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }




    public function save_description($data)
    {
        $this->db->insert('tbl_product_description', $data);
    }
    // public function product_type()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_product_type');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    function count_product()
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $id = $this->db->get()->num_rows();
        return $id;
    }
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from('orders');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function record_count()
    {
        return $this->db->count_all("tbl_product");
    }

    public function fetch_countries($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('order_id', 'desc')->get("order");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function record_count_select()
    {
        return $this->db->count_all("tbl_product");
    }

    public function fetch_countries_select($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->where('pd_type', 2)->order_by('pd_id', 'desc')->get("tbl_product");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function record_count_set()
    {
        return $this->db->count_all("tbl_product");
    }

    public function fetch_countries_set($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->where('pd_type', 3)->order_by('pd_id', 'desc')->get("tbl_product");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function pd_image($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product_image');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        return $query->result();
    }


    public function productid($id)
    {
        $this->db->select('*');
        $this->db->from('orders');
        // $this->db->join('tbl_product_type','tbl_product_type.pt_product_type_id=tbl_product.pd_type');
        $this->db->where('order_id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function product_search($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->like('st_id', $id);
        $this->db->or_like('pd_code', $id, 'both');
        $this->db->or_like('pd_name', $id, 'both');
        $result = $this->db->get();
        return $result->result();
    }

    public function delete_by_id($id)
    {
        $this->db->where('product_id', $id);
        $this->db->delete('product');
    }
    public function webcatalog_by_id($id)
    {
        $this->db->where('product_id', $id);
        $data = array('pd_webcatelog' => 1);
        $this->db->update('product', $data);
    }
}