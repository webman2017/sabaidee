<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>สรุปรายงาน</title>
    <link href="<?php echo base_url();?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
        <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 
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
                <div class="container mb-2 bg-white">
                    <div class="col-12 backtxt p-2">
                        <div class="mb-2">
                            <i class="fas fa-file"></i> สรุปรายงาน
                        </div>
                        <div class="smtxt mb-2 mt-2">
                            หน้าหลัก / สรุปรายงาน
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card mb-2">
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url('export_report');?>">
                            <div class="row">
                                <div class="col-12  tbtxt">สรุปรายงานรายวัน</div>
                                <div class="col-3">
                                    <select class="form-control trtxt" id="shop_id" name="shop_id">
                                        <option value="">
                                        เลือกร้าน
</option>
<?php foreach($shop as $shop){;?>
    <option value="<?php echo $shop->id;?>"><?php echo $shop->shop_name;?></option>
<?php };?>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <input type="text"  name="startdate"
                                                class="form-control smtxt" id="startdate" placeholder="ระบุวันที่">
                                </div>
                                <div class="col-3">
                                    <input type="text"  name="enddate"
                                                class="form-control smtxt" id="enddate" placeholder="ระบุวันที่">
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-success txtbtn" id="summary" type="button">ค้นหา</button>
                                      <button class="btn btn-success txtbtn"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</button>
                                </div>
                            </div>
</form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                         
                            <div class="smtxt mb-2">
                                รายการสั่งซื้อ
                                <div id="count_order"></div>
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
                            <table class="table table-bordered table-hover">
                                <tr class="tbtxt">
                                    <td><input type="checkbox"></td>
                                    <td>เลขใบสั่งซื้อ</td>
                                    <td>ลูกค้า</td>
                                      <td>state</td>
                                    <td>วันที่สั่งซื้อ</td>
                                </tr>
                                <tbody id="result">
                                </tbody>
                            </table>
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
  

    <div class="modal" tabindex="-1" role="dialog" id="alert_modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body  text-center">
                <div class="danger-txt logouttxt p-4" id="alert_message"></div>
                <button type="button" class="btn btn-danger txtbtn" data-dismiss="modal">ตกลง</button>
            </div>

        </div>
    </div>
</div>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
    
    <script>

$('#summary').click(function(){
if($('#shop_id').val()==""){
    $('#alert_message').html('กรุณาเลือกร้านค้า');
        $('#alert_modal').modal('show');


 }else{   $.ajax({
            type: "POST",
            url: "<?php echo base_url('summary') ?>",
            data: {
                startdate: $('#startdate').val(),
                enddate:$('#enddate').val(),
                shop_id:$('#shop_id').val(),
            },
            dataType: "json",
            beforeSend: function() {
                        // setting a timeout
                        $('#loading').css('display', 'block');
                    },
            success: function(response) {
                $('#loading').css('display', 'none');
              

                    console.log(response);
                  
 
// $('#count_order').html(response.count);
                    $('#result').html(response);
            
             
            },
            error: function() {
                alert('Could not add data');
            }
        });
    }
});

    
  
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
        </script>
</body>

</html>