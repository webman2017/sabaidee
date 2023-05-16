<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>รายการร้านค้า</title>
    <link href="<?php echo base_url(); ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/font_mitr/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/sb-admin-2.min.js"></script>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php $this->load->view('sidebar'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('navtop'); ?>
                <div class="container-fluid mb-2 bg-white">
                    <div class="col-12 backtxt p-2">
                        <div>
                            <i class="fas fa-store"></i> ร้านค้าทั้งหมด
                        </div>
                        <div class="smtxt">
                            หน้าหลัก / ร้านค้าทั้งหมด
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">

                                <div class="col-2 smtxt">ร้านค้าทั้งหมด </div>
                                <div class="col-6 num" id="count"></div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                      <a href="<?php echo base_url('shop_create'); ?>"
                                        class="btn btn-success txtbtn btn-sm"><i class="fa fa-plus-circle m-r-xs"></i>
                                        เพิ่มร้านค้า</a>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control  smtxt"
                                            placeholder="ชื่อร้านหรือข้อมูลลูกค้า">
                                    </div>

                                </div>
                                <div class="col-4">
                                     <button class="btn btn-success txtbtn btn-sm"><i
                                            class="fa fa-search m-r-xs"></i></button>
                                </div>

                            </div>


                            <table class="table table-bordered  table-hover" id='postsList'>
                                <thead>
                                    <tr class="tbtxt">
                                        <td>#</td>
                                        <td>รหัสร้านค้า</td>
                                        <td>ชื่อร้านค้า</td>
                                        <td>เบอร์โทรศัพท์</td>
                                        <td>อีเมล์</th>
                                        <td>แก้ไข</th>
                                        <td>ลบ</th>
                                        <td>จัดการสินค้า</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div class="trtxt" id='pagination'></div>

                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>
    </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php $this->load->view('logout_modal'); ?>
    <div class="modal fade" id="success_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body logouttxt text-center">
                    <div class="mt-4 mb-4">
                        บันทึกข้อมูลเรียบร้อย
                    </div>
                    <div>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">ยกเลิก</button>
                        <a class="btn btn-success" type="button" data-dismiss="modal" id="shop_page">ยืนยัน</a>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" id="edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header tbtxt">
                    แก้ไขข้อมูลร้านค้า
                </div>
                <form id="edit_shop" method="post">
                    <div class="modal-body">
                        <div class="form-group tbtxt">
                            รหัสร้านค้า
                            <input type="hidden" name="id" id="id">
                            <input type="text" name="shop_code" id="shop_code" placeholder="ระบุรหัสร้านค้า"
                                class="form-control smtxt">
                        </div>
                        <div class="form-group tbtxt">
                            ชื่อร้านค้า
                            <input type="text" name="shop_name" id="shop_name" placeholder="ระบุชื่อร้านค้า"
                                class="form-control smtxt">
                        </div>
                        <div class="form-group tbtxt">
                            เบอร์โทรศัพท์
                            <input type="text" name="shop_mobile" id="shop_mobile" placeholder="ระบุเบอร์โทรศัพท์"
                                class="form-control smtxt">
                        </div>
                        <div class="form-group tbtxt">
                            อีเมล
                            <input type="text" name="shop_email" id="shop_email" placeholder="ระบุอีเมล"
                                class="form-control smtxt">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger txtbtn" data-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn btn-success txtbtn" id="update_shop">ยืนยัน</button>
                    </div>

            </div>
            </form>
        </div>
    </div>





    <div class="modal" tabindex="-1" id="manage_product">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="tbtxt">รายการสินค้า</div>
                </div>
                <div class="modal-body">

                    <form id="select_product_form" method="post">
                        <input type="hidden" name="shop_id_modal" id="shop_id_modal">
                        <div class="form-group tbtxt">
                            ค้นหาสินค้า
                            <input type="text" name="search" id="searchtxt" class="form-control smtxt"
                                placeholder="ระบุรหัสสินค้าหรือชื่อสินค้า">
                            <div id="search_alert" class="trtxt text-danger"></div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info txtbtn" type="button" id="search">ค้นหา</button>
                        </div>
                        <div class="row">

                            <div class="col-2 smtxt">จำนวนสินค้าทั้งหมด</div>
                            <div class="col-6 num" id="count"></div>
                        </div>
                        <table class="table">
                            <tr class="tbtxt">
                                <td>เลือก</td>
                                <td>รหัสสินค้า
                                </td>
                                <td>ชื่อสินค้า
                                </td>
                            </tr>
                            <tbody id="result">
                                <?php foreach ($product as $product) {; ?>
                                <tr class="trtxt">
                                    <td><input type="checkbox" name="select[]" value="<?php echo $product->pd_id; ?>">
                                    </td>
                                    <td><?php echo $product->pd_code; ?>
                                    </td>
                                    <td><?php echo $product->pd_name; ?>
                                    </td>
                                </tr>
                                <?php }; ?>
                            </tbody>
                        </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger txtbtn " data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-success txtbtn" id="confirm" type="button">ยืนยัน</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="del_modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body  text-center">
                    <div class="smtxt text-danger p-4" id="del_alert"></div>
                    <input type="hidden" name="del" id="deltxt">
                    <button type="button" class="btn btn-danger txtbtn" data-dismiss="modal">ยกเลิก</button>
                    <button type="button" class="btn btn-success txtbtn" id="confirm_del">ยืนยัน</button>
                </div>

            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#pagination').on('click', 'a', function(e) {
            e.preventDefault();
            var pageno = $(this).attr('data-ci-pagination-page');
            loadPagination(pageno);
        });

        loadPagination(0);



        function loadPagination(pagno) {
            $.ajax({
                url: '<?php echo base_url(); ?>/Shop/loadRecord/' + pagno,
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#loading_modal').modal('show');
                },
                success: function(response) {
                    console.log(response);
                    $('#loading_modal').modal('hide');
                    $('#count').html(response.count);
                    $('#pagination').html(response.data.pagination);
                    createTable(response.data.result, response.data.row);

                }
            });
        }







        function createTable(result, sno) {
            sno = Number(sno);
            $('#postsList tbody').empty();
            for (index in result) {
                var id = result[index].id;
                var title = result[index].supplier_name;
                var content = result[index].slug;
                //   content = content.substr(0, 60) + " ...";
                var link = result[index].slug;
                sno += 1;
                var tr = "<tr class='trtxt'>";
                tr += "<td>" + sno + "</td>";
                tr += "<td class='num'>" + result[index].shop_code + "</td>";
                tr += "<td class='num'>" + result[index].shop_name + "</td>";
                tr += "<td>" + result[index].shop_mobile + "</td>";
                tr += "<td class='num'>" + result[index].shop_email + "</td>";
                tr += "<td><button class='btn btn-sm btn-warning border edit' id=" + result[index].pd_id +
                    " product_name='" + result[index].pd_name + "' code='" + result[index].pd_code +
                    "'><i class='fa fa-pencil' aria-hidden='true'></i></button></td>";
                tr += "<td><button class='btn btn-sm btn-danger border edit' id=" + result[index].pd_id +
                    " product_name='" + result[index].pd_name + "' code='" + result[index].pd_code +
                    "'><i class='fa fa-trash-o' aria-hidden='true'></i></button></td>";
                tr += "<td><a href='<?php echo base_url('product_shop/');?>" + result[index].id +
                    "' class='btn btn-sm btn-success manage border del'  id=" + result[index].id +
                    "><i class='fa fa-cogs' aria-hidden='true'></i> จัดการสินค้า</button>";

                "</td>";
                tr += "</tr>";
                $('#postsList tbody').append(tr);
            }
        }
    });





    $('#confirm_del').click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('shop_del') ?>",
            data: {
                deltxt: $('#deltxt').val(),
            },
            dataType: "json",
            beforeSend: function() {
                $('#loading').css('display', 'block');
            },
            success: function(response) {
                $('#loading').css('display', 'none');
                if (response) {

                    $('#del_modal').modal('show');
                    window.location.href = '<?php echo base_url('Shop') ?>';
                }
            },
            error: function() {
                alert('Could not add data');
            }
        });
    });
    $('.del').click(function() {
        var del = $(this).attr('data');
        $('#deltxt').val(del);
        $('#del_alert').html('คุณต้องการลบร้านออกจากกระบบ ?');
        $('#del_modal').modal('show');
    });

    $('#search').click(function() {
        if ($('#searchtxt').val() == "") {
            $('#search_alert').html('ระบุรหัสสินค้าหรือชื่อสินค้า');
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('search') ?>",
                data: {
                    searchtxt: $('#searchtxt').val(),
                },
                dataType: "json",
                beforeSend: function() {
                    // setting a timeout
                    $('#loading').css('display', 'block');
                },
                success: function(response) {
                    var html = '';
                    $('#loading').css('display', 'none');
                    if (response !== "") {

                        var no = 1;
                        for (var i = 0; i < response.length; i++) {
                            html += '<tr><td><input type="checkbox" name="select[]" value=' +
                                response[i].pd_id + '></td><td>' + response[i].pd_code +
                                '</td><td>' + response[i].pd_name + '</td></tr>';

                            no++;
                        }
                        $('#result').html(html);
                    } else {
                        $('#product_list').html('<tr class="trtxt text-center">' +
                            '<td colspan="4">' +
                            'ไม่พบรายการสต๊อก' +
                            '</td>' +
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
        }
    });
    $('#searchtxt').keyup(function() {
        $('#search_alert').html('');
    });
    $('#shop_page').click(function() {
        window.location.href = '<?php echo base_url('Shop') ?>';
    });
    $('.edit').click(function() {
        var id = $(this).attr('id');
        $('#id').val(id);
        var code = $(this).attr('code');
        $('#shop_code').val(code);
        var shop = $(this).attr('shop');
        $('#shop_name').val(shop);
        var mobile = $(this).attr('mobile');
        $('#shop_mobile').val(mobile);
        var email = $(this).attr('email');
        $('#shop_email').val(email);
        $('#edit_modal').modal('show');
    });

    $('#update_shop').click(function() {
        var formdata = $("#edit_shop").serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('update_shop'); ?>",
            data: formdata,
            cache: false,
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('#edit_modal').modal('hide');
                    $('#success_modal').modal('show');

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
    $('.manage').click(function() {
        $('#shop_id_modal').val($(this).attr('data'));
        $('#manage_product').modal('show');
    });
    $('#confirm').click(function() {
        var formdata = $("#select_product_form").serialize();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('save_shop_product'); ?>",
            data: formdata,
            cache: false,
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('#success_modal').modal('show');
                    $('#manage_product').modal('hide');
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
    })
    </script>
</body>

</html>