<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shipping extends CI_Controller {
	public function index()
	{
		$this->load->view('shipping/shipping_view');
	}
    public function create(){
        $this->load->view('create_category');
    }
	
}