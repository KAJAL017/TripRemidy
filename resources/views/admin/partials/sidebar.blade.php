<div class="nk-sidebar nk-sidebar-fixed is-dark" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
       <div class="nk-menu-trigger"><a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none"
          data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a><a href="#"
          class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
          data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a></div>
       <div class="nk-sidebar-brand"><a href="index.html" class="logo-link nk-sidebar-logo"><img
          class="logo-light logo-img" src="{{ url('public/logo.jpeg') }}"
          srcset="{{ url('public/logo.jpeg') }}" alt="logo"><img class="logo-dark logo-img"
          src="{{ url('public/logo.jpeg') }}" srcset="{{ url('public/logo.jpeg') }}"
          alt="logo-dark"></a></div>
    </div>
    <div class="nk-sidebar-element nk-sidebar-body">
       <div class="nk-sidebar-content">
          <div class="nk-sidebar-menu" data-simplebar>
             <ul class="nk-menu">
                <li class="nk-menu-item"><a href="{{ route('admin.dashboard') }}" class="nk-menu-link"><span
                   class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span><span
                   class="nk-menu-text">Dashboard</span></a></li>

                <li class="nk-menu-item">
                    <a href="{{ route('admin.packages.index') }}" class="nk-menu-link">
                        <span class="nk-menu-icon">
                            <em class="icon ni ni-calendar-booking-fill"></em>
                        </span>
                        <span class="nk-menu-text">Packages</span>
                   </a>
                </li>
                {{-- <li class="nk-menu-item has-sub">
                   <a href="#" class="nk-menu-link nk-menu-toggle"><span
                      class="nk-menu-icon"><em
                      class="icon ni ni-calendar-booking-fill"></em></span><span
                      class="nk-menu-text">Packages</span></a>
                   <ul class="nk-menu-sub">
                      <li class="nk-menu-item"><a href="bookings.html" class="nk-menu-link"><span
                         class="nk-menu-text">All Bookings</span></a></li>
                      <li class="nk-menu-item"><a href="booking-add.html" class="nk-menu-link"><span
                         class="nk-menu-text">Add Booking</span></a></li>
                   </ul>
                </li> --}}

                <li class="nk-menu-heading">
                   <h6 class="overline-title text-primary-alt">Return to</h6>
                </li>

             </ul>
          </div>
       </div>
    </div>
 </div>
