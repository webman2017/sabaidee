<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>เพิ่มสินค้า</title>
    <link href="<?php echo base_url(); ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/font_mitr/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .modal.fade .modal-dialog.modal-dialog-zoom {
            -webkit-transform: translate(0, 0)scale(.5);
            transform: translate(0, 0)scale(.5);
        }

        .modal.show .modal-dialog.modal-dialog-zoom {
            -webkit-transform: translate(0, 0)scale(1);
            transform: translate(0, 0)scale(1);
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('sidebar'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('navtop'); ?>
                <div class="container-fluid mb-2 bg-white">
                    <div class="col-12 backtxt pt-2 pb-2">
                        <div class="mb-2">
                            <i class="far fa-folder"></i> เพิ่มหมวดหมู่สินค้า
                        </div>
                        <div class="smtxt mt-2 mb-2">
                            หน้าหลัก / เพิ่มหมวดหมู่สินค้า
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">

                                <div class="card-body">
                                    <form action="" method="post" enctype='multipart/form-data' id="form1">

                                        <div class="row">
                                            <div class="col-2 formtxt text-right">
                                                ชื่อหมวดหมู่ :
                                            </div>
                                            <div class="col-7">
                                                <div class="form-group">
                                                    <input type="text" class="form-control smtxt" placeholder="ระบุชื่อหมวดหมู่" name="category_name" id="category_name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <button class="btn btn-success txtbtn " id="save" type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                        บันทึก</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php $this->load->view('footer'); ?>
            <?php $this->load->view('success_modal'); ?>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php $this->load->view('logout_modal'); ?>
    <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/sb-admin-2.min.js"></script>
    <script>
        $('#save').click(function() {
            if ($('#pd_name').val() == "") {
                $('#alert_message').html('กรุณาระบุชื่อสินค้า');
                $('#alert_modal').modal('show');
                return false;

            } else if ($('#product_gen').val() == "") {
                $('#alert_message').html('กรุณาระบุรหัสสินค้า');
                $('#alert_modal').modal('show');
                return false;
            } else {
                var formdata = $("#form1").serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('save_category'); ?>",
                    data: formdata,
                    cache: false,
                    dataType: "json",
                    success: function(response) {
                        if (response.success == true) {
                            $('#success_modal').modal('show');
                            $('#form1')[0].reset();
                        } else if (response.success == false) {}
                    },
                    error: function() {
                        alert('Could not add data');
                    }
                });
            }
        });
    </script>
</body>

</html>