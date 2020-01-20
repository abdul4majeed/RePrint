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
                <li class="active"><a href="<?php echo e(route('login')); ?>" class="nav-link">Login</a></li>
                <li><a href="<?php echo e(route('register')); ?>" class="nav-link">Signup</a></li>
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
            <h1 class="mb-4 text-white">Select Card</h1>
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
            <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form action="<?php echo e(route('exe_fatrah')); ?>" method="post" class="d-inline-block mb-2">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="card_id" value="<?php echo e($card->PaymentMethodId); ?>">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?php echo e($card->ImageUrl); ?>" alt="<?php echo e($card->PaymentMethodEn); ?>">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo e($card->PaymentMethodEn); ?></h5>
                      <div>
                          <p class="card-text"><span>Price:</span><span><?php echo e($card->TotalAmount - $card->ServiceCharge); ?></span></p>
                          <p class="card-text"><span>Service Charges:</span><?php echo e($card->ServiceCharge); ?><span></span></p>
                          <p class="card-text"><span>Total Price:</span><span><?php echo e($card->TotalAmount); ?></span></p>
                      </div>
                      <button type="submit">Pay</button>
                    </div>
                  </div>
            </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </div>
        </div>
      </div>
    </div> <!-- END .site-section -->
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\RePrint\RePrint\resources\views/fatrah.blade.php ENDPATH**/ ?>