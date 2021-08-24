<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<?= base_url('') ?>" class="site_title"><span><img src="<?= base_url('assets/img/logo_ui_long2.png') ?>" alt=""></span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="<?= base_url('images/userx.jpg') ?>" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2><?= session()->get('nama') ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <ul class="nav side-menu">
          <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-home"></i> Home</a>
          </li>
          <li><a><i class="fa fa-edit"></i> OBAT <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li class="<?= ($activePage == 'dataobat') ? 'active' : '' ?>"><a href="<?= base_url('admin/dataobat') ?>">Data Obat</a>
              </li>
              <!-- <li class="<?= ($activePage == 'datadosen') ? 'active' : '' ?>"><a href="<?= base_url('admin/datadosen') ?>">Tambah Obat</a>
              </li> -->
            </ul>
          </li>
          <li><a><i class="fa fa-desktop"></i> DATA SUPPLIER <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
            <li class="<?= ($activePage == 'datasupplier') ? 'active' : '' ?>"><a href="<?= base_url('admin/datasupplier') ?>">Data Supplier</a>
              </li>
            </ul>
          </li>
          <li><a><i class="fa fa-table"></i> DATA ADMIN <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li class="<?= ($activePage == 'dataadmin') ? 'active' : '' ?>"><a href="<?= base_url('admin/dataadmin') ?>">Data Admin</a>
              </li>
            </ul>
          </li>
          <li><a><i class="fa fa-bar-chart-o"></i> TRANSAKSI <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li class="<?= ($activePage == 'datatransaksi') ? 'active' : '' ?>"><a href="<?= base_url('admin/transaksi') ?>">Data Transaksi</a>
              </li>
              <li class="<?= ($activePage == 'datatransaksi') ? 'active' : '' ?>"><a href="<?= base_url('admin/tambahtransaksi') ?>">Tambah Transaksi</a>
              </li>
            </ul>
        </ul>
      </div>
    </div>
  </div>
</div>