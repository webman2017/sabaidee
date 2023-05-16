<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="<?php echo base_url();?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
    type="text/css">
<link href="<?php echo base_url();?>assets/font_mitr/stylesheet.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<div class="container">
    <div class="col-lg-6 col-12 mx-auto pt-2">
        <div style="border:1px dashed #ccc;padding:5px 3px;border-radius:5px;">
        <div class="tbtxt">
            หมายเลขการสั่งซื้อที่ Order No : <?php echo $order->invoice_no;?>
<input type="hidden" id="order_id" value="<?php echo $order->order_id;?>"> 
            

        </div>
        <div class="qrtxt">
           วันที่สั่งซื้อ : <?php echo $order->firstname;?>
        </div>
        <div class="qrtxt">
            ชื่อลูกค้า Customer Name : <?php echo $order->firstname;?>
        </div>
        <div class="qrtxt">
            ที่อยู่ Address : <?php echo $order->address;?>
        </div>
        <div class="qrtxt">

            เบอร์โทรศัพท์ : <?php echo $order->phone;?>
        </div>
        <div class="qrtxt">

state : <?php echo $order->state_name;?>
<input type="hidden" id="state" value="<?php echo $order->state;?>">
</div>
<div class="mt-4 text-center" id="send_section">
    <?php if($order->status_order=='4'){;?>
        <button class="btn btn-success txtbtn" id="confirm_clear">send ส่งแล้ว รอขนส่งเคลียร์เงิน</button>
          <?php }elseif($order->status_order=='5'){;?>
        <button class="btn btn-success txtbtn">success เคลียร์เงินแล้ว</button>
        <?php }elseif($order->status_order=='9'){;?>
            <button class="btn btn-success txtbtn">send ส่งแล้ว / ส่งบิลแล้ว</button>
            <?php }else{;?>
                 <button class="btn btn-success txtbtn" id="confirm">ยืนยันการจัดส่ง</button>
         <?php   };?>
</div>
    </div>
</div>

</div>
</div>

<div class="modal fade" id="clear_success_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body logouttxt text-center">
                <div class="mt-4 mb-4">
                  success เคลียร์เงินสำเร็จ
                </div>
                <div>
                    <a class="btn btn-success txtbtn" type="button" data-dismiss="modal">ตกลง</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="send_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body logouttxt text-center">
                <div class="mt-4 mb-4">
                   ยืนยันการจัดส่งสำเร็จ
                </div>
                <div>
                    <a class="btn btn-success txtbtn" type="button" data-dismiss="modal">ตกลง</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

   $('#confirm_clear').click(function(){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('clear_success') ?>",
            data: {
                state: $('#state').val(),
                order_id: $('#order_id').val(),
            },
            beforeSend: function() {
                // setting a timeout
                $('#loading').css('display', 'block');
            },
            dataType: "json",
            success: function(response) {
                $('#loading').css('display', 'none');
                if (response) {
                    console.log(response);
                    $('#clear_success_modal').modal('show');
                
    
            $.ajax({
            type: "POST",
            url: "<?php echo base_url('getstatus') ?>",
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
                    $('#send_section').html('<button class="btn btn-secondary txtbtn">'+response.status_label+'</button>');
                    // alert(response.status_label);
                    // $('#send_success').modal('show');
                    // $('#result').html(html);
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




    $('#confirm').click(function(){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('send_success') ?>",
            data: {
                state: $('#state').val(),
                order_id: $('#order_id').val(),
            },
            beforeSend: function() {
                // setting a timeout
                $('#loading').css('display', 'block');
            },
            dataType: "json",
            success: function(response) {
                $('#loading').css('display', 'none');
                if (response) {
                    console.log(response);
                    $('#send_success').modal('show');
               
         getstatus();
        
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

        function getstatus(){
            $.ajax({
            type: "POST",
            url: "<?php echo base_url('getstatus') ?>",
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
                    $('#send_section').html('<button class="btn btn-secondary txtbtn">'+response.status_label+'</button>');
                    // alert(response.status_label);
                    // $('#send_success').modal('show');
                    // $('#result').html(html);
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