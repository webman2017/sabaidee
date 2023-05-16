<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model','Login');
		
	}
	public function before_login()
	{

		$text = rand(100000,999999); 

	$this->session->set_userdata('vercode',$text);



		$this->load->view('login/before_login_view');
	}

	public function login_view()
	{
		$text = rand(100000,999999); 

	$this->session->set_userdata('vercode',$text);
		$this->load->view('login/login_view');
	}

	public function register(){
		$this->load->view('login/register_view');
	}

	// เข้าสู่ระบบ
	public function login(){
		$captcha=$this->input->post('captcha');
	if ($captcha != $this->session->userdata('vercode'))  {
			echo json_encode(['success'=>false,'message'=>'รหัสยืนยันไม่ถูกต้อง กรุณาตรวจสอบ']);
		}else{
			$user_login=array(
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password'),
			);

			// var_dump($user_login['username']);
			// var_dump($user_login['password']);
			// exit();
			   $data=$this->Login->login_user($user_login['username'],$user_login['password']);

			//    var_dump($data);
			//    exit();
			   if($data)
			   {
			
			$this->session->set_userdata('shop_name',$data['shop_name']);
			$this->session->set_userdata('shop_code',$data['shop_code']);
			$this->session->set_userdata('us_username',$data['us_username']);
			$this->session->set_userdata('us_authority',$data['us_authority']);
			$this->session->set_userdata('us_shop',$data['us_shop']);
				//    redirect('/dashboard', 'refresh');

if($data['us_authority']=="Admin"){
	echo json_encode(['success'=>true,'message'=>'เข้าสู่ระบบถูกต้อง','url'=>'/order']);
}else if($data['us_authority']=="Shop"){
	echo json_encode(['success'=>true,'message'=>'เข้าสู่ระบบถูกต้อง','url'=>'/shop']);
}


				
				}else{
					echo json_encode(['success'=>false,'message'=>'รหัสผู้ใช้งานหรือรหัสผ่านผิด กรุณาตรวจสอบ']);
				}
		}
}

public function save_register(){
	$captcha=$this->input->post('captcha');

	if ($captcha != $this->session->userdata('vercode'))  {
		echo json_encode(['success'=>false,'message'=>'รหัสยืนยันไม่ถูกต้อง กรุณาตรวจสอบ']);
	}else{
	$this->load->model('Shop_model','shop');
	$data=array(
		'shop_name'=>$this->input->post('shopname'),
		'shop_code'=>$this->input->post('shopname'),
		'shop_mobile'=>$this->input->post('mobile'),
		
);
$id=$this->shop->save($data);
	$data=array(
		'us_shop'=>$id,
		// 'us_shop'=>$this->input->post('shopname'),
		'us_username'=>$this->input->post('username'),
		'us_password'=>$this->input->post('password'),
		'us_phone'=>$this->input->post('mobile'),
		'us_authority'=>'Shop',
);
$this->Login->save_register($data);

echo json_encode(['success'=>true,'message'=>'บันทึกสำเร็จ']);
	}
}



	public function logout(){
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	   }

	

}