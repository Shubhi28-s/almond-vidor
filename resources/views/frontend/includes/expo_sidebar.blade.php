  <style>
.logoimg img{
  z-index: 100;width: 20%;z-index: 100;height: 100%;text-align: center;margin: 7px auto;
}

.main-menu:hover .logoimg img{
  width: 80% !important;
}

.logoimg img{
  width: 100%;
}

.menu-collapsed .logoimg img{
  max-width: 20% !important;
}

.menu-expanded .logoimg img{
  max-width: 20% !important;
}
  </style>
  
  <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true" id="checKClass">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item m-auto"><a class="navbar-brand" style="margin-top:0px;">
            <span id="logo" style="color: red;">
            </span>
            <!-- <img src="https://almondvirtex.s3.ap-south-1.amazonaws.com/gpi/logo.png"  alt="Almond Virtex" style="z-index: 100;width: 85%;z-index: 100;height: 100%;text-align: center;margin: 30px auto; top:74%;position:relative;left:-17px;margin-top:29px;"> -->
          </a>
        </li>
      </ul>
    </div>


    <div class="navbar-header expanded">
      <ul class="nav navbar-nav flex-row">
        <!-- <li class="nav-item mr-auto"><a href="#" class="navbar-brand router-link-active" target="_self">
          <span class="brand-logo">
              <img src="https://almondvirtex.s3.ap-south-1.amazonaws.com/gpi/logo.png" alt="logo" class="">
            </span>
            <h2 class="brand-text"> Almond Vingage </h2>
          </a></li> -->
        <li class="nav-item nav-toggle"><a href="#" target="_self" class="nav-link logoimg ">
            <img src="https://almondvirtex.s3.ap-south-1.amazonaws.com/gpi/logo.png" alt="Almond Virtex" style="">
          </a>
        </li>
      </ul>
    </div>

    <div class="shadow-bottom"></div>
    <div class="main-menu-content mt-4">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <!-- <li class=" nav-item"><a href="#"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2">2</span></a> -->
        <!-- <ul class="menu-content">
            <li class="{{ activeClass(Route::is('frontend.user.dashboard'), 'active') }}"><a href="{{ route('frontend.user.dashboard') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Dashboard">Dashboard</span></a>
          </ul>
        </li> -->
        <li class=" navigation-header"><span></span>
        </li>
        <!-- <li class="{{ activeClass(Route::is('frontend.user.dashboard'), 'active') }}"><a href="{{ route('frontend.user.dashboard') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Dashboard">Dashboard</span></a></li>  -->
        <!-- <li class="{{ activeClass(Route::is('frontend.user.survey.index'), 'active') }}"><a href="{{ route('frontend.user.survey.index') }}"><i class="feather icon-user"></i><span class="menu-item" data-i18n="Campaign">Campaign</span></a></li>  -->
        <!-- <li class="{{ activeClass(Route::is('frontend.user.survey.submissions'), 'active') }}"><a href="{{ route('frontend.user.survey.submissions') }}"><i class="feather icon-file"></i><span class="menu-item" data-i18n="campaign Submission">Submission</span></a></li>// -->
        <li class="{{ activeClass(Route::is('frontend.user.fetch'), 'active') }}"><a href="{{ route('frontend.user.fetch') }}"><i class="feather icon-user"></i><span class="menu-item" data-i18n="Form">Campaign</span></a></li>
        <!-- <li class="{{ activeClass(Route::is('frontend.user.information'), 'active') }}"><a href="{{ route('frontend.user.information') }}"><i class="feather icon-user"></i><span class="menu-item" data-i18n="Form">SlideView</span></a></li>  -->

    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


  <script>
    $(document).ready(function() {
          if ($('body').hasClass("menu-collapsed")) {
            $('#logo').html('<img src="https://almondvirtex.s3.ap-south-1.amazonaws.com/gpi/logo.png" alt="almond">');
          } 
          else {
            $('#logo').html('<img src="https://almondvirtex.s3.ap-south-1.amazonaws.com/gpi/logo.png" alt="almond">');

          }
        }
  </script>