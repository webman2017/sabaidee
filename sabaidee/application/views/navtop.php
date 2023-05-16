<nav class="navbar navbar-expand navbar-light bg-white topbar static-top border-bottom">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell  text-danger"></i> <div class="notice">
            คำสั่งซื้อที่ยังไม่ยืนยัน
            </div>
            
            <span class="badge badge-danger badge-counter">3</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <div class="p-2 formtxt">
                สินค้าใกล้หมด
            </div>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-danger">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <!-- <div class="small text-gray-500">December 12, 2019</div> -->
                    <span class="sm-txt">xxxxx</span>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="sm-txt">xxxxx</div>
                
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="sm-txt">xxxxx</div>
                   
                </div>
            </a>
            <a class="dropdown-item text-center footer_txt" href="#">แสดงรายการทั้งหมด</a>
        </div>
    </li>



    <div class="topbar-divider d-none d-sm-block"></div>
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span class="badge badge-secondary mr-2 ml-2 sm-txt text-white"><?php echo $this->session->userdata('us_authority'); ?></span>
            <span class="mr-2 d-none d-lg-inline usertxt"><?php echo $this->session->userdata('us_username'); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item usertxt" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                
                ข้อมูลผู้ใช้
            </a>
            <a class="dropdown-item usertxt" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                ตั้งค่า
            </a>
            <a class="dropdown-item usertxt" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                ล่าสุด
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item usertxt" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                ออกจากระบบ
            </a>
        </div>
    </li>

</ul>

</nav>

<div class="modal fade" tabindex="-1" role="dialog" id="alert_modal">
  <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
    <div class="modal-content">

      <div class="modal-body text-center">
      <!-- <i class="fa fa-exclamation-triangle text-warning" aria-hidden="true" style="font-size:65px"></i> -->
        <div id="alert_message" class="text-alert p-2"></div>

        <button type="button" class="btn btn-danger txtbtn" data-dismiss="modal">ตกลง</button>
      </div>
     
    </div>
  </div>
</div>
