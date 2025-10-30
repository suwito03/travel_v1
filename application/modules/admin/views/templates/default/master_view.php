<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <?php require_once 'parts/header.php'; ?>
    <script type="text/javascript">
        var BASE_URL = "<?php echo base_url(); ?>";
    </script>
      <?php
      if ( $breadcrumbs=="Edit Data Jamaah"  ||  $breadcrumbs=="Tambah Data Jamaah"  ||  $breadcrumbs=="Data Jamaah"  ||  $breadcrumbs=="History Data Order Kostum Paket Umroh"  || $breadcrumbs=="History Data Order Paket Umroh"  || $breadcrumbs=="Data Riwayat Pembayaran Kostum Paket Umroh"  || $breadcrumbs=="Data Order Kostum Paket Umroh dalam Bentuk Kalendar"  || $breadcrumbs=="Data Notifikasi WhatsApp"  || $breadcrumbs=="Setting Gateway dan Admin WA"  || $breadcrumbs=="Data Notifikasi Pesan WhatsApp"  || $breadcrumbs=="Data Order Paket Umroh"  || $breadcrumbs=="Data Order Kostum Paket Umroh"  || $breadcrumbs=="Data Pengajuan Kostum Paket Umroh"  || $breadcrumbs=="Data Draft Kostum Paket Umroh"  || $breadcrumbs=="Data Order Kostum Paket Umroh"  || $breadcrumbs=="Daftar Harga Paket Umroh" || $breadcrumbs=="Data Riwayat Pembayaran Paket Umroh Kostum" || $breadcrumbs=="Data Riwayat Pembayaran Paket Umroh" || $breadcrumbs=="Kostum Paket Umroh" || $breadcrumbs=="Dashboard Agent" || $breadcrumbs=="Data Order Paket Umroh dalam Bentuk Kalendar" || $breadcrumbs=="Data Order Umroh" || $breadcrumbs=="Data Qouta Paket Umroh" || $breadcrumbs=="Data Paket Umroh" || $breadcrumbs=="Tambah Paket Umroh" || $breadcrumbs=="Edit Paket Umroh" || $breadcrumbs=="Data Qouta Paket Umroh dalam Bentuk Kalendar") {
            require_once 'parts/jqwidget.php';
         } else {
            require_once 'parts/datatable.php'; 
        } 
        ?>
</head>
<body class="sidebar-mini wysihtml5-supported skin-black-light">
<div class="se-pre-con"></div>
<div class="wrapper">
    <header class="main-header">
        <?php require_once 'parts/topbar.php'; ?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar ">
            <!-- Sidebar user panel -->
            <?php require_once 'parts/menu.php'; ?>
            <!-- /.sidebar -->
        </section>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/dashboard/'); ?>"><i class="fa fa-home"></i>
                            Home</a></li>
                    <li class="active"><?php echo $breadcrumbs; ?></li>
                </ol>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            {{CONTENT}}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <?php require_once 'parts/footer.php'; ?>
    
    </footer>
</div>
<!-- ./wrapper -->
</body>
</html>
<style>
    /* Paste this css to your style sheet file or under head tag */
    /* This only works with JavaScript,
    if it's not present, don't show loader */
    .no-js #loader {
        display: none;
    }

    .js #loader {
        display: block;
        position: absolute;
        left: 100px;
        top: 0;
    }

    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url("<?php echo base_url('assets/images/pageloader/loader-64x/Preloader_2.gif')?>") center no-repeat #fff;
    }
    .dataTables_wrapper {

        overflow: auto;

    }
</style>
<script>
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });

</script>

