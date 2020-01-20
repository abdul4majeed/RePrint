<?php $__env->startSection('title','home'); ?>

<?php $__env->startSection('header'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
  
  
  
    <header class="site-navbar site-navbar-target" role="banner">
  
      <div class="container">
        <div class="row align-items-center position-relative">
  
          <div class="col-3 ">
            <div class="site-logo">
              <a href="index.html" class="font-weight-bold">RePrint</a>
            </div>
          </div>
  
          <div class="col-9  text-right">
            
  
            <span class="d-inline-block d-lg-block"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>
  
            
  
            <nav class="site-navigation text-right ml-auto d-none d-lg-none" role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto ">
                <li><a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a></li>
                <li><a href="<?php echo e(route('about')); ?>l" class="nav-link">About</a></li>
                <li><a href="<?php echo e(route('login')); ?>" class="nav-link">Login</a></li>
                <li class="active"><a href="<?php echo e(route('register')); ?>" class="nav-link">Signup</a></li>
                <li><a href="<?php echo e(route('work')); ?>" class="nav-link">Work</a></li>
                <li><a href="<?php echo e(route('journal')); ?>" class="nav-link">Journal</a></li>
                <li><a href="<?php echo e(route('contact')); ?>" class="nav-link">Contact</a></li>
              </ul>
            </nav>
          </div>
  
          
        </div>
      </div>
  
    </header>
  
  <div class="ftco-blocks-cover-1">
    <div class="site-section-cover overlay" style="background-image: url('images/hero_1.jpg')">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center">
            <h1 class="mb-4 text-white">Shops</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
  
    
<div class="site-wrap" id="home-section">
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mb-5" >
            <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card d-inline-block" style="width: 18rem;">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                  <h5 class="card-title"><?php echo e($shop->shop_name); ?></h5>
                  <p class="card-text"><?php echo e($shop->shop_city); ?>-<?php echo e($shop->shop_phone); ?>-<?php echo e($shop->shop_address); ?></p>
                  <form action="<?php echo e(route('get_shop_services')); ?>" method="post" class="d-inline-block">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="shop_id" value="<?php echo e($shop->id); ?>">
                      <input type="hidden" id="shop_name" disabled value="<?php echo e($shop->shop_name); ?>">
                      <input type="hidden" id="shop_owner_name" disabled value="<?php echo e($shop->shop_owner_name); ?>">
                      <input type="hidden" id="shop_phone" disabled value="<?php echo e($shop->shop_phone); ?>">
                      <input type="hidden" id="shop_email" disabled value="<?php echo e($shop->shop_email); ?>">
                      <input type="hidden" id="shop_address" disabled value="<?php echo e($shop->shop_address); ?>">
                      <input type="hidden" id="shop_city" disabled value="<?php echo e($shop->shop_city); ?>">
                      <button type="submit" class="btn btn-primary">Select</button>
                  </form>
                  <a class="view-details btn btn-primary">View Detail</a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
          </div>
        </div>
      </div>
    </div> <!-- END .site-section -->
    </div>

    <div class="modal" id="shop-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Shop Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="close-modal" aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <p>
                 <span>Shop Name</span>
                 <span id="modal_shop_name" class="float-right"></span>
            </p>
             <p>
                 <span>Shop Owner Name</span>
                 <span id="modal_shop_owner" class="float-right"></span>
            </p>
             <p>
                 <span>Shop Phone</span>
                 <span id="modal_shop_phone" class="float-right"></span>
            </p>
             <p>
                 <span>Shop Email</span>
                 <span id="modal_shop_email" class="float-right"></span>
            </p>
             <p>
                 <span>Shop Address</span>
                 <span id="modal_shop_address" class="float-right"></span>
            </p>
             <p>
                 <span>Shop City</span>
                 <span id="modal_shop_city" class="float-right"></span>
            </p>
            </div>
            
          </div>
        </div>
      </div>
  
        
       
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <h2 class="footer-heading mb-3">About Me</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
        </div>
        <div class="col-lg-8 ml-auto">
          <div class="row">
            <div class="col-lg-6 ml-auto">
              <h2 class="footer-heading mb-4">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="#">About Us</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Contact Us</a></li>
              </ul>
            </div>
            <div class="col-lg-6">
              <h2 class="footer-heading mb-4">Connect</h2>
              <div class="social_29128 white mb-5">
                <a href="#"><span class="icon-facebook"></span></a>  
                <a href="#"><span class="icon-instagram"></span></a>  
                <a href="#"><span class="icon-twitter"></span></a>  
               </div>
              <h2 class="footer-heading mb-4">Newsletter</h2>
              <form action="#" class="d-flex" class="subscribe">
                <input type="text" class="form-control mr-3" placeholder="Email">
                <input type="submit" value="Send" class="btn btn-primary">
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <div class="border-top pt-5">
            <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
           Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | RePrint develope <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="#" target="_blank" >OxinowTech</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          </div>
        </div>
  
      </div>
    </div>
  </footer>
  
  </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>

function OpenShopDetailModal(value)
{
    console.log();
    $('#modal_shop_name').html($($(value.target).parent().find('form')[0]).find('#shop_name').val());
    $('#modal_shop_owner').html($($(value.target).parent().find('form')[0]).find('#shop_owner_name').val());
    $('#modal_shop_phone').html($($(value.target).parent().find('form')[0]).find('#shop_phone').val());
    $('#modal_shop_email').html($($(value.target).parent().find('form')[0]).find('#shop_email').val());
    $('#modal_shop_address').html($($(value.target).parent().find('form')[0]).find('#shop_address').val());
    $('#modal_shop_city').html($($(value.target).parent().find('form')[0]).find('#shop_city').val());

    $('#shop-modal').modal('show');
}

function CloseShopDetailModal()
{
    $('#shop-modal').modal('hide');
}

$(document).on('click','.close-modal',function(){
    CloseShopDetailModal();
 });

$(document).on('click','.view-details',function(value){
    OpenShopDetailModal(value);
 });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\RePrint\RePrint\resources\views/shops.blade.php ENDPATH**/ ?>