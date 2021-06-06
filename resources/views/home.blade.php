@extends('layouts.app')

@section('content')

    <div class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-arrow-right mr-2"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;" >{{ csrf_field() }}</form>

                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">TASK</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-th"></i><p>Widgets</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Name
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sub Menu</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{--<section class="content">--}}
                {{--<div class="container-fluid">--}}
                    {{--<div class="panel-body">--}}
                        {{--@if (session('status'))--}}
                            {{--<div class="alert alert-success">--}}
                                {{--{{ session('status') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}

                        {{--<form action="" method="post" enctype="multipart/form-data">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--<div class="form-group">--}}
                                {{--<input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Enter your Name" required>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<input type="text" class="form-control" value="{{ old('mobile_no') }}" name="mobile_no" placeholder="Enter your Mobile No." required>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<input type="text" class="form-control" value="{{ old('address') }}" name="address" placeholder="Enter your Address" required>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<input type="text" class="form-control" value="{{ old('image') }}" name="image" placeholder="Enter your Image " required>--}}
                            {{--</div>--}}
                            {{--<div class="text-center">--}}
                                {{--<button class="btn btn-success">Submit</button>--}}
                            {{--</div>--}}
                        {{--</form>--}}

                        {{--<table class="table table-responsive">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>Name</th>--}}
                                {{--<th>Mobile No</th>--}}
                                {{--<th>Address</th>--}}
                                {{--<th>Image</th>--}}
                                {{--<th>Action</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach($cruds as $crud)--}}
                                {{--<tr>--}}
                                    {{--<td>{{ $crud->name }}</td>--}}
                                    {{--<td>{{ $crud->mobile_no }}</td>--}}
                                    {{--<td>{{ $crud->address }}</td>--}}
                                    {{--<td>{{ $crud->image }}</td>--}}
                                    {{--<td>--}}
                                        {{--<a href = 'show/{{ $crud->id }}' class="btn btn-warning">Show</a>--}}
                                        {{--<a href = 'edit/{{ $crud->id }}' class="btn btn-primary">edit</a>--}}
                                        {{--<a href = 'delete/{{ $crud->id }}' class="btn btn-danger">Delete</a>--}}

                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</section>--}}
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="">Task</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>task</b>
            </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
    </div>
@endsection
