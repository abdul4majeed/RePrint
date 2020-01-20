<?php $__env->startSection('title', 'User Dashboard'); ?>

<?php $__env->startSection('header'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('side-bar'); ?>
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(asset('reprint/ALT/img/avatar3.png')); ?>" class="img-circle" alt="User Image" />
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
                <a href="<?php echo e(route('client_dashboard')); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview d-block active">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Orders</span>
                    <i class="fa pull-right fa-angle-down"></i>
                </a>
                <ul class="treeview-menu" style="display: block;">
                    <li><a href="<?php echo e(route('client_new_order')); ?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Create Order</a></li>
                    <li class="active"><a href="<?php echo e(route('client_order')); ?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> All Order</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
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
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($order->id); ?> </td>
                    <?php if($order->sub_service != null): ?>
                    <td><?php echo e($order->service->service_name); ?> - <?php echo e($order->sub_service->sub_service_name); ?>  </td>
                    <?php else: ?>
                    <td><?php echo e($order->service->service_name); ?>   </td>
                    <?php endif; ?>
                    <td><?php echo e($order->bill); ?> KWD </td>
                    <td> <?php echo e($order->payment_type_relation->payment_name); ?> </td>
                    <td>

                        <?php if($order->payment_type == 1 ): ?>
                        <?php if($order->payment_status_relation->status == "Not Paid"): ?>
                        <form action="<?php echo e(route('set_payment_data')); ?>" method="get">
                            <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                            <input type="hidden" name="type" value="fatorah">
                            <button type="submit">Payment Page</button>
                        </form>
                        <?php else: ?>
                            <?php echo e($order->payment_status_relation->status); ?>

                        <?php endif; ?>
                    <?php elseif($order->payment_type == 2): ?>
                        <?php if($order->payment_status_relation->status == "Not Paid"): ?>
                            <form action="<?php echo e(route('set_payment_data')); ?>" method="get">
                                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                                <input type="hidden" name="type" value="tap">
                                <button type="submit">Payment Page</button>
                            </form>
                        <?php else: ?>
                            <?php echo e($order->payment_status_relation->status); ?>

                        <?php endif; ?>
                    <?php elseif($order->payment_type == 3): ?>
                        <?php echo e($order->payment_status_relation->status); ?>

                    <?php endif; ?>


                         </td>
                    <td><?php echo e($order->order_status_relation->status); ?> </td>
                    <?php if($order->order_status_relation->id == 4): ?>
                        <?php if($order->feed_back == 0): ?>
                    <td>
                        <form action="<?php echo e(route('client_survey')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" value="<?php echo e($order->shop_id); ?>" name="shop_id">
                            <input type="hidden" value="<?php echo e($order->id); ?>" name="order_id">
                            <button type="submit">Start Survey</button>
                        </form>
                    </td>
                        <?php else: ?>
                        <td>Thansk for Survey</td>
                        <?php endif; ?>
                    <?php else: ?>
                    <td></td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </table>
           </div>
       </div>

    </section><!-- /.content -->
</aside>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('client.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\RePrint\RePrint\resources\views/client/orders.blade.php ENDPATH**/ ?>