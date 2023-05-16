<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends CI_Controller {
	public function index()
	{
		$this->load->view('payment/payment_view');
	}
    public function create(){
        $this->load->view('create_category');
    }
	
}