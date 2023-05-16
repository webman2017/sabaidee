<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Shop_model','shop');
		
	}
public function index(){
  	$this->load->library("pagination");
		$config = array();
		$config["base_url"] = base_url() . "Shop/index";
		$config["total_rows"] = $this->shop->record_count();
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;
		// $choice = $config["total_rows"] / $config["per_page"];
		// $config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["results"] = $this->shop->
			fetch_countries($config["per_page"], $page);
		$data["links_set"] = $this->pagination->create_links();
		$data['count_set']=$this->shop->record_count();
$data['product']=$this->shop->product();
 
    $this->load->view('shop/shop_view',$data);
}
	public function shop_save(){
        
    $data = array(
        'shop_name' => $this->input->post('customer_name'),
        'shop_code' => $this->input->post('customer_code'),
        'shop_mobile' => $this->input->post('customer_mobile'),
        'shop_email' => $this->input->post('customer_email'),
    );
    $id=$this->shop->save($data);

    $data_user = array(
        'us_shop'=>$id,
        'us_username' => trim($this->input->post('username')),
        'us_password' => trim($this->input->post('password')),
        'name'=>$this->input->post('customer_name'),
        'us_authority'=>'Shop',
    );
    $id=$this->shop->save_user($data_user);


     redirect('Shop', 'refresh');
}

public function product_shop($id){
	
	$data=$this->shop->product_shop($id);
	// var_dump($data);
	$this->load->view('shop/shop_product');


}
public function shop_create(){
    $this->load->view('shop/shop_create');
}
public function save_shop_product(){
	$shop_id=$this->input->post('shop_id_modal');


		

        if($_POST["select"] !==null){
            $select_product = count($_POST["select"]);
		if ($select_product > 0) {
			for ($i=0; $i < count($_POST["select"]); $i++) { 
			// if (trim($_POST['name'] != '') && trim($_POST['amount'] != '')) {
				$select   = $_POST["select"][$i];
				$data=array(
                    'shop_id'=>intval($shop_id),
					'pd_id'=>$select,	
					'status'=>'1'
			);
			$this->shop->save_shop_product($data);
			}
		}
    }
	echo json_encode(['success'=>true,'message'=>'บันทึกสำเร็จ']);
	}

    public function update_shop(){
        
        $data = array(
            'shop_name' => $this->input->post('shop_name'),
            'shop_code' => $this->input->post('shop_code'),
            'shop_mobile' => $this->input->post('shop_mobile'),
            'shop_email' => $this->input->post('shop_email'),
        );
        $this->db->where('id',$this->input->post('id'));
		$this->db->update('shop', $data);
		echo json_encode(['success'=>true,'message'=>'บันทึกสำเร็จ']);
    }
    public function search(){
        $searchtxt=$this->input->post('searchtxt');
        $data=$this->shop->search($searchtxt);
        echo json_encode($data);
    }
    public function shop_del(){
        $deltxt=$this->input->post('deltxt');
        $this->db->where('id',$deltxt);
        $this->db->delete('shop');

        $this->db->where('us_shop',$deltxt);
        $this->db->delete('user');
        echo json_encode(['success'=>true,'message'=>'บันทึกสำเร็จ']);
    }

    public function loadRecord($rowno = 0)
	{
		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcountfull = $this->db->get('shop')->num_rows();
		$allcountselect = $this->db->get('shop')->num_rows();
		$this->db->limit($rowperpage, $rowno);
		$users_record = $this->db
			// ->join('tbl_warehouse','tbl_warehouse.wh_no=tbl_stock_purchase.warehouse_id')
			// ->join('tbl_shipping_master','tbl_stock_purchase.shipping=tbl_shipping_master.shipping_id')
			// ->where('tbl_product.pd_type', '1')
			// ->order_by('pd_id', 'desc')
			->get('shop')->result_array();
		$config['base_url'] = base_url() . 'Shop/loadRecord';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcountfull;
		$config['per_page'] = $rowperpage;
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';

		$config['prev_tag_close']  = '</span></li>';

		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';

		$config['first_tag_close'] = '</span></li>';

		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';

		$config['last_tag_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$data['pagination'] = $this->pagination->create_links();

		$data['result'] = $users_record;

		$data['row'] = $rowno;

		echo json_encode(['data' => $data, 'count' => $allcountfull, 'countselect' => $allcountselect]);
	}
}