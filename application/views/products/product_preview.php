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
                    <div class="row">
                        <div class="col-6 backtxt p-2">
                            <div class="mb-2">
                                <i class="fa fa-cubes"></i> รายละเอียดสินค้า
                            </div>
                            <div class="smtxt mt-2 mb-2">
                                หน้าหลัก / รายละเอียดสินค้า
                            </div>
                        </div>
                        <div class="col-6 mt-4 text-right">
                            <div class="form-group">
                                <a href="<?php echo base_url('edit_product/');?><?php echo $product->pd_id;?>"
                                    class="btn btn-success txtbtn"><i class="fa fa-pen"></i> แก้ไขสินค้า</a>
                            </div>
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
                                    <form action="<?php echo base_url('save_product');?>" method="post"
                                        enctype="multipart/form-data">

                                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active sm-txt bg-success text-white" id="home-tab"
                                                    data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                                    aria-selected="true"><i class="fa fa-cube m-r-xs"></i>
                                                    รายละเอียดสินค้า <span class="badge badge-light"></span></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link sm-txt bg-secondary text-white" id="profile-tab"
                                                    data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                                                    aria-selected="false"><i class="fa fa-cubes m-r-xs"></i>
                                                    สต๊อก <span class="badge badge-danger">4</span></a>
                                            </li>


                                        </ul>

                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane show active" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        รูปภาพ :
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="row">
                                                            <?php foreach($pd_image as $pd_image){;?>
                                                            <div class="col-4">
                                                                <img src="<?php echo base_url('upload/');?><?php echo $pd_image->image;?>"
                                                                    class="img-fluid">
                                                            </div>
                                                            <?php   };?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        ชื่อสินค้า :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group sm-txt">
                                                            <?php echo $product->pd_name;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        รหัสสินค้า :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group sm-txt">
                                                            <?php echo $product->pd_code;?>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        ราคาต่อหน่วย :
                                                    </div>
                                                    <div class="col-9">

                                                        <div class="form-group sm-txt">
                                                            <span class="badge badge-success sm-txt text-white">
                                                                <?php echo $product->pd_price;?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        ประเภทสินค้า :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <span class="badge badge-success sm-txt text-white">
                                                                <?php echo $product->pt_product_type_name;?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        บาร์โค้ดสินค้า :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <?php echo $barcode;?>
                                                            <div class="footer_txt">
                                                                <?php echo $product->pd_barcode;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        หมวดหมู่ :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <select class="form-control  sm-txt">
                                                                <?php foreach($category as $category){;?>
                                                                <option value="<?php echo $category->id;?>">
                                                                    <?php echo $category->cat_name;?>
                                                                </option>
                                                                <?php };?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        แบรนด์ :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <?php echo $product->pd_brand;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        น้ำหนัก(กรัม) :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <?php echo $product->pd_weight;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        ยาว(มม) :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <?php echo $product->pd_long;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        กว้าง(มม) :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group sm-txt">
                                                            <?php echo $product->pd_width;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        สูง(มม) :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group sm-txt">
                                                            <?php echo $product->pd_height;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        คะแนนสะสม :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group sm-txt">
                                                            <?php echo $product->pd_point;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        SKU :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <?php echo $product->pd_sku;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        รายละเอียดสินค้า (ย่อ) :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group sm-txt">
                                                            <?php echo $product->pd_short_description;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-2 formtxt text-right">
                                                        รายละเอียดสินค้า :
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="form-group sm-txt">
                                                            <?php echo $product->pd_description;?>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <table class="table table-bordered">
                                                    <tr class="tbtxt">
                                                        <td>คลังสินค้า</td>
                                                        <td>ขั้นต่ำ</td>
                                                        <td>คงเหลือ</td>
                                                        <td>จอง</td>
                                                        <td>พร้อมขาย</td>
                                                        <td>สถานะ</td>
                                                        <td>ดำเนินการ</td>
                                                    </tr>
                                                    <tr class="tbtxt">
                                                        <td>คลังสินค้า</td>
                                                        <td>ขั้นต่ำ</td>
                                                        <td>คงเหลือ</td>
                                                        <td>จอง</td>
                                                        <td>พร้อมขาย</td>
                                                        <td>สถานะ</td>
                                                        <td>ดำเนินการ</td>
                                                    </tr>
                                                </table>
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