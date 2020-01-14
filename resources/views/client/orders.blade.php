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
                    <li><a href="{{route('client_new_order')}}" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Create Order</a></li>
                    <li class="active"><a href="{{route('client_order')}}" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> All Order</a></li>
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
            Orders
        </h1>
       
    </section>

    <!-- Main content -->
    <section class="content">

       <div class="row">
           <div class="col-md-12">
            <table class="table table-hover table-bordered table-striped table-responsive">
                <tr>
                    <th>Order Id  </th>
                    <th>Order Services  </th>
                    <th>Total Payment  </th>
                    <th>Payment Type  </th>
                    <th>Payment Status  </th>
                    <th>Order Status  </th>
                    <th></th>
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}} </td>
                    <td>{{$order->service->service_name}} - {{$order->sub_service->sub_service_name}}  </td>
                    <td>{{$order->bill}} KWD </td>
                    <td> {{$order->payment_type_relation->payment_name}} </td>
                    <td>{{$order->payment_status_relation->status}} </td>
                    <td>{{$order->order_status_relation->status}} </td>
                    @if($order->order_status_relation->id == 4)
                        @if($order->feed_back == 0)
                    <td>
                        <form action="{{route('client_survey')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$order->shop_id}}" name="shop_id">
                            <input type="hidden" value="{{$order->id}}" name="order_id">
                            <button type="submit">Start Survey</button>
                        </form>
                    </td>
                        @else
                        <td>Thansk for Survey</td>
                        @endif
                    @else
                    <td></td>
                    @endif
                </tr>
                @endforeach
              </table>
           </div>
       </div>

    </section><!-- /.content -->
</aside>
@endsection

@section('footer') @endsection