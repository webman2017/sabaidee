<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Feedback extends CI_Controller {
	public function index()
	{
		$this->load->view('feedback/feedback_view');
	}
    public function create(){
        $this->load->view('create_category');
    }
	
}