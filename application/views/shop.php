<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="<?php echo base_url(); ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
    type="text/css">
<link href="<?php echo base_url(); ?>assets/font_mitr/stylesheet.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/backend/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<style>
a {
    text-decoration: none !important;
}

.badge {
    font-weight: normal !important;
}

.more:hover {
    cursor: pointer;
    background-color: #ccc;
}
</style>
<div class="col-lg-6 mx-auto">
    <div class="card shadow mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-6 tbtxt">
                    ชื่อร้านค้า :
                </div>
                <div class="col-6 smtxt">
                    <?php echo $this->session->userdata('shop_name'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6 tbtxt">
                    รหัสร้านค้า :
                </div>
                <div class="col-6 smtxt">
                    <?php echo $this->session->userdata('shop_code'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion" id="accordionExample">
        <div class="card shadow">

            <h2 class="mb-0">
                <button class="btn btn-warning btn-block text-left" type="button" data-toggle="collapse"
                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <div class="backtxt text-white">สร้างใบสั่งซื้อ</div>
                </button>
            </h2>
            <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <form id="add_name" method="post" enctype='multipart/form-data'>
                        <div class="form-group formtxt_user">
                            วันที่สั่งซื้อ
                            <input type="hidden" name="shop_code"
                                value=" <?php echo $this->session->userdata('shop_code'); ?>">

                            <input type="hidden" value="<?php echo $this->session->userdata('us_shop'); ?>"
                                name="shop_id" id="shop_id">
                            <input type="text" class="form-control smtxt" placeholder="ระบุวันที่สั่งซื้อ"
                                value="<?php echo date('d-m-Y'); ?>" name="order_date">
                        </div>
                        <div class="form-group formtxt_user">
                            COD
                            <select class="form-control smtxt" id="cod" name="cod">
                                <option value="Y" selected>Yes
                                </option>
                                <option value="N">No
                                </option>
                            </select>
                        </div>

                        <div class="form-group formtxt_user">
                            ชื่อลูกค้า
                            <input type="text" class="form-control smtxt" placeholder="ระบุชื่อลูกค้า" id="customer"
                                name="customer">
                        </div>
                        <div class="form-group formtxt_user">
                            เบอร์โทรศัพท์
                            <input type="text" class="form-control smtxt" placeholder="เบอร์โทรศัพท์" id="mobile"
                                name="mobile">
                        </div>
                        <div class="form-group formtxt_user">
                            Facebook
                            <input type="text" class="form-control smtxt" placeholder="facebook" id="facebook"
                                name="facebook">
                        </div>
                        <div class="form-group formtxt_user">
                            ที่อยู่
                            <textarea type="text" class="form-control smtxt" rows="4" placeholder="ระบุที่อยู่"
                                name="address" id="address"></textarea>
                        </div>
                        <div class="form-group formtxt_user">
                            State
                            <select class="form-control smtxt" id="state" name="state">
                                <option value="">Please select one</option>
                                <?php foreach ($state as $state) {; ?>
                                <option value="<?php echo $state->id; ?>"><?php echo $state->state_name; ?></option>
                                <?php }; ?>
                            </select>
                        </div>
                        <div class="form-group formtxt_user">
                            Remark
                            <textarea class="form-control smtxt" rows="3" placeholder="ระบุ remark คำสั่งซื้อ"
                                name="remark"></textarea>
                        </div>
                        <div class="tbtxt">
                            รายการสินค้าในร้าน
                        </div>
                        <div class="row">
                            <?php
                            $no = 1;
                            foreach ($product as $result) {; ?>
                            <div class="card mb-2 bg-light">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <?php if ($result->pd_image != "" || $result->pd_image != null) {; ?>
                                            <img src="<?php echo base_url('upload/'); ?><?php echo $result->pd_image; ?>"
                                                class="img-fluid">
                                            <?php   } else {; ?>
                                            <img src="<?php echo base_url('resource/images/default.png'); ?>"
                                                class="img-fluid">
                                            <?php }; ?>
                                        </div>
                                        <div class="col-4 smtxt">
                                            <?php echo $result->pd_name; ?>
                                        </div>

                                        <div class="col-5">
                                            <input type="hidden" class="form-control amount" name="name[]"
                                                placeholder="จำนวน" value="<?php echo $result->pd_id; ?>">
                                            <!-- <div class="value-button" id="decrease"
                                                onclick="decreaseValue(<?php echo $no; ?>)" value="Decrease Value">
                                                -
                                            </div> -->
                                            <input type="number" name="amount[]"
                                                class="form-control smtxt amount_product" placeholder="จำนวน"
                                                value='0' />
                                            <!-- <div class="value-button" id="increase"
                                                onclick="increaseValue(<?php echo $no; ?>)" value="Increase Value">
                                                +
                                            </div> -->
                                        </div>
                                    </div>

                                    <?php $no++; ?>
                                </div>
                            </div>
                            <?php }; ?>
                        </div>
                        <div class="row">
                            <div class="col-12 formtxt_user">
                                <div class="form-group">
                                    จำนวนเงินทั้งหมด
                                    <input type="text" name="total" class="form-control smtxt" id="total"
                                        placeholder="รวมเงินทั้งหมด">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 formtxt_user">
                                <div class="form-group">
                                    Payment type
                                    <select class="form-control smtxt" id="payment" name="payment">
                                        <option value="">Please select</option>
                                        <option value="TRANSFER">โอนเงินแล้ว</option>
                                        <option value="CASH" selected="">จ่ายเงินปลายทาง</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 formtxt_user">
                                <div class="form-group">
                                    อัพโหลดสลิป
                                    <input type="file" name="photo" id="photo">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <div class="form-group">
                                <button class="btn btn-warning txtbtn" id="order_confirm"
                                    type="button">ยืนยันการสั่งซื้อ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <h2 class="mb-0">
                    <button class="btn btn-info btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"
                        id="check_status">
                        <div class="backtxt text-white">ติดตามสถานะสั่งซื้อ</div>
                    </button>
                </h2>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="formtxt_user">
                            <div class="form-group">
                                ค้นหารายการสั่งซื้อ
                                <input type="text" placeholder="ระบุหมายเลขสั่งซื้อหรือชื่อลูกค้า"
                                    class="form-control smtxt" id="order_key">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info txtbtn btn-block" id="search">ค้นหา</button>
                            </div>
                        </div>
                        <div class="formtxt_user">
                            <div id="order_total">
                            </div>

                        </div>

                        <div class="col-12 text-center" style="position:absolute;">
                            <div style="font-size:60px;z-index:999;left:50%;overflow:hidden;display:none;" id="loading">

                                <div class="text-center smtxt">
                                    <i class="fas fa-spinner fa-pulse"></i>
                                    Sabaidee888 กำลังโหลด...
                                </div>
                            </div>
                        </div>

                        <table class="table">
                            <tr class="tbtxt">
                                <td>หมายเลขสั่งซื้อ</td>
                                <td>ชื่อลูกค้า</td>
                                <td>สถานะ</td>
                            </tr>
                            <tbody id="result">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <h2 class="mb-0">
                    <button class="btn btn-success btn-block text-left collapsed txtbtn" type="button"
                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo" id="check_stock">
                        <div class="backtxt text-white">เช็คสต๊อก</div>
                    </button>
                </h2>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="formtxt_user">
                            รายการสต๊อก
                        </div>
                        <table class="table">
                            <tr class="tbtxt">
                                <td>รหัสสินค้า</td>
                                <td>สินค้า</td>
                                <td>จำนวน</td>
                            </tr>
                            <tbody id="result_stock">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="card">
                <h2 class="mb-0">
                    <button class="btn btn-primary btn-block text-left collapsed txtbtn" type="button"
                        data-toggle="collapse" data-target="#collapsefive" aria-expanded="false"
                        aria-controls="collapsefive" id="check_stock">
                        <div class="backtxt text-white">รายงาน</div>
                    </button>
                </h2>
                <div id="collapsefive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="formtxt_user">
                            รายงาน
                        </div>
                        <div class="form-group">
                            <input type="text" name="startdate" class="form-control trtxt" placeholder="ระบุวันที่"
                                id="startdate">
                        </div>
                        <div class="form-group">
                            <input type="text" name="endddate" class="form-control trtxt" placeholder="ระบุวันที่"
                                id="enddate">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary txtbtn" id="summary">ค้นหา</button>
                        </div>
                        <table class="table table-bordered table-hover">
                            <tr class="tbtxt">
                                <td>#</td>
                                <td>เลขใบสั่งซื้อ</td>
                                <td>ลูกค้า</td>
                                <td>state</td>
                                <td>วันที่สั่งซื้อ</td>
                            </tr>
                            <tbody id="result_report">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <h2 class="mb-0">
                <a href="<?php echo base_url('logout'); ?>" class="btn btn-danger btn-block text-left collapsed txtbtn"
                    type="button" aria-controls="collapseTwo">
                    <div class="backtxt text-white">ออกจากระบบ</div>
                </a>
            </h2>
        </div>
    </div>
</div>
<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body logouttxt text-center">
                <div class="mt-4 mb-4">
                    คุณต้องการออกจากระบบ?
                </div>
                <div>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">ยกเลิก</button>
                    <a class="btn btn-success" href="<?php echo base_url('logout'); ?>">ยืนยัน</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="success_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body logouttxt text-center">
                <div class="mt-4 mb-4">
                    คำสั่งซื้อถูกบันทึกเรียบร้อยแล้วค่ะ ขอบคุณค่ะ
                </div>
                <div>
                    <a class="btn btn-success" type="button" data-dismiss="modal">ตกลง</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="alert_modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body  text-center">
                <div class="danger-txt logouttxt p-4" id="alert"></div>
                <button type="button" class="btn btn-danger txtbtn" data-dismiss="modal">ตกลง</button>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="more_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body logouttxt text-center">
                <div id="invoice_no"></div>
                <div id="mobile_show"></div>
                <div id="facebook_show"></div>
                <div id="address_show"></div>
                <div class="mt-4 mb-4">
                    <table class="table">
                        <tr class="tbtxt">
                            <td>รหัสสินค้า</td>
                            <td>สินค้า</td>
                            <td>จำนวน</td>
                        </tr>
                        <tbody id="more_result">
                        </tbody>
                    </table>
                    <div id="total_amount"></div>
                </div>
                <div>
                    <a class="btn btn-success" type="button" data-dismiss="modal">ตกลง</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script>
$('#cod').change(function() {
    if ($(this).val() == "Y") {
        $('#payment').val('CASH');
    } else {
        $('#payment').val('TRANSFER');
    }
});

$('#order_confirm').click(function() {

    var imageList = [];
    $("input[name='amount[]']").each(function() {
        var value = parseInt($(this).val());
        // alert(value);
        imageList.push(value);
    });

    //alert(imageList);
    console.log(imageList);
    const arr = [0, 0, 0, 0];

    // alert(arr);
    var isAllZero = imageList.every(item => item === 0);
    // alert(isAllZero);

    if ($('#cod').val() == "") {
        $('#alert').html('กรุณาระบุ COD');
        $('#alert_modal').modal('show');
    } else if ($('#customer').val() == "") {
        $('#alert').html('กรุณาระบุชื่อลูกค้าค่ะ');
        $('html, body').animate({
            scrollTop: $("#customer").offset().top
        }, 500);
        $('#alert_modal').modal('show');
    } else if ($('#mobile').val() == "") {
        $('#alert').html('กรุณาระบุเบอร์โทรศัพท์ค่ะ');
        $('html, body').animate({
            scrollTop: $("#mobile").offset().top
        }, 500);
        $('#alert_modal').modal('show');
    } else if ($('#address').val() == "") {
        $('#alert').html('กรุณาระบุที่อยู่ค่ะ');
        $('#alert_modal').modal('show');
        $('html, body').animate({
            scrollTop: $("#address").offset().top
        }, 500);
    } else if ($('#state').val() == "") {
        $('#alert').html('กรุณาระบุ state');
        $('#alert_modal').modal('show');
        $('html, body').animate({
            scrollTop: $("#state").offset().top
        }, 500);

    } else if (isAllZero == true) {
        $('#alert').html('กรุณาใส่จำนวนสินค้า');
        $('#alert_modal').modal('show');
    } else if ($('#total').val() == "") {
        $('#alert').html('กรุณาระบุจำนวนเงินทั้งหมด');
        $('#alert_modal').modal('show');
        $('html, body').animate({
            scrollTop: $("#total").offset().top
        }, 500);
    } else if ($('#payment').val() == "TRANSFER") {
        if ($('#photo').val() == '') {
            $('#alert').html('กรุณาระบุอัพโหลดสลิป');
            $('#alert_modal').modal('show');
        } else {
            save_order();
        }
    } else {
        save_order();
    }
});


function save_order() {
    var formData = new FormData($('#add_name')[0]);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('save_order'); ?>",
        cache: false,
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(response) {
            if (response.success) {
                $('#success_modal').modal('show');
                $('#add_name')[0].reset();
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

$('#check_status').click(function() {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('shop_order') ?>",
        data: {
            shop_id: $('#shop_id').val(),
        },
        beforeSend: function() {
            $('#loading').css('display', 'block');
        },
        dataType: "json",
        success: function(response) {
            $('#loading').css('display', 'none');
            if (response) {
                console.log(response);
                var html = '';
                var no = 1;
                var count = 0;
                for (var i = 0; i < response.length; i++) {
                    html += '<tr class="trtxt more" onclick="more(' + response[i].order_id +
                        ');"><td><div>' + response[i].invoice_no +
                        '</div></td><td>' + response[i].firstname +
                        '</td><td><button class="btn ' + response[i].color + '">' +
                        response[i].status_label + '</button><div>' + response[i].confirm_date +
                        '</div></td></tr>';
                    no++;
                    count++;
                }
                //     $('#edit_modal').modal('hide');
                //     $('#success_modal').modal('show');
                $('#order_total').html(' รายการสั่งซื้อวันนี้ รวม' + count + 'รายการ');
                $('#result').html(html);

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
});

function more(id) {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('more') ?>",
        data: {
            id: id,
        },
        beforeSend: function() {
            $('#loading').css('display', 'block');
        },
        dataType: "json",
        success: function(response) {
            $('#loading').css('display', 'none');
            if (response) {
                console.log(response);
                var html = '';
                var no = 1;

                for (var i = 0; i < response.length; i++) {
                    html += '<tr class="trtxt"><td>' + response[i].pd_code +
                        '</td><td>' + response[i].pd_name +
                        '</td><td>' +
                        response[i].quantity + '</td></tr>';
                    no++;
                }
                $('#invoice_no').html('หมายเลขสั่งซื้อ : ' + response['0']['invoice_no']);
                $('#mobile_show').html('เบอร์โทรศัพท์ : ' + response['0']['phone']);
                $('#facebook_show').html('Facebook : ' + response['0']['facebook']);
                $('#address_show').html('ที่อยู่ : ' + response['0']['address']);
                $('#total_amount').html('รวมเงิน : ' + response['0']['total']);
                $('#more_result').html(html);
                $('#more_product').modal('show');
            } else {
                $('.danger-txt').html(response.message);

                // alert(response.message);
            }
        },
        error: function() {
            alert('Could not add data');
        }
    });
}
$('#search').click(function() {
    if ($('#order_key').val() == "") {
        $('#alert').html('กรุณาระบุเลขใบสั่งซื้อหรือชื่อลูกค้า');
        $('#alert_modal').modal('show');
    } else {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('track_order') ?>",
            data: {
                order_key: $('#order_key').val(),
            },
            beforeSend: function() {
                $('#loading').css('display', 'block');
            },
            dataType: "json",
            success: function(response) {
                $('#loading').css('display', 'none');
                if (response) {
                    console.log(response);
                    var html = '';
                    var no = 1;
                    var count = 0;
                    for (var i = 0; i < response.length; i++) {
                        html += '<tr class="trtxt more" onclick="more(' + response[i].order_id +
                            ');"><td>' + response[i].invoice_no +
                            '</td><td>' + response[i].firstname +
                            '</td><td>' +
                            response[i].status_label + '</td></tr>';
                        no++;
                        count++;
                    }
                    $('#order_total').html(' รายการค้นหา' + count + 'รายการ');
                    $('#result').html(html);
                } else if (response.length == 0) {

                    html = '<tr class="trtxt"><td cols="3">ไม่พบรายการสั่งซื้อที่ค้นหา</td></tr>'
                    $('#result').html(html);
                }
            },
            error: function() {
                alert('Could not add data');
            }
        });
    }
});
$('#check_stock').click(function() {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('stock_shop') ?>",
        data: {
            shop_id: $('#shop_id').val(),
        },
        beforeSend: function() {
            $('#loading').css('display', 'block');
        },
        dataType: "json",
        success: function(response) {
            $('#loading').css('display', 'none');
            if (response) {
                console.log(response);
                var html = '';
                var no = 1;

                for (var i = 0; i < response.length; i++) {
                    html += '<tr class="trtxt"><td>' + response[i].pd_code +
                        '</td><td>' + response[i].pd_name +
                        '</td><td>' +
                        response[i].quantity_total + '</td></tr>';
                    no++;
                }
                $('#result_stock').html(html);
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
});

function increaseValue(id) {
    var value = parseInt(document.getElementById("number" + id).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById("number" + id).value = value;
}

function decreaseValue(id) {
    var value = parseInt(document.getElementById("number" + id).value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? (value = 1) : "";
    value--;
    document.getElementById("number" + id).value = value;
}
</script>
<script>
$('#startdate').datepicker({
    format: 'yyyy-mm-dd',
    uiLibrary: 'bootstrap4',

});
$('#enddate').datepicker({
    format: 'yyyy-mm-dd',
    uiLibrary: 'bootstrap4',

});

$('#summary').click(function() {
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('summary') ?>",
        data: {
            startdate: $('#startdate').val(),
            enddate: $('#enddate').val(),
            shop_id: $('#shop_id').val(),
        },
        dataType: "json",
        beforeSend: function() {
            // setting a timeout
            $('#loading').css('display', 'block');
        },
        success: function(response) {
            $('#loading').css('display', 'none');

            if (response !== "" || response !== null) {
                console.log(response);

                $('#result_report').html(response);

            }



        },
        error: function() {
            alert('Could not add data');
        }
    });

});
</script>