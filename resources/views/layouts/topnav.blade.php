 <nav id="topnav" class="defaultscroll is-sticky">
     <div class="container relative">
         <a class="logo" href="/">
             <span class="inline-block dark:hidden">
                 @if ($siteConfigs['colored_logo']->file)
                     <img src="{{ Storage::url($siteConfigs['colored_logo']->file) }}" class="rounded-sm h-7 l-dark" alt="">
                 @else
                     <img src="{{ asset('/') }}assets/hoxia-v1/images/logo-dark.png" class="rounded-sm h-7 l-dark" alt="">
                 @endif

                 @if ($siteConfigs['white_logo']->file)
                     <img src="{{ Storage::url($siteConfigs['white_logo']->file) }}" class="rounded-sm h-7 l-light" alt="">
                 @else
                     <img src="{{ asset('/') }}assets/hoxia-v1/images/logo-light.png" class="rounded-sm h-7 l-light" alt="">
                 @endif
             </span>
             @if ($siteConfigs['white_logo']->file)
                 <img src="{{ Storage::url($siteConfigs['white_logo']->file) }}" class="rounded-sm h-7 hidden dark:inline-block" alt="">
             @else
                 <img src="{{ asset('/') }}assets/hoxia-v1/images/logo-white.png" class="rounded-sm h-7 hidden dark:inline-block" alt="">
             @endif
         </a>

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

         <div id="navigation">
             <ul class="navigation-menu justify-end nav-light">
                 <li><a href="/" class="sub-menu-item">Home</a></li>
                 <li><a href="/#services" class="sub-menu-item">Services</a></li>
                 <li><a href="/#templates" class="sub-menu-item">Templates</a></li>
                 <li><a href="/#prices" class="sub-menu-item">Prices</a></li>
                 <li><a href="/#testimonials" class="sub-menu-item">Testimonials</a></li>
                 <li><a href="/#contact_us" class="sub-menu-item">Contact Us</a></li>
                 <li><a href="/#about_us" class="sub-menu-item">About Us</a></li>
             </ul>
         </div>
     </div>
 </nav>
