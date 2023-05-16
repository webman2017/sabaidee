<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model', 'Product');
		$this->load->model('Category_model', 'Category');
	}
	public function index()
	{
		$this->load->view('category/index');
	}

	public function update_category()
	{

		// $photo_exist = $this->input->post('photo_exist');
		// if (!empty($_FILES['photo']['name'])) {
		// 	$config['upload_path'] = "upload/";
		// 	$config['allowed_types'] = 'gif|jpg|png|PNG|JPEG|JPG|jpeg';
		// 	$config['encrypt_name'] = TRUE;
		// 	$this->load->library('upload', $config);
		// 	if ($this->upload->do_upload("photo")) {
		// 		$data = $this->upload->data();
		// 		//Resize and Compress Image
		// 		$config['image_library'] = 'gd2';
		// 		$config['source_image'] = 'upload/' . $data['file_name'];
		// 		$config['create_thumb'] = FALSE;
		// 		$config['maintain_ratio'] = TRUE;
		// 		$config['quality'] = '100%';
		// 		$config['width'] = 600;
		// 		$config['height'] = 400;
		// 		$config['new_image'] = 'upload/' . $data['file_name'];
		// 		$this->load->library('image_lib', $config);
		// 		$this->image_lib->resize();
		// 		$image = $data['file_name'];


		// 		$id = $this->input->post('id');
		// 		$data = array(
		// 			'pd_name' => $this->input->post('product_name'),
		// 			'pd_code' => $this->input->post('product_code'),
		// 			'pd_image' => $image,
		// 		);
		// 		$this->Product->update_product($id, $data);

		// 		if (file_exists('upload/' . $photo_exist) && $photo_exist)
		// 			unlink('upload/' . $photo_exist);

				// var_dump($image);
				// exit();

				//delete file
				// $person = $this->person->get_by_id($this->input->post('id'));


				// $data['photo'] = $upload;

		// 	}
		// } else {
			$id = $this->input->post('id');
			$data = array(
				'category_name' => $this->input->post('category_name'),
			);
			$this->Category->update_category($id, $data);
		// }
		echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
	// }

		}


	public function create_category(){
		$this->load->view('category/create_category');
	}
	public function save_category(){
		$data=array(
			'category_name'=>$this->input->post('category_name'),
		);
	$id = $this->Category->save($data);
	echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
	

	}
	public function loadRecord($rowno = 0)
	{
		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcountfull = $this->db->get('product_category')->num_rows();
		$this->db->limit($rowperpage, $rowno);
		$users_record = $this->db
			->order_by('id', 'desc')
			->get('product_category')->result_array();
		$config['base_url'] = base_url() . 'Category/loadRecord';
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
		echo json_encode(['data' => $data, 'count' => $allcountfull]);
	}
}