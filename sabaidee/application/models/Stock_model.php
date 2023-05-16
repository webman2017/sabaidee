<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Stock_model extends CI_Model
{
    public function record_count()
    {
        return $this->db->count_all("tbl_supplier");
    }
    public function fetch_countries($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->order_by('id', 'desc')->get("tbl_supplier");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function supplier_save($data)
    {
        $this->db->insert('tbl_supplier', $data);
        return $this->db->insert_id();
    }



    public function stock_search($shop)
    {
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->join('product', 'stock.pd_id=product.pd_id');
        $this->db->where('stock.shop_id', $shop);
        $query = $this->db->get();
        return $query->result();
    }
    public function search_products($shop)
    {
        $this->db->select('*');
        $this->db->from('shop_product');
        $this->db->join('product', 'shop_product.pd_id=product.pd_id');
        $this->db->where('shop_product.shop_id', $shop);
        $query = $this->db->get();
        return $query->result();
    }
    public function save_stock($data)
    {
        $exist = $this->check_exist_stock($data['pd_id'], $data['shop_id']);
        if ($exist) {
            if ($exist['0']['pd_id'] = $data['pd_id'] && $exist['0']['shop_id'] = $data['shop_id']) {
                $amount = $exist['0']['quantity_total'] + $data['quantity_total'];
                $stock_data = array(
                    'quantity_total' => $amount,
                );
                $this->db->where('id', $exist['0']['id']);
                $this->db->update('stock', $stock_data);
            }
        } else {
            $id = $this->db->insert('stock', $data);
            return $this->db->insert_id();
        }
    }

    public function check_exist_stock($pd_id, $shop_id)
    {
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->where('pd_id', $pd_id);
        $this->db->where('shop_id', $shop_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function stock_total()
    {
        $this->db->select('*');
        $this->db->from('stock');
        $query = $this->db->get();
        return $query->result();
    }
    public function stock_shop($shop_id)
    {

        $this->db->select('*');
        $this->db->from('stock');
        $this->db->join('product', 'stock.pd_id=product.pd_id');
        $this->db->where('stock.shop_id', $shop_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function save_stock_history($data)
    {
        $this->db->insert('stock_history', $data);
        return $this->db->insert_id();
    }

    public function save_stock_history_detail($data)
    {
        $this->db->insert('stock_history_detail', $data);
        return $this->db->insert_id();
    }


    public function stock_history_count()
    {
        return $this->db->count_all("stock_history");
    }
    public function fetch_history($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query =
            $this->db->select('*,stock_history.id as his_id')
            ->from('stock_history')
            ->join('shop', 'shop.id=stock_history.shop_id')
            ->order_by('stock_history.id', 'desc')
            ->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function history_detail($id)
    {
        $this->db->select('*');
        $this->db->from('stock_history_detail');
        $this->db->join('product', 'stock_history_detail.pd_id=product.pd_id');
        $this->db->join('shop', 'stock_history_detail.shop_id=shop.id');
        $this->db->where('stock_history_detail.his_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function return_stock($shop, $product, $stock_type, $amount_in,$reason)
    {

        $this->db->select('*');
        $this->db->from('stock');
        $this->db->join('product', 'stock.pd_id=product.pd_id');
        $this->db->where('stock.shop_id', $shop);
        $this->db->where('stock.pd_id', $product);
        $query = $this->db->get();
        $data = $query->result();
        if ($data) {

            // var_dump($data['0']->id);

            //  var_dump($stock_type);

            if ($stock_type == "increment") {
                $amount_total = $data['0']->quantity_total + $amount_in;
                $stock_data = array(
                    'quantity_total' => $amount_total,
                );
                $this->db->where('id', $data['0']->id);
                $this->db->update('stock', $stock_data);

 $stock_return=array(
                'pd_id'=>$product,
                'shop_id'=>$shop,
                'stock_type'=>$stock_type,
                'amount'=>$amount_in,
                'reason'=>$reason,
            );
              $this->db->insert('stock_return', $stock_return);



                return true;
            } else if ($stock_type == "decrement") {
                $amount_total = $data['0']->quantity_total - $amount_in;
                $stock_data = array(
                    'quantity_total' => $amount_total,
                );
                $this->db->where('id', $data['0']->id);
                $this->db->update('stock', $stock_data);

                 $stock_return=array(
                'pd_id'=>$product,
                'shop_id'=>$shop,
                'stock_type'=>$stock_type,
                'amount'=>$amount_in,
                'reason'=>$reason,
            );
              $this->db->insert('stock_return', $stock_return);
                return true;
            }

           

          
        } else {
            return false;
            //  var_dump('no data');
        }
    }
}
