<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>รายการคำสั่งซื้อ</title>
    <link href="<?php echo base_url(); ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo base_url(); ?>assets/font_mitr/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font_num/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/sb-admin-2.min.js"></script>
    <style>
    #order-datatable_length {
        display: none;
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
                    <div class="col-12 backtxt">
                        <div>
                            <i class="fa fa-cubes m-r-xs" style="padding-top: 10px; padding-bottom: 10px;"></i>
                            รายการคำสั่งซื้อทั้งหมด
                        </div>
                        <div class="smtxt">
                            หน้าหลัก / คำสั่งซื้อทั้งหมด
                        </div>
                        <!-- <div class="smtxt">
                            หน้าหลัก / รายการสินค้า
                        </div> -->
                    </div>
                </div>
                <div class="pl-2 pr-2">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button class="btn btn-info smtxt" id="normal"><i class="fa fa-cube m-r-xs"></i>
                                            รายการคำสั่งซื้อทั้งหมด
                                            <span class="badge badge-light num" id="count"><i
                                                    class="fas fa-spinner fa-pulse"></i></span></button>
                                        <button class="btn btn-success smtxt" id="select"><i
                                                class="fa fa-cog m-r-xs"></i>
                                            ยืนยันแล้ว
                                            <span class="badge badge-light num" id="countselect"><i
                                                    class="fas fa-spinner fa-pulse"></i></span></button>
                                        <button class="btn btn-danger smtxt" id="set"><i class="fa fa-cubes m-r-xs"></i>
                                            ยกเลิก
                                            <span class="badge badge-light num" id="countset"><i
                                                    class="fas fa-spinner fa-pulse"></i></span></button>
                                        <button class="btn btn-warning smtxt" id="connect"><i
                                                class="fa fa-link m-r-xs"></i>
                                            รอการยืนยัน
                                            <span class="badge badge-light num" id="countconnect"><i
                                                    class="fas fa-spinner fa-pulse"></i></span></button>
                                    </div>
                                </div>

                            </div>


                            <div class="row mb-2 mt-2">

                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control smtxt"
                                            placeholder="หมายเเลขคำสั่งซื้อ,facebook,เบอร์โทรศัพท์" id="txtsearch"
                                            name="search">
                                    </div>
                                </div>
                                <div class=" col-4">
                                    <button class="btn btn-info txtbtn  btn-sm" id="search"><i class="fa fa-search"></i>
                                        ค้นหา</button>
                                </div>
                            </div>
                            <table class="table table-bordered table-striped" id='postsList'>
                                <thead>
                                    <tr class="tbtxt">
                                        <td>#</td>
                                        <td>หมายเลขการสั่งซื้อ</td>
                                        <td width="80">ชื่อร้านค้า</td>
                                        <td>ชื่อลูกค้า</td>
                                        <td>COD</td>
                                        <td>state</td>
                                        <td>วันที่สั่งซื้อ</td>
                                        <td>สถานะ</td>
                                        <td>ยืนยันการสั่งซื้อ</td>
                                        <td>พิมพ์</td>
                                        <td>ยกเลิก</td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <div class="trtxt" id='pagination'></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->load->view('footer'); ?>
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

    <div class="modal" tabindex="-1" id="confirm_modal">
        <div class="modal-dialog">
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
                        <option value="<?php echo $status->id; ?>"><?php echo $status->status_label; ?></option>
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


    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>

