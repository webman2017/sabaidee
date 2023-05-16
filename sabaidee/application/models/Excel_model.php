<?php
class Excel_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function fetch_data()
    {
        $this->db->select('*');
        $this->db->from('product');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function fetch_stock(){
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->join('shop','shop.id=stock.shop_id');
        $this->db->join('product','product.pd_id=stock.pd_id');
        $query = $this->db->get();
        return $query->result_array();

    }
    public function fetch_order(){
        $this->db->select('*');
        $this->db->from('orders_detail');
        $this->db->join('orders','orders.order_id=orders_detail.order_id','left');
        $this->db->join('shop','shop.id=orders.shop_id');
        $this->db->join('state','state.id=orders.state');
       
        $this->db->join('product','product.pd_id=orders_detail.product_id');
        $query = $this->db->get();
        return $query->result_array();

    }
        public function fetch_report($shop_id, $startdate,$enddate){
        $this->db->select('*');
        $this->db->from('orders_detail');
        $this->db->join('orders','orders.order_id=orders_detail.order_id','left');
        $this->db->join('shop','shop.id=orders.shop_id');
        $this->db->join('state','state.id=orders.state');
        $this->db->join('product','product.pd_id=orders_detail.product_id');
           $this->db->join('order_status','order_status.id=orders.status_order');
         if(!empty($shop_id) && !empty($startdate) && !empty($enddate)){
        $this->db->where('orders.shop_id',$shop_id);
        $this->db->where('cast(orders.create_date as date) BETWEEN \'' . $startdate . '\' AND \'' .$enddate. '\'');
         }else if(!empty($shop_id) && !empty($startdate)) {

      $this->db->where('orders.shop_id',$shop_id);
      $this->db->where('CAST(create_date AS DATE)=',$startdate);

     }

        $query = $this->db->get();
        return $query->result_array();

    }
}