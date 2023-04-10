<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous" />
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        

    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                    
                        <a href="#"><img class="logo" src="{{ asset('images/logo.png') }}" ></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-9  col-md-1">
                        <a href="logout" class="admin-logout" >Hello, {{session('name')['username']}}  logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="/admin/post">Post</a>
                            </li>
@if(session('name')['role']==1)
                            <li>
                                <a href="/admin/category">Category</a>
                            </li>
                            <li>
                                <a href="/admin/users">Users</a>
                            </li>
@endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
