<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>ส่งออกข้อมูล</title>
    <link href="<?php echo base_url();?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo base_url();?>assets/font_mitr/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/sb-admin-2.min.js"></script>

</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('sidebar');?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('navtop');?>
                <div class="container-fluid bg-white">
                    <div class="col-12 backtxt">
                        <div>
                            ส่งออกข้อมูล
                        </div>
                        <div class="smtxt mb-2 mt-2">
                            หน้าหลัก / ส่งออกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                <div class="card mb-2">
                        <div class="card-body">
                    <div id="accordion">
                        <div class="card mb-2">
                            <div class="card-header" id="headingOne">

                                <div class="btn formtxt" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">

                                    <i class="fa fa-cube"></i> รายการสินค้า

                                </div>

                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <div class="formtxt">
                                        ส่งออกข้อมูล
                                    </div>
                                    <div class="sm-txt">
                                        <i class="fa fa-cube"></i> รายการสินค้า
                                    </div>
                                    <a href="<?php echo base_url('export_product');?>"
                                        class="btn btn-success txtbtn">Export Excel</a>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header" id="headingTwo">
                               
                                    <div class="btn formtxt collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fas fa-fw fa-shopping-cart"></i> คำสั่งซื้อ
                                    </div>
                              
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                <div class="formtxt">
                                        ส่งออกข้อมูล
                                    </div>
                                    <div class="sm-txt">
                                        <i class="fa fa-cube"></i> คำสั่งซื้อ
                                    </div>
                                    <a href="<?php echo base_url('export_product');?>"
                                        class="btn btn-success txtbtn">Export Excel</a>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header" id="headingThree">
                              
                                    <button class="btn formtxt collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <i class="fa fa-cubes"></i> คลังสินค้า
                                    </button>
                               
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion">
                                <div class="card-body">
                                <div class="formtxt">
                                        ส่งออกข้อมูล
                                    </div>
                                    <div class="sm-txt">
                                        <i class="fa fa-cube"></i> คลังสินค้า
                                    </div>
                                    <a href="<?php echo base_url('export_product');?>"
                                        class="btn btn-success txtbtn">Export Excel</a>
                              
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                            <div class="card-header" id="headingFour">
                               
                                    <div class="btn formtxt collapsed" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <i class="fas fa-fw fa-shopping-cart"></i> ลูกค้า
                                    </div>
                              
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordion">
                                <div class="card-body">
                                <div class="formtxt">
                                        ส่งออกข้อมูล
                                    </div>
                                    <div class="sm-txt">
                                        <i class="fa fa-cube"></i> ลูกค้า
                                    </div>
                                    <a href="<?php echo base_url('export_customer');?>"
                                        class="btn btn-success txtbtn">Export Excel</a>
                                </div>
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