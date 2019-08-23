 
<!-- DIbuat oleh Nopen rianto
Tanggal 08-02-2018 -->

 <?php
session_start();
$id = $_SESSION['id'];
$isLoggedIn = $_SESSION['isLoggedIn'];
$level=$_SESSION['level'];
 
if($isLoggedIn != 'yes'){
 
    header('Location: ../login/login.php');
}
?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../images/icn.png"/>
    <title>Sistem informasi Pengolahan Data Bencana Alam</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/font awesome/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../plugins/datatables/datatables.min.css"/>
    <link rel="stylesheet" href="../plugins/datepicker/css/bootstrap-datetimepicker.min.css"/>

    <!-- Theme style -->
    <link rel="stylesheet" href="../plugins/admin style/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../plugins/admin style/css/skins/_all-skins.min.css">
   <script src="../plugins/jquery/jquery-2.1.4.min.js"></script>
  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
    <?php
     include '../koneksi/koneksi.php';
       $qus=mysqli_query($koneksi,"SELECT * FROM user where kd_us='$id'");
       $us=mysqli_fetch_array($qus);
     ?>
    <div class="wrapper">
          <div class="logo">
            <img src="../images/logo.png" alt="" style="width: 90px;height: 50px;padding: 2px 0px 1px 40px;">
            <span class="jd-logo">SI Pengolahan Data Bencana Alam</span>
            <span class="bukit-t">Prov. Kalimantan Timur Kabupaten paser</span>
        </div>
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>US</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?php echo $level ?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
        
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="index.php?p=profil" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../images/<?php echo $us['foto']; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $us['nm_us']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../images/<?php echo $us['foto']; ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $level ?>
                      <small><a href="index.php?p=profil" style="text-decoration: none;color: #fff;"><?php echo $us['nm_us']; ?></a></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                 
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                   
                    <div class="pull-right">
                        <a href="../logout/logout.php" class="btn btn-default btn-flat"  style="padding: 7px 77px;"><i class="fa fa-sign-out"> Keluar</i></a>
                    </div>
                  </li>
                </ul>
              </li>
           
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="margin-top: 60px;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../images/<?php echo $us['foto']; ?>" class="img-rounded" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $us['nm_us']; ?></p>
              <a href="index.php?p=profil"><i class="fa fa-user text-success"></i> Profil</a>
            </div>
          </div>
          <!-- search form -->
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li class="treeview">

              <a href="index.php">
                <i class="fa fa-home"></i> <span>Home</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>

            <?php if($level=="Operator"){ ?>

             
           <li class="treeview">
              <a href="#">
                <i class="fa fa-file-o"></i>
                <span>Berita</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=entry-berita"><i class="fa fa-circle-o"></i> Entry Berita</a></li>
                <li><a href="index.php?p=list-berita"><i class="fa fa-circle-o"></i> List Berita</a></li>
              
              </ul>
            </li>
                <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=entry-bencana"><i class="fa fa-circle-o"></i> Entry Bencana</a></li>
                <li><a href="index.php?p=list-bencana"><i class="fa fa-circle-o"></i> List Bencana</a></li>
                <li><a href="index.php?p=laporan-bencana"><i class="fa fa-circle-o"></i> Laporan Bencana</a></li>
              </ul>
            </li>
               <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Jenis Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=entry-jenis"><i class="fa fa-circle-o"></i> Entry Jenis</a></li>
                <li><a href="index.php?p=list-jenis"><i class="fa fa-circle-o"></i> List jenis</a></li>
              
              </ul>
            </li>

            <?php }elseif($level=="Petugas"){ ?>

             <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=entry-user"><i class="fa fa-circle-o"></i> Entry User</a></li>
                <li><a href="index.php?p=list-user"><i class="fa fa-circle-o"></i> List User</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-o"></i>
                <span>Berita</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=entry-berita"><i class="fa fa-circle-o"></i> Entry Berita</a></li>
                <li><a href="index.php?p=list-berita"><i class="fa fa-circle-o"></i> List Berita</a></li>
              
              </ul>
            </li>

             <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=entry-bencana"><i class="fa fa-circle-o"></i> Entry Bencana</a></li>
                <li><a href="index.php?p=list-bencana"><i class="fa fa-circle-o"></i> List Bencana</a></li>
                <li><a href="index.php?p=laporan-bencana"><i class="fa fa-circle-o"></i> Laporan Bencana</a></li>
                <li><a href="index.php?p=grafik-bencana"><i class="fa fa-circle-o"></i> Grafik Bencana</a></li>
                <li><a href="index.php?p=grafik-bencana-persatu"><i class="fa fa-circle-o"></i> Grafik / Jenis Bencana</a></li>
                <li><a href="index.php?p=grafik-bencana-perkab"><i class="fa fa-circle-o"></i> Grafik / Kabupaten</a></li>
                <li><a href="index.php?p=grafik-tahunan"><i class="fa fa-circle-o"></i> Grafik / Tahun</a></li>
                 <li><a href="index.php?p=rekap-bencana-jenis"><i class="fa fa-circle-o"></i> Rekap / Jenis Bencana</a></li>
                 <li><a href="index.php?p=rekap-korban"><i class="fa fa-circle-o"></i> Rekap Bencana/Kab</a></li>
                 <li><a href="index.php?p=rekap-kerusakan-bangunan"><i class="fa fa-circle-o"></i>Kerusakan Bangunan/Kab</a></li>
                 <li><a href="index.php?p=rekap-kerusakan-lingkungan"><i class="fa fa-circle-o"></i>Kerusakan Lingkungan/Kab</a></li>
              </ul>
            </li>
               <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Jenis Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=entry-jenis"><i class="fa fa-circle-o"></i> Entry Jenis</a></li>
                <li><a href="index.php?p=list-jenis"><i class="fa fa-circle-o"></i> List jenis</a></li>
              
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Kabupaten</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=entry-kab"><i class="fa fa-circle-o"></i> Entry Kabupaten</a></li>
                <li><a href="index.php?p=list-kab"><i class="fa fa-circle-o"></i> List Kabupaten</a></li>
              
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Kecamatan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=entry-kec"><i class="fa fa-circle-o"></i> Entry Kecamatan</a></li>
                <li><a href="index.php?p=list-kec"><i class="fa fa-circle-o"></i> List Kecamatan</a></li>
              
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Kelurahan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=entry-nag"><i class="fa fa-circle-o"></i> Entry Kelurahan</a></li>
                <li><a href="index.php?p=list-nag"><i class="fa fa-circle-o"></i> List Kelurahan</a></li>
              
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Desa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?p=entry-jor"><i class="fa fa-circle-o"></i> Entry Desa</a></li>
                <li><a href="index.php?p=list-jor"><i class="fa fa-circle-o"></i> List Desa</a></li>
              
              </ul>
            </li>


            <?php }elseif($level=="Supervisor"){ ?>

                <li class="treeview">
              <a href="index.php?p=list-bencana">
                <i class="fa fa-th"></i>
                <span>List Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
             <li class="treeview">
              <a href="index.php?p=laporan-bencana">
                <i class="fa fa-th"></i>
                <span>Laporan Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
             <li class="treeview">
              <a href="index.php?p=grafik-bencana">
                <i class="fa fa-th"></i>
                <span>Grafik Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
            <li class="treeview">
              <a href="index.php?p=grafik-bencana-persatu">
                <i class="fa fa-th"></i>
                <span>Grafik / Jenis Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
             <li class="treeview">
              <a href="index.php?p=grafik-bencana-perkab">
                <i class="fa fa-th"></i>
                <span>Grafik / Kabupaten</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
            <li class="treeview">
              <a href="index.php?p=grafik-tahunan">
                <i class="fa fa-th"></i>
                <span>Grafik / Tahun</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
            <li class="treeview">
              <a href="index.php?p=rekap-bencana-jenis">
                <i class="fa fa-th"></i>
                <span>Rekap / Jenis Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
            <li class="treeview">
              <a href="index.php?p=rekap-korban">
                <i class="fa fa-th"></i>
                <span>Rekap Bencana alam/Kab</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
            <li class="treeview">
              <a href="index.php?p=rekap-kerusakan-bangunan">
                <i class="fa fa-th"></i>
                <span>Kerusakan Bangunan/Kab</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
            <li class="treeview">
              <a href="index.php?p=rekap-kerusakan-lingkungan">
                <i class="fa fa-th"></i>
                <span>Kerusakan Lingkungan/Kab</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
            
            

            <?php }else{ ?>

              
             <li class="treeview">
              <a href="index.php?p=laporan-bencana">
                <i class="fa fa-th"></i>
                <span>Laporan Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
             <li class="treeview">
              <a href="index.php?p=grafik-bencana">
                <i class="fa fa-th"></i>
                <span>Grafik Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
            <li class="treeview">
              <a href="index.php?p=grafik-bencana-persatu">
                <i class="fa fa-th"></i>
                <span>Grafik / Jenis Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
             <li class="treeview">
              <a href="index.php?p=grafik-bencana-perkab">
                <i class="fa fa-th"></i>
                <span>Grafik / Kabupaten</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
             <li class="treeview">
              <a href="index.php?p=rekap-bencana-jenis">
                <i class="fa fa-th"></i>
                <span>Rekap / Jenis Bencana</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
              <li class="treeview">
              <a href="index.php?p=rekap-korban">
                <i class="fa fa-th"></i>
                <span>Rekap Bencana Alam/Kab</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
            <li class="treeview">
              <a href="index.php?p=rekap-kerusakan-bangunan">
                <i class="fa fa-th"></i>
                <span>Kerusakan Bangunan/Kab</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
            <li class="treeview">
              <a href="index.php?p=rekap-kerusakan-lingkungan">
                <i class="fa fa-th"></i>
                <span>Kerusakan Lingkungan/Kab</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>
            
           <?php } ?>

          </ul>

        </section>
        <!-- /.sidebar -->
      </aside>

     <?php
 $page_dir='pages';
