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
<style>
.select2-results__message {
    font-family: 'Sarabunr';
    font-size: 14px !important;
    /* color:#000 !important; */
    background-color: #FCF8E3;
    color: #C09853 !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    font-family: 'Sarabunr' !important;
    font-size: 14px !important;

}

}
</style>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('sidebar');?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('navtop');?>
                <div class="container-fluid mb-2 bg-white">
                    <div class="col-6 backtxt p-2">
                        <div class="mb-2">
                            <i class="fa fa-barcode"></i> พิมพ์บาร์โค้ด
                        </div>
                        <div class="smtxt mt-2 mb-2">
                            หน้าหลัก / พิมพ์บาร์โค้ด
                        </div>
                    </div>
                </div>
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-body">
                            <div class="trtxt mb-2">
                                <i class="fa fa-print"></i> พิมพ์บาร์โค้ด <i class="fa fa-angle-double-right"></i>
                                พิมพ์บาร์โค้ดรูปแบบมาตราฐาน
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <select class="js-data-example-ajax sm-txt"
                                            style="width:100% !important;"></select>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <tr class="tbtxt thead-light">
                                    <td>รูปภาพ</td>
                                    <td>ชื่อสินค้า</td>
                                    <td>รหัสสินค้า</td>
                                    <td>จำนวนสินค้า</td>
                                    <td>รหัสบาร์โค้ด</td>
                                    <td></td>
                                </tr>
                                <tbody>
                                    <tr class="trtxt">
                                        <td colspan="5">กรุณาเลือกสินค้า</td>

                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success txtbtn"> <i class="fas fa-fw fa-save"></i>
                                บันทึก</button>
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
    <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/sb-admin-2.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>>
    <script>
    $("#product_search").select2();

    $('#select2-hfci-container').addClass('sm-txt');

    $('.select2-search__field').keyup(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Barcode/product_search') ?>",
            data: {
                product_search: $('#product_search').val(),

            },
            dataType: "json",
            success: function(response) {
                if (response.success) {


                } else {

                }
            },
            error: function() {
                alert('Could not add data');
            }
        });
    });
    </script>
    <script>
    $(".js-data-example-ajax").select2({
        ajax: {
            url: "https://api.github.com/search/repositories",
            dataType: 'json',
            // delay: 100,
            data: function(params) {
                return {
                    q: params.term, // search term
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

        minimumInputLength: 1,
        language: {
            inputTooShort: function() {
                return 'โปรดพิมพ์เพิ่ม 1 ตัวอักษร';
            }
        },
        templateResult: formatRepo,
        templateSelection: formatRepoSelection
    });

    function formatRepo(repo) {
        if (repo.loading) {
            return repo.text;
        }

        var $container = $(
            "<div class='row'><div class='col-2'>" +
            "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url +
            "' class='img-fluid'/></div>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'></div>" +
            "<div class='select2-result-repository__description'></div>" +
            "<div class='select2-result-repository__statistics'>" +
            "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>" +
            "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>" +
            "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>" +
            "</div>" +
            "</div>" +
            "</div>"
        );

        $container.find(".select2-result-repository__title").text(repo.full_name);
        $container.find(".select2-result-repository__description").text(repo.description);
        $container.find(".select2-result-repository__forks").append(repo.forks_count + " Forks");
        $container.find(".select2-result-repository__stargazers").append(repo.stargazers_count + " Stars");
        $container.find(".select2-result-repository__watchers").append(repo.watchers_count + " Watchers");

        return $container;
    }

    function formatRepoSelection(repo) {
        return repo.full_name || repo.text;
        
    }
    </script>
</body>

</html>