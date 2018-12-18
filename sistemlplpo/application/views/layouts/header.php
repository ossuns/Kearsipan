<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Sistem LPLPO | Kab.Karanganyar</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/plugins')?>/font-awesome/css/font-awesome.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/vendor/dist')?>/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link">SISTEM LAPORAN PEMAKAIAN DAN LEMBAR PERMINTAAN OBAT</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/vendor/dist')?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sistem LPLPO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/vendor/dist')?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
                <?php echo $this->session->userdata('username_admin'); ?>&nbsp;<i class="right fa fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('login/logout')?>" class="nav-link" >
                  <p>Logouts</p>
                </a>
              </li>
            </ul>
          </li>
          </ul>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="http://localhost/sistemlplpo/" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
             <!--  <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Profil</p>
                </a>
              </li> -->
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
           <!--  <a href="#" class="nav-link active <?php /*echo $obat; */?>"> -->
            <a href="#" class="nav-link <?php /*echo $obat; */?>">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Obat
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="http://localhost/Kearsipan/sistemlplpo/obat/" class="nav-link <?php/* echo $listobat;*/ ?>">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Data Obat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/Kearsipan/sistemlplpo/obat/create" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Tambah Obat</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open" >
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tree"></i>
              <p>
                Puskesmas
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="http://localhost/Kearsipan/sistemlplpo/puskesmas/" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List Puskesmas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/Kearsipan/sistemlplpo/puskesmas/create" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Tambah Puskesmas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Persediaan Obat
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="http://localhost/sistemlplpo/persediaan/" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List Persediaan Keseluruhan</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="http://localhost/sistemlplpo/persediaan/listkhusus?id_puskesmas=1" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List Persediaan</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="http://localhost/Kearsipan/sistemlplpo/persediaan/dropdown" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List Persediaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="http://localhost/Kearsipan/sistemlplpo/persediaan/dropdown2" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Rata-rata Persediaan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Laporan LPLPO
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="http://localhost/sistemlplpo/laporan" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List Laporan Keseluruhan</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="http://localhost/Kearsipan/sistemlplpo/laporan/pencarianlaporan" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>List Laporan</p>
                </a>
              </li
              <li class="nav-item">
                <a href="http://localhost/Kearsipan/sistemlplpo/laporan/create" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Tambah Laporan</p>
                </a>
              </li>
            </ul>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">SISTEM LPLPO KABUPATEN KARANGANYAR</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- ./wrapper -->
