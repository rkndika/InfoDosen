<?php
include "session.php";
include "koneksi.php";

$query=mysql_query("select * from mahasiswa where nim='$user_check'");
$user = mysql_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JUDUL HAHAHAHA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Style Buatan -->
  <link rel="stylesheet" href="dist/css/style.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>H</b>JD</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>HAHAHA</b>JUDUL</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-danger">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/1.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/1.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user['nama'];?></span>
              <i class="fa fa-sort-down pull-right"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/1.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $user['nama'];?>
                  <small><?php echo $user['deskripsi'];?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="dist/img/1.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['nama'];?></p>
          <?php echo $user['deskripsi'];?>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">NAVIGATION</li>
        <li class="active treeview">
          <a href="index.html">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Pesan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Profil Dosen</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-flag"></i>
            <span>Tugas</span>
          </a>
        </li>
        <li class="header">CREDITS</li>
        <li><a href="#"><i class="fa fa-users"></i> <span>Tentang Kami</span></a></li>
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
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row col-md-12 center-block">              
	  	<div class="callout callout-info lead">
            <h4>Pemberitahuan!</h4>
            <p>Program sistem informasi kamunitas akademik berbasis web.</p>
      	</div>
      </div>
      <div class="row">
        <!-- Left col -->
        <section class="col-md-8">
            <!-- Paneal Komting -->
            <div class="box box-solid box-info">
               <div class="box-header">
                  <i class="fa fa-cogs"></i>
                  <h3 class="box-title">Panel Komting</h3>
               </div><!-- /.box-header -->
               <div class="box-body">
                  <p>Hai <b><?php echo $user['nama'];?></b>, Anda dipilih sebagai Komisaris Leting untuk mengelola mata kuliah berikut.</p>
                  <div class="col-md-6">
                      <a href="#" class="btn btn-danger" style="width: 100%;">Pemograman</a><br><br>
                      <a href="#" class="btn btn-danger" style="width: 100%;">Pemograman Berbasis Web</a><br><br>
                      <a href="#" class="btn btn-danger" style="width: 100%;">Jaringan Komputer</a> <br><br>
                  </div>
                  <div class="col-md-6 hresize" style="background: #EEEEEE; padding: 1%; border-radius: 5px;">
                      <p>Mengirim informasi ke Mata Kuliah <span class="label label-primary">Pemograman</span></p>
                      <textarea class="form-control hresize" id="encJs2"></textarea><br>
                      <button type="button" class="btn btn-primary pull-right"><i class="fa fa-send"></i> KIRIM</button><br><br>
                  </div>
                  
               </div><!-- /.box-body -->
            </div><!-- /.box -->
            <!-- /.Paneal Komting -->

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
      					  <input type="text" class="knob" data-readonly="true" value="70" data-width="60" data-height="60" data-fgColor="#39CCCC">
      					  <div class="knob-label"><i class="fa fa-circle text-green"></i>  AVAILABLE</div>
      					</div>
      					<!-- ./col -->
      					<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
      					  <input type="text" class="knob" data-readonly="true" value="10" data-width="60" data-height="60" data-fgColor="#39CCCC">
      					  <div class="knob-label"><i class="fa fa-circle text-yellow"></i>  BUSY</div>
      					</div>
      					<!-- ./col -->
      					<div class="col-xs-4 text-center">
      					  <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">
      					  <div class="knob-label"><i class="fa fa-circle text-red"></i>  UNAVAILABLE</div>
      					</div>
      					<!-- ./col -->
      				  </div>
      				  <!-- /.row -->
      				</div>
      				<!-- /.box-footer -->
      			</div>
      			<!-- /.box --> 



            <!-- Dosen Favorite -->
            <div class="box box-solid box-info">
              <div class="box-header">
                <i class="fa fa-star"></i>
                <h3 class="box-title">Favorit</h3>
              </div>
              <!-- /.box-body -->
              <div class="box-body">
                <!-- Widget: list -->
                <div class="col-md-6">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user" style="box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.3);">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-aqua-active">
                      <h3 class="widget-user-username">Si B</h3>
                      <h5 class="widget-user-desc">HAHAHA</h5>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle" src="dist/img/1.jpg" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="description-block">
                          <i class="fa fa-circle text-green"></i>
                          <span class="description-text">available</span>
                          </div>
                          <!-- /.description-block -->
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4 border-right">
                          <div style="font-size: 20px;" class="description-block">
                            <a href="#">
                              <i class="fa fa-user" data-toggle="tooltip" title="Lihat Profil"></i>
                            </a>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <div class="col-sm-4 border-right">
                          <div style="font-size: 20px;" class="description-block">
                          <a href="#">
                            <i class="fa fa-star"></i>
                          </a>
                          </div>
                          <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                          <div style="font-size: 20px;" class="description-block">
                          <a href="#">
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
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box --> 


			
      			<!-- Dosen List -->
      			<div class="box box-solid box-info">
      				<div class="box-header">
      				  <i class="fa fa-users"></i>
      				  <h3 class="box-title">Daftar Dosen</h3>
      				</div>
      				<div class="box-body">
      					<!-- Widget: list -->
                
                
                
                <?php
                  $sql="select * from dosen";
                  $sqla=mysql_query($sql);
                  while($data = mysql_fetch_array($sqla)) {
                    echo ' 
                          <div class="col-md-6">
                              <!-- Widget: user widget style 1 -->
                            <div class="box box-widget widget-user" style="box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.3);">
                              <!-- Add the bg color to the header using any of the bg-* classes -->
                              <div class="widget-user-header bg-aqua-active">
                                <h3 class="widget-user-username">'.$data["nama"].'</h3>
                                <h5 class="widget-user-desc">'.$data["nip"].'</h5>
                              </div>
                              <div class="widget-user-image">
                                <img class="img-circle" src="dist/img/'.$data["foto"].'" alt="User Avatar">
                              </div>
                              <div class="box-footer">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="description-block">
                                    <i class="fa fa-circle text-green"></i>
                                    <span class="description-text">available</span>
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-4 border-right">
                                    <div style="font-size: 20px;" class="description-block">
                                      <a href="/dosen/?nip='.$data["nip"].'">
                                        <i class="fa fa-user" data-toggle="tooltip" title="Lihat Profil"></i>
                                      </a>
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <div class="col-sm-4 border-right">
                                    <div style="font-size: 20px;" class="description-block">
                                    <a href="#">
                                      <i class="fa fa-star-o"></i>
                                    </a>
                                    </div>
                                    <!-- /.description-block -->
                                  </div>
                                  <!-- /.col -->
                                  <div class="col-sm-4">
                                    <div style="font-size: 20px;" class="description-block">
                                    <a href="#">
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
                          </div>

 






                    ';
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

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="todo-list">
                <li>
                  <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- todo text -->
                  <span class="text">Mebuat cornell note</span>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                  <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- todo text -->
                  <span class="text">Presentasi Project</span>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
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
            
             	<div class="col-md-12">
                  <div class="box box-info" style="box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.3);">
                    <div class="box-header with-border">
                      <h3 class="box-title">Pemograman berbasis Web</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
	                     <!-- Message. Default to the left -->
                         <div class="direct-chat-msg">
    	                      <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left">Dosen</span>
                                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                              </div><!-- /.direct-chat-info -->
                              <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                              <div class="direct-chat-text">
                                Perkuliahan hari ini mengenai PHP
                              </div><!-- /.direct-chat-text -->
						              </div><!-- /.direct-chat-msg -->
                                
                        <div class="direct-chat-msg">
                              <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left">Komting</span>
                                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                              </div><!-- /.direct-chat-info -->
                              <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                              <div class="direct-chat-text">
                                Akan diadakan jam tambahan pada minggu depan
                              </div><!-- /.direct-chat-text -->
						            </div><!-- /.direct-chat-msg -->
                        <button type="button" class="btn btn-danger pull-right"><i class="fa fa-close"></i> BATAL IKUTI</button>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div>
                
                <div class="col-md-12">
                  <div class="box box-info" style="box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.3);">
                    <div class="box-header with-border">
                      <h3 class="box-title">Jaringan Komputer</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
	                     <!-- Message. Default to the left -->
                         <div class="direct-chat-msg">
    	                      <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left">Dosen</span>
                                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                              </div><!-- /.direct-chat-info -->
                              <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                              <div class="direct-chat-text">
                                Pelajari tentang topologi jaringan
                              </div><!-- /.direct-chat-text -->
						              </div><!-- /.direct-chat-msg -->
                          <button type="button" class="btn btn-danger pull-right"><i class="fa fa-close"></i> BATAL IKUTI</button>     
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div>
                
                <div class="col-md-12">
                  <div class="box box-info" style="box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.3);">
                    <div class="box-header with-border">
                      <h3 class="box-title">Rekayasa Perangkat Lunak</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
	                     <!-- Message. Default to the left -->
                        <div class="direct-chat-msg">
    	                      <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-left">Komting</span>
                                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                              </div><!-- /.direct-chat-info -->
                              <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                              <div class="direct-chat-text">
                                Cornell mulai bab 1 sampai bab 9
                              </div><!-- /.direct-chat-text -->
						            </div><!-- /.direct-chat-msg -->
                        <button type="button" class="btn btn-danger pull-right"><i class="fa fa-close"></i> BATAL IKUTI</button>        
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div>
              
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
    <strong>Copyright &copy; 2016 <a href="#">HAHA</a>.</strong> All rights reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

<?php
mysql_close();
?>