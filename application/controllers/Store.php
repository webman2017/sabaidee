<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Store extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('Setting_model','Setting');
	}
public function index(){
    $this->load->view('store/store_create');
}
public function policy(){
    $this->load->view('store/policy_create');
}
public function sale(){
    $this->load->view('store/sale_create');
}
public function ship(){
    $this->load->view('store/ship_create');
}
public function accountant_ship(){
    $this->load->view('store/accountant_ship');
} 
public function payment(){
    $this->load->view('store/payment_create');
} 
public function customer(){
    $this->load->view('store/customer_create');
} 
public function permission(){
    $this->load->view('store/permission_create');
}
public function user(){

	$this->load->library("pagination");
		$config = array();
		$config["base_url"] = base_url() . "Store/user";
		$config["total_rows"] = $this->Setting->record_count();
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;
		// $choice = $config["total_rows"] / $config["per_page"];
		// $config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["results"] = $this->Setting->
			fetch_countries($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$data['count']=$this->Setting->record_count();

    $this->load->view('store/user_view',$data);
}
public function user_create(){
    $this->load->view('store/user_create');
}
public function save_user(){
    $data=array(
        'us_id'=>$this->input->post('us_code'),
        'us_name'=>$this->input->post('us_name'),
        'us_email'=>$this->input->post('us_email'),
        'us_password'=>$this->input->post('us_password'),
         'us_authority'=>'Administrator',
         'us_department'=>1,
         'us_position'=>1,
         'us_phone'=>$this->input->post('us_phone'),
         'us_dc'=>1,
         'us_worklocation'=>1,
         'us_sort'=>1,
         'us_status'=>1,
         'us_remark'=>1,
    );
    $id=$this->Setting->save_user($data);
    redirect('user', 'refresh');
	
}
public function edit_user($id){
    $data['user']=$this->Setting->userid($id);
	// var_dump($data);
	// exit();

    $this->load->view('store/user_edit',$data);
}
public function update_user(){
    $data=array(
        'us_id'=>$this->input->post('us_id'),
		'us_name'=>$this->input->post('us_name'),
		'us_email'=>$this->input->post('us_email'),
		'us_phone'=>$this->input->post('us_phone'),
	);

	// var_dump($data);
	// exit();
	

	$this->Setting->update_user(array('id' => $this->input->post('id')),$data);
    redirect('user', 'refresh');
}
}