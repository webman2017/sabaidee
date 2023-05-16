<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>รายการสินค้า</title>
    <link href="<?php echo base_url(); ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/font_mitr/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font_num/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/sb-admin-2.min.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('sidebar'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('navtop'); ?>
                <div class="container-fluid mb-2 bg-white">
                    <div class="col-12 backtxt">
                        <div>
                            <i class="fas fa-cube"></i> รายการสินค้า
                        </div>
                        <div class="smtxt">
                            หน้าหลัก / รายการสินค้า
                        </div>
                    </div>
                </div>
                <div class="pl-1 pr-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-2 smtxt">จำนวนสินค้าทั้งหมด</div>
                                <div class="col-6 num" id="count"></div>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <a href="<?php echo base_url('product_create'); ?>" class="btn btn-success btn-sm txtbtn"><i class="fa fa-plus-circle m-r-xs"></i>
                                        เพิ่มสินค้า</a>
                                </div>
                                <div class="col-2 formtxt text-right">
                                    ค้นหาสินค้า
                                </div>
                                <div class="col-3">

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control smtxt" placeholder="ระบุรหัสสินค้า,ระบุชื่อสินค้า" id="product_search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-info" type="button" id="search"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-5 text-right">
                                    <a class="btn btn-sm btn-primary border" href="<?php echo base_url('export_product'); ?>"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
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

                            <table class="table table-bordered table-hover table-stripe" id='postsList'>
                                <thead>
                                    <tr>
                                        <td class="tbtxt">#</td>
                                        <td class="tbtxt">รหัสสินค้า</td>
                                        <td class="tbtxt">รูปภาพ</td>
                                        <td class="tbtxt" width="30%">ชื่อสินค้า</td>
                                        <td class="tbtxt" width="10%">ราคาขาย</td>
                                        <td class="tbtxt">แก้ไข</td>
                                        <td class="tbtxt">ลบ</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div class="trtxt" id='pagination'></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('footer'); ?>
        </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php $this->load->view('logout_modal'); ?>
    <?php $this->load->view('success_modal'); ?>

    <div class="modal" tabindex="-1" id="edit_modal">
        <form action="#" id="form" class="form-horizontal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title formtxt"><i class="fa fa-pencil" aria-hidden="true"></i> แก้ไขสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group tbtxt">
                            ชื่อสินค้า
                            <input type="hidden" name="id" id="id">
                            <input type="text" name="product_name" id="product_name" class="form-control smtxt" placeholder="ระบุชื่อร้านค้า">
                        </div>
                        <div class="form-group tbtxt">
                            รหัสสินค้า
                            <input type="text" name="product_code" id="product_code" class="form-control smtxt" placeholder="ระบุรหัสร้านค้า">
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


    <div class="modal fade" id="product_stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <div class="modal fade" id="confirm_del" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    $(document).ready(function() {
        $('#pagination').on('click', 'a', function(e) {
            e.preventDefault();
            var pageno = $(this).attr('data-ci-pagination-page');
            loadPagination(pageno);
        });

        loadPagination(0);



        function loadPagination(pagno) {
            $.ajax({
                url: '<?php echo base_url(); ?>/Products/loadRecord/' + pagno,
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#loading_modal').modal('show');
                },
                success: function(response) {
                    console.log(response);
                    $('#loading_modal').modal('hide');
                    $('#count').html(response.count);
                    $('#pagination').html(response.data.pagination);
                    createTable(response.data.result, response.data.row);
                    edit();
                    del();
                }
            });
        }







        function createTable(result, sno) {
            sno = Number(sno);
            $('#postsList tbody').empty();
            for (index in result) {
                var id = result[index].id;
                var title = result[index].supplier_name;
                var content = result[index].slug;
                //   content = content.substr(0, 60) + " ...";
                var link = result[index].slug;
                sno += 1;
                var tr = "<tr class='trtxt'>";
                tr += "<td>" + sno + "</td>";
                tr += "<td class='num'>" + result[index].pd_code + "</td>";
                tr += "<td class='num'>" + result[index].pd_id + "</td>";
                tr += "<td>" + result[index].pd_name + "</td>";
                tr += "<td class='num'>" + result[index].pd_price + "</td>";
                tr += "<td><button class='btn btn-sm btn-warning border edit' id=" + result[index].pd_id + " product_name='" + result[index].pd_name + "' code='" + result[index].pd_code + "'><i class='fa fa-pencil' aria-hidden='true'></i></button></td>";
                tr += "<td><button class='btn btn-sm btn-danger border del'  id=" + result[index].pd_id + "><i class='fa fa-trash-o' aria-hidden='true'></i></button>";

                "</td>";
                tr += "</tr>";
                $('#postsList tbody').append(tr);
            }
        }


        function edit() {
            $('.edit').click(function() {
                var id = $(this).attr('id');
                var product_name = $(this).attr('product_name');
                var code = $(this).attr('code');
                var img = $(this).attr('img');
                $('#id').val(id);
                $('#product_name').val(product_name);
                $('#product_code').val(code);
                $('#photo_exist').val(img);
                $('#img').html('<img src="<?php echo base_url('upload/'); ?>' + img + '"" class="img-fluid">');
                $('#edit_modal').modal('show');
            });
        }






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
                        alert('cccc');
                        loadPagination(0, search);
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





        function del() {
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
        }

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
                    loadPagination(0, search);
                    //    window.location.href = '<?php echo base_url('Products') ?>';





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