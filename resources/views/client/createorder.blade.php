@extends('client.master')

@section('title', 'User Dashboard')

@section('header') @endsection

@section('side-bar')
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('reprint/ALT/img/avatar3.png')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello, Jane</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
                <a href="{{route('client_dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview d-block active">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Orders</span>
                    <i class="fa pull-right fa-angle-down"></i>
                </a>
                <ul class="treeview-menu" style="display: block;">
                    <li class="active"><a href="{{route('client_new_order')}}" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Create Order</a></li>
                    <li><a href="{{route('client_order')}}" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> All Order</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@endsection

@section('main-content')
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Create Order
        </h1>
       
    </section>

    <!-- Main content -->
    <section class="content">

       <div class="row">
           <div class="col-md-12">
            <form action="{{route('uploadFile')}}" method="post" autocomplete="off" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile02" multiple name="file[]" required>
                      <label class="custom-file-label" for="inputGroupFile02" id="file_name" required name="file" aria-describedby="inputGroupFileAddon02">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <button type="submit" class="input-group-text" id="inputGroupFileAddon02">Submit</b>
                    </div>
                </div>
            </form>
           </div>
       </div>

    </section><!-- /.content -->
</aside>
@endsection

@section('footer') @endsection