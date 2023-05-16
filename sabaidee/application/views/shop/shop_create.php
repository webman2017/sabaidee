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
                            <form action="<?php echo base_url('shop_save');?>" method="post" id="form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 formtxt">
                                                Username
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group formtxt">

                                                    <input type="text" class="form-control smtxt" placeholder="Username"
                                                        name="username" id="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 formtxt">
                                                Password
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group formtxt">

                                                    <input type="text" class="form-control smtxt" placeholder="Password"
                                                        name="password" id="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 formtxt">
                                                ชื่อร้านค้า
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group formtxt">

                                                    <input type="text" class="form-control smtxt"
                                                        placeholder="ชื่อร้านค้า" name="customer_name" id="shop_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 formtxt">
                                                รหัสร้านค้า
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group formtxt">

                                                    <input type="text" class="form-control smtxt"
                                                        placeholder="รหัสร้านค้า" name="customer_code" id="shop_id">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 formtxt">
                                                เบอร์โทรศัพท์
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group formtxt">

                                                    <input type="text" class="form-control smtxt"
                                                        placeholder="ระบุเบอร์โทรศัพท์" name="customer_mobile"
                                                        id="shop_mobile">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 formtxt">
                                                อีเมล
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group formtxt">

                                                    <input type="text" class="form-control smtxt"
                                                        placeholder="ระบุอีเมล" name="customer_email" id="shop_email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 formtxt">
                                                ไลน์ไอดี
                                            </div>
                                            <div class="col-8">
                                                <div class="form-group formtxt">

                                                    <input type="text" class="form-control smtxt" placeholder="ไลน์ไอดี"
                                                        name="customer_line" id="shop_lineid">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-success txtbtn" id="submit"> <i
                                                class="fas fa-fw fa-save"></i>
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
    <script>
    $('#submit').click(function() {
        if ($('#username').val() == "") {
            $('#alert_message').html('กรุณาระบุ Username');
            $('#alert_modal').modal('show');
            return false;
        } else if ($('#password').val() == "") {
            $('#alert_message').html('กรุณาระบุ Password');
            $('#alert_modal').modal('show');
            return false;
        }else if ($('#shop_name').val() == "") {
            $('#alert_message').html('กรุณาระบุชื่อร้าน');
            $('#alert_modal').modal('show');
            return false;
        }else if ($('#shop_id').val() == "") {
            $('#alert_message').html('กรุณาระบุรหัสร้าน');
            $('#alert_modal').modal('show');
            return false;
        }else if ($('#shop_mobile').val() == "") {
            $('#alert_message').html('กรุณาระบุเบอร์โทรศัพท์');
            $('#alert_modal').modal('show');
            return false;

        }else if ($('#shop_email').val() == "") {
            $('#alert_message').html('กรุณาระบุอีเมล');
            $('#alert_modal').modal('show');
            return false;
        }else if ($('#shop_lineid').val() == "") {
            $('#alert_message').html('กรุณาระบุ Line id');
            $('#alert_modal').modal('show');
            return false;
        } else {
            $('#form').submit();
        }
    });
    </script>

</body>

</html>