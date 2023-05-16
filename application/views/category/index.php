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
            <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/font_mitr/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.16/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.16/sweetalert2.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('sidebar');?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('navtop');?>
                <div class="container-fluid mb-2 bg-white">
                    <div class="col-12 backtxt">
                        <div>
                            <i class="fa fa-cubes m-r-xs"></i> หมวดหมู่สินค้า
                        </div>
                        <div class="smtxt">
                            หน้าหลัก / หมวดหมู่สินค้า
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-body">

                            <div class="row">
                              
                              
                               
                                <div class="col-2">
                                    <a href="<?php echo base_url('category_create');?>"
                                        class="btn btn-success btn-sm txtbtn"><i class="fa fa-plus-circle m-r-xs"></i>
                                        เพิ่มหมวดหมู่</a>
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
                            <table class="table table-bordered  table-hover">
                                <tr>
                                    <td class="tbtxt">#</td>
                                    <td class="tbtxt">ชื่อหมวดหมู่</td>
                                    <td class="tbtxt" width="20%">ดำเนินการ</td>
                                </tr>
                             
                                <tr class="trtxt text-center">
                                    <td colspan="9">ไม่พบรายการหมวดหมู่</td>
                                </tr>
                            

                            </table>
                
                            <p class="footer_txt">เวลาโหลดข้อมูล <strong>{elapsed_time}</strong>
                                วินาที</p>
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
        <?php $this->load->view('success_modal');?>

        <div class="modal" tabindex="-1" id="edit_modal">
            <form action="#" id="form" class="form-horizontal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title backtxt">แก้ไขสินค้า</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group tbtxt">
                                ชื่อสินค้า
                                <input type="hidden" name="id" id="id">
                                <input type="text" name="product_name" id="product_name" class="form-control smtxt"
                                    placeholder="ระบุชื่อร้านค้า">
                            </div>
                            <div class="form-group tbtxt">
                                รหัสสินค้า
                                <input type="text" name="product_code" id="product_code" class="form-control smtxt"
                                    placeholder="ระบุรหัสร้านค้า">
                            </div>
                            <div class="form-group tbtxt">
                                รูปภาพ
                                <input type="file" name="photo">
                            </div>
                            <input type="hidden" name="photo_exist" id="photo_exist">
                            <div id="img">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger txtbtn" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" class="btn btn-success txtbtn" id="btn_update">ยืนยัน</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="modal fade" id="product_stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body logouttxt text-center">
                        <div class="mt-4 mb-4" id="stock_message">

                        </div>
                        <div>
                            <button class="btn btn-danger" type="button" data-dismiss="modal">ตกลง</button>

                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="confirm_del" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <input type="hidden" id="del_by_id">
                    <div class="modal-body logouttxt text-center">
                        <div class="mt-4 mb-4" id="confirm_del_message">

                        </div>
                        <div>
                            <button class="btn btn-danger" type="button" data-dismiss="modal">ตกลง</button>
                            <button class="btn btn-success" type="button" id="submit_del">ยืนยัน</button>

                        </div>

                    </div>

                </div>
            </div>
        </div>
</body>

</html>
<script>
$('#btn_update').click(function() {
    var formData = new FormData($('#form')[0]);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('update_product') ?>",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(response) {
            if (response.success) {
                $('#edit_modal').modal('hide');
                $('#success_modal').modal('show');


 $.ajax({
            type: "POST",
            url: "<?php echo base_url('search_product_all') ?>",
            data: {
                id: $('#id').val(),
                product_search: $('#product_search').val(),
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
                        html += '<tr class="trtxt"><td>' + no + '</td><td>' + response[i].pd_code +
                            '</td><td><img src="<?php echo base_url('upload/');?>' + response[i]
                            .pd_image + '" height="80"></td><td>' + response[i].pd_name +
                            '</td><td>' + response[i].pd_price +
   '</td><td><button class="btn btn-warning txtbtn edit_search" id="' + response[
                                i].pd_id + '" product_name="' + response[i].pd_name + '" code="' + response[
                                i].pd_code + '" img="' + response[i].pd_image +
                            '"><i class="fas fa-pencil-alt"></i> แก้ไข</button> ' +
                            '<button class="btn btn-danger txtbtn del_search" id='+response[i].pd_id+'><i class="fa fa-trash" aria-hidden="true"></i> ลบ</button></td></tr>';
                        no++;
                          
                    }
                 

                    $('#result').html(html);
                     edit();
                     del();
                } else {
                    $('.danger-txt').html(response.message);
                    $('#alert_modal').modal('show');
                }
            },
            error: function() {
                alert('Could not add data');
            }
        });



                // window.location.href = '<?php echo base_url('Products') ?>';
            } else {
                $('.danger-txt').html(response.message);
                $('#alert_modal').modal('show');
            }
        },
        error: function() {
            alert('Could not add data');
        }
    });
});

