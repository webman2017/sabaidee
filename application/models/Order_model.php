<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order_model extends CI_Model
{
   public function record_count()
   {
      return $this->db->count_all("orders");
   }

   public function fetch_countries($limit, $start)
   {
      $this->db->limit($limit, $start);
      $query = $this->db->from('orders')
         ->join('shop', 'orders.shop_id=shop.id')
         ->join('order_status', 'order_status.id=orders.status_order')
         ->join('state', 'state.id=orders.state')
         ->order_by('order_id', 'desc')->get();

      if ($query->num_rows() > 0) {
         foreach ($query->result() as $row) {
            $data[] = $row;
         }
         return $data;
      }
      return false;
   }
   public function order_detail($id)
   {
      $this->db->select('*,orders.total as total_amount');
      $this->db->from('orders');
      $this->db->join('orders_detail', 'orders.order_id=orders_detail.order_id');
      $this->db->join('product', 'product.pd_id=orders_detail.product_id');
      $this->db->join('shop', 'shop.id=orders.shop_id');
      $this->db->where('orders.order_id', $id);

      $query = $this->db->get();
      return $query->result();
   }

   public function check_stock($id)
   {
      $this->db->select('*,orders.total as total_amount');
      $this->db->from('orders');
      $this->db->join('orders_detail', 'orders.order_id=orders_detail.order_id');
      $this->db->join('product', 'product.pd_id=orders_detail.product_id');
      $this->db->join('shop', 'shop.id=orders.shop_id');
      $this->db->where('orders.order_id', $id);

      $query = $this->db->get();
      $data = $query->result();
      $more_than = [];
      foreach ($data as $data) {
         $shop_id = $data->shop_id;
         $product_id = $data->product_id;
         $quantity = $data->quantity;

         //  var_dump($shop_id);
         //  var_dump($product_id);
         //  var_dump($quantity);
         $result = $this->check_stock_than($shop_id, $product_id, $quantity);

         array_push($more_than, $result);
      }
      return $more_than;
   }

   public function check_stock_than($shop_id, $product_id, $quantity)
   {
      $this->db->select('*');
      $this->db->from('stock');
      $this->db->where('pd_id', $product_id);
      $this->db->where('shop_id', $shop_id);
      $query = $this->db->get();
      $data_stock = $query->result();

      foreach ($data_stock as $stock) {
         if ($stock->pd_id = $product_id && $stock->shop_id = $shop_id && $stock->quantity_total >= $quantity) {
            //var_dump('1');
            return 1;
         } else {
            return 0;
            // var_dump('0');
         }
      }
   }



   public function count_record($id)
   {
      $query = $this->db->query('SELECT * FROM orders where shop_id="' . $id . '"');
      return $query->num_rows();
   }

   public function save_order($data)
   {
      $id = $this->db->insert('orders', $data);
      return $this->db->insert_id();
   }

   public function save_order_detail($data)
   {
      $id = $this->db->insert('orders_detail', $data);
      return $this->db->insert_id();
   }

   public function confirm_order($data)
   {
      $exist = $this->check_exist_stock($data['pd_id'], $data['shop_id']);
      if ($exist) {
         if ($exist['0']['pd_id'] = $data['pd_id'] && $exist['0']['shop_id'] = $data['shop_id']) {
            $amount = $exist['0']['quantity_total'] - $data['quantity_total'];
            $stock_data = array(
               'quantity_total' => $amount,
            );
            $this->db->where('id', $exist['0']['id']);
            $this->db->update('stock', $stock_data);
         }
      } else {
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

   public function get_product_shop($shop)
   {
      $this->db->select('*');
      $this->db->from('shop_product');
      $this->db->join('product', 'shop_product.pd_id=product.pd_id');
      $this->db->where('shop_id', $shop);
      $query = $this->db->get();
      return $query->result();
   }




   public function status()
   {
      $this->db->select('*');
      $this->db->from('order_status');
      $query = $this->db->get();
      return $query->result();
   }

   public function search_order($shop_id, $order_id_search, $startsearch)
   {
      //var_dump($order_id_search);
      $this->db->select('*');
      $this->db->from('orders');
      $this->db->join('shop', 'shop.id=orders.shop_id');
      $this->db->join('order_status', 'order_status.id=orders.status_order');
      $this->db->join('state', 'orders.state=state.id');
      if (!empty($shop_id) && !empty($order_id_search)) {
         $this->db->where('orders.shop_id', $shop_id);
         $this->db->where('orders.invoice_no', $order_id_search);
      } else if (!empty($shop_id)) {
         $this->db->where('orders.shop_id', $shop_id);
      } else if (!empty($order_id_search)) {
         $this->db->or_like('orders.invoice_no', $order_id_search);
         $this->db->or_like('orders.phone', $order_id_search);
         $this->db->or_like('orders.facebook', $order_id_search);
      } else if (!empty($startsearch)) {
         $this->db->where('orders.order_date', $startsearch);
      }
      $query = $this->db->get();
      return $query->result();
   }
   public function state()
   {
      $query = $this->db->get('state');
      return $query->result();
   }


   public function get_status($state)
   {

      $this->db->where('state_id', $state);
      $query = $this->db->get('order_status');
      return $query->result();
   }

   public function shop_order($shop_id)
   {
      $this->db->join('order_status', 'orders.status_order=order_status.id');
      $this->db->where('shop_id', $shop_id);
      $this->db->order_by('order_id', 'desc');
      $query = $this->db->get('orders');
      return $query->result();
   }

   public function track_order($order_key)
   {
      $this->db->select('*');
      $this->db->from('orders');
      $this->db->join('order_status', 'order_status.id=orders.status_order');
      $this->db->or_like('firstname', $order_key);
      $this->db->or_like('invoice_no', $order_key);
      $query = $this->db->get();
      return $query->result();
   }

   public function qr_confirm($qr_confirm)
   {
      $this->db->select('*');
      $this->db->from('orders');
      $this->db->join('state', 'state.id=orders.state');
      $this->db->where('qr', $qr_confirm);
      $query = $this->db->get();
      return $query->row();
   }

   public function qr_clear($qr_confirm)
   {
      $this->db->select('*');
      $this->db->from('orders');
      $this->db->join('state', 'state.id=orders.state');
      $this->db->where('qr', $qr_confirm);
      $query = $this->db->get();
      return $query->row();
   }

   public function getstatus($order_id)
   {
      $this->db->select('*');
      $this->db->from('orders');
      $this->db->join('order_status', 'orders.status_order=order_status.id');
      $this->db->where('order_id', $order_id);
      $query = $this->db->get();
      return $query->row();
   }
   public function more($id)
   {

      $this->db->select('*');
      $this->db->from('orders_detail');
      $this->db->join('orders', 'orders.order_id=orders_detail.order_id');
      $this->db->join('product', 'orders_detail.product_id=product.pd_id');
      $this->db->where('orders_detail.order_id', $id);
      $query = $this->db->get();
      return $query->result();
   }

   private $_order_id;
   private $_startDate;
   private $_endDate;

   public function setOrderID($order_id)
   {
      $this->_order_id = $order_id;
   }
   public function setStartDate($startDate)
   {
      $this->_startDate = $startDate;
   }
   public function setEndDate($endDate)
   {
      $this->_endDate = $endDate;
   }

   public function report()
   {


      $this->db->select('*');
      $this->db->from('orders');
      $this->db->join('state', 'state.id=orders.state');
      if (!empty($this->_order_id) && !empty($this->_startDate) && !empty($this->_endDate)) {


         $this->db->where('shop_id', $this->_order_id);
         $this->db->where('cast(create_date as date) BETWEEN \'' . $this->_startDate . '\' AND \'' . $this->_endDate . '\'');

         //   }
         //  else if(!empty($this->_startDate) && !empty($this->_endDate)){
         //      $this->db->where('cast(create_date as date) BETWEEN \'' . $this->_startDate . '\' AND \'' . $this->_endDate . '\'');
      } else if (!empty($this->_order_id) && !empty($this->_startDate)) {

         $this->db->where('shop_id', $this->_order_id);
         $this->db->where('CAST(create_date AS DATE)=', $this->_startDate);
      } else if (!empty($this->_order_id)) {

         $this->db->where('shop_id', $this->_order_id);
      }

      $query = $this->db->get();
      return $query->result();
   }




   public function cancel_order($order_id)
   {
      $this->db->select('*');
      $this->db->from('orders_detail');
      $this->db->join('orders', 'orders.order_id=orders_detail.order_id');
      $this->db->join('product', 'orders_detail.product_id=product.pd_id');
      $this->db->where('orders_detail.order_id', $order_id);

      $query = $this->db->get();
      $data = $query->result();
      foreach ($data as $result) {
         // echo $result->product_id;
         // echo $result->shop_id;
         // echo $result->quantity;
         $instock = $this->check_exist_stock_cancel($result->product_id, $result->shop_id);
         // var_dump($instock['0']['quantity_total']+$result->quantity);

         if ($result->status == 1) {
            $amount = $instock['0']['quantity_total'] + $result->quantity;
         } else {
            $amount = $instock['0']['quantity_total'];
         }



         $stock_data = array(
            'quantity_total' => $amount,
         );
         $this->db->where('id', $instock['0']['id']);
         $this->db->update('stock', $stock_data);

         $status = array(
            'status' => '2',
            'status_order' => '13',
         );

         $this->db->where('order_id', $order_id);
         $this->db->update('orders', $status);
      }
   }

   public function check_exist_stock_cancel($pd_id, $shop_id)
   {
      $this->db->select('*');
      $this->db->from('stock');
      $this->db->where('pd_id', $pd_id);
      $this->db->where('shop_id', $shop_id);
      $query = $this->db->get();
      return $query->result_array();
   }
}