if(!empty($_GET['p'])){
    $page=scandir($page_dir,0);
    unset($page[0],$page[1]);
    $p=$_GET['p'];
    if(in_array($p.'.php',$page)){
     include($page_dir.'/'.$p.'.php');
    }
    else{
    include ($page_dir.'/404-page.php');
    }
}
else{
    include ($page_dir.'/home.php');
}
?>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b> 
        </div>
        <strong>Copyright@2019 Universitas Mulia Balikpapan &copy; <?php echo date('Y'); ?></strong>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark" style="top:50px;">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
         
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
  
    </div><!-- ./wrapper -->

     <script src="../plugins/datepicker/js/jQuery.js"></script>
            <script src="../plugins/datepicker/js/moment.js"></script>

     <script src="../plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
     <script type="text/javascript">
      $(function () {
        
        $('#datepicker').datetimepicker({
                                  
          format: 'DD-MM-YYYY',
           sideBySide: true,
          widgetPositioning: {
              horizontal: 'right',
              vertical: 'bottom'
          }
          
        });

        $('#datepicker1').datetimepicker({

        format: 'YYYY-MM-DD',
        defaultDate: "",
        });
        
        $('#datepicker2').datetimepicker({

        format:'YYYY-MM-DD',
        defaultDate: "",


        });


            
        
      
      });
      </script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
     <script src="../plugins/ckeditor/ckeditor.js"></script>
     
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
 
    <script type="text/javascript" src="../plugins/datatables/datatables.min.js"></script>

    <!-- AdminLTE App -->
    <script src="../plugins/admin style/js/app.min.js"></script>
 <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
      
  </body>
</html>