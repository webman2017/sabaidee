<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel_product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Excel_model');
    }
    // public function index() {
    //     $data['page'] = 'export-excel';
    //     $data['title'] = 'Export Excel data';
    //     $data['employeeData'] = $this->EmployeeModel->employeeList();
    // 	$this->load->view('employee/employee', $data);
    // }
    public function createExcel()
    {
        $fileName = 'สินค้าทั้งหมด.xlsx';
        $employeeData = $this->Excel_model->fetch_data();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'รหัสสินค้า');
        $sheet->setCellValue('B1', 'ชื่อสินค้า');
        $rows = 2;
        foreach ($employeeData as $val) {
            $sheet->setCellValue('A' . $rows, $val['pd_code']);
            $sheet->setCellValue('B' . $rows, $val['pd_name']);
            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/" . $fileName);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url() . "/upload/" . $fileName);
    }


    public function export_stock()
    {
        $fileName = 'รายการสต๊อก.xlsx';
        $employeeData = $this->Excel_model->fetch_stock();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ร้านค้า');
        $sheet->setCellValue('B1', 'สินค้า');
        $sheet->setCellValue('C1', 'จำนวน');


        $rows = 2;
        foreach ($employeeData as $val) {
            $sheet->setCellValue('A' . $rows, $val['shop_name']);
            $sheet->setCellValue('B' . $rows, $val['pd_name']);
            $sheet->setCellValue('C' . $rows, $val['quantity_total']);


            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/" . $fileName);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url() . "/upload/" . $fileName);
    }

    public function export_order()
    {
        $fileName = 'รายการคำสั่งซื้อ.xlsx';
        $employeeData = $this->Excel_model->fetch_order();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ร้านค้า');
        $sheet->setCellValue('B1', 'ชื่อลูกค้า');
        $sheet->setCellValue('C1', 'เลขคำสั่งซื้อ');
        $sheet->setCellValue('D1', 'สินค้า');
        $sheet->setCellValue('E1', 'จำนวน');
        $sheet->setCellValue('F1', 'วันที่สั่งซื้อ');
        $sheet->setCellValue('G1', 'state');

        $rows = 2;
        foreach ($employeeData as $val) {
            $sheet->setCellValue('A' . $rows, $val['shop_name']);
            $sheet->setCellValue('B' . $rows, $val['firstname']);
            $sheet->setCellValue('C' . $rows, $val['invoice_no']);
            $sheet->setCellValue('D' . $rows, $val['pd_name']);
            $sheet->setCellValue('E' . $rows, $val['quantity']);
            $sheet->setCellValue('F' . $rows, $val['order_date']);
            $sheet->setCellValue('G' . $rows, $val['state_name']);

            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/" . $fileName);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url() . "/upload/" . $fileName);
    }

    public function export_report()
    {

        $shop_id = $this->input->post('shop_id');
        $startdate = $this->input->post('startdate');
        $enddate = $this->input->post('enddate');
        $fileName = 'รายการคำสั่งซื้อตั่้งแต่' . $startdate . '-' . $enddate . '.xlsx';
        $employeeData = $this->Excel_model->fetch_report($shop_id, $startdate, $enddate);
        $spreadsheet = new Spreadsheet();

        $spreadsheet->getActiveSheet()->getStyle('B1')
            ->getFill()->getStartColor()->setARGB('FFFF0000');
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ร้านค้า');
        $sheet->setCellValue('B1', 'ชื่อลูกค้า');
        $sheet->setCellValue('C1', 'เบอร์โทรศัพท์');
        $sheet->setCellValue('D1', 'facebook');
        $sheet->setCellValue('E1', 'เลขคำสั่งซื้อ');
        $sheet->setCellValue('F1', 'สินค้า');
        $sheet->setCellValue('G1', 'จำนวน');
        $sheet->setCellValue('H1', 'จำนวนเงิน');
        $sheet->setCellValue('I1', 'COD');
        $sheet->setCellValue('J1', 'PAYMENT');
        $sheet->setCellValue('K1', 'วันที่สั่งซื้อ');
        $sheet->setCellValue('L1', 'state');
        $sheet->setCellValue('M1', 'สถานะ');
        $sheet->setCellValue('N1', 'หมายเหตุ');

        $rows = 2;
        foreach ($employeeData as $val) {
            $sheet->setCellValue('A' . $rows, $val['shop_name']);
            $sheet->setCellValue('B' . $rows, $val['firstname']);
            $sheet->setCellValue('C' . $rows, $val['phone']);
            $sheet->setCellValue('D' . $rows, $val['facebook']);
            $sheet->setCellValue('E' . $rows, $val['invoice_no']);
            $sheet->setCellValue('F' . $rows, $val['pd_name']);
            $sheet->setCellValue('G' . $rows, $val['quantity']);
            $sheet->setCellValue('H' . $rows, $val['total']);
            $sheet->setCellValue('I' . $rows, $val['cod']);
            $sheet->setCellValue('J' . $rows, $val['payment']);

            $sheet->setCellValue('K' . $rows, $val['order_date']);
            $sheet->setCellValue('L' . $rows, $val['state_name']);
            $sheet->setCellValue('M' . $rows, $val['status_label']);
            $sheet->setCellValue('N' . $rows, $val['remark']);

            $rows++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save("upload/" . $fileName);
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url() . "/upload/" . $fileName);
    }
}
