<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
        <!-- <img src="<?php echo base_url('resource/images/WD210531DWC01.png'); ?>" width='60px'> -->

    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <li class="nav-item">
        <a class="nav-link menu" href="<?php echo base_url('Order'); ?>">
      <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <span>รายการคำสั่งซื้อ</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link menu" href="<?php echo base_url('Products'); ?>">
         <i class="fas fa-cube"></i>
            <span>รายการสินค้า</span></a>
    </li>
       <li class="nav-item">
        <a class="nav-link menu" href="<?php echo base_url('Category'); ?>">
       <i class="far fa-folder"></i>
            <span>หมวดหมู่สินค้า</span></a>
    </li>
       <li class="nav-item">
        <a class="nav-link menu" href="<?php echo base_url('Feature'); ?>">
          <i class="far fa-star"></i>
            <span>คุณลักษณะสินค้า</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link menu" href="<?php echo base_url('Shop'); ?>">
          <i class="fas fa-store"></i>
            <span>ร้านค้า</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link menu collapsed" href="#" data-toggle="collapse" data-target="#stock" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cubes"></i>
            <span>สต็อกสินค้า</span>
        </a>
        <div id="stock" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-dark py-2 collapse-inner rounded">
                <a class="collapse-item menu" href="<?php echo base_url('checkstock'); ?>"><i class="fa fa-angle-double-right"></i> รายการสต๊อก</a>
                <a class="collapse-item menu" href="<?php echo base_url('stock'); ?>"><i class="fa fa-angle-double-right"></i> รับสต๊อกเข้า</a>
                <a class="collapse-item menu" href="<?php echo base_url('stock_history'); ?>"><i class="fa fa-angle-double-right"></i> ประวัติรับเข้าสต๊อก</a>
                <a class="collapse-item menu" href="<?php echo base_url('return_stock'); ?>"><i class="fa fa-angle-double-right"></i> คีย์คืนสต๊อก-ตัดสต๊อก</a>
                <a class="collapse-item menu" href="<?php echo base_url('return_stock_history'); ?>"><i class="fa fa-angle-double-right"></i> ประวัติคีย์คืนสต๊อก-ตัดสต๊อก</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link menu" href="<?php echo base_url('report'); ?>">
            <i class="fas fa-file"></i>
            <span>สรุปรายงาน</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link menu collapsed" href="#" data-toggle="collapse" data-target="#import" aria-expanded="true" aria-controls="collapsePages">
            <i class="fa fa-tasks" aria-hidden="true"></i>
            <span>ส่งออกข้อมูล</span>
        </a>
        <div id="import" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-dark py-2 collapse-inner rounded">
                <!-- <a class="collapse-item menu" href="#"><i class="fa fa-angle-double-right"></i> นำเข้าเอกสาร</a> -->
                <!-- <a class="collapse-item menu" href="<?php echo base_url('Transfers'); ?>"><i class="fa fa-angle-double-right"></i> ส่งออกเอกสาร</a> -->
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>