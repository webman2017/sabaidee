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






<table>
    <tr>
        <td>
            <div class="invoice_txt">วันที่สั่งซื้อ Order Date :</div>
            <div class="invoice_txt"> <?php echo $order_detail['0']->order_date;?></div>
            <div class="invoice_txt">หมายเลขการสั่งซื้อ : <?php echo $order_detail['0']->invoice_no;?></div>
            <div class="invoice_txt"> ชื่อลูกค้า Customer Name : <?php echo $order_detail['0']->firstname;?></div>
            <div class="invoice_txt"> ที่อยู่ Address : <?php echo $order_detail['0']->address;?></div>
            <div class="invoice_txt"> เบอร์โทรศัพท์ : <?php echo $order_detail['0']->phone;?></div>
            <div class="invoice_txt"> facebook : <?php echo $order_detail['0']->facebook;?></div>
            <div class="invoice_txt"> Payment : <?php 
            if($order_copy['0']->payment=="CASH"){
                 echo "เงินสด"; 
                 }else if($order_copy['0']->payment=="TRANSFER"){
                      echo "โอนเงิน";
                 };?></div>
            <div class="invoice_txt"> Remark : <?php echo $order_copy['0']->remark;?></div>
        </td>
        <td>
            <!-- <img src="<?php echo base_url('qr.png');?>"> -->
        </td>
    </tr>
</table>
<?php $total_money=$order_detail['0']->total_amount;?>


<table class="table invoice_txt">
    <tr>
        <td>#</td>

        <td>ชื่อสินค้า</td>
        <td>รหัสสินค้า</td>

        <td>จำนวน</td>

    </tr>

    <?php 
                                    if(!empty($order_detail)){
                    $total=0;
                    $no=1;
                    foreach($order_detail as $order_detail){ ;?>

    <tr>
        <td><?php echo $no;?></td>

        <td><input type="hidden" name="pd_id[]"
                value="<?php echo $order_detail->pd_id;?>"><?php echo $order_detail->pd_name;?>
        </td>
        <td><?php echo $order_detail->pd_code;?></td>
        <!-- <td><?php echo $order_detail->pd_price;?></td> -->
        <td><input type="hidden" name="quantity[]"
                value="<?php echo $order_detail->quantity;?>"><?php echo $order_detail->quantity;?>
        </td>


    </tr>


    <?php $no++;?>
    <?php }
                                    }; ?>
    <tr>
        <td class="text-right" colspan="3"><b>รวมเงิน</b></td>
        <td class="text-right"><b><?php echo $total_money;?></b></td>
    </tr>

</table>



<div class="line">

</div>


<table>
    <tr>
        <td>
            <div class="invoice_txt">วันที่สั่งซื้อ Order Date : </div>
            <div class="invoice_txt"><?php echo $order_copy['0']->order_date;?></div>
            <div class="invoice_txt">หมายเลขการสั่งซื้อ : <?php echo $order_copy['0']->invoice_no;?></div>
            <div class="invoice_txt"> ชื่อลูกค้า Customer Name : <?php echo $order_copy['0']->firstname;?></div>
            <div class="invoice_txt"> ที่อยู่ Address : <?php echo $order_copy['0']->address;?></div>
            <div class="invoice_txt"> เบอร์โทรศัพท์ : <?php echo $order_copy['0']->phone;?></div>
             <div class="invoice_txt"> facebook : <?php echo $order_copy['0']->facebook;?></div>
            <div class="invoice_txt"> Payment : <?php
             if($order_copy['0']->payment=="CASH"){
                 echo "เงินสด"; 
                 }else if($order_copy['0']->payment=="TRANSFER"){
                      echo "โอนเงิน";
                 };?></div>
            <div class="invoice_txt"> Remark : <?php echo $order_copy['0']->remark;?></div>
        </td>
        <td>
            <div class="text-center" style="border:5px dashed #333;">
            <img src="<?php echo base_url('qr.png');?>">
             <div style="font-size:45px">
            สแกนส่งของ
            </div>
                                </div>
        </td>
    </tr>

</table>

<?php $total_copy=$order_copy['0']->total_amount;?>
<?php $qr=$order_copy['0']->qr;?>
<table class="table invoice_txt">
    <tr>
        <td>#</td>

        <td>ชื่อสินค้า</td>
        <td>รหัสสินค้า</td>

        <td>จำนวน</td>

    </tr>

    <?php 
                                    if(!empty($order_copy)){
                    $total=0;
                    $no=1;
                    foreach($order_copy as $order_copy){ ;?>

    <tr>
        <td><?php echo $no;?></td>

        <td><input type="hidden" name="pd_id[]"
                value="<?php echo $order_copy->pd_id;?>"><?php echo $order_copy->pd_name;?>
        </td>
        <td><?php echo $order_copy->pd_code;?></td>
        <!-- <td><?php echo $order_copy->pd_price;?></td> -->
        <td><input type="hidden" name="quantity[]"
                value="<?php echo $order_copy->quantity;?>"><?php echo $order_copy->quantity;?>
        </td>
    </tr>



    <?php $no++;?>
    <?php }
                                    }; ?>

    <tr>
        <td class="text-right" colspan="3"><b>รวมเงิน</b></td>
        <td class="text-right"><b><?php echo $total_copy;?></b></td>
    </tr>
</table>

<div class="col-5 mx-auto text-center">
    <div style="border:5px dashed #333;">
  
    <img src="<?php echo base_url('qr_clear.png');?>">
    <div style="font-size:45px">
        สแกนเคลียร์เงิน
    </div>
                                </div>
</div>

<div class="line">

</div>

</div>
<script>
window.print();
</script>