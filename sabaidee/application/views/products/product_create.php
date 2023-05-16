<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>เพิ่มสินค้า</title>
    <link href="<?php echo base_url();?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo base_url();?>assets/font_mitr/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
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
        <?php $this->load->view('sidebar');?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('navtop');?>
                <div class="container-fluid mb-2 bg-white">
                    <div class="col-12 backtxt pt-2 pb-2">
                        <div class="mb-2">
                            <i class="fa fa-cubes"></i> เพิ่มสินค้า
                        </div>
                        <div class="smtxt mt-2 mb-2">
                            หน้าหลัก / รายการสินค้า / เพิ่มสินค้า
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <script>
                    function previewFile(input) {
                        var file = $("input[type=file]").get(0).files[0];

                        if (file) {
                            var reader = new FileReader();

                            reader.onload = function() {
                                $("#previewImg").attr("src", reader.result);
                            }

                            reader.readAsDataURL(file);
                        }
                    }
                    </script>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                              
                                <div class="card-body">
                                    <form action="<?php echo base_url('save_product');?>" method="post"
                                        enctype='multipart/form-data' id="form1">

                                      
                                        <div class="row">
                                            <div class="col-2 formtxt text-right">
                                                รหัสสินค้า :
                                            </div>
                                            <div class="col-5">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control smtxt"
                                                        placeholder="รหัสสินค้า" aria-label="รหัสสินค้า"
                                                        aria-describedby="basic-addon2" name="pd_code" id="product_gen">
                                                    <div class="input-group-append smtxt">
                                                        <button class="btn btn-success smtxt text-white" type="button"
                                                            id="product_code_gen">รหัสสินค้าอัตโนมัติ</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2 formtxt text-right">
                                                บาร์โค้ดสินค้า :
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <input type="text" class="form-control  smtxt"
                                                        placeholder="บาร์โค้ดสินค้า" name="pd_barcode" id="barcode">
                                                </div>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-2 formtxt text-right">
                                                ชื่อสินค้า :
                                            </div>
                                            <div class="col-7">
                                                <div class="form-group">
                                                    <input type="text" class="form-control smtxt"
                                                        placeholder="เพิ่มชื่อสินค้า" name="pd_name" id="pd_name">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-2 formtxt text-right">
                                                หมวดหมู่ :
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control smtxt"
                                                        placeholder="หมวดหมู่สินค้า" name="category" id="category">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2 formtxt text-right">
                                                รูปภาพ :
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <div style="border:1px dashed #ccc;">
                                                        <img id="previewImg" src="" alt="Placeholder" class="img-fluid">
                                                    </div>
                                                    <input type="file" name='file' onchange="previewFile(this);">
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <button class="btn btn-success txtbtn" id="save"> <i
                                                            class="fas fa-fw fa-save"></i>
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
            <?php $this->load->view('footer');?>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php $this->load->view('logout_modal');?>
    <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/sb-admin-2.min.js"></script>
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
            $('#form1').submit();
        }
    });
    $('#product_gen').keyup(function() {
        $('#barcode').val($('#product_gen').val());

    });
    $('#product_code_gen').click(function() {
        $.ajax({
            type: "get",
            url: "<?php echo base_url('product_gen') ?>",
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('#product_gen').val(response.message);
                    $('#barcode').val(response.message);
                    // alert(response.message);
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('Could not add data');
            }
        });
    });
    </script>
</body>

</html>