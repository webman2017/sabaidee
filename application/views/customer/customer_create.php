<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>เพิ่มรายการลูกค้า</title>
    <link href="<?php echo base_url();?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo base_url();?>assets/font_mitr/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('sidebar');?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('navtop');?>
                <div class="container-fluid mb-2 bg-white">
                    <div class="col-6 backtxt">
                        <div>
                            เพิ่มร้านค้า
                        </div>
                        <div class="smtxt">
                            หน้าหลัก / เพิ่มร้านค้า
                        </div>
                    </div>
                </div>
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo base_url('save_customer');?>" method="post">
                              

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 formtxt">
                                                ชื่อร้านค้า
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group formtxt">

                                                    <input type="text" class="form-control sm-txt"
                                                        placeholder="ชื่อร้านค้า" name="customer_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 formtxt">
                                            รหัสร้านค้า
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group formtxt">

                                                    <input type="text" class="form-control sm-txt"
                                                        placeholder="รหัสร้านค้า" name="customer_code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 formtxt">
                                                เบอร์โทรศัพท์
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group formtxt">

                                                    <input type="text" class="form-control sm-txt"
                                                        placeholder="ระบุเบอร์โทรศัพท์" name="customer_mobile">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 formtxt">
                                                อีเมล
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group formtxt">

                                                    <input type="text" class="form-control sm-txt"
                                                        placeholder="ระบุอีเมล" name="customer_email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 formtxt">
                                                ไลน์ไอดี
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group formtxt">

                                                    <input type="text" class="form-control sm-txt"
                                                        placeholder="ไลน์ไอดี" name="customer_line">
                                                </div>
                                            </div>
</div>
<button class="btn btn-success txtbtn"> <i class="fas fa-fw fa-save"></i>
                                                บันทึก</button>
</div>
</div>
</div>
            
                                           
                        </div>
                        </form>
                    </div>
                </div>

                <?php $this->load->view('footer');?>
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <?php $this->load->view('logout_modal');?>
        <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="<?php echo base_url();?>assets/backend/js/sb-admin-2.min.js"></script>
        <script src="<?php echo base_url();?>assets/backend/vendor/chart.js/Chart.min.js"></script>
        <script src="<?php echo base_url();?>assets/backend/js/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url();?>assets/backend/js/demo/chart-pie-demo.js"></script>
</body>

</html>