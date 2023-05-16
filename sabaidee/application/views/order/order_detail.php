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
    <link href="<?php echo base_url();?>assets/font_mitr/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('sidebar');?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('navtop');?>
                <div class="container mb-2 bg-white">
                    <div class="col-12 backtxt p-2">
                        <div>
                            <i class="fa fa-shopping-cart"></i> รายละเอียดคำสั่งซื้อหมายเลข :
                            <?php echo $order_detail['0']->invoice_no;?>
                        </div>
                        <div class="smtxt">
                            หน้าหลัก / คำสั่งซื้อ / ทั้งหมด
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="form-group tbtxt">
                                คำสั่งซื้อจาก ร้าน : <?php echo $order_detail['0']->shop_name;?>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <a href="<?php echo base_url('print_invoice/');?><?php echo $order_detail['0']->order_id;?>"
                                            onclick="basicPopup(this.href);return false" class="btn btn-success txtbtn"
                                            id="add_order"><i class="fa fa-file" aria-hidden="true"></i>
                                            พิมพ์ใบออเดอร์</a>
                                    </div>
                                </div>
                                <div class="col-4">

                                    <button class="btn btn-info txtbtn" id="slip"
                                        data="<?php echo base_url('payment_document/');?><?php echo $order_detail['0']->slip;?>">สลิปโอนเงิน/เงินสด</button>
                                </div>
                                <div class="col-4 text-right">
                                    <?php if($order_detail['0']->status=='2'){;?>
                                    <button class="btn btn-danger txtbtn" disabled><i class="fa fa-times"
                                            aria-hidden="true"></i>
                                        ยกเลิกใบออเดอร์แล้ว</button>
                                    <?php }else{;?>

                                    <button class="btn btn-danger txtbtn" id="cancel_order"><i class="fa fa-times"
                                            aria-hidden="true"></i>
                                        ยกเลิกใบออเดอร์</button>
                                    <?php };?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="card" style="border:1px dashed #ccc !important;">
                                        <div class="card-body">
                                            <div class="tbtxt">
                                                ที่อยู่จัดส่ง :
                                                <?php echo $order_detail['0']->firstname;?>
                                                <div class="sm-txt">
                                                    <?php echo $order_detail['0']->address;?>
                                                </div>
                                                <div class="sm-txt">
                                                    <?php echo $order_detail['0']->phone;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tbtxt">
                                                Remark
                                                <div class="sm-txt">
                                                    <?php echo $order_detail['0']->remark;?>
                                                </div>
                                                 Facebook
                                                <div class="sm-txt">
                                                    <?php echo $order_detail['0']->facebook;?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tbtxt">
                                                วันที่สั่งซื้อ
                                                <div class="sm-txt">
                                                    <?php echo $order_detail['0']->order_date;?>
                                                </div>
                                            </div>
                                            <div class="tbtxt">
                                                Payment
                                                <div class="sm-txt">
                                                    <?php if($order_detail['0']->payment=="CASH"){
                                                        echo "เงินสด";
                                                    }else if($order_detail['0']->payment=="TRANSFER"){
                                                   echo "โอนเงิน"; }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="tbtxt">
                                รายการสินค้าสั่งซื้อ

                            </div>
                            <form id="order_bill" method="post">
                                <input type="hidden" name="order_id" value="<?php echo $order_detail['0']->order_id;?>"
                                    id="order_id">
                                <input type="hidden" name="shop_id" value="<?php echo $order_detail['0']->shop_id;?>">
                                <?php $stid= $order_detail['0']->status;?>
                                <?php $total_money= $order_detail['0']->total;?>

                                <table class="table table-bordered">
                                    <tr class="tbtxt bg-light">
                                        <td>#</td>
                                        <td></td>
                                        <td>ชื่อสินค้า</td>
                                        <td>รหัสสินค้า</td>
                                        <td>ราคาขาย</td>
                                        <td>จำนวน</td>

                                    </tr>

                                    <?php 
                                    if(!empty($order_detail)){
                  
                    $no=1;
                    foreach($order_detail as $order_detail){ ;?>

                                    <tr class="trtxt">
                                        <td><?php echo $no;?></td>
                                        <td>
                                            <?php if($order_detail->pd_image !="" || $order_detail->pd_image !=null){;?>
                                            <img src="<?php echo base_url('upload/');?><?php echo $order_detail->pd_image;?>"
                                                width="60">
                                            <?php  }else{;?>
                                            <img src="<?php echo base_url('resource/images/default.png');?>" width="60">
                                            <?php };?>

                                        </td>
                                        <td><input type="hidden" name="pd_id[]"
                                                value="<?php echo $order_detail->pd_id;?>"><?php echo $order_detail->pd_name;?>
                                        </td>
                                        <td><?php echo $order_detail->pd_code;?></td>
                                        <td><?php echo $order_detail->pd_price;?></td>
                                        <td><input type="hidden" name="quantity[]"
                                                value="<?php echo $order_detail->quantity;?>"><?php echo $order_detail->quantity;?>
                                        </td>


                                    </tr>

                                    <?php $no++;?>
                                    <?php }
                                    }; ?>

                                    <tr>
                                        <td colspan="5" class="text-right formtxt">รวมเงิน :</td>
                                        <td colspan="3" class="text-right sm-txt""><?php echo $total_money;?></td>
                    </tr>
                            </table>
<div class=" col-12 text-center">

                                            <?php if($more=='nomore'){;?>
                                            <button class="btn btn-success txtbtn" disabled
                                                type="button">กดยืนยันไม่ได้สต๊อกไม่พอ</button>
                                            <?php  }else if($stid=='0' || $stid=='2' && $more=='more'){;?>
                                            <button class="btn btn-success txtbtn" id="confirm_order"
                                                type="button">ยืนยันการสั่งซื้อ</button>
                                            <?php }else{;?>
                                            <button class="btn btn-success txtbtn" disabled id="confirm_order"
                                                type="button">ยืนยันการสั่งซื้อแล้ว</button>
                                            <?php }?>

                        </div>
                        </form>
                    </div>
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

    <div class="modal fade" id="slip_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-center">
                    <img src="" id="slip_show" class="img-fluid">


                </div>

            </div>
        </div>
    </div>


    <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/sb-admin-2.min.js"></script>
    <script>
    $('#confirm_order').click(function() {

        var formdata = $("#order_bill").serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('confirm_order');?>",
            data: formdata,
            cache: false,
            dataType: "json",
            success: function(response) {
                if (response.success) {

                    window.location.href = '<?php echo base_url('order_detail/') ?>' + $(
                        '#order_id').val();
                    // $('#success_modal').modal('show');
                    // $('#product_list').html('');

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

    $('#cancel_order').click(function() {
        //  alert($('#order_id').val());
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('cancel_order') ?>",
            data: {
                order_id: $('#order_id').val(),
            },
            beforeSend: function() {
                $('#loading').css('display', 'block');
            },
            dataType: "json",
            success: function(response) {
                $('#loading').css('display', 'none');
                if (response) {
                    console.log(response);

                    window.location.href = '<?php echo base_url('order_detail/') ?>' + $(
                        '#order_id').val();

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



    function basicPopup(url) {
        popupWindow = window.open(url, 'popUpWindow',
            'height=300,width=700,left=50,top=50,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes'
        )
    }

    $('#slip').click(function() {
        var slip = $(this).attr('data');
        $('#slip_show').attr("src", slip);
        $('#slip_modal').modal('show');


    });
    </script>]
</body>

</html>