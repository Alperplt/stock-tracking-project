<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/anasayfa/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('admins/assets/css/pace.css')}}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title','Ana Sayfa')</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600|Roboto:400" rel="stylesheet" type="text/css">
    <link href="{{asset('admins/assets/vendors/material-icons/material-icons.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset('admins/assets/vendors/mono-social-icons/monosocialiconsfont.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admins/assets/vendors/feather-icons/feather.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.25/daterangepicker.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('admins/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    @yield('header')
    <!-- Head Libs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
</head>

<body class="header-dark sidebar-light sidebar-expand">
    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <nav class="navbar">
            <!-- Logo Area -->
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand">
                    <img class="logo-expand p-4" alt="" src="{{asset('images/anasayfa/altnlgo.png')}}">
                    <img class="logo-collapse" alt="" src="{{asset('admins/assets/demo/logo-collapse.png')}}">
                    <!-- <p>BonVue</p> -->
                </a>
            </div>
            <!-- /.navbar-header -->
            <!-- Left Menu & Sidebar Toggle -->
            <ul class="nav navbar-nav">
                <li class="sidebar-toggle"><a href="javascript:void(0)" class="ripple"><i class="feather feather-menu list-icon fs-20"></i></a>
                </li>
            </ul>
            <!-- /.navbar-left -->
            <!-- Search Form -->
            <form class="navbar-search d-none d-sm-block" role="search"><i class="feather feather-search list-icon"></i> 
                <input type="search" class="search-query" placeholder="Search anything..."> <a href="javascript:void(0);" class="remove-focus"><i class="feather feather-x"></i></a>
            </form>
            <!-- /.navbar-search -->
            <div class="spacer"></div>
            <!-- Button: Create New -->
            <div class="btn-list dropdown d-none d-md-flex mr-4 mr-0-rtl ml-4-rtl"><a href="javascript:void(0);" class="btn btn-primary dropdown-toggle ripple" data-toggle="dropdown"><i class="feather feather-plus list-icon"></i> Create New</a>
                <div class="dropdown-menu dropdown-left animated flipInY"><span class="dropdown-header">Create new ...</span>  <a class="dropdown-item" href="#">Projects</a>  <a class="dropdown-item" href="#">User Profile</a>  <a class="dropdown-item" href="#"><span class="d-flex align-items-end"><span class="flex-1">To-do Item</span> <span class="badge badge-pill bg-primary-contrast">7</span> </span></a>
                    <a
                    class="dropdown-item" href="#"><span class="d-flex align-items-end"><span class="flex-1">Mail</span>  <span class="badge badge-pill bg-color-scheme-contrast">23</span></span>
                        </a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><span class="d-flex align-items-center"><span class="flex-1">Settings</span> <i class="feather feather-settings list-icon icon-muted"></i></span></a>
                </div>
            </div>
            <!-- /.btn-list -->
            <!-- User Image with Dropdown -->
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown"><span class="avatar thumb-xs2"><img src="{{asset('admins/assets/demo/users/user1.jpg')}}" class="rounded-circle" alt=""> <i class="feather feather-chevron-down list-icon"></i></span></a>
                    <div
                    class="dropdown-menu dropdown-left dropdown-card dropdown-card-profile animated flipInY">
                        <div class="card">
                            <header class="card-header d-flex mb-0"><a href="javascript:void(0);" class="col-md-4 text-center"><i class="feather feather-user-plus align-middle"></i> </a><a href="javascript:void(0);" class="col-md-4 text-center"><i class="feather feather-settings align-middle"></i> </a>
                                <a
                                href="javascript:void(0);" class="col-md-4 text-center"><i class="feather feather-power align-middle"></i>
                                    </a>
                            </header>
                            <ul class="list-unstyled card-body">
                                <li><a href="#"><span><span class="align-middle">Manage Accounts</span></span></a>
                                </li>
                                <li><a href="#"><span><span class="align-middle">Change Password</span></span></a>
                                </li>
                                <li><a href="#"><span><span class="align-middle">Check Inbox</span></span></a>
                                </li>
                                <li><a href="#"><span><span class="align-middle">Sign Out</span></span></a>
                                </li>
                            </ul>
                        </div>
    </div>
    </li>
           </ul>
    <!-- /.navbar-right -->
    <!-- Right Menu -->
    <ul class="nav navbar-nav d-none d-lg-flex ml-2 ml-0-rtl">
        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown"><i class="feather feather-hash list-icon"></i></a>
            <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
                <div class="card">
                    <header class="card-header d-flex align-items-center mb-0"><a href="javascript:void(0);"><i class="feather feather-bell color-color-scheme" aria-hidden="true"></i></a>  <span class="heading-font-family flex-1 text-center fw-400">Notifications</span>  <a href="javascript:void(0);"><i class="feather feather-settings color-content"></i></a>
                    </header>
                    <ul class="card-body list-unstyled dropdown-list-group">
                        <li><a href="#" class="media"><span class="d-flex thumb-xs"><img src="" class="rounded-circle" alt=""> </span><span class="media-body"><span class="heading-font-family media-heading">Dany Miles </span><span class="media-content">commented on your photo</span> <span class="user--online float-right my-auto"></span></span></a>
                        </li>
                        <li><a href="#" class="media"><span class="d-flex thumb-xs"><img src="{{asset('admins/assets/demo/users/user6.jpg')}}" class="rounded-circle" alt=""> </span><span class="media-body"><span class="heading-font-family media-heading">Emily Woodworth </span><span class="media-content">posted a photo on your wall.</span></span></a>
                        </li>
                        <li><a href="#" class="media"><span class="d-flex thumb-xs"><img src="{{asset('admins/assets/demo/users/user2.jpg')}}" class="rounded-circle" alt=""> </span><span class="media-body"><span class="heading-font-family media-heading">Palmer Kate </span><span class="media-content">just mentioned you in his post</span></span></a>
                        </li>
                    </ul>
                    <!-- /.dropdown-list-group -->
                    <footer class="card-footer text-center"><a href="javascript:void(0);" class="heading-font-family text-uppercase fs-13">See all activity</a>
                    </footer>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.dropdown-menu -->
        </li>
        <!-- /.dropdown -->
        <li class="dropdown"><a href="#" class="dropdown-toggle ripple" data-toggle="dropdown"><i class="feather feather-settings list-icon"></i></a>
            <div class="dropdown-menu dropdown-left dropdown-card animated flipInY">
                <div class="card">
                    <header class="card-header d-flex justify-content-between mb-0"><a href="javascript:void(0);"><i class="feather feather-bell color-color-scheme" aria-hidden="true"></i></a>  <span class="heading-font-family flex-1 text-center fw-400">Notifications</span>  <a href="javascript:void(0);"><i class="feather feather-settings color-content"></i></a>
                    </header>
                    <ul class="card-body list-unstyled dropdown-list-group">
                        <li><a href="#" class="media"><span class="d-flex"><i class="material-icons list-icon">check</i> </span><span class="media-body"><span class="heading-font-family media-heading">Invitation accepted</span> <span class="media-content">Your have been Invited ...</span></span></a>
                        </li>
                        <li><a href="#" class="media"><span class="d-flex thumb-xs"><img src="{{asset('admins/assets/demo/users/user3.jpg')}}" class="rounded-circle" alt=""> </span><span class="media-body"><span class="heading-font-family media-heading">Steve Smith</span> <span class="media-content">I slowly updated projects</span> <span class="user--online float-right"></span></span></a>
                        </li>
                        <li><a href="#" class="media"><span class="d-flex"><i class="material-icons list-icon">event_available</i> </span><span class="media-body"><span class="-heading-font-family media-heading">To Do</span> <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span></span></a>
                        </li>
                    </ul>
                    <!-- /.dropdown-list-group -->
                    <footer class="card-footer text-center"><a href="javascript:void(0);" class="headings-font-family text-uppercase fs-13">See all activity</a>
                    </footer>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.dropdown-menu -->
        </li>
        <!-- /.dropdown -->
        <li><a href="javascript:void(0);" class="right-sidebar-toggle active ripple ml-3 ml-0-rtl"><i class="feather feather-grid list-icon"></i></a>
        </li>
    </ul>
    <!-- /.navbar-right -->
    </nav>

      <!-- /.navbar -->
    <div class="content-wrapper">
    