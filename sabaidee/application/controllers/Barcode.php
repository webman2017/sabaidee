<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Barcode extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model','Category');
	}
	public function index(){
		$this->load->view('barcode/barcode_view');
	}


	public function product_search(){
		$this->load->model('Barcode_model');
		$id=$this->input->post('id');
		$result=$this->Barcode_model->search_product($id);
		echo json_encode($result);
	 }
}