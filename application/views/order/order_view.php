<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>คำสั่งซื้อ</title>
    <link href="<?php echo base_url();?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                    <div class="col-12 backtxt p-2">
                        <div>
                            <i class="fab fa-shopify"></i> รายการคำสั่งซื้อทั้งหมด
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
                                        <input type="text"  class="form-control smtxt"
                                            placeholder="หมายเลขคำสั่งซื้อ,เบอร์โทรศัพท์,facebook" id="order_id_search">

                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <select class="form-control smtxt" id="shop_order">
                                            <option value="">เลือกร้านค้า</option>
                                            <?php foreach($shop as $shop){;?>
                                            <option value="<?php echo $shop->id;?>"><?php echo $shop->shop_name;?>
                                            </option>
                                            <?php };?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control smtxt" id="startsearch" placeholder="ระบุช่วงวันที่">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-info txtbtn btn-sm" id="search_id"><i
                                            class="fa fa-search"></i>ค้นหา</button>

                                    <a href="<?php echo base_url('export_order');?>"
                                        class="btn btn-success txtbtn"><i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <a href="<?php echo base_url('Order/create');?>" class="btn btn-success txtbtn"
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
                            <table class="table table-bordered  table-hover">
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
                                <?php
                                $no=1;
if(!empty($results)){;?>
                                <tbody id="search_result">
                                    <?php foreach($results as $data) {;?>
                                    <tr class="trtxt">
                                        <td><?php echo $no;?></td>
                                        <td><a
                                                href="<?php echo base_url('order_detail/');?><?php echo $data->order_id;?>"><?php echo $data->invoice_no;?></a>
                                        </td>
                                        <td><?php echo $data->shop_name;?></td>
                                        <td><?php echo $data->firstname ;?></td>
                                        
                                        <td><?php echo $data->cod;?></td>
                                       
                                        <td><?php echo $data->state_name;?></td>
                                        </td>
                                           <td><?php echo $data->order_date;?></td>
                                        <td>
                                            <?php if($data->status_order=='7' || $data->status_order=='2'){;?>
                                            <button class='btn btn-info btn-sm txtbtn status'
                                                state_id="<?php echo $data->state;?>" id="<?php echo $data->order_id;?>"
                                                status="<?php echo $data->status_order;?>"><i
                                                    class='fas fa-box-open'></i>
                                                <?php echo $data->status_label;?></button>
                                            <?php   }else if($data->status_order=='4' || $data->status_order=='9'){   ;?>
                                            <button class='btn btn-success btn-sm txtbtn status'
                                                state_id="<?php echo $data->state;?>" id="<?php echo $data->order_id;?>"
                                                status="<?php echo $data->status_order;?>"><i class="fa fa-check"
                                                    aria-hidden="true"></i> <?php echo $data->status_label;?></button>
                                            <?php }else if($data->status_order=='3'){;?>
                                            <button class='btn btn-danger btn-sm txtbtn status'
                                                state_id="<?php echo $data->state;?>" id="<?php echo $data->order_id;?>"
                                                status="<?php echo $data->status_order;?>"><i
                                                    class='fas fa-hourglass'></i>
                                                <?php echo $data->status_label;?></button>
                                            <?php }else if($data->status_order=='13' || $data->status_order=='14'){;?>
                                            <button class='btn btn-danger btn-sm txtbtn status'
                                                state_id="<?php echo $data->state;?>" id="<?php echo $data->order_id;?>"
                                                status="<?php echo $data->status_order;?>"><i class="fa fa-times-circle"
                                                    aria-hidden="true"></i>
                                                <?php echo $data->status_label;?></button>

                                                 <?php }else if($data->status_order=='5' || $data->status_order=='12'){;?>
                                            <button class='btn btn-primary btn-sm txtbtn status'
                                                state_id="<?php echo $data->state;?>" id="<?php echo $data->order_id;?>"
                                                status="<?php echo $data->status_order;?>"><i class="fas fa-receipt"
                                                    aria-hidden="true"></i> 
                                                <?php echo $data->status_label;?></button>

                                            <?php }else if($data->status_order=='1'){;?>
                                            <button class='btn btn-warning btn-sm txtbtn status'
                                                state_id="<?php echo $data->state;?>" id="<?php echo $data->order_id;?>"
                                                status="<?php echo $data->status_order;?>"><i
                                                    class="fas fa-shipping-fast"></i>
                                                <?php echo $data->status_label;?></button>
                                            <?php }else{;?>
                                            <button class='btn btn-warning btn-sm txtbtn status'
                                                state_id="<?php echo $data->state;?>" id="<?php echo $data->order_id;?>"
                                                status="<?php echo $data->status_order;?>"><i
                                                    class='fas fa-hourglass'></i>
                                                <?php echo $data->status_label;?></button>
                                            <?php };?>
                                        </td>
                                        <td><?php if($data->status=='1'){;?>
                                            <button class="btn btn-secondary" disabled>ยืนยันแล้ว</button>
                                            <?php }else{?>
                                            <a href="<?php echo base_url('order_detail/');?><?php echo $data->order_id;?>"
                                                class='btn btn-success btn-sm txtbtn confirm'
                                                target="blank">ยืนยันคำสั่งซื้อ</a>
                                            <?php };?>

                                            <?php   $no++;?>

                                        </td>

                                        <td><a href="<?php echo base_url('print_invoice/');?><?php echo $data->order_id;?>"
                                                onclick="basicPopup(this.href);return false"
                                                class="btn btn-secondary txtbtn" id="add_order"><i class="fa fa-file"
                                                    aria-hidden="true"></i>พิมพ์</button></td>

                                        <td>
                                            <?php if($data->status=='2'){;?>
                                            <button class="btn btn-danger txtbtn" disabled>ยกเลิกแล้ว</button>
                                            <?php }else{?>
                                            <button class="btn btn-danger txtbtn cancel_btn"
                                                data="<?php echo $data->order_id;?>">ยกเลิก</button>
                                            <?php };?>
                                        </td>
                                    </tr>
                                    <?php };?>
                                </tbody>
                                <?php 
}else{
    echo '<tr class="trtxt text-center"><td colspan="10">ไม่พบรายการสั่งซื้อ</td></tr>';
}
?>
                            </table>
                            <p><?php echo $links; ?></p>

                            <p class="footer_txt">เวลาโหลดข้อมูล <strong>{elapsed_time}</strong>
                                วินาที</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php $this->load->view('footer');?>
    </div>
    </div>
    <div class="modal" tabindex="-1" id="confirm_modal">
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
                        <?php foreach($status as $status){;?>
                        <option value="<?php echo $status->id;?>"><?php echo $status->status_label;?></option>
                        <?php };?>
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


    <div class="modal fade" id="cancel_md" tabindex="-1" 
        aria-hidden="true">
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





    <?php $this->load->view('logout_modal');?>
    <?php $this->load->view('success_modal');?>
    <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/sb-admin-2.min.js"></script>

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script>
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

    $('#search_id').click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('search_order') ?>",
            data: {
                shop_order: $('#shop_order').val(),
                order_id_search: $('#order_id_search').val(),
                startsearch:$('#startsearch').val(),

            },
            beforeSend: function() {
                // setting a timeout
                $('#loading').css('display', 'block');
            },
            dataType: "json",
            success: function(response) {
                if (response) {
                    $('#loading').css('display', 'none');
                    console.log(response);
                    var html = '';
                    var no = 1;
                    for (var i = 0; i < response.length; i++) {

                        if (response[i].status_order == 4 || response[i].status_order == 9) {
                            var sc = '<button class="btn btn-success btn-sm txtbtn   status" id="' +
                                response[i].order_id + '" status="' + response[i].status_order +
                                '"   state_id=' + response[i].state +
                                '><i class="fa fa-check-circle" aria-hidden="true"></i>' +
                                response[i].status_label +
                                '</button>';
                        } else if (response[i].status_order == 13 || response[i].status_order ==
                            14) {
                            var sc = '<button class="btn btn-danger btn-sm txtbtn status" id="' +
                                response[i].order_id + '" status="' + response[i].status_order +
                                '" state_id=' + response[i].state +
                                '><i class="fa fa-times-circle" aria-hidden="true"></i>' +
                                response[i].status_label +
                                '</button>';
                        } else if (response[i].status_order == 7 || response[i].status_order=='2') {
                            var sc = '<button class="btn btn-info btn-sm txtbtn status" id="' +
                                response[i].order_id + '" status="' + response[i].status_order +
                                '" state_id=' + response[i].state +
                                '><i class="fas fa-box-open"></i>' + response[i].status_label +
                                '</button>';
                        } else if (response[i].status_order == 1) {
                            var sc = '<button class="btn btn-warning btn-sm txtbtn status" id="' +
                                response[i].order_id + '" status="' + response[i].status_order +
                                '" state_id=' + response[i].state +
                                '><i class="fas fa-shipping-fast"></i>' + response[i]
                                .status_label +
                                '</button>';
                          } else if (response[i].status_order == 5 || response[i].status_order==12) {
                            var sc = '<button class="btn btn-primary btn-sm txtbtn status" id="' +
                                response[i].order_id + '" status="' + response[i].status_order +
                                '" state_id=' + response[i].state +
                                '><i class="fas fa-receipt" aria-hidden="true"></i>' + response[i]
                                .status_label +
                                '</button>';
                        }

                        html += '<tr class="trtxt"><td>' + no + '</td><td>' + response[i]
                            .invoice_no +
                            '</td><td>' + response[i].shop_name +
                            '</td><td>' + response[i].firstname + '</td><td>' + response[i].cod +
                            '</td><td>' + response[i].state_name +
                               '</td><td>' + response[i].order_date +
                            '</td><td>' + sc +
                            '</td><td><a href="<?php echo base_url('order_detail/');?>' +
                            response[i].order_id +
                            '" class="btn btn-success btn-sm txtbtn confirm" target="blank">ยืนยันคำสั่งซื้อ</a></td><td><a href="<?php echo base_url('print_invoice/');?>' +
                            response[i].order_id +
                            '" class="btn btn-secondary txtbtn"  onclick="basicPopup(this.href);return false">พิมพ์</a></td><td><button class="btn btn-danger txtbtn cancel_search" data="' +
                            response[i].order_id + '">ยกเลิก</button></td></tr>';

                        no++;
                    }
                    $('table #search_result').html(html);


                    cancel_modal_search();
                    status();



                    // $('#confirm_modal').modal('hide');
                    // $('#status_modal').modal('show');

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


$('.cancel_btn').click(function(){
    var order_id=$(this).attr('data');
    $('#id_confirm_del').val(order_id);
 cancel_modal();
});




    function cancel_modal() {
        $('#confirm_mesage').html('คุณต้องการยกเลิกออเดอร์นี้ใช้หรือไม่')
            $('#cancel_md').modal('show');
    }

   function cancel_modal_search() {
       $('.cancel_search').click(function(){   
            var order_id=$(this).attr('data');
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