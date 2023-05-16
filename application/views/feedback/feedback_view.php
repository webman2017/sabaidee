<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>คำสั่งซื้อตีกลับ</title>
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
                <div class="container mb-2 bg-white">
                    <div class="col-6 backtxt p-2">
                        <div class="mb-2">
                            <i class="fa fa-undo"></i> คำสั่งซื้อตีกลับ
                        </div>
                        <div class="smtxt">
                            หน้าหลัก / คำสั่งซื้อตีกลับ
                        </div>
                    </div>

                </div>
                <div class="container-fluid">
                    <div class="card">
                     
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                <div class="form-group">
                                <input type="text" class="form-control sm-txt" placeholder="จาก...">
                                </div>

                                </div>
                                <div class="col-4">
                                <div class="form-group">
                                <input type="text" class="form-control sm-txt" placeholder="ถึง...">
                                </div>
                                </div>

                                <button class="btn btn-success txtbtn">ค้นหา</button>
                            </div>
                           


                            <div class="row">
                                <div class="col-lg-12">

                                    <table class="table table-bordered">
                                        <tr class="tbtxt bg-light">
                                      
                                          
                                            <td>หมายเลขคำสั่งซื้อ</td>
                                            <td>cod</td>
                                            <td>ชื่อลูกค้า</td>
                                            <td>โทรศัพท์</td>
                                            <td>การชำระเงิน</td>
                                            <td>state</td>
                                            <td>สถานะ</td>
                                        </tr>
                                        <tr class="trtxt">
                                        
                                       
                                            <td>8994343434</td>
                                            <td>บริพัตร คนธี</td>
                                            <td>0860168635</td>
                                            <td>cash</td>
                                          
                                           
                                           
                                           
                                        </tr>
                                       
                                    </table>
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
    <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/sb-admin-2.min.js"></script>
</body>

</html>