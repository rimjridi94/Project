<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ Auth::user()->name}}</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon.png') }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href='http://fonts.googleapis.com/css?family=Ruda&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins-->
    <link href="{{ asset('assets/css/theme-skin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pace.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/chosen/chosen.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/animsition/css/animsition.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue sidebar-mini">
<style>
    th{
        text-align: center!important;
    }
</style>
<div class="wrapper animsition">

<header class="main-header">
    <a href="{{url('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>I 2</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">

        <!-- img src="{{ asset('assets/img/logo.png') }}" alt="logo"/ -->

        <h1 style="color: white; margin-top: 3%;">{{ Auth::user()->name}}</h1>

        </span>
    </a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">

    <li>
     
        <a href="http://gerebiz.com/" >
        Retour Accueil </a>
        </li>

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        @if(Auth::check())
   
        <span class="hidden-xs"> {{  Auth::user()->name }} </span>
        @endif
        <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            @if(Auth::check())
                       <img src="{{ asset( Auth::user()->photo != '' ? 'assets/img/uploads/'.Auth::user()->photo : 'assets/img/uploads/no-image.jpg') }}" class="img-circle" alt="User Image" />

            <p>{{  Auth::user()->name }} </p>
            @endif
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="{{ url('profile') }}" class="btn btn-primary btn-sm btn-flat">Profil</a>
            </div>
            <div class="pull-right">
                <a href="{{ url('/auth/logout') }}" class="btn btn-danger btn-sm btn-flat">Déconnexion</a>
            </div>
        </li>
    </ul>
</li>
    
</ul>
</div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->

@include('nav')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
@yield('content')

</div><!-- /.content-wrapper -->
    <div id="ajax-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static"></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset('assets/js/jquery-2.1.3.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- Bootstrap Dialog -->
<script src="{{ asset('assets/js/bootstrap-dialog.js') }}"></script>
<!-- Jquery Datatables -->
<script src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('assets/js/datatables.js') }}"></script>
<!-- Pace.js -->
<script src="{{ asset('assets/js/pace.min.js') }}"></script>
<!-- summernote.js javascript -->
<script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- datepicker.js javascript-->
<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<!-- chosen.js javascript-->
<script src="{{ asset('assets/plugins/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('assets/plugins/animsition/js/jquery.animsition.min.js') }}" type="text/javascript"></script>
<!-- validator.js javascript-->
<script src="{{ asset('assets/js/validator.min.js') }}"></script>
<!-- toastr.js javascript-->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<!-- custom.js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
@yield('scripts')
@include('common.common_js')


@if (Session::has('flash_notification.level'))
    <?php $message_type = Session::get('flash_notification.level'); ?>
    @if($message_type == 'success')
        <script>
            $(document).ready(function() {
                toastr.options = {"positionClass": "toast-bottom-right"}
                toastr.success('{{ Session::get('flash_notification.message') }}', '{{ ucfirst(Session::get('flash_notification.level')) }}');
            });
        </script>
    @elseif($message_type == 'danger')
        <script>
            $(document).ready(function() {
                toastr.options = {"positionClass": "toast-bottom-right"}
                toastr.error('{{ Session::get('flash_notification.message') }}', '{{ ucfirst(Session::get('flash_notification.level')) }}');
            });
        </script>
    @endif
@endif

</body>
</html>