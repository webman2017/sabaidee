<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model','Product');
		
	}
	public function index()
	{
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = base_url() . "Products/index";
		$config["total_rows"] = $this->Product->record_count_set();
		$config["per_page"] = 20;
		$config["uri_segment"] = 3;
		// $choice = $config["total_rows"] / $config["per_page"];
		// $config["num_links"] = round($choice);
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["results"] = $this->Product->
			fetch_countries_set($config["per_page"], $page);
		$data["links_set"] = $this->pagination->create_links();
		$data['count_set']=$this->Product->record_count_set();
		$this->load->view('products/product_view',$data);
	}
	public function product_code_gen(){
		$code=date("dmYHis");
		echo json_encode(['success'=>true,'message'=>$code]);
		// echo json_encode(['success'=>true,'message'=>round(microtime(true) * 1000)]);
	}

    public function create(){
        $this->load->view('products/product_create');
    }
	public function save_product(){

		$config['upload_path']="upload/";
		$config['allowed_types']='gif|jpg|png|PNG|JPEG|JPG|jpeg';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload',$config);
		if($this->upload->do_upload("file")){
		  $data = $this->upload->data();
				  //Resize and Compress Image
		  $config['image_library']='gd2';
		  $config['source_image']='upload/'.$data['file_name'];
		  $config['create_thumb']= FALSE;
		  $config['maintain_ratio']= TRUE;
		  $config['quality']= '100%';
		  $config['width']= 600;
		  $config['height']= 400;
		  $config['new_image']= 'upload/'.$data['file_name'];
		  $this->load->library('image_lib', $config);
		  $this->image_lib->resize();
		  $image= $data['file_name']; 
		$data = array(
		
			'pd_code' => $this->input->post('pd_code'),
			'pd_name' => $this->input->post('pd_name'),
			'pd_barcode' => $this->input->post('pd_barcode'),
			'pd_image'=>$image,
		);
		$id=$this->Product->save($data);	
	}else{
		$data = array(
			'pd_code' => $this->input->post('pd_code'),
			'pd_name' => $this->input->post('pd_name'),
			'pd_barcode' => $this->input->post('pd_barcode'),
		);
		$id=$this->Product->save($data);	
	}
	redirect('Products', 'refresh');
	}


	 public function edit_product($id){
		$this->load->model('Category_model','Category');
		$data['product']=$this->Product->productid($id);
	
	$this->load->view('products/product_edit',$data);
   }
   public function product_preview($id){

	require_once 'vendor/autoload.php';

	$this->load->model('Category_model','Category');
	$data['product']=$this->Product->productid($id);
	$data['category']=$this->Category->category_all();
	$data['warehouse']=$this->Warehouse->get_warehouse();
	$data['product_type']=$this->Product->product_type();
	$data['pd_image']=$this->Product->pd_image($id);

$pd_code=$data['product']->pd_code;


	$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
	$data['barcode']='<img src="data:image/png;base64,'. base64_encode($generator->getBarcode($pd_code, $generator::TYPE_CODE_128)) . '">';
		
$this->load->view('products/product_preview',$data);
   }

   private function set_barcode($code)
	{
		// Load library
		$this->load->library('zend');
		// Load in folder Zend
		$this->zend->load('Zend/Barcode');
		// Generate barcode
		Zend_Barcode::render('code128', 'image', array('text'=>$code), array());



		$barcodeOptions = array('text' => 'ZEND-FRAMEWORK');
        $rendererOptions = array('imageType'          =>'png', 
                                 'horizontalPosition' => 'center', 
                                 'verticalPosition'   => 'middle');
        $imageResource= Zend_Barcode::factory('code39', 'image', $barcodeOptions, $rendererOptions)->render();
		Zend_Barcode::factory('code39', 'image', $barcodeOptions, $rendererOptions)->render();
		
	}

	public function product_search(){
		$staff_search=$this->input->get('q');
		$result=$this->Product->product_search($staff_search);
		$json = array(
			"total"=>"",
			"items"=>$result	
		);
		echo json_encode($json);
	 }


	 public function update_product(){

		$photo_exist=$this->input->post('photo_exist');



if(!empty($_FILES['photo']['name']))
{
	
	$config['upload_path']="upload/";
		$config['allowed_types']='gif|jpg|png|PNG|JPEG|JPG|jpeg';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload',$config);
		if($this->upload->do_upload("photo")){
		  $data = $this->upload->data();
				  //Resize and Compress Image
		  $config['image_library']='gd2';
		  $config['source_image']='upload/'.$data['file_name'];
		  $config['create_thumb']= FALSE;
		  $config['maintain_ratio']= TRUE;
		  $config['quality']= '100%';
		  $config['width']= 600;
		  $config['height']= 400;
		  $config['new_image']= 'upload/'.$data['file_name'];
		  $this->load->library('image_lib', $config);
		  $this->image_lib->resize();
		  $image= $data['file_name']; 


		  $id=$this->input->post('id');
		  $data=array(
		 'pd_name'=>$this->input->post('product_name'),
		 'pd_code'=>$this->input->post('product_code'),
		 'pd_image'=>$image,
		  );
		  $this->Product->update_product($id,$data);	

		  if(file_exists('upload/'.$photo_exist) && $photo_exist)
		  unlink('upload/'.$photo_exist);
	  
	// var_dump($image);
	// exit();
	
	//delete file
	// $person = $this->person->get_by_id($this->input->post('id'));


	// $data['photo'] = $upload;
		
}
}else{
	$id=$this->input->post('id');
	$data=array(
   'pd_name'=>$this->input->post('product_name'),
   'pd_code'=>$this->input->post('product_code'),
	);
	$this->Product->update_product($id,$data);
}
		echo json_encode(['success'=>true,'message'=>'บันทึกสำเร็จ']);
	 }

	 public function search_product(){
		 $product_search=$this->input->post('product_search');
		
		 $data=$this->Product->product_search($product_search);
		 echo json_encode($data);
	 }

	  public function search_product_in(){
		 $product_search=$this->input->post('product_search');
		
		 $data=$this->Product->search_product_in($product_search);
		 echo json_encode($data);
	 }


	 public function search_product_all(){
		 $product_search=$this->input->post('product_search');
		
		 $data=$this->Product->search_product_all($product_search);
		 echo json_encode($data);
	 }

	 public function del_product(){
		  $id=$this->input->post('id');

		//   var_dump($id);
		 $data=$this->Product->del_product($id);
		 if($data){
			 echo json_encode(['success'=>false,'message'=>'มีข้อมูลสินค้าในสต๊อกไม่สามารถลบได้']);
		 }else{
		 echo json_encode(['success'=>true,'message'=>'คุณต้องการลบสินค้านี่ใช่ไหม ?']);	 
		 }
		// echo json_encode($data);

	 }
	 public function delproduct(){
		   $del_by_id=$this->input->post('del_by_id');
			$data=array('pd_status'=>1);
		 $data=$this->Product->delproduct($del_by_id,$data);
		 	echo json_encode(['success'=>true,'message'=>'บันทึกสำเร็จ']);
	 }
}