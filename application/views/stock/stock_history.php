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
    <style>
    #order-datatable_length {
        display: none;
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
                    <div class="col-12 backtxt p-2">
                        <div>
                            <i class="fa fa-folder-open"></i> | ประวัติการรับสต๊อกเข้า
                        </div>
                        <div class="smtxt mb-2 mt-2">
                            หน้าหลัก / ประวัติการรับสต๊อกเข้า
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group formtxt">
เลือกร้านค้า
                                        <select class="form-control smtxt" name="shop" id="shop">
                                            <option>
                                                เลือกร้านค้า
                                            </option>
                                            <?php foreach($shop as $shop){;?>
                                            <option value="<?php echo $shop->id;?>">
                                                <?php echo $shop->shop_name;?>
                                            </option>
                                            <?php };?>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-4">
                                    <button class="btn btn-success txtbtn btn-sm" id="search"><i
                                            class="fa fa-search"></i>
                                        ค้นหา</button>
                                </div>
                                <div class="col-4">

                                </div>
                            </div>



                            <table class="table table-bordered table-hover">
                                <tr class="tbtxt">
                                    <td>#</td>
                                    <td>วันที่รับเข้า</td>
                                    <td>ชื่อร้านค้า</td>
                                    <td>ผู้บันทึก</td>
                                    <td>ดูรายละเอียด</td>
                                </tr>

                            <?php    if(!empty($results)){
                                $no=1;
foreach($results as $data) {

    echo '<tbody id="search_result"><tr class="trtxt"><td>'.$no.'</td><td>'.$data->stockin_date.'</td>
    <td>'.$data->shop_name.'</td><td></td><td><a href="'.base_url('stock_history_detail/').$data->his_id.'" class="btn btn-success txtbtn">รายละเอียด</a></td></tr></tbody>';
   $no++;
}
}else{
    echo '<tr class="trtxt text-center"><td colspan="9">ยังไม่พบประวัติการรับสต๊อกเข้า</td></tr>';
}
?>


                                <!-- <tbody id="stock_list">
                                    <tr class="trtxt text-center">
                                        <td colspan="5">
                                            ยังไม่พบประวัติการรับสต๊อกเข้า
                                        </td>
                                    </tr>
                                </tbody> -->
                            </table>
                            <!-- <p><?php echo $links; ?></p> -->
                            <p class="footer_txt">เวลาโหลดข้อมูล <strong>{elapsed_time}</strong> วินาที</p>
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
    <!-- Logout Modal-->
    <?php $this->load->view('logout_modal');?>
    <script>
    $('#search').click(function() {
        var html = '';
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('stock_search') ?>",
            data: {
                shop: $('#shop').val(),
            },
            dataType: "json",
            success: function(response) {
                if (response !=="") {

                    console.log(response);
                    var no=1;
                    for (var i = 0; i < response.length; i++) {
                        html += '<tr class="trtxt"><td>'+no+'</td><td>' + response[i].pd_code + '</td><td>' + response[i].pd_name + '</td><td><i class="fas fa-fw fa-cubes"></i>' + response[i].quantity_total + '</td></tr>';
                        no++;
                    }
                    $('#stock_list').html(html);
                } else {
                    $('#stock_list').html('<tr class="trtxt text-center">'+
                                        '<td colspan="4">'+
                                            'ไม่พบรายการสต๊อก'+
                                        '</td>'+
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
    });
    </script>
</body>

</html>