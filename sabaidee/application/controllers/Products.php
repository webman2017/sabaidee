<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model', 'Product');
	}
	public function index()
	{
		$this->load->view('products/product_view');
	}
	public function product_code_gen()
	{
		$code = date("dmYHis");
		echo json_encode(['success' => true, 'message' => $code]);
		// echo json_encode(['success'=>true,'message'=>round(microtime(true) * 1000)]);
	}

	public function create()
	{
		$this->load->view('products/product_create');
	}
	public function save_product()
	{

		$config['upload_path'] = "upload/";
		$config['allowed_types'] = 'gif|jpg|png|PNG|JPEG|JPG|jpeg';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("file")) {
			$data = $this->upload->data();
			//Resize and Compress Image
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'upload/' . $data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['quality'] = '100%';
			$config['width'] = 600;
			$config['height'] = 400;
			$config['new_image'] = 'upload/' . $data['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$image = $data['file_name'];
			$data = array(

				'pd_code' => $this->input->post('pd_code'),
				'pd_name' => $this->input->post('pd_name'),
				'pd_barcode' => $this->input->post('pd_barcode'),
				'pd_image' => $image,
			);
			$id = $this->Product->save($data);
		} else {
			$data = array(
				'pd_code' => $this->input->post('pd_code'),
				'pd_name' => $this->input->post('pd_name'),
				'pd_barcode' => $this->input->post('pd_barcode'),
			);
			$id = $this->Product->save($data);
		}
		redirect('Products', 'refresh');
	}


	public function edit_product($id)
	{
		$this->load->model('Category_model', 'Category');
		$data['product'] = $this->Product->productid($id);

		$this->load->view('products/product_edit', $data);
	}
	public function product_preview($id)
	{

		require_once 'vendor/autoload.php';

		$this->load->model('Category_model', 'Category');
		$data['product'] = $this->Product->productid($id);
		$data['category'] = $this->Category->category_all();
		$data['warehouse'] = $this->Warehouse->get_warehouse();
		$data['product_type'] = $this->Product->product_type();
		$data['pd_image'] = $this->Product->pd_image($id);

		$pd_code = $data['product']->pd_code;


		$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
		$data['barcode'] = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($pd_code, $generator::TYPE_CODE_128)) . '">';

		$this->load->view('products/product_preview', $data);
	}

	private function set_barcode($code)
	{
		// Load library
		$this->load->library('zend');
		// Load in folder Zend
		$this->zend->load('Zend/Barcode');
		// Generate barcode
		Zend_Barcode::render('code128', 'image', array('text' => $code), array());



		$barcodeOptions = array('text' => 'ZEND-FRAMEWORK');
		$rendererOptions = array(
			'imageType'          => 'png',
			'horizontalPosition' => 'center',
			'verticalPosition'   => 'middle'
		);
		$imageResource = Zend_Barcode::factory('code39', 'image', $barcodeOptions, $rendererOptions)->render();
		Zend_Barcode::factory('code39', 'image', $barcodeOptions, $rendererOptions)->render();
	}

	public function product_search()
	{
		$staff_search = $this->input->get('q');
		$result = $this->Product->product_search($staff_search);
		$json = array(
			"total" => "",
			"items" => $result
		);
		echo json_encode($json);
	}


	public function feature_update(){

			$id = $this->input->post('id');
			$data = array(
				'feature_name' => $this->input->post('feature_name'),
			);
			$this->Product->feature_update($id, $data);
		// }
		echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
	// }

	
	}

	public function update_product()
	{

		$photo_exist = $this->input->post('photo_exist');



		if (!empty($_FILES['photo']['name'])) {

			$config['upload_path'] = "upload/";
			$config['allowed_types'] = 'gif|jpg|png|PNG|JPEG|JPG|jpeg';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload("photo")) {
				$data = $this->upload->data();
				//Resize and Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'upload/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '100%';
				$config['width'] = 600;
				$config['height'] = 400;
				$config['new_image'] = 'upload/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$image = $data['file_name'];


				$id = $this->input->post('id');
				$data = array(
					'pd_name' => $this->input->post('product_name'),
					'pd_code' => $this->input->post('product_code'),
					'pd_image' => $image,
				);
				$this->Product->update_product($id, $data);

				if (file_exists('upload/' . $photo_exist) && $photo_exist)
					unlink('upload/' . $photo_exist);

				// var_dump($image);
				// exit();

				//delete file
				// $person = $this->person->get_by_id($this->input->post('id'));


				// $data['photo'] = $upload;

			}
		} else {
			$id = $this->input->post('id');
			$data = array(
				'pd_name' => $this->input->post('product_name'),
				'pd_code' => $this->input->post('product_code'),
			);
			$this->Product->update_product($id, $data);
		}
		echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
	}

	public function search_product()
	{
		$product_search = $this->input->post('product_search');

		$data = $this->Product->product_search($product_search);
		echo json_encode($data);
	}

	public function search_product_in()
	{
		$product_search = $this->input->post('product_search');

		$data = $this->Product->search_product_in($product_search);
		echo json_encode($data);
	}


	public function search_product_all()
	{
		$product_search = $this->input->post('product_search');

		$data = $this->Product->search_product_all($product_search);
		echo json_encode($data);
	}
	public function del_product()
	{
		$id = $this->input->post('id');
		//   var_dump($id);
		$data = $this->Product->del_product($id);
		if ($data) {
			echo json_encode(['success' => false, 'message' => 'มีข้อมูลสินค้าในสต๊อกไม่สามารถลบได้']);
		} else {
			echo json_encode(['success' => true, 'message' => 'คุณต้องการลบสินค้านี่ใช่ไหม ?']);
		}
		// echo json_encode($data);
	}
	public function delproduct()
	{
		$del_by_id = $this->input->post('del_by_id');
		$data = array('pd_status' => 1);
		$data = $this->Product->delproduct($del_by_id, $data);
		echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
	}
	public function loadRecord($rowno = 0)
	{
		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcountfull = $this->db->get('product')->num_rows();
		$allcountselect = $this->db->get('product')->num_rows();
		$this->db->limit($rowperpage, $rowno);
		$users_record = $this->db
			// ->join('tbl_warehouse','tbl_warehouse.wh_no=tbl_stock_purchase.warehouse_id')
			// ->join('tbl_shipping_master','tbl_stock_purchase.shipping=tbl_shipping_master.shipping_id')
			// ->where('tbl_product.pd_type', '1')
			// ->order_by('pd_id', 'desc')
			->get('product')->result_array();
		$config['base_url'] = base_url() . 'Products/loadRecord';
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