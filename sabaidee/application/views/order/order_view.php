<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>คำสั่งซื้อ</title>
    <link href="<?php echo base_url(); ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/font_mitr/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('sidebar'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('navtop'); ?>
                <div class="container-fluid mb-2 bg-white">
                    <div class="col-12 backtxt p-2">
                        <div>
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i> รายการคำสั่งซื้อทั้งหมด
                        </div>
                        <div class="smtxt">
                            หน้าหลัก / คำสั่งซื้อทั้งหมด
                        </div>
                    </div>
                </div>
                <div class="pl-1 pr-1">
                    <div class="card">
                        <div class="card-body">

                            <div class="row mt-4">
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control smtxt"
                                            placeholder="หมายเลขคำสั่งซื้อ,เบอร์โทรศัพท์,facebook" id="order_id_search">

                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <select class="form-control smtxt" id="shop_order">
                                            <option value="">เลือกร้านค้า</option>
                                            <?php foreach ($shop as $shop) {; ?>
                                            <option value="<?php echo $shop->id; ?>"><?php echo $shop->shop_name; ?>
                                            </option>
                                            <?php }; ?>
                                        </select>


                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control smtxt" id="startsearch"
                                            placeholder="ระบุช่วงวันที่">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-info txtbtn btn-sm" id="search_id"><i
                                            class="fa fa-search"></i>ค้นหา</button>

                                    <a href="<?php echo base_url('export_order'); ?>" class="btn btn-success txtbtn"><i
                                            class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <a href="<?php echo base_url('Order/create'); ?>" class="btn btn-success txtbtn"
                                            id="add_order"><i class="fa fa-plus-circle m-r-xs"></i> เพิ่มรายการ</a>
                                    </div>
                                </div>
                            </div> -->


                            <div class="col-12 text-center" style="position:absolute;">
                                <div style="font-size:60px;z-index:999;left:50%;overflow:hidden;display:none;"
                                    id="loading">

                                    <div class="text-center smtxt">
                                        <i class="fas fa-spinner fa-pulse"></i>
                                        Sabaidee888 กำลังโหลด...
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-striped table-hover" id='postsList'>
                                <thead>
                                    <tr class="tbtxt">
                                        <td>#</td>
                                        <td>หมายเลขสั่งซื้อ</td>
                                        <td width="80">ร้านค้า</td>
                                        <td>ชื่อลูกค้า</td>
                                        <td>COD</td>
                                        <td>state</td>
                                        <td>วันที่สั่งซื้อ</td>
                                        <td>สถานะ</td>
                                        <td>ยืนยันสั่งซื้อ</td>
                                        <td>พิมพ์</td>
                                        <td>ยกเลิก</td>
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
        </div>
    </div>
    <?php $this->load->view('footer'); ?>
    </div>
    </div>
    <div class="modal" id="confirm_modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title tbtxt">จัดการสถานะคำสั่งซื้อ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="tbtxt">
                        สถานะ
                    </div>
                    <input type="hidden" name="order_id_status" id="order_id_status">
                    <select class="form-control smtxt" id="status_order">
                        <option value="">
                            เลือกสถานะ
                        </option>
                        <?php foreach ($status as $status) {; ?>
                        <option value="<?php echo $status->id; ?>">
                            <?php echo $status->status_label; ?></option>
                        <?php }; ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger txtbtn" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-success txtbtn" id="update_status">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body logouttxt text-center">
                    <div class="mt-4 mb-4">
                        บันทึกสถานะคำสั่งซื้อเรียบร้อย
                    </div>
                    <div>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">ยกเลิก</button>
                        <a class="btn btn-success" type="button" data-dismiss="modal" id="refresh_order">ยืนยัน</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="cancel_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body logouttxt text-center">
                    <div class="mt-4 mb-4">
                        ยกเลิกคำสั่งซื้อเรียบร้อย
                    </div>
                    <div>

                        <a class="btn btn-success" type="button" data-dismiss="modal" id="refresh_cancel">ตกลง</a>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="cancel_md" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body logouttxt text-center">
                    <input type="hidden" id="id_confirm_del">
                    <div class="mt-4 mb-4" id="confirm_mesage">

                    </div>
                    <div>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">ยกเลิก</button>
                        <a class="btn btn-success" type="button" data-dismiss="modal" id="confirm_delete">ยืนยัน</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php $this->load->view('logout_modal'); ?>
    <?php $this->load->view('success_modal'); ?>
    <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/sb-admin-2.min.js"></script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
                url: '<?php echo base_url(); ?>/Order/loadRecord/' + pagno,
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

                    status();
                    // edit();
                    // del();
                }
            });
        }

        function createTable(result, sno) {
            sno = Number(sno);
            $('#postsList tbody').empty();
            for (index in result) {
                if (result[index].status_order == "1" || result[index].status_order == "6") {
                    var icon = '<i class="fas fa-shipping-fast"></i>';
                    var sa = "btn-warning";
                } else if (result[index].status_order == "2" || result[index].status_order == "7") {
                    var icon = '<i class="fas fa-box-open"></i>';
                    var sa = "btn-info";
                } else if (result[index].status_order == "9") {
                    var icon = '<i class="fa fa-check" aria-hidden="true"></i>';
                    var sa = "btn-success";
                } else if (result[index].status_order == "12") {
                    var icon = '<i class="fa fa-check" aria-hidden="true"></i>';
                    var sa = "btn-success";
                } else if (result[index].status_order == "5") {
                    var icon = '<i class="fa fa-check" aria-hidden="true"></i>';
                    var sa = "btn-primary";
                } else if (result[index].status_order == "13" || result[index].status_order == "14") {
                    var icon = '<i class="fa fa-times" aria-hidden="true"></i>';
                    var sa = "btn-danger";
                }
                sno += 1;
                var tr = "<tr class='trtxt'>";
                tr += "<td>" + sno + "</td>";
                tr += "<td class='num'>" + result[index].invoice_no + "</td>";
                tr += "<td class='num'>" + result[index].shop_name + "</td>";
                tr += "<td>" + result[index].firstname + "</td>";
                tr += "<td class='num'>" + result[index].cod + "</td>";
                tr += "<td class='num'>" + result[index].state_name + "</td>";
                tr += "<td class='num'>" + result[index].order_date + "</td>";
                tr += "<td class='num'> <button class='btn btn-sm status " + sa + "' state_id=" + result[
                        index].state + " status=" + result[index].status_order + " id=" + result[index]
                    .order_id + ">" + icon + result[index].status_label + result[index].status_order +
                    "</button></td>";
                tr +=
                    "<td><a href='<?php echo base_url('order_detail/');?>" + result[index].order_id +
                    "' class='btn btn-sm btn-success border'>ยืนยัน</button></td>";
                tr += "<td><a href='<?php echo base_url('print_invoice/'); ?>" + result[index].order_id +
                    "' onclick='basicPopup(this.href);return false' class='btn btn-sm btn-primary'  id=" +
                    result[index].pd_id +
                    "><i class='fa fa-print'></i></a></td>";
                tr += "<td><button class='btn btn-sm btn-danger border del'  id=" + result[index].pd_id +
                    "><i class='fa fa-times'></i></button>";
                "</td>";
                tr += "</tr>";
                $('#postsList tbody').append(tr);
            }
        }
    });
    $('#startdate,#startsearch').datepicker({
        format: 'dd-mm-yyyy',
        uiLibrary: 'bootstrap4',

    });

    $('.confirm').click(function() {
        // $('#confirm_modal').modal('show');
    });

    $('.status').click(function() {
        var id = $(this).attr('id');
        var state_id = $(this).attr('state_id');

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('get_status') ?>",
            data: {
                state_id: state_id
            },
            dataType: "json",
            success: function(response) {
                var html = '';
                if (response) {
                    console.log(response);

                    for (var i = 0; i < response.length; i++) {
                        html += '<option value="' + response[i].id + '">' + response[i]
                            .status_label + '</option>';
                    }

                    $('#status_order').html(html);
                } else {
                    $('.danger-txt').html(response.message);
                    $('#alert_modal').modal('show');
                }
            },
            error: function() {
                alert('Could not add data');
            }
        });



        $status = $(this).attr('status');
        $('#order_id_status').val(id);
        $('#status_order').val(status);
        $('#confirm_modal').modal('show');
    });


    $('#update_status').click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('update_status_order') ?>",
            data: {
                status_order: $('#status_order').val(),
                order_id_status: $('#order_id_status').val(),
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('#confirm_modal').modal('hide');
                    $('#status_modal').modal('show');
                    // window.location.href = '<?php echo base_url('') ?>' + response.url;
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

    function basicPopup(url) {
        popupWindow = window.open(url, 'popUpWindow',
            'height=300,width=700,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes'
        )
    }

    $('#refresh_order,#refresh_cancel').click(function() {
        window.location.href = '<?php echo base_url('Order') ?>';
    });



    $('.cancel_btn').click(function() {
        var order_id = $(this).attr('data');
        $('#id_confirm_del').val(order_id);
        cancel_modal();
    });




    function cancel_modal() {
        $('#confirm_mesage').html('คุณต้องการยกเลิกออเดอร์นี้ใช้หรือไม่')
        $('#cancel_md').modal('show');
    }

    function cancel_modal_search() {
        $('.cancel_search').click(function() {
            var order_id = $(this).attr('data');
            $('#id_confirm_del').val(order_id);
            $('#confirm_mesage').html('คุณต้องการยกเลิกออเดอร์นี้ใช้หรือไม่')
            $('#cancel_md').modal('show');
        });
    }

    function status() {
        $('.status').click(function() {
            var id = $(this).attr('id');
            var state_id = $(this).attr('state_id');



            $.ajax({
                type: "POST",
                url: "<?php echo base_url('get_status') ?>",
                data: {
                    state_id: state_id
                },
                dataType: "json",
                success: function(response) {
                    var html = '';
                    if (response) {
                        console.log(response);

                        for (var i = 0; i < response.length; i++) {
                            html += '<option value="' + response[i].id + '">' + response[i]
                                .status_label + '</option>';
                        }

                        $('#status_order').html(html);
                    } else {
                        $('.danger-txt').html(response.message);
                        $('#alert_modal').modal('show');
                    }
                },
                error: function() {
                    alert('Could not add data');
                }
            });
            $status = $(this).attr('status');
            $('#order_id_status').val(id);
            $('#status_order').val(status);
            $('#confirm_modal').modal('show');
        });

    }

    // function cancel() {
    //     $('.cancel').click(function() {
    //         $order_id = $(this).attr('data');

    //         $.ajax({
    //             type: "POST",
    //             url: "<?php echo base_url('cancel_order') ?>",
    //             data: {
    //                 order_id: $order_id,
    //             },
    //             beforeSend: function() {
    //                 $('#loading').css('display', 'block');
    //             },
    //             dataType: "json",
    //             success: function(response) {
    //                 $('#loading').css('display', 'none');
    //                 if (response) {
    //                     console.log(response);
    //                     $('#cancel_modal').modal('show');


    //                 } else {
    //                     // $('.danger-txt').html(response.message);
    //                     // $('#alert_modal').modal('show');
    //                 }
    //             },
    //             error: function() {
    //                 alert('Could not add data');
    //             }
    //         });
    //     });
    // }







    $('#confirm_delete').click(function() {

        $order_id = $('#id_confirm_del').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('cancel_order') ?>",
            data: {
                order_id: $order_id,
            },
            beforeSend: function() {
                $('#loading').css('display', 'block');
            },
            dataType: "json",
            success: function(response) {
                $('#loading').css('display', 'none');
                if (response) {
                    console.log(response);
                    $('#cancel_modal').modal('show');


                } else {
                    // $('.danger-txt').html(response.message);
                    // $('#alert_modal').modal('show');
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