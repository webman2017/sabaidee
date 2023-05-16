<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>weisunthai</title>
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
                <div class="container-fluid bg-white">
                    <div class="row p-2">
                        <div class="col-6">
                            <div class="backtxt">
                                รายการสั่งซื้อใหม่
                            </div>
                            <div class=" smtxt">
                                หน้าหลัก / รายการลูกค้า / ลูกค้า
                            </div>
                        </div>
                        <div class="col-6 text-right pt-2">
                             <button class="btn btn-success txtbtn btn-sm">บันทึก</button>
                             <button class="btn btn-danger txtbtn btn-sm">ยกเลิก</button>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="formtxt">
                                        ข้อมูลลูกค้า
                                    </div>
                                    <div class="form-group">
                                        วันที่สั่งซื้อ
                                    <input type="text" class="form-control sm-txt" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        COD
                                        <input type="text" class="form-control sm-txt" placeholder="">
                                    </div>

                                    <div class="form-group">
                                        ชื่อลูกค้า
                                        <input type="text" class="form-control sm-txt" placeholder="ชื่อโซเชียล">
                                    </div>
                                    <div class="form-group">
                                        เบอร์โทรศัพท์
                                        <input type="text" class="form-control sm-txt" placeholder="ชื่อ-นามสกุล">
                                    </div>
                                    <div class="form-group">
                                        ที่อยู่
                                        <input type="text" class="form-control sm-txt" placeholder="เบอร์โทรศัพท์">
                                    </div>
                            
                                    
                                </div>
                               ห
                            </div>
                        </div>
                    </div>

                    <div class="card">

                        <div class="card-body">

                            <div class="formtxt">
                                รายการสินค้า
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control sm-txt"
                                            placeholder="ชื่อสินค้า ค้นหาสินค้า">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-success btn-sm txtbtn">ค้นหา</button>
                                </div>
                            </div>

                            <table class="table table-bordered">
                                <tr class="tbtxt bg-light">
                                    <td>#</td>
                                    <td>รูปภาพ</td>
                                    <td>รหัสสินค้า</td>
                                    <td>ราคา</td>
                                    <td>จำนวน</td>
                                    <td>ส่วนลด%</td>
                                    <td>ส่วนลด</td>
                                    <td>ดำเนินการ</td>
                                </tr>
                                <tr class="trtxt">
                                    <td colspan="8">กรุณาเลือกสินค้า</td>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center mt-2">
                             <button class="btn btn-success txtbtn btn-sm">บันทึก</button>
                             <button class="btn btn-success txtbtn btn-sm">บันทึกและสร้างใหม่</button>
                            <button class="btn btn-danger txtbtn btn-sm">ยกเลิก</button>
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
            <!-- <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script> -->
            <!-- <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"> -->
            </script>
       

            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <!--  นำเข้า JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

            <script type="text/javascript">
            $(document).ready(function() {
                /*กำหนดให้ class js-data-example-ajax  เรียกใช้งาน Function Select 2*/
                $(".js-data-example-ajax").select2({
                    ajax: {
                        url: "<?php echo base_url('Stock/supplier_search');?>",
                        /* Url ที่ต้องการส่งค่าไปประมวลผลการค้นข้อมูล*/
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {

                            return {
                                q: params.term, // ค่าที่ส่งไป
                                page: params.page
                            };

                        },
                        processResults: function(data, params) {
                            // parse the results into the format expected by Select2
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data, except to indicate that infinite
                            // scrolling can be used
                            params.page = params.page || 1;

                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 30) < data.total_count
                                }
                            };
                        },
                        cache: true
                    },
                    placeholder: 'ค้นหาสินค้า...',


                    language: {
                        inputTooShort: function() {
                            return 'โปรดพิมพ์เพิ่ม 1 ตัวอักษร';
                        }
                    },

                    escapeMarkup: function(markup) {
                        return markup;
                    }, // let our custom formatter work
                    minimumInputLength: 1,
                    templateResult: formatRepo, // omitted for brevity, see the source of this page
                    templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
                });




            });

            function formatRepo(repo) {

                if (repo.loading) return repo.text;

                var markup = "<div class='select2-result-repository clearfix'>" +
                    "<div class='select2-result-repository__meta'>" +
                    "<div class='select2-result-repository__title sm-txt'>" + repo.sup_name + "</div></div></div>";

                return markup;
            }

   