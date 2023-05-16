<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	public function index()
	{
		$this->load->view('dashboard');
	}
	public function shop(){
		$this->load->model("Product_model");
		$this->load->model("Stock_model");
		$this->load->model("Order_model");
		//$data['stock']=$this->Stock_model->stock_shop();
		$data['product']=$this->Product_model->get_all_by_user();
		$data['state']=$this->Order_model->state();


		$this->load->view('shop',$data);
	}

}
