<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>sabaidee888</title>
    <link href="<?php echo base_url('assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet');?>"
        type="text/css">
    <link href="<?php echo base_url();?>assets/font_mitr/stylesheet.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/backend/css/sb-admin-2.min.css');?>" rel="stylesheet">
</head>

<body class="backbg">

        <!-- Outer Row -->

        <div class="col-xl-7 mx-auto">
            <div class="card o-hidden border-0 shadow-lg mt-4">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="col-lg-12 mx-auto">
                                <div class="text-center">
                                    <img src="<?php echo base_url('resource/images/logo.jpg');?>" class="img-fluid">
                                    <div class="txttopic">
                                        ขายของออนไลน์ ที่ สปป. ลาว
                                    </div>
                                    <div class="txttopic-sm">
                                        ส่งของไป สปป. ลาว ยิ่งง่ายกว่า
                                    </div>
                                 
                              
                             
                                </div>
                              

                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="p-4">
                                <div class="text-center">
                                    <div class="backtxt">เข้าสู่ระบบ</div>
                                </div>
                                <form class="user" id="login" action="" method="post" name="name">
                                    <div class="form-group formtxt">
                                        รหัสผู้ใช้งาน
                                        <input type="text" class="form-control smtxt" placeholder="ระบุรหัสผู้ใช้งาน..."
                                            name="username" id="username">
                                        <div id="alertuser" class="text-alert"></div>
                                    </div>
                                    <div class="form-group formtxt">
                                        รหัสผ่าน
                                        <input type="password" class="form-control smtxt" placeholder="ระบุรหัสผ่าน"
                                            name="password" id="password">
                                        <div id="alertpass" class="text-alert"></div>
                                    </div>
                                    <div class="form-group formtxt">
                                        รหัสยืนยัน : <?php echo $this->session->userdata('vercode');?>
                                        <div class="number_verify backtxt">

                                        </div>

                                    </div>
                                    <div class="form-group formtxt">

                                        <input type="text" class="form-control smtxt"
                                            placeholder="กรุณาพิมพ์รหัสยืนยันด้านบนให้ถูกต้อง" name="captcha"
                                            id="captcha">
                                        <div id="alertcaptcha" class="text-alert"></div>
                                    </div>

                                    <button class="btn btn-sign-in txtbtn btn-block" type="button" id="submit"><i
                                            class="fa fa-sign-in" aria-hidden="true"></i>
                                        เข้าสู่ระบบ
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    



    </div>

    <div class="modal" tabindex="-1" role="dialog" id="alert_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-center">
                    <div class="danger-txt text-alert"></div>
                    <button type="button" class="btn btn-danger txtbtn" data-dismiss="modal">ตกลง</button>
                </div>

            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/backend/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script>
    $('#submit').click(function() {
        if ($('#username').val() == "" && $('#password').val() == "" && $('#captcha').val() == "") {
            $('#alertuser').html('กรุณาระบุรหัสผู้ใช้งาน');
            $('#alertpass').html('กรุณาระบุรหัสผ่าน');
            $('#alertcaptcha').html('กรุณาระบุรหัสยืนยัน');
            return false;
        } else if ($('#username').val() == "") {
            $('#alertuser').html('กรุณาระบุรหัสผู้ใช้งาน');
            return false;
        } else if ($('#password').val() == "") {
            $('#alertpass').html('กรุณาระบุรหัสผ่าน');
            return false;
        } else if ($('#captcha').val() == "") {
            $('#alertcaptcha').html('กรุณาระบุรหัสยืนยัน');
            return false;
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('login') ?>",
                data: {
                    captcha: $('#captcha').val(),
                    username: $('#username').val(),
                    password: $('#password').val(),
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {

                        //  alert(response.message);
                        window.location.href = '<?php echo base_url('') ?>' + response.url;
                    } else {
                        $('.danger-txt').html(response.message);
                        $('#alert_modal').modal('show');
                        // alert(response.message);
                    }
                },
                error: function() {
                    alert('Could not add data');
                }
            });
        }
    });
    $('#username').keyup(function() {
        if ($(this).val() == "") {
            $('#alertuser').html('กรุณาระบุรหัสพนักงาน');
        } else {
            $('#alertuser').html('');
        }
    });
    $('#password').keyup(function() {
        if ($(this).val() == "") {
            $('#alertpass').html('กรุณาระบุรหัสผ่าน');
        } else {
            $('#alertpass').html('');
        }
    });
    $('#captcha').keyup(function() {
        if ($(this).val() == "") {
            $('#alertcaptcha').html('กรุณาระบุรหัสยืนยัน');
        } else {
            $('#alertcaptcha').html('');
        }
    });
    </script>
</body>

</html>