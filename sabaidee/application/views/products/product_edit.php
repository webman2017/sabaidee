<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>เพิ่มหมวดหมู่สินค้า</title>
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
                        <div class="col-6 backtxt p-2">
                            <div class="mb-2">
                                <i class="fa fa-cubes"></i> แก้ไขสินค้า
                            </div>
                            <div class="smtxt mt-2 mb-2">
                                หน้าหลัก / แก้ไขสินค้า
                            </div>
                        </div>
                    </div>
                <div class="container-fluid">
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-header formtxt">
                                    <i class="fa fa-comments"></i> รายละเอียดสินค้า
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url('save_product');?>" method="post"  enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-2 formtxt text-right">
                                                ชื่อสินค้า :
                                            </div>
                                            <div class="col-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control  sm-txt"
                                                        placeholder="ชื่อสินค้า" name="pd_name" value="<?php echo $product->pd_name;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2 formtxt text-right">
                                                รหัสสินค้า :
                                            </div>
                                            <div class="col-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control sm-txt"
                                                        placeholder="รหัสสินค้า" name="pd_code" value="<?php echo $product->pd_code;?>">
                                                </div>
                                            </div>
                                        </div>
                                      
                                        
                                        <div class="row">
                                            <div class="col-2 formtxt text-right">
                                                บาร์โค้ดสินค้า :
                                            </div>
                                            <div class="col-9">
                                                <div class="form-group">
                                                    <input type="number" class="form-control  sm-txt"
                                                        placeholder="บาร์โค้ดสินค้า" name="pd_barcode" value="<?php echo $product->pd_barcode;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2 formtxt text-right">
                                                รูปภาพ :
                                            </div>
                                            <div class="col-9">
                                                <div class="form-group">
                                                    <input type="file" name="file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2 formtxt text-right">
                                                รายละเอียดสินค้า (ย่อ) :
                                            </div>
                                            <div class="col-9">
                                                <div class="form-group">
                                                    <textarea class="form-control sm-txt" name="pd_short_description"
                                                        placeholder="กรุณาใส่รายละเอียดสินค้า (ย่อ)"><?php echo $product->pd_short_description;?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2 formtxt text-right">
                                                รายละเอียดสินค้า :
                                            </div>
                                            <div class="col-9">
                                                <div class="form-group">
                                                    <textarea class="form-control sm-txt" name="pd_description" placeholder="กรุณาใส่รายละเอียดสินค้า" id="pd_description">
                                                    <?php echo $product->pd_description;?>
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-9">
                                            <div class="form-group">
                                                <button class="btn btn-success txtbtn"> <i class="fas fa-fw fa-save"></i>
                                                    บันทึก</button>
                                            </div>
                                        </div>
                                    </div>
                                       
                                </div>
                            </div>
                          
</div>
                            </div>

                        </div>
                        </form>
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
    <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/sb-admin-2.min.js"></script>
</body>

</html>