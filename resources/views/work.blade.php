@extends('master')

@section('title','home')

@section('header')
@endsection

@section('content')
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
              <li><a href="index.html" class="nav-link">Home</a></li>
              <li><a href="about.html" class="nav-link">About</a></li>
              <li class="active"><a href="work.html" class="nav-link">Work</a></li>
              <li><a href="journal.html" class="nav-link">Journal</a></li>
              <li><a href="contact.html" class="nav-link">Contact</a></li>
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
          <h1 class="mb-4 text-white">Our Works</h1>
          <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta veritatis in tenetur doloremque, maiores doloribus officia iste. Dolores.</p>
        </div>
      </div>
    </div>
  </div>
</div>




<div class="site-section">
  <div class="container">

    <div class="row mb-5">
      <div class="col-md-7 mx-auto text-center">
        <h2 class="heading-29190">Selected Projects</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="item web">
          <a href="work-single.html" class="item-wrap" data-fancybox="gal">
            <span class="icon-add"></span>
            <img class="img-fluid" src="images/img_1.jpg">
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="item web">
          <a href="work-single.html" class="item-wrap" data-fancybox="gal">
            <span class="icon-add"></span>
            <img class="img-fluid" src="images/img_2.jpg">
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="item web">
          <a href="work-single.html" class="item-wrap" data-fancybox="gal">
            <span class="icon-add"></span>
            <img class="img-fluid" src="images/img_3.jpg">
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="item web">
          <a href="work-single.html" class="item-wrap" data-fancybox="gal">
            <span class="icon-add"></span>
            <img class="img-fluid" src="images/img_4.jpg">
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="item web">
          <a href="work-single.html" class="item-wrap" data-fancybox="gal">
            <span class="icon-add"></span>
            <img class="img-fluid" src="images/img_5.jpg">
          </a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="item web">
          <a href="work-single.html" class="item-wrap" data-fancybox="gal">
            <span class="icon-add"></span>
            <img class="img-fluid" src="images/img_6.jpg">
          </a>
        </div>
      </div>

    </div>

    
  </div>
</div> <!-- END .site-section -->

<div class="site-section bg-light">
  <div class="container">

    <div class="row mb-5">
      <div class="col-md-7 mx-auto text-center">
        <h2 class="heading-29190">Testimonials</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6">
        
        <div>
          <div class="person-pic-39219 mb-4">
            <img src="images/person_1.jpg" alt="Image" class="img-fluid">
          </div>  
          
          <blockquote class="quote_39823">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas excepturi accusantium non aut perspiciatis nisi magni libero, molestias.</p>
          </blockquote>
          <p>&mdash; Chris Smith</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        
        
        <div>
          <div class="person-pic-39219 mb-4">
            <img src="images/person_2.jpg" alt="Image" class="img-fluid">
          </div>  
          <blockquote class="quote_39823">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas excepturi accusantium non aut perspiciatis nisi magni libero, molestias.</p>
          </blockquote>
          <p>&mdash; Chris Smith</p>
        </div>

      </div>
      <div class="col-lg-4 col-md-6">
        
        <div>
          <div class="person-pic-39219 mb-4">
            <img src="images/person_3.jpg" alt="Image" class="img-fluid">
          </div>  
          <blockquote class="quote_39823">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas excepturi accusantium non aut perspiciatis nisi magni libero, molestias.</p>
          </blockquote>
          <p>&mdash; Chris Smith</p>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top: 15px;">
      <div class="col-lg-4 col-md-6">
        
        <div>
          <div class="person-pic-39219 mb-4">
            <img src="images/person_1.jpg" alt="Image" class="img-fluid">
          </div>  
          
          <blockquote class="quote_39823">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas excepturi accusantium non aut perspiciatis nisi magni libero, molestias.</p>
          </blockquote>
          <p>&mdash; Chris Smith</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        
        
        <div>
          <div class="person-pic-39219 mb-4">
            <img src="images/person_2.jpg" alt="Image" class="img-fluid">
          </div>  
          <blockquote class="quote_39823">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas excepturi accusantium non aut perspiciatis nisi magni libero, molestias.</p>
          </blockquote>
          <p>&mdash; Chris Smith</p>
        </div>

      </div>
      <div class="col-lg-4 col-md-6">
        
        <div>
          <div class="person-pic-39219 mb-4">
            <img src="images/person_3.jpg" alt="Image" class="img-fluid">
          </div>  
          <blockquote class="quote_39823">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas excepturi accusantium non aut perspiciatis nisi magni libero, molestias.</p>
          </blockquote>
          <p>&mdash; Chris Smith</p>
        </div>
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
@endsection


@section('footer')
@endsection