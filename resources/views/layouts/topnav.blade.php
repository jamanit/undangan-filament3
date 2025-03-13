 {{-- <nav id="topnav" class="defaultscroll is-sticky tagline-height"> --}}
 <nav id="topnav" class="defaultscroll is-sticky">
     <div class="container relative">
         <!-- Logo container-->
         <a class="logo" href="index.html">
             <span class="inline-block dark:hidden">
                 @if ($siteConfigs['colored_logo']->file)
                     <img src="{{ Storage::url($siteConfigs['colored_logo']->file) }}" class="h-7 l-dark" alt="">
                 @else
                     <img src="{{ asset('/') }}assets/hoxia-v1/images/logo-dark.png" class="h-7 l-dark" alt="">
                 @endif

                 @if ($siteConfigs['white_logo']->file)
                     <img src="{{ Storage::url($siteConfigs['white_logo']->file) }}" class="h-7 l-light" alt="">
                 @else
                     <img src="{{ asset('/') }}assets/hoxia-v1/images/logo-light.png" class="h-7 l-light" alt="">
                 @endif
             </span>
             @if ($siteConfigs['white_logo']->file)
                 <img src="{{ Storage::url($siteConfigs['white_logo']->file) }}" class="h-7 hidden dark:inline-block" alt="">
             @else
                 <img src="{{ asset('/') }}assets/hoxia-v1/images/logo-white.png" class="h-7 hidden dark:inline-block" alt="">
             @endif
         </a>
         <!-- End Logo container-->

         <!-- Start Mobile Toggle -->
         <div class="menu-extras">
             <div class="menu-item">
                 <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                     <div class="lines">
                         <span></span>
                         <span></span>
                         <span></span>
                     </div>
                 </a>
             </div>
         </div>
         <!-- End Mobile Toggle -->

         <div id="navigation">
             <!-- Navigation Menu-->
             <ul class="navigation-menu justify-end nav-light">
                 <li><a href="/" class="sub-menu-item">Home</a></li>
                 <li><a href="contact.html" class="sub-menu-item">Services</a></li>
                 <li><a href="contact.html" class="sub-menu-item">Templates</a></li>
                 <li><a href="contact.html" class="sub-menu-item">Prices</a></li>
                 <li><a href="contact.html" class="sub-menu-item">Testimonials</a></li>
                 <li><a href="contact.html" class="sub-menu-item">Contact Us</a></li>
                 <li><a href="contact.html" class="sub-menu-item">About Us</a></li>
             </ul><!--end navigation menu-->
         </div><!--end navigation-->
     </div><!--end container-->
 </nav><!--end header-->
