<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>รายการสินค้า</title>
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
                <div class="container-fluid mb-2 bg-white">
                    <div class="col-12 backtxt p-2">
                        <div class="mb-2">
                            <i class="fa fa-cubes"></i> | รับสต๊อกเข้า
                        </div>
                        <div class="smtxt mb-2 mt-2">
                            หน้าหลัก / รับสต๊อกเข้า
                        </div>
                    </div>
                </div>
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-body">
                            <form id="add_stock" method="post">
                                <div class="row">

                                    <div class="col-4">
                                        <div class="form-group">
                                            <select class="form-control smtxt" name="shop" id="shop">
                                                <option value="">เลือกร้านค้า</option>
                                                <?php foreach($shop as $shop){;?>
                                                <option value="<?php echo $shop->id;?>"><?php echo $shop->shop_name;?>
                                                </option>
                                                <?php };?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <button class="btn btn-success txtbtn btn-sm" id="search" type="button"><i
                                                    class="fa fa-search"></i>
                                                ค้นหา</button>
                                        </div>
                                    </div>
                                    <div class="col-2 formtxt">
                                        วันที่รับสินค้า
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <input type="text" style="pointer-events: none;" name="date"
                                                class="form-control smtxt" id="datepicker">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 text-center" style="position:absolute;">
                                    <div style="font-size:60px;z-index:999;left:50%;overflow:hidden;display:none;"
                                        id="loading">

                                        <div class="text-center smtxt">
                                            <i class="fas fa-spinner fa-pulse"></i>
                                            Sabaidee888 กำลังโหลด...
                                        </div>
                                    </div>
                                </div>


                                <table class="table table-bordered s table-hover">
                                    <tr class="tbtxt">
                                        <td>#</td>
                                        <td>รหัสสินค้า</td>
                                        <td>ชื่อสินค้า</td>
                                        <td>จำนวนสินค้ารับเข้า</td>
                                    </tr>
                                    <tbody id="product_list">
                                        <tr class="trtxt text-center">
                                            <td colspan="4">ยังไม่พบรายสินค้า</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="col-12 text-center">
                                    <button class="btn btn-success txtbtn" type="button"
                                        id="confirm_stock">บันทึกข้อมูล</button>
                                </div>

                                <p class="footer_txt">เวลาโหลดข้อมูล <strong>{elapsed_time}</strong> วินาที</p>
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
        <?php $this->load->view('success_modal');?>


        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <script>
        $('#search').click(function() {
            if ($('#shop').val() == "") {
                $('#alert_message').html('กรุณาเลือกร้าน ก่อน กดค้นหา');
                $('#alert_modal').modal('show');


            } else {
                var html = '';

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('search_products') ?>",
                    data: {
                        shop: $('#shop').val(),
                    },
                    dataType: "json",
                    beforeSend: function() {
                        // setting a timeout
                        $('#loading').css('display', 'block');
                    },
                    success: function(response) {
                        $('#loading').css('display', 'none');
                        if (response !== "") {

                            var no = 1;
                            for (var i = 0; i < response.length; i++) {
                                html += '<tr class="trtxt"><td>' + no + '</td><td>' + response[i]
                                    .pd_code +
                                    '</td><td>' + response[i].pd_name +
                                    '</td><td><input type="hidden" class="form-control" name="pd_id[]" value="' +
                                    response[i].pd_id +
                                    '"><input type="number" class="form-control" placeholder="0" name="amount[]"></td></tr>';

                                no++;
                            }
                            $('#product_list').html(html);
                        } else {
                            $('#product_list').html('<tr class="trtxt text-center">' +
                                '<td colspan="4">' +
                                'ไม่พบรายการสต๊อก' +
                                '</td>' +
                                '</tr>');
                            // $('.danger-txt').html(response.message);
                            // $('#alert_modal').modal('show');
                            // alert(response.message);
                        }
                    },
                    error: function() {
                        alert('Could not add data');
                    }
                });
            }
        });
        $('#confirm_stock').click(function() {
            if ($('#shop').val() == "") {
                $('#alert_message').html('กรุณาเลือกร้านที่รับสต๊อก แล้ว กดค้นหา');
                $('#alert_modal').modal('show');
            } else if ($('#datepicker').val() == "") {

                $('#alert_message').html('กรุณาเลือกระบุวันที');
                $('#alert_modal').modal('show');
            } else {
                var formdata = $("#add_stock").serialize();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('save_stock');?>",
                    data: formdata,
                    cache: false,
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            $('#success_modal').modal('show');

                            $('#add_stock')[0].reset();
                            $('#product_list').html('');

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
        </script>

        <script>
        $('#datepicker').datepicker({
            format: 'mm/dd/yyyy',
            uiLibrary: 'bootstrap4',

        });
        </script>
</body>

</html>