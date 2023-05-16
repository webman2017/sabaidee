<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <title>แผงควบคุม</title>
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
                <div class="container-fluid mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="dashboard_txt">ยอดขายประจำเดือน มิถุนายน/2021</div>
                                    <div class="chart-area">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="line-chart" width="800" height="450"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-xl-12 col-md-6 mb-2">
                                    <div class="card bg-success shadow">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-5">
                                                    <i class="fa fa-trophy fa-3x text-white"></i>

                                                </div>
                                                <div class="col-7 text-right">
                                                    <div class="dashboard_txt_w">
                                                        ยอดขายประจำวัน</div>
                                                    <div class="dashboard-num text-white">40,000</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 mb-2">
                                    <div class="card bg-info shadow">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-5">
                                                    <i class="fa fa-cart-plus fa-3x text-white"></i>
                                                </div>
                                                <div class="col-7 text-right">
                                                    <div class="dashboard_txt_w">
                                                        ยอดคำสั่งซื้อประจำวัน</div>
                                                    <div class="dashboard-num text-white">215/218</div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 mb-2">
                                    <div class="card bg-warning shadow">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-5">
                                                    <i class="fa fa-cube fa-3x text-white"></i>
                                                </div>
                                                <div class="col-7 text-right">
                                                    <div class="dashboard_txt_w">
                                                        ยอดขายสินค้าประจำวัน
                                                    </div>
                                                    <div class="dashboard-num text-white">50%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dashboard_txt">
                                        ยอดขายตามพนักงาน
                                    </div>
                                    <table class="table">
                                        <tr class="tbtxt">
                                            <td>#</td>
                                            <td>พนักงาน</td>
                                            <td><i class="fas fa-fw fa-shopping-cart"></i></td>
                                            <td>ยอดขาย</td>
                                        </tr>
                                        <tr class="trtxt">
                                            <td>1</td>
                                            <td>พัตร</td>
                                            <td>456</td>
                                            <td>333</td>
                                        </tr>
                                        <tr class="trtxt">
                                            <td>2</td>
                                            <td>วิด</td>
                                            <td>456</td>
                                            <td>333</td>
                                        </tr>
                                        <tr class="trtxt">
                                            <td>3</td>
                                            <td>เจม</td>
                                            <td>456</td>
                                            <td>333</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dashboard_txt">
                                        ยอดขายตามช่องทางการขาย
                                    </div>
                                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dashboard_txt">
                                        สินค้าขายดี
                                    </div>
                                    <canvas id="sale" style="width:100%;max-width:600px"></canvas>
                                </div>
                            </div>
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
    <script src="<?php echo base_url();?>assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/sb-admin-2.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/demo/chart-pie-demo.js"></script>
    <script>
    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = [
        "#ccc",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart("myChart", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "ยอดขายประจำเดือน"
            }
        }
    });

    var xValues = ["line@", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart("sale", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "World Wide Wine Production 2018"
            }
        }
    });

    new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ['24-06-2021','24-06-2021','24-06-2021','24-06-2021','24-06-2021','24-06-2021','24-06-2021','24-06-2021','24-06-2021','24-06-2021','24-06-2021','24-06-2021','24-06-2021','24-06-2021','24-06-2021','24-06-2021'],
    datasets: [{ 
        data: [60000,61000,70000,80000,90000,95000,85000,70000,75000,90000,80000,70000,60000,70000,80000,90000],
        label: "Sales",
        borderColor: "#1cc88a",
        backgroundColor: 'rgb(60, 179, 113,0.65)',
        fill: true
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'ยอดขาย'
    }
  }
});




    </script>
</body>

</html>