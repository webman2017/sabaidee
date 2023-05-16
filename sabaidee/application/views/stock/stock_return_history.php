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
                            <i class="fa fa-folder-open"></i> | ประวัติคีย์คืนสต๊อก-ตัดสต๊อก
                        </div>
                        <div class="smtxt mb-2 mt-2">
                            หน้าหลัก / ประวัติคีย์คืนสต๊อก-ตัดสต๊อก
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                 <table class="table table-bordered" id='postsList'>
                                    <thead>
                                        <tr class="tbtxt text-center">
                                             <td>#</td>
                                            <td>ชื่อร้าน</td>
                                      
                                            <td>สินค้า</td>
                                            <td>จำนวน</td>
                                            <td>เหตุผล</td>
                                          
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <div class="trtxt" id='pagination'></div>
                            <p class="footer_txt">เวลาโหลดข้อมูล <strong>{elapsed_time}</strong> วินาที</p>
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
    <script>
   $('#pagination').on('click', 'a', function(e) {
            e.preventDefault();
            var pageno = $(this).attr('data-ci-pagination-page');
            loadPagination(pageno);

        });

        loadPagination(0);

        function loadPagination(pagno) {
            $.ajax({
                url: '<?php echo base_url(); ?>/Stock/loadRecord/' + pagno,
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('#loading_modal').modal('show');
                },
                success: function(response) {
                    // console.log(response);
                    $('#loading_modal').modal('hide');
                    $('#count').html(response.count.toLocaleString());

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
                var content = result[index].slug;
                //   content = content.substr(0, 60) + " ...";
                var link = result[index].slug;
                sno += 1;
                var tr = "<tr class='trtxt'>";
                 tr += "<td>" + sno + "</td>";
                tr += "<td>" + result[index].shop_name + "</td>";
                tr += "<td>" + result[index].pd_name +"</td>";
                tr += "<td>" + '<div>' + result[index].amount + "</div></td>";
                tr += "<td>" + result[index].reason + "</td>";
                tr += "</tr>";
                $('#postsList tbody').append(tr);
            }
            }
    </script>
</body>

</html>