</html>
<script>
$(document).ready(function() {
    $.fn.enterKey = function(fnc) {
        return this.each(function() {
            $(this).keypress(function(ev) {
                var keycode = (ev.keyCode ? ev.keyCode : ev.which);
                if (keycode == '13') {
                    fnc.call(this, ev);
                }
            })
        })
    }

    $("#txtsearch").enterKey(function() {
        let search = $('#txtsearch').val();
        $.ajax({
            url: '<?php echo base_url(); ?>/Order_list/loadRecord/',
            type: 'post',
            data: {
                search: search
            },
            dataType: 'json',
            beforeSend: function() {
                // $('#loading_modal').modal('show');
            },
            success: function(response) {
                console.log(response);
                $('#loading_modal').modal('hide');
                $('#count').html(response.count.toLocaleString());
                $('#countselect').html(response.countselect.toLocaleString());
                $('#countset').html(response.set.toLocaleString());
                $('#countconnect').html(response.set.toLocaleString());
                $('#search').html(response.search);
                $('#pagination').html(response.data.pagination);
                createTable(response.data.result, response.data.row);
            }
        });
    })

    $('#search').click(function() {
        let search = $('#txtsearch').val();
        $.ajax({
            url: '<?php echo base_url(); ?>/Order_list/loadRecord/',
            type: 'post',
            data: {
                search: search
            },
            dataType: 'json',
            beforeSend: function() {
                // $('#loading_modal').modal('show');
            },
            success: function(response) {
                console.log(response);
                $('#loading_modal').modal('hide');
                $('#count').html(response.count.toLocaleString());
                $('#countselect').html(response.countselect.toLocaleString());
                $('#countset').html(response.set.toLocaleString());
                $('#countconnect').html(response.set.toLocaleString());
                $('#search').html(response.search);
                $('#pagination').html(response.data.pagination);
                createTable(response.data.result, response.data.row);
            }
        });

    });
    let search = $('#txtsearch').val();
    loadPagination(0);
    $('#del').click(function() {
        bulk_delete();
    });

    $('#normal').click(function() {
        loadPagination(0);
    });

    $('#pagination').on('click', 'a', function(e) {
        e.preventDefault();
        var pageno = $(this).attr('data-ci-pagination-page');
        // alert(pageno)
        let search = $('#txtsearch').val();
        // alert(search);
        loadPagination(pageno, search);
        localStorage.setItem('page', pageno);
    });

    function loadPagination(pagno, search) {
        $.ajax({
            url: '<?php echo base_url(); ?>/Order_list/loadRecord/' + pagno + '/',
            type: 'get',
            // data: {
            //     pagno: pagno,
            //     search: search
            // },
            dataType: 'json',
            beforeSend: function() {
                // $('#loading_modal').modal('show');
            },
            success: function(response) {
                console.log(response);
                $('#loading_modal').modal('hide');
                $('#count').html(response.count.toLocaleString());
                $('#countselect').html(response.countselect.toLocaleString());
                $('#countset').html(response.set.toLocaleString());
                $('#countconnect').html(response.set.toLocaleString());
                $('#search').html(response.search);
                $('#pagination').html(response.data.pagination);
                createTable(response.data.result, response.data.row);
            }
        });
    }

    function createTable(result, sno) {
        sno = Number(sno);
        var label = "";
        var dis = "";
        $('#postsList tbody').empty();
        for (index in result) {
            if (result[index].status_order == 13 || result[index].status_order == 14) {
                label = "ยกเลิกแล้ว";
                dis = "disabled";
            } else {
                label = "ยกเลิก";
                dis = "";
            }
            if (result[index].status == 1) {
                statuslabel = "ยืนยันแล้ว";
                dis = "disabled";


            } else {
                statuslabel = "ยืนยันคำสั่งซื้อ";
                dis = "";
            }
            var id = result[index].id;
            var title = result[index].supplier_name;
            var content = result[index].slug;
            var picture = result[index].picture;
            var update = result[index].updated_date;
            if (update == null) {
                var update = '-';
            }
            var link = result[index].slug;
            sno += 1;
            var tr = "<tr class='trtxt'>";
            tr += "<td>" + sno + "</td>";
            tr += "<td><a href='<?php echo base_url('order_detail/'); ?>" + result[index].order_id + "'>" +
                result[index].invoice_no + "</a></td>";
            tr += "<td>" + result[index].shop_name + "</td>";
            tr += "<td><a href='<?php echo base_url('product_preview/'); ?>" + result[index].product_id +
                "' class='smtxt'>" + result[index].firstname + "</a></td>";
            // tr += "<td>" + '-' + "</td>";
            tr += "<td class='num'>" + result[index].cod + "</td>";
            tr += "<td class='num'>" + result[index].state_name + "</td>";
            tr += "<td class='num'>" + result[index].order_date + "</td>";
            tr += "<td class='num'><button class='btn " + result[index].color + " status' state_id=" + result[
                    index].state + " id=" + result[index].order_id + ">" + result[index]
                .status_label +
                "</button><div class='smtxt'>" + result[index].confirm_date + "</div></td>";
            tr +=
                "<td class='num'><a href='<?php echo base_url('order_detail/'); ?>" + result[index].order_id +
                "' class='btn btn-success btn-sm txtbtn confirm " + dis + "' target='blank'>" + statuslabel +
                "</a></td>";
            tr +=
                "<td class='num'><a href='<?php echo base_url('print_invoice/'); ?>" + result[index].order_id +
                "' target='_blank'  onclick='basicPopup(this.href);return false' class='btn btn-secondary txtbtn' >พิมพ์</a></td>";
            tr += "<td><button class='btn btn-danger txtbtn cancel_btn' " + dis + " data='" + result[index]
                .order_id +
                "'>" + label + "</button></td>";
            tr += "</tr>";
            $('#postsList tbody').append(tr);
        }

        $('.cancel_btn').click(function() {

            var order_id = $(this).attr('data');
            // alert(order_id);
            $('#id_confirm_del').val(order_id);
            cancel_modal();
        });

        status();
    }
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

            if (response.success = true) {
                // alert(response.success);
                $('#confirm_modal').modal('hide');
                $('#alert_message').html('บันทึกสำเร็จ');
                $('#status_modal').modal('show');
                // var pageno = 1;

                // alert('xxx');
                // window.location.href = '<?php echo base_url('') ?>' + response.url;
            }

            var search = "";
            var pagno = localStorage.getItem('page');


            $.ajax({
                url: '<?php echo base_url(); ?>/Order_list/loadRecord/' + pagno +
                    '/',
                type: 'get',
                // data: {
                //     pagno: pagno,
                //     search: search
                // },
                dataType: 'json',
                beforeSend: function() {
                    // $('#loading_modal').modal('show');
                },
                success: function(response) {
                    console.log(response);
                    $('#loading_modal').modal('hide');
                    $('#count').html(response.count.toLocaleString());
                    $('#countselect').html(response.countselect
                        .toLocaleString());
                    $('#countset').html(response.set.toLocaleString());
                    $('#countconnect').html(response.set.toLocaleString());
                    $('#search').html(response.search);
                    $('#pagination').html(response.data.pagination);


                    var result = response.data.result;
                    var sno = response.data.row;


                    sno = Number(sno);
                    var label = "";
                    var dis = "";
                    $('#postsList tbody').empty();
                    for (index in result) {
                        if (result[index].status_order == 13 || result[index]
                            .status_order == 14) {
                            label = "ยกเลิกแล้ว";
                            dis = "disabled";
                        } else {
                            label = "ยกเลิก";
                            dis = "";
                        }
                        if (result[index].status == 1) {
                            statuslabel = "ยืนยันแล้ว";
                            dis = "disabled";


                        } else {
                            statuslabel = "ยืนยันคำสั่งซื้อ";
                            dis = "";
                        }
                        var id = result[index].id;
                        var title = result[index].supplier_name;
                        var content = result[index].slug;
                        var picture = result[index].picture;
                        var update = result[index].updated_date;
                        if (update == null) {
                            var update = '-';
                        }
                        var link = result[index].slug;
                        sno += 1;
                        var tr = "<tr class='trtxt'>";
                        tr += "<td>" + sno + "</td>";
                        tr +=
                            "<td><a href='<?php echo base_url('order_detail/'); ?>" +
                            result[index].order_id + "'>" +
                            result[index].invoice_no + "</a></td>";
                        tr += "<td>" + result[index].shop_name + "</td>";
                        tr +=
                            "<td><a href='<?php echo base_url('product_preview/'); ?>" +
                            result[index].product_id +
                            "' class='smtxt'>" + result[index].firstname +
                            "</a></td>";
                        // tr += "<td>" + '-' + "</td>";
                        tr += "<td class='num'>" + result[index].cod + "</td>";
                        tr += "<td class='num'>" + result[index].state_name +
                            "</td>";
                        tr += "<td class='num'>" + result[index].order_date +
                            "</td>";
                        tr += "<td class='num'><button class='btn " + result[index]
                            .color + " status' state_id=" + result[
                                index].state + " id=" + result[index].order_id +
                            ">" + result[index]
                            .status_label +
                            "</button><div class='smtxt'>" + result[index]
                            .confirm_date + "</div></td>";
                        tr +=
                            "<td class='num'><a href='<?php echo base_url('order_detail/'); ?>" +
                            result[index].order_id +
                            "' class='btn btn-success btn-sm txtbtn confirm " +
                            dis + "' target='blank'>" + statuslabel +
                            "</a></td>";
                        tr +=
                            "<td class='num'><a href='<?php echo base_url('print_invoice/'); ?>" +
                            result[index].order_id +
                            "' target='_blank'  onclick='basicPopup(this.href);return false' class='btn btn-secondary txtbtn' >พิมพ์</a></td>";
                        tr +=
                            "<td><button class='btn btn-danger txtbtn cancel_btn' " +
                            dis + " data='" + result[index]
                            .order_id +
                            "'>" + label + "</button></td>";
                        tr += "</tr>";
                        $('#postsList tbody').append(tr);
                    }

                    $('.cancel_btn').click(function() {

                        var order_id = $(this).attr('data');
                        // alert(order_id);
                        $('#id_confirm_del').val(order_id);
                        cancel_modal();
                    });

                    status();
                }
            });
            // else {
            //     $('.danger-txt').html(response.message);
            //     $('#alert_modal').modal('show');
            //     // alert(response.message);
            // }
        },
        error: function() {
            alert('Could not add data');
        }
    });


});




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




function cancel_modal() {
    $('#confirm_mesage').html('คุณต้องการยกเลิกออเดอร์นี้ใช่หรือไม่')
    $('#cancel_md').modal('show');
}


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