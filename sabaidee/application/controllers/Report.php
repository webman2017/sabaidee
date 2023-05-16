<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends CI_Controller {
    public function index(){
        $this->load->model('Shop_model','shop');
        $data['shop']=$this->shop->shop_all();
        $this->load->view('report/report_view',$data);
    }
    public function report_view(){
        $this->load->model('Order_model');
        $startdate=$this->input->post('startdate');
        $enddate=$this->input->post('enddate');
        $job_id = $this->input->post('shop_id');
        if(!empty($job_id) && !empty($startdate) && !empty($enddate)){
            $this->Order_model->setOrderID($job_id);
            $this->Order_model->setEndDate($enddate);
            $this->Order_model->setStartDate($startdate);
         }
         if(!empty($job_id) && !empty($startdate)){
           $this->Order_model->setStartDate($startdate);
          $this->Order_model->setOrderID($job_id);
         }
        //  if(!empty($startdate) && !empty($enddate)) {
        //   $this->Order_model->setEndDate($enddate);
        //   $this->Order_model->setStartDate($startdate);
        //  }
         
   
         $data = $this->Order_model->report();
$html='';
$no=1;
$count=count($data);
         foreach($data as $result){
$html.='<tr class="trtxt"><td>'.$no.'</td><td>'.$result->invoice_no.'</td><td>'.$result->firstname.'</td><td>'.$result->state_name.'</td><td>'.$result->create_date.'</td></tr>';
$no++;      
}
echo json_encode($html);

    }

}