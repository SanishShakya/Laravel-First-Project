<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/backend/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/backend/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('assets/backend/dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  @yield('css')
    <link rel="stylesheet" href="{{asset('assets/backend/style.css')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{route('home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Ecommerce</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <i class="fa fa-user"></i>
              <span class="hidden-xs">{{auth()->user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <i class="fa fa-user text-default"></i>
                <p>
                  {{auth()->user()->name}}
                  <small>{{auth()->user()->created_at}}</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                  {{--<a href="#" class="btn btn-default btn-flat">Sign out</a>--}}
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <i class="fa fa-user text-success"></i>
        </div>
        <div class="pull-left info">
          <p>{{ucfirst(auth()->user()->name)}}</p>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Dashboard</a></li>
          <li class="treeview">
              <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>User Management</span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{route('backend.user.create')}}"><i class="fa fa-plus"></i> Create User</a></li>
                  <li><a href="{{route('backend.user.index')}}"><i class="fa fa-list"></i> List User</a></li>

              </ul>
          </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Tag Management</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('backend.tag.create')}}"><i class="fa fa-plus"></i> Create Tag</a></li>
            <li><a href="{{route('backend.tag.index')}}"><i class="fa fa-list"></i> List Tag</a></li>

          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Category Management</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('backend.category.create')}}"><i class="fa fa-plus"></i> Create Tag</a></li>
            <li><a href="{{route('backend.category.index')}}"><i class="fa fa-list"></i> List Tag</a></li>

          </ul>
        </li>
          <li class="treeview">
              <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Subcategory Management</span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{route('backend.subcategory.create')}}"><i class="fa fa-plus"></i> Create Subcategory</a></li>
                  <li><a href="{{route('backend.subcategory.index')}}"><i class="fa fa-list"></i> List Subcategory</a></li>

              </ul>
          </li>
          <li class="treeview">
              <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Product Management</span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{route('backend.product.create')}}"><i class="fa fa-plus"></i> Create Product</a></li>
                  <li><a href="{{route('backend.product.index')}}"><i class="fa fa-list"></i> List Product</a></li>

              </ul>
          </li>
          <li class="treeview">
              <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Role Management</span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{route('backend.role.create')}}"><i class="fa fa-plus"></i> Create Role</a></li>
                  <li><a href="{{route('backend.role.index')}}"><i class="fa fa-list"></i> List Role</a></li>

              </ul>
          </li>
          <li class="treeview">
              <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Permision Management</span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="{{route('backend.permission.create')}}"><i class="fa fa-plus"></i> Create Permision</a></li>
                  <li><a href="{{route('backend.permission.index')}}"><i class="fa fa-list"></i> List Permision</a></li>

              </ul>
          </li>
        <hr/>
        <li><a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out"></i>  {{ __('Logout') }}
          </a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-{{date('Y')}} <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('assets/backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('assets/backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('assets/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/backend/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/backend/dist/js/demo.js')}}"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
@yield('js')
</body>
</html>