$('#search').click(function() {
    if ($('#product_search').val() == "") {
        $('#alert_message').html('กรุณาระบุชื่อสินค้าหรือรหัสสินค้า');
        $('#alert_modal').modal('show');
    } else {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('search_product') ?>",
            data: {
                id: $('#id').val(),
                product_search: $('#product_search').val(),
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
                        html += '<tr class="trtxt"><td>' + no + '</td><td>' + response[i].pd_code +
                            '</td><td><img src="<?php echo base_url('upload/');?>' + response[i]
                            .pd_image + '" height="80"></td><td>' + response[i].pd_name +
                            '</td><td>' + response[i].pd_price +
                            '</td><td><button class="btn btn-warning txtbtn edit_search" id="' + response[
                                i].pd_id + '" product_name="' + response[i].pd_name + '" code="' + response[
                                i].pd_code + '" img="' + response[i].pd_image +
                            '"><i class="fas fa-pencil-alt"></i> แก้ไข</button> ' +
                            '<button class="btn btn-danger txtbtn del_search" id='+response[i].pd_id+'><i class="fa fa-trash" aria-hidden="true"></i> ลบ</button></td></tr>';
                        no++;
                          
                    }
                 

                    $('#result').html(html);
                     edit();
                     del();
                } else {
                    $('.danger-txt').html(response.message);
                    $('#alert_modal').modal('show');
                }
            },
            error: function() {
                alert('Could not add data');
            }
        });
    }
});
$('.edit').click(function() {
    var id = $(this).attr('id');
    var product_name = $(this).attr('product_name');
    var code = $(this).attr('code');
    var img = $(this).attr('img');
    $('#id').val(id);
    $('#product_name').val(product_name);
    $('#product_code').val(code);
    $('#photo_exist').val(img);
    $('#img').html('<img src="<?php echo base_url('upload/');?>' + img + '"" class="img-fluid">');
    $('#edit_modal').modal('show');
});

function edit(){
    $('.edit_search').click(function() {
    var id = $(this).attr('id');
    var product_name = $(this).attr('product_name');
    var code = $(this).attr('code');
    var img = $(this).attr('img');
    $('#id').val(id);
    $('#product_name').val(product_name);
    $('#product_code').val(code);
    $('#photo_exist').val(img);
    $('#img').html('<img src="<?php echo base_url('upload/');?>' + img + '"" class="img-fluid">');
    $('#edit_modal').modal('show');
});

}

function del(){
    $('.del_search').click(function() {
    var id = $(this).attr('id');
    // alert(id);
    $('#del_by_id').val(id);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('del_product') ?>",
        data: {
            id: id,
        },
        beforeSend: function() {
            $('#loading').css('display', 'block');
        },
        dataType: "json",
        success: function(response) {
            $('#loading').css('display', 'none');
            if (response.success == true) {
                $('#confirm_del_message').html(response.message);
                $('#confirm_del').modal('show');
            } else {
                $('#stock_message').html(response.message);
                $('#product_stock').modal('show');
            }
        },
        error: function() {
            alert('Could not add data');
        }
    });
});
}



$('.del').click(function() {
    var id = $(this).attr('id');
    // alert(id);
    $('#del_by_id').val(id);
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('del_product') ?>",
        data: {
            id: id,
        },
        beforeSend: function() {
            $('#loading').css('display', 'block');
        },
        dataType: "json",
        success: function(response) {
            $('#loading').css('display', 'none');
            if (response.success == true) {
                $('#confirm_del_message').html(response.message);
                $('#confirm_del').modal('show');
            } else {
                $('#stock_message').html(response.message);
                $('#product_stock').modal('show');
            }
        },
        error: function() {
            alert('Could not add data');
        }
    });
});

$('#submit_del').click(function() {
    var del_by_id = $('#del_by_id').val();
    $.ajax({
        type: "POST",
        url: "<?php echo base_url('delproduct') ?>",
        data: {
            del_by_id: del_by_id,
        },
        beforeSend: function() {
            $('#loading').css('display', 'block');
        },
        dataType: "json",
        success: function(response) {
            $('#loading').css('display', 'none');
            if (response.success == true) {
                //     $('#confirm_del_message').html(response.message);
                $('#confirm_del').modal('hide');
                $('#success_modal').modal('show');
                //    window.location.href = '<?php echo base_url('Products') ?>';


$.ajax({
            type: "POST",
            url: "<?php echo base_url('search_product_all') ?>",
            data: {
                id: $('#id').val(),
                product_search: $('#product_search').val(),
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
                        html += '<tr class="trtxt"><td>' + no + '</td><td>' + response[i].pd_code +
                            '</td><td><img src="<?php echo base_url('upload/');?>' + response[i]
                            .pd_image + '" height="80"></td><td>' + response[i].pd_name +
                            '</td><td>' + response[i].pd_price +
   '</td><td><button class="btn btn-warning txtbtn edit_search" id="' + response[
                                i].pd_id + '" product_name="' + response[i].pd_name + '" code="' + response[
                                i].pd_code + '" img="' + response[i].pd_image +
                            '"><i class="fas fa-pencil-alt"></i> แก้ไข</button> ' +
                            '<button class="btn btn-danger txtbtn del_search" id='+response[i].pd_id+'><i class="fa fa-trash" aria-hidden="true"></i> ลบ</button></td></tr>';
                        no++;
                          
                    }
                 

                    $('#result').html(html);
                        edit();
                     del();
                } else {
                    $('.danger-txt').html(response.message);
                    $('#alert_modal').modal('show');
                }
            },
            error: function() {
                alert('Could not add data');
            }
        });



                
            } else {
                //      $('#stock_message').html(response.message);
                //    $('#product_stock').modal('show');
            }
        },
        error: function() {
            alert('Could not add data');
        }
    });
});
</script>