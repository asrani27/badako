<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BADAKO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/assets/bower_components/Ionicons/css/ionicons.min.css">

  @stack('css')
  
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- IziToast -->
  <link rel="stylesheet" href="/notif/dist/css/iziToast.min.css">
  <script src="/notif/dist/js/iziToast.min.js" type="text/javascript"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav" style="box-shadow: 5px 20px;" >
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top" style="box-shadow: 0px 4px 30px;">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="#" class="navbar-brand" style="padding:5px 15px"><b><img src="/logo/logo4.png" width="130px"></b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/superadmin/beranda"><i class="fa fa-fw fa-dashboard"></i> DASHBOARD <span class="sr-only">(current)</span></a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-list"></i>  MASTER DATA <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/superadmin/data/pegawai"><i class="fa fa-users"></i>  DATA PEGAWAI</a></li>
                <li><a href="/superadmin/data/unitkerja"><i class="fa fa-th"></i>  DATA UNIT KERJA</a></li>
                <li><a href="/superadmin/data/nomoraduan"><i class="fa fa-phone"></i>  NOMOR ADUAN</a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-list"></i>  INPUT SURAT <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/superadmin/cuti"><i class="fa fa-fw fa-users"></i> CUTI <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/mutasi"><i class="fa fa-fw fa-users"></i> MUTASI <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/spmt"><i class="fa fa-fw fa-users"></i> SPMT <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/berkala"><i class="fa fa-fw fa-users"></i> BERKALA <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/penugasan"><i class="fa fa-fw fa-users"></i> PENUGASAN <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/plh"><i class="fa fa-fw fa-users"></i> PLH <span class="sr-only">(current)</span></a></li>
                
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-list"></i>  SURAT USULAN <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/superadmin/usulan1"><i class="fa fa-fw fa-file"></i> PENGANGKATAN CPNS JADI PNS <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan2"><i class="fa fa-fw fa-file"></i> PEMBUATAN KARPEG <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan3"><i class="fa fa-fw fa-file"></i> PEMBUATAN KARIS DAN KARSU <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan4"><i class="fa fa-fw fa-file"></i> PERMOHONAN PENSIUN BUP 58/60 TAHUN <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan5"><i class="fa fa-fw fa-file"></i> PERMOHONAN PENSIUN JANDA/DUDA/YATIM <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan6"><i class="fa fa-fw fa-file"></i> PERMOHONAN PENSIUN APS - MK 20th, Usia 50th  <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan7"><i class="fa fa-fw fa-file"></i> PERMOHONAN PENSIUN APS - uzur/sakit  <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan8"><i class="fa fa-fw fa-file"></i> PERMOHONAN PERCERAIAN ASN <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan9"><i class="fa fa-fw fa-file"></i> PERMOHONAN KENAIKAN PANGKAT JFU <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan10"><i class="fa fa-fw fa-file"></i> PERMOHONAN KENAIKAN PANGKAT JFT <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan11"><i class="fa fa-fw fa-file"></i> PERMOHONAN KENAIKAN PANGKAT JF <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan12"><i class="fa fa-fw fa-file"></i> PERMOHONAN KENAIKAN BERKALA <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan13"><i class="fa fa-fw fa-file"></i> PERMOHONAN SATYA LENCANA <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan14"><i class="fa fa-fw fa-file"></i> PERMOHONAN TUGAS BELAJAR MANDIRI <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan15"><i class="fa fa-fw fa-file"></i> SURAT PERJANJIAN KONTRAK <span class="sr-only">(current)</span></a></li>
                <li><a href="/superadmin/usulan16"><i class="fa fa-fw fa-file"></i> SURAT KETERANGAN KERJA <span class="sr-only">(current)</span></a></li>
                
              </ul>
            </li>
            <li><a href="/superadmin/bandingkan"><i class="fa fa-fw fa-th"></i> BANDINGKAN DATA <span class="sr-only">(current)</span></a></li>
            <li><a href="/superadmin/kadis"><i class="fa fa-fw fa-user"></i> KEPALA DINAS <span class="sr-only">(current)</span></a></li>
            <li><a href="/superadmin/sekretaris"><i class="fa fa-fw fa-user"></i> SEKRETARIS <span class="sr-only">(current)</span></a></li>
          </ul>
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            {{-- <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li> --}}
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            {{-- <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li> --}}
            <!-- Tasks Menu -->
            {{-- <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <!-- Task title and progress text -->
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <!-- The progress bar -->
                        <div class="progress xs">
                          <!-- Change the css width attribute to simulate progress -->
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <!-- end task item -->
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li> --}}
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{Auth::user()->name}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    {{Auth::user()->name}} - Nama Jabatan
                    <small>NIP</small>
                  </p>
                </li>
                <!-- Menu Body -->
                
                
                <!-- Menu Footer-->
                <li class="user-footer">
                  {{-- <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div> --}}
                  <div class="pull-right">
                    <a href="/logout" class="btn btn-default btn-flat">Log out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          
           @yield('content-header') 
          
        </h1>
        
      </section>

      <!-- Main content -->
      <section class="content">
        @yield('content')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
      </div>
      <strong>Copyright &copy; 2023
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/assets/dist/js/demo.js"></script>
@stack('js')
<script type="text/javascript">
    @include('layouts.notif')
</script>
</body>
</html>
