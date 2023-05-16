<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transfers extends CI_Controller {
	public function index()
	{
		$this->load->view('transfers/transfers_view');
	}
  
}