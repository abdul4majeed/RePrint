<?php $__env->startSection('title', 'User Dashboard'); ?>

<?php $__env->startSection('header'); ?> 
<link rel="stylesheet" href="https://afeld.github.io/emoji-css/emoji.css">
<style>
@import  url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700');
 body {
	 font-family: 'Source Sans Pro', Arial, sans-serif;
	 font-size: 18px;
	 background: #eee;
	 color: #1f2024;
}
 ul {
	 list-style-type: none;
	 margin: 0;
	 padding: 0;
}
 .rating {
	 max-width: 400px;
	 margin: 80px auto;
	 background: #fff;
	 padding: 1em;
	 border-radius: 3px;
	 box-shadow: 0px 5px 15px rgba(0, 0, 0, .10);
}
 .rating__title {
	 text-align: center;
	 font-weight: 700;
	 display: block;
}
 .rating__list {
	 max-width: 300px;
	 margin: auto;
	 display: flex;
	 justify-content: space-between;
	 padding: 1em 0;
}
 .rating__input {
	 display: none;
}
 .rating__label {
	 padding: 5px 3px;
	 font-size: 26px;
	 filter: grayscale(1);
	 opacity: 0.7;
	 cursor: pointer;
}
 .rating__label.active {
	 filter: grayscale(0);
	 opacity: 1;
	 transition: all 100ms ease;
}
 .rating__label:hover {
	 filter: grayscale(0.84);
	 transform: scale(1.1);
	 transition: 100ms ease;
}
 .feedback {
	 width: 100%;
	 display: none;
}
 .feedback textarea, .feedback input {
	 max-width: 300px;
	 width: 100%;
	 display: block;
	 margin: 0.5em auto;
	 padding: 0.5em;
	 font-family: inherit;
	 border: 1px solid #d1d2d7;
	 border-radius: 3px;
}
 .feedback textarea:focus, .feedback input:focus, .feedback textarea:active, .feedback input:active {
	 border-color: #c80000;
	 box-shadow: 0px 0px 0px 3px rgba(200, 0, 0, .2);
	 transition: 100ms;
	 outline: 0;
}
 .feedback textarea {
	 height: 100px;
}
 .feedback button {
	 margin: 1em auto;
	 display: table;
	 text-align: center;
}
 .feedback button:focus, .feedback button:active {
	 outline: 0;
}
 .cb911_logo {
	 width: 250px;
	 position: absolute;
	 top: 1em;
	 left: 50%;
	 margin-left: -125px;
}
 button {
	 color: #ecedef;
	 background-color: #9a9da8;
	 border-radius: 3px;
	 font-family: 'Source Sans Pro', Arial, sans-serif;
	 border: 0;
	 padding: 9px 15px;
	 font-size: 15px;
}
 button.not-disabled {
	 color: white;
	 background-color: #c80000;
	 text-shadow: 0px 1px 1px #620000;
	 cursor: pointer;
}
 button.not-disabled:hover {
	 background-color: #950000;
	 transition: 100ms;
}
 
</style>
<?php $__env->stopSection(); ?>

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
            Survey
        </h1>
       
    </section>

    <!-- Main content -->
    <section class="content">

       <div class="row">
           <div class="col-md-12">

            <img class="cb911_logo" src="https://chargebacks911.com/wp-content/uploads/2017/04/CB911-logo-lightbg-RGB-1.svg" />
            <form class="rating" method="POST" action="<?php echo e(route('client_process_survey')); ?>">
                <?php echo e(csrf_field()); ?>

                <h3 class="rating__title">How helpful was this?
                    <div class="rating__list">
                        <div class="rating__item"><input class="rating__input rating--1" id="rating-1-2" type="radio" value="1" name="rating" /><label class="rating__label rating--1" for="rating-1-2"><i class="em em-angry"></i></label></div>
                        <div class="rating__item"><input class="rating__input rating--2" id="rating-2-2" type="radio" value="2" name="rating" /><label class="rating__label rating--2" for="rating-2-2"><i class="em em-disappointed"></i></label></div>
                        <div class="rating__item"><input class="rating__input rating--3" id="rating-3-2" type="radio" value="3" name="rating" /><label class="rating__label rating--3" for="rating-3-2"><i class="em em-expressionless"></i></label></div>
                        <div class="rating__item"><input class="rating__input rating--4" id="rating-4-2" type="radio" value="4" name="rating" /><label class="rating__label rating--4" for="rating-4-2"><i class="em em-grinning"></i></label></div>
                        <div class="rating__item"><input class="rating__input rating--5" id="rating-5-2" type="radio" value="5" name="rating" /><label class="rating__label rating--5" for="rating-5-2"><i class="em em-star-struck"></i></label></div>
                    </div>
                </h3>
                <div class="feedback"><textarea name="feedback" placeholder="What can we do to improve?"></textarea>
                    <button class="submit">Send Your Feedback</button></div>
            </form>



           </div>
       </div>

    </section><!-- /.content -->
</aside>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$('button.submit').disabled = true;	// disable button on load

// Enable button 
function enable_submit() {
  $('button.submit').disabled = false;
  $('button.submit').addClass('not-disabled');
}

// Disable button
function disable_submit() {
    console.log('disabled rund');
  $('button.submit').disabled = true;
  $('button.submit').removeClass('not-disabled');
}

// Display feedback after rating 
$('.rating__input').on('click', function() {
  var rating = this['value'];
		$('.rating__label').removeClass('active');
  $(this).siblings('.rating__label').addClass('active');
  $('.feedback').css('display', "block");
  
  feedback_validate(rating);
  
});

// Run enable button function based on input
$('.feedback textarea').keyup(function() {
  if ($('.feedback textarea').val().split(' ').length > 1)   {
    enable_submit();
  }
  else
  {
    disable_submit();
  }
});

// Enable or disable button by validation
function feedback_validate(val) {
  if (val <= 3) {
    disable_submit();
    
  } 
  else if (val > 3) {
    enable_submit();
  }
  
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\RePrint\RePrint\resources\views/client/survey.blade.php ENDPATH**/ ?>