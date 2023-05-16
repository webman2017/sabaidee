<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>รายการร้านค้า</title>
    <link href="<?php echo base_url();?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo base_url();?>assets/font_mitr/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/sb-admin-2.min.js"></script>
  
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php $this->load->view('sidebar');?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('navtop');?>
                <div class="container mb-2 bg-white">
                    <div class="col-12 backtxt p-2">
                        <div>
                            <i class="fa fa-users"></i> ร้านค้าทั้งหมด
                        </div>
                        <div class="smtxt">
                            หน้าหลัก / ร้านค้าทั้งหมด
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card">

                        <div class="card-body">
                          
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control  sm-txt"
                                            placeholder="ชื่อร้านหรือข้อมูลลูกค้า">
                                    </div>

                                </div>
                                <div class="col-4">
                                     <button class="btn btn-success txtbtn btn-sm"><i class="fa fa-search m-r-xs"></i>
                                        ค้นหา</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                      
                                      
                                        <a href="<?php echo base_url('customer_create');?>"
                                            class="btn btn-success txtbtn btn-sm"><i
                                                class="fa fa-plus-circle m-r-xs"></i> เพิ่มร้านค้า</a>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-bordered table-striped table-hover">
                                <tr class="formtxt">
                               
                                    <td>รหัสร้านค้า</td>
                                    <td>ชื่อร้านค้า</td>
                                    <td>เบอร์โทรศัพท์</td>
                                 
                                    <td>อีเมล์</th>
                                    <td>ดำเนินการ</th>
                                </tr>
                                <?php
if(!empty($results)){
foreach($results as $data) {

    echo '<tr class="trtxt"><td>'.$data->cs_code.'</td><td>'.$data->cs_name . "</td><td>" . $data->cs_mobile . "</td>
    <td>" . $data->cs_email . "</td><td>" . $data->cs_created_date . "</td></tr>";
   
}
}else{
    echo '<tr class="trtxt"><td colspan="9" class="text-center">รายการร้านค้าว่าง</td></tr>';
}

?>
                            </table>
                            <p><?php echo $links; ?></p>
                            <p class="footer_txt">หน้านี้ใช้เวลาโหลดข้อมูล <strong>{elapsed_time}</strong> วินาที
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('footer');?>
    </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <?php $this->load->view('logout_modal');?>

</body>

</html>