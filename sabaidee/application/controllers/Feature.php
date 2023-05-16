<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Feature extends CI_Controller {
    public function index(){
        $this->load->view('feature/index');
    }
    public function create_feature(){
           $this->load->view('feature/create');
    }

public function save_feature(){
	$this->load->model('Feature_model', 'Feature');
	$data=array('feature_name'=>$this->input->post('feature_name'),
'description'=>$this->input->post('feature_description'));

	$id = $this->Feature->save($data);
	echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
}


    	public function loadRecord(	$rowno = 0)
	{
		// $rowno = 0;
		// $search = $this->input->post('search');
		$rowperpage = 10;
		if ($rowno != 0) {
			$rowno = ($rowno - 1) * $rowperpage;
		}
		$allcountfull = $this->db->get('product_feature')->num_rows();
		$this->db->limit($rowperpage, $rowno);
		$users_record = $this->db
			// ->or_like('pd_code', $search)
			// ->or_like('pd_name', $search)
			->order_by('id', 'desc')
			->get('product_feature')->result_array();
		$config['base_url'] = base_url() . 'Feature/loadRecord';
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