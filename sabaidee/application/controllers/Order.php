<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Order_model', 'Order');
		$this->load->model('Shop_model', 'Shop');
	}
	public function index()
	{

		// $this->load->library("pagination");
		// $config = array();
		// $config["base_url"] = base_url() . "Order/index";
		// $config["total_rows"] = $this->Order->record_count();
		// $config["per_page"] = 1000;
		// $config["uri_segment"] = 3;
		// // $choice = $config["total_rows"] / $config["per_page"];
		// // $config["num_links"] = round($choice);
		// $this->pagination->initialize($config);
		// $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// $data["results"] = $this->Order->fetch_countries($config["per_page"], $page);
		// $data["links"] = $this->pagination->create_links();
		// $data['count'] = $this->Order->record_count();
		$data['shop'] = $this->Shop->shop_all();
		$data['status'] = $this->Order->status();
		// var_dump($data['status']);
		// exit();
		$this->load->view('order/order_view', $data);
	}
	public function create()
	{
		$this->load->view('order/create');
	}

	public function order_detail($id)
	{

		$data = $this->Order->check_stock($id);
		// var_dump(array_unique($data));

		if (in_array(0, $data)) {
			// var_dump($data);
			$data['more'] = 'nomore';
		} else {
			//  var_dump($data);
			$data['more'] = 'more';
		}



		// if(count(array_unique($data)) == 1){
		// 	$data['more']='more';
		// 	var_dump($data);
		// //  exit();
		// }else{
		// 	var_dump($data);
		// 	$data['more']='nomore';
		// }
		//  var_dump($data);
		//  exit();
		$data['order_detail'] = $this->Order->order_detail($id);
		$this->load->view('order/order_detail', $data);
	}

	public function save_order()
	{

		$shop_id = $this->input->post('shop_id');
		$invoice_no = $this->Order->count_record($shop_id);
		$invoice_no = $invoice_no + 1;

		if ($invoice_no < 1000) {
			$invoice_no = sprintf("%03d", $invoice_no);
		} else {
			$invoice_no = $invoice_no;
		}
		$this->load->helper('string');
		if (!empty($_FILES['photo']['name'])) {

			$config['upload_path'] = "payment_document/";
			$config['allowed_types'] = 'gif|jpg|png|PNG|JPEG|JPG|jpeg';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload("photo")) {
				$data = $this->upload->data();
				//Resize and Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'payment_document/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '100%';
				$config['width'] = 600;
				$config['height'] = 400;
				$config['new_image'] = 'payment_document/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$image = $data['file_name'];

				$count = $this->Order->record_count();
				$count = $count + 1;

				$data = array(
					'firstname' => $this->input->post('customer'),
					'phone' => $this->input->post('mobile'),
					'facebook' => $this->input->post('facebook'),
					'cod' => $this->input->post('cod'),
					'state' => $this->input->post('state'),
					'remark' => $this->input->post('remark'),
					'address' => $this->input->post('address'),
					'shop_id' => $this->input->post('shop_id'),
					'invoice_no' => $this->input->post('shop_code') . $invoice_no,
					'total' => $this->input->post('total'),
					'status_order' => 1,
					'slip' => $image,
					'qr' => $count . random_string('alnum', 6),
					'payment' => $this->input->post('payment'),
					'order_date' => $this->input->post('order_date'),

				);
				$id = $this->Order->save_order($data);

				$amount = count($_POST["amount"]);
				//svar_dump($amount);
				if ($amount > 0) {
					// echo $amount;
					for ($i = 0; $i < count($_POST["amount"]); $i++) {
						if ($_POST["amount"][$i] > 0) {
							//echo $i;
							// if (trim($_POST['name'] != '') && trim($_POST['amount'] != '')) {
							$name   = $_POST["name"][$i];
							$amount  = $_POST["amount"][$i];
							$id_order = $id;
							$data = array(
								'order_id' => $id_order,
								'product_id' => $name,
								'quantity' => $amount,
							);
							$this->Order->save_order_detail($data);
						}
					}
				}
			}
		} else {
			$count = $this->Order->record_count();
			$count = $count + 1;
			$data = array(
				'firstname' => $this->input->post('customer'),
				'phone' => $this->input->post('mobile'),
				'facebook' => $this->input->post('facebook'),
				'cod' => $this->input->post('cod'),
				'state' => $this->input->post('state'),
				'remark' => $this->input->post('remark'),
				'address' => $this->input->post('address'),
				'shop_id' => $this->input->post('shop_id'),
				'invoice_no' => $this->input->post('shop_code') . $invoice_no,
				'total' => $this->input->post('total'),
				'status_order' => 1,
				'qr' => $count . random_string('alnum', 6),
				'payment' => $this->input->post('payment'),
				'order_date' => $this->input->post('order_date'),
			);
			$id = $this->Order->save_order($data);


			$amount = count($_POST["amount"]);
			//svar_dump($amount);
			if ($amount > 0) {
				// echo $amount;
				for ($i = 0; $i < count($_POST["amount"]); $i++) {
					if ($_POST["amount"][$i] > 0) {
						//echo $i;
						// if (trim($_POST['name'] != '') && trim($_POST['amount'] != '')) {
						$name   = $_POST["name"][$i];
						$amount  = $_POST["amount"][$i];
						$id_order = $id;
						$data = array(
							'order_id' => $id_order,
							'product_id' => $name,
							'quantity' => $amount,
						);
						$this->Order->save_order_detail($data);
					}
				}
			}
		}
		echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
	}
	public function confirm_order()
	{
		$shop_id = $this->input->post('shop_id');
		$quantity = count($_POST["quantity"]);
		if ($quantity > 0) {
			for ($i = 0; $i < count($_POST["quantity"]); $i++) {
				if ($_POST["quantity"][$i] > 0) {
					// if (trim($_POST['name'] != '') && trim($_POST['amount'] != '')) {
					$pd_id   = $_POST["pd_id"][$i];
					$quantity  = $_POST["quantity"][$i];
					$data = array(
						'shop_id' => $shop_id,
						'pd_id' => $pd_id,
						'quantity_total' => $quantity,
					);
					$this->Order->confirm_order($data);
				}
			}
		}
		$data = array(
			'status_order' => '7',
		);
		$this->db->where('order_id', $this->input->post('order_id'));
		$this->db->update('orders', $data);
		$data_status = array(
			'status' => '1',
		);


		$this->db->where('order_id', $this->input->post('order_id'));
		$this->db->update('orders', $data_status);
		echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
	}
	public function update_status_order()
	{
		$order_id_status = $this->input->post('order_id_status');
		$data = array(
			'status_order' => $this->input->post('status_order'),
		);
		$this->db->where('order_id', $order_id_status);
		$this->db->update('orders', $data);
		echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
	}
	public function search_order()
	{
		$shop_order = $this->input->post('shop_order');
		$order_id_search = $this->input->post('order_id_search');
		$startsearch = $this->input->post('startsearch');
		$data = $this->Order->search_order($shop_order, $order_id_search, $startsearch);
		echo json_encode($data);
	}
	public function get_status()
	{
		$state_id = $this->input->post('state_id');
		$data = $this->Order->get_status($state_id);
		echo json_encode($data);
	}
	public function shop_order()
	{
		$shop_id = $this->input->post('shop_id');
		$data = $this->Order->shop_order($shop_id);
		echo json_encode($data);
	}
	public function track_order()
	{
		$order_key = $this->input->post('order_key');
		$data = $this->Order->track_order($order_key);
		echo json_encode($data);
	}

	public function print_invoice($id)
	{
		$this->load->library('ciqrcode');
		$data['order_detail'] = $this->Order->order_detail($id);

		$data['order_copy'] = $this->Order->order_detail($id);
		// echo '<pre>';
		// 	var_dump($data['order_detail']['0']->qr);
		// 	echo '</pre>';
		// 	exit();
		$params['data'] = base_url("qr/") . $data['order_detail']['0']->qr;
		$params['level'] = 'H';
		$params['size'] = 9;
		$params['savename'] = FCPATH . 'qr.png';

		$paramss['data'] = base_url("qr_clear/") . $data['order_detail']['0']->qr;
		$paramss['level'] = 'H';
		$paramss['size'] = 9;
		$paramss['savename'] = FCPATH . 'qr_clear.png';
		$this->ciqrcode->generate($paramss);
		$this->ciqrcode->generate($params);

		$this->load->view('order/invoice_view', $data);
	}

	public function qr_confirm_order($id)
	{
		$data['order'] = $this->Order->qr_confirm($id);
		$this->load->view('order/qrcode_view', $data);
	}
	public function qr_clear($id)
	{
		$data['order'] = $this->Order->qr_clear($id);
		$this->load->view('order/qrcode_clear_view', $data);
	}

	public function send_success()
	{
		$state = $this->input->post('state');

		$order_id = $this->input->post('order_id');
		if ($state == '1') {
			$data = array('status_order' => 4);
			$this->db->where('order_id', $order_id);
			$this->db->update('orders', $data);
			echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
		} else if ($state == '2') {
			$data = array('status_order' => 9);
			$this->db->where('order_id', $order_id);
			$this->db->update('orders', $data);
			echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
		}
	}

	public function clear_success()
	{
		$state = $this->input->post('state');

		$order_id = $this->input->post('order_id');
		if ($state == '1') {
			$data = array('status_order' => 5);
			$this->db->where('order_id', $order_id);
			$this->db->update('orders', $data);
			echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
		} else if ($state == '2') {
			$data = array('status_order' => 12);
			$this->db->where('order_id', $order_id);
			$this->db->update('orders', $data);
			echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
		}
	}
	public function getstatus()
	{
		$order_id = $this->input->post('order_id');
		$data = $this->Order->getstatus($order_id);
		echo json_encode($data);
	}

	public function more()
	{
		$id = $this->input->post('id');
		$data = $this->Order->more($id);
		echo json_encode($data);
	}

	public function cancel_order()
	{
		$order_id = $this->input->post('order_id');
		$this->Order->cancel_order($order_id);

		echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
	}

	public function return_stock()
	{
		$this->load->model('Shop_model', 'shop');
		$data['shop'] = $this->shop->shop_all();
		$this->load->view('stock/stock_return', $data);
	}
	public function get_product_shop()
	{
		$shop = $this->input->post('shop');
		$data = $this->Order->get_product_shop($shop);
		echo json_encode($data);
	}

	public function loadRecord($rowno = 0)
	{
		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcountfull = $this->db->get('orders')->num_rows();
		$allcountselect = $this->db->get('orders')->num_rows();
		$this->db->limit($rowperpage, $rowno);
		$users_record = $this->db
			->from('orders')
			->join('shop', 'orders.shop_id=shop.id')
			->join('state', 'state.id=orders.state')
				->join('order_status', 'order_status.id=orders.status_order')
			// ->where('tbl_product.pd_type', '1')
			->order_by('order_id', 'desc')
			->get()->result_array();
		$config['base_url'] = base_url() . 'Order/loadRecord';
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