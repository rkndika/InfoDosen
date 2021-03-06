<?php
include "../session.php";
include "../koneksi.php";
if($_SESSION['level']!="mahasiswa"){
  header('Location: ../login.php');
}
$user=$userOnSession;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Info Dosen - Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Style Buatan -->
  <link rel="stylesheet" href="../dist/css/style.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>i</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>info</b>DOSEN</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


      <?php
        $sql = "select * from pesan where penerima='".$user['nim']."' AND status='UNREAD'";
        $sqla=mysql_query($sql);
        $jumlahUNREAD=mysql_num_rows($sqla);
      ?>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <?php
                if($jumlahUNREAD>0){
                  echo '<span class="label label-danger">'.$jumlahUNREAD.'</span>';
                }
              ?>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Kamu punya <?php echo $jumlahUNREAD ?> pesan yang belum dibaca</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php
                    $sql = "select * from pesan where penerima='".$user['nim']."' ORDER BY status DESC";
                    $sqla=mysql_query($sql);
                    for($i=0; ($data = mysql_fetch_array($sqla))&&$i<5; $i++) {
                      $sqlpengirim = mysql_query("select * from mahasiswa where nim='".$data['pengirim']."'");
                      if(mysql_num_rows($sqlpengirim)<=0){
                        $sqlpengirim = mysql_query("select * from dosen where nip='".$data['pengirim']."'");
                      }
                      $pengirim = mysql_fetch_assoc($sqlpengirim);
                      $date = date_create($data['tanggal']);
                      $tanggalkirim= date_format($date,"d M Y");
                      $subject= substr($data['subject'],0,30);
                      if($data['status']=="UNREAD"){
                        echo '<li style="background: #FFEBEE">';
                      }
                      else{
                        echo '<li>';
                      }
                      echo '
                        <a href="read.php?id='.$data['idpesan'].'">
                          <div class="pull-left">
                            <img src="../assets/images/'.$pengirim['foto'].'" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            '.$pengirim['nama'].'
                            <small><i class="fa fa-clock-o"></i> '.$tanggalkirim.'</small>
                          </h4>
                          <p>'.$subject.'</p>
                        </a>
                      </li>';
                    }
                  ?>
                </ul>
              </li>
              <li class="footer"><a href="mailbox.php">Lihat Semua Pesan</a></li>
            </ul>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/images/<?php echo $user['foto'] ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user['nama'];?></span>
              <i class="fa fa-sort-down pull-right"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/images/<?php echo $user['foto'] ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $user['nama'];?>
                  <small><?php echo $user['deskripsi'];?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profil.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/images/<?php echo $user['foto'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['nama'];?></p>
          <?php echo $user['deskripsi'];?>
        </div>
      </div>
      <!-- search form -->
      <form action="cari.php" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="dosen" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">NAVIGATION</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="mailbox.php">
            <i class="fa fa-envelope"></i>
            <span>Pesan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="profil.php">
            <i class="fa fa-user"></i>
            <span>Profil</span>
          </a>
        </li>
        <li class="header">CREDITS</li>
        <li><a href="aboutus.php"><i class="fa fa-users"></i> <span>Tentang Kami</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Mahasiswa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <!-- Pemberitahuan
      <div class="row col-md-12 center-block">              
        <div class="callout callout-info lead">
            <h4>Pemberitahuan!</h4>
            <p>Program sistem informasi kamunitas akademik berbasis web.</p>
        </div>
      </div>
      -->
      <div class="row">
        <!-- Left col -->
        <section class="col-md-8">
            <?php
              $sql = "select komting from matakuliah where komting='".$user['nim']."'";
              $sqla=mysql_query($sql);
              $row=mysql_num_rows($sqla);
              if($row>0){
                $sql = "select * from matakuliah where komting='".$user['nim']."'";
                $sqla=mysql_query($sql);
                echo '
                  <!-- Paneal Komting -->
                  <div class="box box-solid box-info">
                     <div class="box-header">
                        <i class="fa fa-cogs"></i>
                        <h3 class="box-title">Panel Komting</h3>
                     </div><!-- /.box-header -->
                     <div class="box-body">
                        <p>Hai <b>'.$user['nama'].'</b>, Anda dipilih untuk mengelola mata kuliah berikut.</p>
                        <div class="col-md-12">';
                while($data = mysql_fetch_array($sqla)) {
                            echo '
                            <div class="box box-solid box-primary collapsed-box">
                              <div class="box-header with-border">
                                <h3 class="box-title">'.$data['nama'].'</h3>
                                <div class="box-tools pull-right">
                                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                </div><!-- /.box-tools -->
                              </div><!-- /.box-header -->
                              <div class="box-body">
                                <div class="col-md-12 hresize">
                                    <p>Mengirim informasi ke Mata Kuliah '.$data['nama'].'</p>
                                    <textarea required id="textarea'.$data['idpelajaran'].'" class="form-control hresize"></textarea><br>
                                    <button onclick="updateinfo('.$data['idpelajaran'].')" type="button" class="btn btn-primary pull-right"><i class="fa fa-send"></i> KIRIM</button><br><br>
                                </div>';
                              if(!empty($data['pesankomting'])){
                                echo '
                                <div class="col-md-12 hresize">
                                    <p>Pesan sebelumnya</p>
                                    <textarea required id="textarea'.$data['idpelajaran'].'" class="form-control hresize" disabled>'.$data['pesankomting'].'</textarea><br>
                                    <button onclick="hapusinfo('.$data['idpelajaran'].')" type="button" class="btn btn-danger pull-right"><i class="fa fa-close"></i> HAPUS</button><br><br>
                                </div>';
                              }

                              echo '
                                <div class="col-md-12 hresize" style="margin-top:20px;">
                                  <div class="box box-solid box-warning">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Mahasiswa Menunggu Persetujuan</h3>
                                      <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                      </div><!-- /.box-tools -->
                                    </div><!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                      <table class="table table-hover">
                                        <tr>
                                          <th>NIM</th>
                                          <th>Nama</th>
                                          <th>Action</th>
                                        </tr>';
                                        $subscribers=mysql_query("select * from subscribe INNER JOIN mahasiswa ON subscribe.nim=mahasiswa.nim where pelajaran='".$data['idpelajaran']."' AND status='PENDING'");
                                        while($subscriber = mysql_fetch_array($subscribers)) {
                                          echo '
                                            <tr>
                                              <td>'.$subscriber['nim'].'</td>
                                              <td>'.$subscriber['nama'].'</td>
                                              <td><button onclick="hapussubscribe('.$subscriber['pelajaran'].','.$subscriber['nim'].')" type="button" class="btn-xs btn-danger"><i class="fa fa-close"></i></button> <button onclick="acceptsubscribe('.$subscriber['pelajaran'].','.$subscriber['nim'].')" type="button" class="btn-xs btn-success btn-flat"><i class="fa fa-check"></i></button></td>
                                            </tr>
                                          ';
                                        }
                                        echo '
                                      </table>
                                    </div><!-- /.box-body -->
                                  </div><!-- /.box -->
                                </div>

                                <div class="col-md-12 hresize">
                                  <div class="box box-solid box-default collapsed-box">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Daftar Mahasiswa</h3>
                                      <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                      </div><!-- /.box-tools -->
                                    </div><!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                      <table class="table table-hover">
                                        <tr>
                                          <th>NIM</th>
                                          <th>Nama</th>
                                          <th>Action</th>
                                        </tr>';
                                        $subscribers=mysql_query("select * from subscribe INNER JOIN mahasiswa ON subscribe.nim=mahasiswa.nim where pelajaran='".$data['idpelajaran']."' AND status='APPROVED'");
                                        while($subscriber = mysql_fetch_array($subscribers)) {
                                          echo '
                                            <tr>
                                              <td>'.$subscriber['nim'].'</td>
                                              <td>'.$subscriber['nama'].'</td>
                                              <td><button onclick="hapussubscribe('.$subscriber['pelajaran'].','.$subscriber['nim'].')" type="button" class="btn-xs btn-danger"><i class="fa fa-close"></i></button></td>
                                            </tr>
                                          ';
                                        }
                                        echo '
                                      </table>
                                    </div><!-- /.box-body -->
                                  </div><!-- /.box -->
                                </div>';

                              echo '
                              </div><!-- /.box-body -->
                            </div><!-- /.box -->';
                }
                echo '
                        </div>
                     </div><!-- /.box-body -->
                  </div><!-- /.box -->
                  <!-- /.Paneal Komting -->';
              }
            ?>

            


            <?php
              $sql = "select status from dosen";
              $sqla=mysql_query($sql);
              $total = mysql_num_rows($sqla);
              $sql = "select status from dosen where status='AVAILABLE'";
              $sqla=mysql_query($sql);
              $available = mysql_num_rows($sqla);
              $sql = "select status from dosen where status='UNAVAILABLE'";
              $sqla=mysql_query($sql);
              $unavailable = mysql_num_rows($sqla);
              $sql = "select status from dosen where status='BUSY'";
              $sqla=mysql_query($sql);
              $busy = mysql_num_rows($sqla);
            ?>
            <!-- Dosen Available Status -->
            <div class="box box-solid box-info">
              <div class="box-header">
                <i class="fa fa-desktop"></i>
                <h3 class="box-title">Statistik Status</h3>
              </div>
              <!-- /.box-body -->
              <div class="box-footer no-border">
                <div class="row">
                  <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <input type="hidden" class="knob" data-readonly="true" value="<?php echo $available/$total*100 ?>" data-width="65" data-height="65" data-fgColor="#00a65a">
                    <div class="knob-label"><i class="fa fa-circle text-green"></i>  AVAILABLE</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <input type="hidden" class="knob" data-readonly="true" value="<?php echo $busy/$total*100 ?>" data-width="65" data-height="65" data-fgColor="#f39c12">
                    <div class="knob-label"><i class="fa fa-circle text-yellow"></i>  BUSY</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-xs-4 text-center">
                    <input type="hidden" class="knob" data-readonly="true" value="<?php echo $unavailable/$total*100 ?>" data-width="65" data-height="65" data-fgColor="#dd4b39">
                    <div class="knob-label"><i class="fa fa-circle text-red"></i>  UNAVAILABLE</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.box-footer -->
            </div>
            <!-- /.box --> 


            <?php
              $sql = "select * from favorit RIGHT JOIN dosen on favorit.nim='".$user['nim']."' AND favorit.nip=dosen.nip where nim='".$user['nim']."'";
              $sqla=mysql_query($sql);
              if(mysql_num_rows($sqla)>0){
                echo '
                  <!-- Dosen Favorite -->
                  <div class="box box-solid box-info">
                    <div class="box-header">
                      <i class="fa fa-star"></i>
                      <h3 class="box-title">Favorit</h3>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-body">
                ';
                while($data = mysql_fetch_array($sqla)) {
                    echo ' 
                          <section id="'.$data["nip"].'" class="col-md-6">
                              <!-- Widget: user widget style 1 -->
                            <div class="box box-widget widget-user" style="box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.3);">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header bg-aqua-active">
                                <h3 class="widget-user-username">'.$data["nama"].'</h3>
                                <h5 class="widget-user-desc">'.$data["nip"].'</h5>
                              </div>
                              <div class="widget-user-image">
                                <img class="img-circle" src="../assets/images/'.$data["foto"].'" alt="User Avatar">
                              </div>
                              <div class="box-footer">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="description-block">';
                                    
                                    switch($data['status']){
                                      case 'AVAILABLE': echo '<i class="fa fa-circle text-green"></i>'; break;
                                      case 'UNAVAILABLE': echo '<i class="fa fa-circle text-red"></i>'; break;
                                      case 'BUSY': echo '<i class="fa fa-circle text-yellow"></i>'; break;
                                    }
                                    echo '
                                    <span class="description-text">'.$data['status'].'</span>
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-4 border-right">
                                    <div style="font-size: 20px;" class="description-block">
                                      <a href="dosen.php?nip='.$data["nip"].'">
                                        <i class="fa fa-user" data-toggle="tooltip" title="Lihat Profil"></i>
                                      </a>
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <div class="col-sm-4 border-right">
                                    <div style="font-size: 20px;" class="description-block">';
                                      if(!empty($data['nim'])){
                                        echo '<div class="favorit-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></div>';
                                      }
                                      else{
                                        echo '<div class="favorit-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></div>'; 
                                      }
                                  echo '
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-sm-4">
                                    <div style="font-size: 20px;" class="description-block">
                                    <a href="pesanbaru.php?ke='.$data["nip"].'">
                                      <i class="fa fa-envelope" data-toggle="tooltip" title="Kirim Pesan"></i>
                                    </a>
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                              </div>
                            </div>
                              <!-- /.widget-user -->
                          </section>';
                }
                echo '
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box --> 
                ';
              }
            ?>


      
            <!-- Dosen List -->
            <div class="box box-solid box-info">
              <div class="box-header">
                <i class="fa fa-users"></i>
                <h3 class="box-title">Daftar Dosen</h3>
              </div>
              <div class="box-body">
                <!-- Widget: list -->
                
                
                
                <?php
                  $sql = "select * from favorit RIGHT JOIN dosen on favorit.nim='".$user['nim']."' AND favorit.nip=dosen.nip";
                  $sqla=mysql_query($sql);
                  while($data = mysql_fetch_array($sqla)) {
                    echo ' 
                          <section id="'.$data["nip"].'" class="col-md-6">
                              <!-- Widget: user widget style 1 -->
                            <div class="box box-widget widget-user" style="box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.3);">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header bg-aqua-active">
                                <h3 class="widget-user-username">'.$data["nama"].'</h3>
                                <h5 class="widget-user-desc">'.$data["nip"].'</h5>
                              </div>
                              <div class="widget-user-image">
                                <img class="img-circle" src="../assets/images/'.$data["foto"].'" alt="User Avatar">
                              </div>
                              <div class="box-footer">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="description-block">';
                                    
                                    switch($data['status']){
                                      case 'AVAILABLE': echo '<i class="fa fa-circle text-green"></i>'; break;
                                      case 'UNAVAILABLE': echo '<i class="fa fa-circle text-red"></i>'; break;
                                      case 'BUSY': echo '<i class="fa fa-circle text-yellow"></i>'; break;
                                    }
                                    echo '
                                    <span class="description-text">'.$data['status'].'</span>
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-4 border-right">
                                    <div style="font-size: 20px;" class="description-block">
                                      <a href="dosen.php?nip='.$data["nip"].'">
                                        <i class="fa fa-user" data-toggle="tooltip" title="Lihat Profil"></i>
                                      </a>
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <div class="col-sm-4 border-right">
                                    <div style="font-size: 20px;" class="description-block">';
                                      if(!empty($data['nim'])){
                                        echo '<div class="favorit-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></div>';
                                      }
                                      else{
                                        echo '<div class="favorit-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></div>'; 
                                      }
                                  echo '
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-sm-4">
                                    <div style="font-size: 20px;" class="description-block">
                                    <a href="pesanbaru.php?ke='.$data["nip"].'">
                                      <i class="fa fa-envelope" data-toggle="tooltip" title="Kirim Pesan"></i>
                                    </a>
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                </div>
                                <!-- /.row -->
                              </div>
                            </div>
                              <!-- /.widget-user -->
                          </section>';
                  }
                ?>

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

          <!-- TO DO List -->
          <div class="box box-info">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Daftar Catatan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul id="listcatatan" class="todo-list">
                
                  <?php
                    $sql = "select * from catatan where pembuat='".$user['nim']."'";
                    $sqla=mysql_query($sql);
                    while($data = mysql_fetch_array($sqla)) {
                      echo '
                      <li>
                        <div id="catatan'.$data['idcatatan'].'">
                          <!-- drag handle -->
                              <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                              </span>
                          <!-- todo text -->
                          <span id="teks'.$data['idcatatan'].'" class="text">'.$data['catatan'].'</span>
                          <!-- General tools such as edit or delete-->
                          <div class="tools">
                            <i onclick="editlist('.$data['idcatatan'].')" class="fa fa-edit"></i>
                            <i onclick="hapuslist('.$data['idcatatan'].')" class="fa fa-trash-o"></i>
                          </div>
                        </div>
                        <div id="editcatatan'.$data['idcatatan'].'" style="display: none;">
                          <div class="input-group">
                            <input id="inputcatatan'.$data['idcatatan'].'" type="text" name="edit" class="form-control" placeholder="Edit" value="'.$data['catatan'].'">
                                <span class="input-group-btn">
                                  <button onclick="simpanEdit('.$data['idcatatan'].')" type="button" name="simpanEdit" id="submitEdit" class="btn btn-flat"><i class="fa fa-pencil"></i>
                                  </button>
                                  <button onclick="batalEdit('.$data['idcatatan'].')" type="button" name="batalEdit" id="batalEdit" class="btn btn-flat"><i class="fa fa-close"></i>
                                  </button>
                                </span>
                          </div>
                        </div>
                      </li>';
                    }
                  ?>
              </ul><br>
              <ul class="todo-list" id="tambahcatatan" style="display: none;">
                <li>
                    <div class="input-group">
                        <input id="input-tambahcatatan" type="text" name="input-tambahcatatan" class="form-control" placeholder="Tambah Catatan">
                        <span class="input-group-btn">
                          <button onclick="tambahcatatan()" type="button" class="btn btn-flat"><i class="fa fa-plus"></i>
                          </button>
                          <button onclick="bataltambah()" type="button" class="btn btn-flat"><i class="fa fa-close"></i>
                          </button>
                        </span>
                    </div>  
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button onclick="catatanbaru()" type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <div class="col-md-4">
          <div class="box box-solid box-info">
            <div class="box-header with-border">
              <i class="fa fa-flag"></i>
              <h3 class="box-title">Informasi Matakuliah</h3>
            </div><!-- /.box-header -->
            <div class="box-body">



              <?php
                  $sql = "select * from subscribe RIGHT JOIN matakuliah on subscribe.pelajaran=matakuliah.idpelajaran where nim='".$user['nim']."'";
                  $sqla=mysql_query($sql);
                  while($data = mysql_fetch_array($sqla)) {
                    $pengajar = mysql_fetch_assoc(mysql_query("select * from dosen where nip = '".$data['pengajar']."'"));
                    $komting = mysql_fetch_assoc(mysql_query("select * from mahasiswa where nim = '".$data['komting']."'"));
                    $date = date_create($data['tanggaldosen']);
                    $tanggaldosen= date_format($date,"d M Y");
                    $date = date_create($data['tanggalkomting']);
                    $tanggalkomting= date_format($date,"d M Y");
                            echo ' 
                            <div class="col-md-12">
                              <div class="box box-info" style="box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.3);">
                                <div class="box-header with-border">
                                  <h3 class="box-title">'.

                                  $data['nama'].

                                  '</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">';
                                if($data['status']=="PENDING"){
                                  echo "<center> Menunggu Persetujuan Dosen atau Komting </center><br>";
                                }
                                else{
                                  if(!empty($data['pesandosen'])){
                                    echo '
                                       <!-- Message. Default to the left -->
                                         <div class="direct-chat-msg">
                                            <div class="direct-chat-info clearfix">
                                                <span class="direct-chat-name pull-left">Dosen</span>
                                                <span class="direct-chat-timestamp pull-right">'.$tanggaldosen.'</span>
                                              </div><!-- /.direct-chat-info -->
                                              <img class="direct-chat-img" src="../assets/images/'.$pengajar['foto'].'" alt="message user image"><!-- /.direct-chat-img -->
                                              <div class="direct-chat-text">'.
                                                $data['pesandosen'].
                                              '</div><!-- /.direct-chat-text -->
                                          </div><!-- /.direct-chat-msg -->';
                                      }
                                    if(!empty($data['pesankomting'])){
                                    echo '         
                                      <div class="direct-chat-msg">
                                            <div class="direct-chat-info clearfix">
                                              <span class="direct-chat-name pull-left">Komting</span>
                                              <span class="direct-chat-timestamp pull-right">'.$tanggalkomting.'</span>
                                            </div><!-- /.direct-chat-info -->
                                            <img class="direct-chat-img" src="../assets/images/'.$komting['foto'].'" alt="message user image"><!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">'.
                                              $data['pesankomting'].
                                            '</div><!-- /.direct-chat-text -->
                                      </div><!-- /.direct-chat-msg -->';
                                    }
                                }
                                    echo '
                                    <button type="button" onclick="unsubscibe('.$data['idpelajaran'].','.$data['nim'].')" class="btn btn-danger pull-right"><i class="fa fa-close"></i> BATAL IKUTI</button>
                                </div><!-- /.box-body -->
                              </div><!-- /.box -->
                            </div>';
                  }
                ?>




              
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
        
        
         
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2016 <a href="#">infoDosen</a>.</strong> All rights reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- Page Script -->
<script src="../assets/js/dashboard-mahasiswa.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>

<?php
mysql_close();
?>