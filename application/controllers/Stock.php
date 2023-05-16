<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Stock extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('Stock_model', 'Stock');
	}

	public function stock_shop()
	{
		$shop_id = $this->input->post('shop_id');
		$data = $this->Stock->stock_shop($shop_id);
		echo json_encode($data);
	}

	public function stock_search()
	{
		$shop = $this->input->post('shop');
		$data = $this->Stock->stock_search($shop);
		echo json_encode($data);
	}

	public function confirm_return()
	{

		$shop = $this->input->post('shop');
		$product = $this->input->post('product');
		$stock_type = $this->input->post('stock_type');
		$amount = $this->input->post('amount_stock');
		$reason = $this->input->post('reason');


		$data = $this->Stock->return_stock($shop, $product, $stock_type, $amount, $reason);

		// var_dump($data);

		if ($data) {
			echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
		} else {
			echo json_encode(['success' => false, 'message' => 'ไม่มีสต๊อกสินค้าขณะนี้']);
		}
	}

	public function stock_view()
	{
		$this->load->model('Shop_model', 'shop');
		$data['shop'] = $this->shop->shop_all();
		$data['stock'] = $this->Stock->stock_total();
		$this->load->view('stock/stock_view', $data);
	}

	public function search_products()
	{
		$shop = $this->input->post('shop');
		$data = $this->Stock->search_products($shop);
		echo json_encode($data);
	}
	public function save_stock()
	{
		$shop = $this->input->post('shop');
		$data_history = array(
			'shop_id' => $shop,
			'stockin_date' => $this->input->post('date'),
		);
		$id_history = $this->Stock->save_stock_history($data_history);
		$amount = count($_POST["amount"]);
		if ($amount > 0) {
			for ($i = 0; $i < count($_POST["amount"]); $i++) {
				if ($_POST["amount"][$i] > 0) {
					// if (trim($_POST['name'] != '') && trim($_POST['amount'] != '')) {
					$pd_id   = $_POST["pd_id"][$i];
					$amount  = $_POST["amount"][$i];
					$data = array(
						'his_id' => $id_history,
						'shop_id' => $shop,
						'pd_id' => $pd_id,
						'amount' => $amount,
					);
					$this->Stock->save_stock_history_detail($data);
				}
			}
		}

		$amount = count($_POST["amount"]);
		if ($amount > 0) {
			for ($i = 0; $i < count($_POST["amount"]); $i++) {
				if ($_POST["amount"][$i] > 0) {
					// if (trim($_POST['name'] != '') && trim($_POST['amount'] != '')) {
					$pd_id   = $_POST["pd_id"][$i];
					$amount  = $_POST["amount"][$i];
					$data = array(
						'shop_id' => $shop,
						'pd_id' => $pd_id,
						'quantity_total' => $amount,
					);
					$this->Stock->save_stock($data);
				}
			}
		}

		echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
	}

	public function supplier_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_supplier');
		redirect('supplier', 'refresh');
	}
	public function checkstock()
	{
		$this->load->model('Shop_model', 'shop');
		$data['shop'] = $this->shop->shop_all();
		$this->load->view('stock/checkstock_view', $data);
	}

	public function stock_history()
	{

		$this->load->model('Shop_model', 'shop');
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = base_url() . "Stock/stock_history";
		$config["total_rows"] = $this->Stock->stock_history_count();
		$config["per_page"] = 1000;
		$config["uri_segment"] = 3;
		// $choice = $config["total_rows"] / $config["per_page"];
		// $config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["results"] = $this->Stock->fetch_history($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['count'] = $this->Stock->stock_history_count();

		$data['shop'] = $this->shop->shop_all();


		$this->load->view('stock/stock_history', $data);
	}

	public function stock_history_detail($id)
	{

		$data['stock_item'] = $this->Stock->history_detail($id);


		$this->load->view('stock/stock_history_detail', $data);
	}
	public function return_stock_history()
	{
		$this->load->view('stock/stock_return_history');
	}


	public function loadRecord($rowno = 0)
	{
		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcountfull = $this->db->get('stock_return')->num_rows();
		$this->db->limit($rowperpage, $rowno);
		$users_record = $this->db
			->join('product', 'product.pd_id=stock_return.pd_id')
			->join('shop', 'shop.id=stock_return.shop_id')
			->order_by('stock_return.id', 'desc')
			->get('stock_return')->result_array();
		$config['base_url'] = base_url() . 'Stock/loadRecord';
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

		echo json_encode(['data' => $data, 'count' => $allcountfull]);
	}
}