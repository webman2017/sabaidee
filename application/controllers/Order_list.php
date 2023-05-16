<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order_list extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_list_model', 'Product');
        $this->load->model('Warehouse_model', 'Warehouse');
        $this->load->helper('url');
        $this->load->library('pagination');
    }
    public function index()
    {
        // var_dump('xxx');
        // exit();
        // redirect('Products/loadRecord');
        $this->load->view('order/order_list');
    }
    public function product_code_gen()
    {
        $product_id = date('Ymd');
        $product_gen = $this->db->or_like('product_id', $product_id, 'both')->get('product')->num_rows();
        $product_gen = $product_id . '-' . sprintf('%03d', ($product_gen + 1));
        echo json_encode(['success' => true, 'message' => $product_gen]);
    }
    // เพิ่มสินค้า
    public function create()
    {
        $this->load->model('Category_model', 'Category');
        $data['category'] = $this->Category->category_all();
        $data['warehouse'] = $this->Warehouse->get_warehouse();
        $data['product_type'] = $this->Product->product_type();
        $this->load->view('products/product_create', $data);
    }
    //จบเพิ่มสินค้า

    // บันทึกเพิ่มสินค้า
    public function save_product()
    {
        $config['upload_path'] = "upload/";
        $config['allowed_types'] = 'gif|jpg|png|PNG|JPEG|JPG|jpeg';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("file")) {
            $data = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'upload/' . $data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['quality'] = '100%';
            $config['width'] = 600;
            $config['height'] = 400;
            $config['new_image'] = 'upload/' . $data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $image = $data['file_name'];
            $data = array(
                'picture' => $image,
                'product_id' => $this->input->post('pd_code'),
                'product_name' => $this->input->post('pd_name'),
                'product_type' => $this->input->post('pd_type'),
                'barcode' => $this->input->post('pd_barcode'),
                'brand' => $this->input->post('pd_brand'),
                'cost1' => $this->input->post('cost1'),
                'price' => $this->input->post('pd_price'),
                'weight' => $this->input->post('pd_weight'),
                'long' => $this->input->post('pd_long'),
                'wide' => $this->input->post('pd_wide'),
                'height' => $this->input->post('pd_height'),
                'min_amount' => $this->input->post('min_amount'),
                'created_date' => date('Y-m-d H:i:s'),
                'description' => $this->input->post('pd_description'),
                'qty1' => $this->input->post('qty1'),
            );
            $id = $this->Product->save($data);
        } else {
            $data = array(
                'product_id' => $this->input->post('pd_code'),
                'product_name' => $this->input->post('pd_name'),
                'product_type' => $this->input->post('pd_type'),
                'barcode' => $this->input->post('pd_barcode'),
                'cost1' => $this->input->post('cost1'),
                'price' => $this->input->post('pd_price'),
                'brand' => $this->input->post('pd_brand'),
                'wide' => $this->input->post('pd_wide'),

                'long' => $this->input->post('pd_long'),
                'weight' => $this->input->post('pd_weight'),
                'height' => $this->input->post('pd_height'),
                'created_date' => date('Y-m-d H:i:s'),
                'min_amount' => $this->input->post('min_amount'),
                'description' => $this->input->post('pd_description'),
                'qty1' => $this->input->post('qty1'),
            );
            $id = $this->Product->save($data);
        }
        echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
    }
    public function update_product()
    {
        // $product_id = $this->input->post('pd_code');
        // $data_product = $this->check_exit_product($product_id);
        // if ($data_product) {
        // 	echo json_encode(['success' => true, 'message' => 'รหัสสินค้า ซ้ำ']);
        // } else {



        $id = $this->input->post('id');

        $this->db->where('product_id', $id);
        $this->db->delete('product');


        $config['upload_path'] = "upload/";
        $config['allowed_types'] = 'gif|jpg|png|PNG|JPEG|JPG|jpeg|JFIF|jfif';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("file")) {
            $data = $this->upload->data();
            //Resize and Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'upload/' . $data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['quality'] = '100%';
            $config['width'] = 600;
            $config['height'] = 400;
            $config['new_image'] = 'upload/' . $data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $image = $data['file_name'];
            $id = $this->input->post('id');
            $data = array(
                'picture' => $image,
                'product_id' => $this->input->post('pd_code'),
                'product_name' => $this->input->post('pd_name'),
                'height' => $this->input->post('pd_height'),
                'brand' => $this->input->post('pd_brand'),
                'wide' => $this->input->post('pd_wide'),
                'long' => $this->input->post('pd_long'),
                'weight' => $this->input->post('pd_weight'),
                'product_type' => $this->input->post('pd_type'),
                'cost1' => $this->input->post('cost1'),
                'created_date' => $this->input->post('created_date'),
                'price' => $this->input->post('pd_price'),
                'description' => $this->input->post('pd_description'),
                'min_amount' => $this->input->post('min_amount'),
                'qty1' => $this->input->post('qty1'),
                'updated_date' => date('Y-m-d H:i:s'),
            );
            // $this->db->where('product_id', $id);
            // $this->db->update('product', $data);
            $this->db->insert('product', $data);
            echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
        } else {
            $id = $this->input->post('id');
            $data = array(
                'product_id' => $this->input->post('pd_code'),
                'product_name' => $this->input->post('pd_name'),
                'brand' => $this->input->post('pd_brand'),
                'weight' => $this->input->post('pd_weight'),
                'picture' => $this->input->post('pic'),
                'height' => $this->input->post('pd_height'),
                'wide' => $this->input->post('pd_wide'),
                'long' => $this->input->post('pd_long'),
                'cost1' => $this->input->post('cost1'),
                'price' => $this->input->post('pd_price'),
                'product_type' => $this->input->post('pd_type'),
                'qty1' => $this->input->post('qty1'),
                'description' => $this->input->post('pd_description'),
                'min_amount' => $this->input->post('min_amount'),
                'created_date' => $this->input->post('created_date'),
                'updated_date' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('product', $data);
            // $this->db->where('product_id', $id);
            // $this->db->update('product', $data);
            echo json_encode(['success' => true, 'message' => 'บันทึกสำเร็จ']);
        }
    }
    // }

    public function check_exit_product($id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function edit_product($id)
    {
        $this->load->model('Category_model', 'Category');
        $data['product'] = $this->Product->productid($id);
        $data['category'] = $this->Category->category_all();
        $data['warehouse'] = $this->Warehouse->get_warehouse();
        $data['product_type'] = $this->Product->product_type();
        $this->load->view('products/product_edit', $data);
    }
    public function product_preview($id)
    {

        require_once 'vendor/autoload.php';
        $this->load->model('Category_model', 'Category');
        $data['product'] = $this->Product->productid($id);
        $data['category'] = $this->Category->category_all();
        $data['warehouse'] = $this->Warehouse->get_warehouse();
        $data['product_type'] = $this->Product->product_type();
        $data['pd_image'] = $this->Product->pd_image($id);
        $pd_code = $data['product']->product_id;
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $data['barcode'] = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($pd_code, $generator::TYPE_CODE_128)) . '">';

        $this->load->view('products/product_preview', $data);
    }

    private function set_barcode($code)
    {
        // Load library
        $this->load->library('zend');
        // Load in folder Zend
        $this->zend->load('Zend/Barcode');
        // Generate barcode
        Zend_Barcode::render('code128', 'image', array('text' => $code), array());
        $barcodeOptions = array('text' => 'ZEND-FRAMEWORK');
        $rendererOptions = array(
            'imageType'          => 'png',
            'horizontalPosition' => 'center',
            'verticalPosition'   => 'middle'
        );
        $imageResource = Zend_Barcode::factory('code39', 'image', $barcodeOptions, $rendererOptions)->render();
        Zend_Barcode::factory('code39', 'image', $barcodeOptions, $rendererOptions)->render();
    }
    public function product_search()
    {
        $staff_search = $this->input->get('q');
        $result = $this->Product->product_search($staff_search);
        $json = array(
            "total" => "",
            "items" => $result
        );
        echo json_encode($json);
    }
    public function loadRecord($rowno = 0)
    {



        // Search text
        $search_text = "";
        //	if($this->input->post('submit') != NULL ){
        $search_text = $this->input->post('search');
        $this->session->set_userdata(array("search" => $search_text));
        //	}else{
        if ($this->session->userdata('search') != NULL) {
            $search_text = $this->session->userdata('search');
        }
        //	}

        $rowperpage = 50;
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        // $allcount = $this->Main_model->getrecordCount($search_text);
        // Get  records
        // $all = $this->Main_model->getData($rowno,$rowperpage,$search_text);
        // $all = $this->db->or_like('product_id', $search, 'both')
        // 	->or_like('product_name', $search, 'both')->get('product')->num_rows();
        $allcountfull = $this->db->get('orders')->num_rows();
        $allcountselect = $this->db->where('status', 1)->get('orders')->num_rows();
        $set = $this->db->where('status', 2)->get('orders')->num_rows();
        $connect = $this->db->where('status', 0)->get('orders')->num_rows();

        $allcount = $this->Product->getrecordCount($search_text);

        // Get  records
        $users_record = $this->Product->getData($rowno, $rowperpage, $search_text);

        // Pagination Configuration
        $config['base_url'] = base_url() . 'Order_list/loadRecord';
        $config['use_page_numbers'] = TRUE;

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

        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        // Initialize
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;
        $data['search'] = $search_text;
        echo json_encode([
            'data' => $data,
            'count' => $allcountfull,
            'countselect' => $allcountselect,
            'set' => $set,
            'connect' => $connect
        ]);

        // redirect('Products');
        // $this->load->view('products/product_view',$data);
    }

    public function loadRecordselect($rowno = 0)
    {
        $rowperpage = 10;
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }


        $all = $this->db->get('orders')->num_rows();
        $allcountfull = $this->db->get('orders')->num_rows();
        $allcountselect = $this->db->get('orders')->num_rows();
        $this->db->limit($rowperpage, $rowno);
        $users_record = $this->db
            // ->join('tbl_warehouse','tbl_warehouse.wh_no=tbl_stock_purchase.warehouse_id')
            // ->join('tbl_shipping_master','tbl_stock_purchase.shipping=tbl_shipping_master.shipping_id')
            // ->where('tbl_product.pd_type', '2')
            // ->order_by('pd_id', 'desc')
            ->get('tbl_product')->result_array();
        $config['base_url'] = base_url() . 'Order_list/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $all;
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

        echo json_encode(['data' => $data, 'count' => $allcountfull, 'countselect' => $allcountselect]);
    }
    public function ajax_bulk_delete()
    {
        $list_id = $this->input->post('id');
        foreach ($list_id as $id) {
            $this->Product->delete_by_id($id);
        }
        echo json_encode(array("status" => TRUE));
    }

    public function ajax_bulk_webcatalog()
    {
        $list_id = $this->input->post('id');
        foreach ($list_id as $id) {
            $this->Product->webcatalog_by_id($id);
        }
        echo json_encode(array("status" => TRUE));
    }

    function get_autocomplete_product()
    {
        if (isset($_GET['term'])) {
            $result = $this->Product->search_product($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'            => $row->product_name,
                        'product_id'    => $row->product_id,
                        'price'    => $row->cost1,
                        // 'mobile'	=> $row->sup_mobile,
                        // 'email'	=> $row->sup_email,
                    );
                echo json_encode($arr_result);
            }
        }
    }
}