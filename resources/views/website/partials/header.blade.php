<header data-add-bg="bg-dark-1" class="header  is-sticky bg-dark-1" data-x="header" data-x-toggle="is-menu-opened">
    <div data-anim="fade" class="header__container container">
      <div class="row justify-between items-center">

        <div class="col-auto">
          <div class="d-flex items-center">
            <div class="mr-20">
              <button class="d-flex items-center icon-menu text-white text-20" data-x-click="desktopMenu"></button>
            </div>

            <a href="index.html" class="header-logo mr-30" data-x="header-logo" data-x-toggle="is-logo-dark">
              <img src="{{ url('public/logo.jpeg') }}" alt="logo icon">
              <img src="{{ url('public/logo.jpeg') }}" alt="logo icon">
            </a>

            <div class="relative xl:d-none">
              <div class="searchMenu-loc js-form-dd js-liverSearch">
                <div class="d-flex items-center" data-x-dd-click="searchMenu-loc">
                  <i class="text-20 icon-search text-white mr-15"></i>

                  <div class="text-15 text-white ls-2 lh-16">
                    <input autocomplete="off" type="search" placeholder="Destination, attraction, hotel, etc" class="text-white js-search js-dd-focus" />
                  </div>
                </div>

                <div class="searchMenu-loc__field shadow-2 js-popup-window" data-x-dd="searchMenu-loc" data-x-dd-toggle="-is-active">
                  <div class="bg-white px-30 py-30 sm:px-0 sm:py-15 rounded-4">
                    <div class="y-gap-5 js-results">

                      <div>
                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                          <div class="d-flex">
                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                            <div class="ml-10">
                              <div class="text-15 lh-12 fw-500 js-search-option-target">London</div>
                              <div class="text-14 lh-12 text-light-1 mt-5">Greater London, United Kingdom</div>
                            </div>
                          </div>
                        </button>
                      </div>

                      <div>
                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                          <div class="d-flex">
                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                            <div class="ml-10">
                              <div class="text-15 lh-12 fw-500 js-search-option-target">New York</div>
                              <div class="text-14 lh-12 text-light-1 mt-5">New York State, United States</div>
                            </div>
                          </div>
                        </button>
                      </div>

                      <div>
                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                          <div class="d-flex">
                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                            <div class="ml-10">
                              <div class="text-15 lh-12 fw-500 js-search-option-target">Paris</div>
                              <div class="text-14 lh-12 text-light-1 mt-5">France</div>
                            </div>
                          </div>
                        </button>
                      </div>

                      <div>
                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                          <div class="d-flex">
                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                            <div class="ml-10">
                              <div class="text-15 lh-12 fw-500 js-search-option-target">Madrid</div>
                              <div class="text-14 lh-12 text-light-1 mt-5">Spain</div>
                            </div>
                          </div>
                        </button>
                      </div>

                      <div>
                        <button class="-link d-block col-12 text-left rounded-4 px-20 py-15 js-search-option">
                          <div class="d-flex">
                            <div class="icon-location-2 text-light-1 text-20 pt-4"></div>
                            <div class="ml-10">
                              <div class="text-15 lh-12 fw-500 js-search-option-target">Santorini</div>
                              <div class="text-14 lh-12 text-light-1 mt-5">Greece</div>
                            </div>
                          </div>
                        </button>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="desktopMenu js-desktopMenu" data-x="desktopMenu" data-x-toggle="is-menu-active">
              <div class="desktopMenu-overlay"></div>

              <div class="desktopMenu__content">
                <div class="mobile-bg js-mobile-bg"></div>

                <div class="px-30 py-20 sm:px-20 sm:py-10 border-bottom-light">
                  <div class="row justify-between items-center">
                    <div class="col-auto">
                      <div class="text-20 fw-500">Main Menu</div>
                    </div>

                    <div class="col-auto">
                      <button class="icon-close text-15" data-x-click="desktopMenu"></button>
                    </div>
                  </div>
                </div>

                <div class="h-full px-30 py-30 sm:px-0 sm:py-10">
                  <div class="menu js-navList">
                    <ul class="menu__nav  -is-active">

                      <li class="menu-item-has-children">
                        <a data-barba href="#">
                          <span class="mr-10">Home</span>
                          <i class="icon icon-chevron-sm-down"></i>
                        </a>


                        <ul class="subnav">
                          <li class="subnav__backBtn js-nav-list-back">
                            <a href="#"><i class="icon icon-chevron-sm-down"></i> Home</a>
                          </li>

                          <li><a href="index.html">Home 1</a></li>

                          <li><a href="home-2.html">Home 2</a></li>

                          <li><a href="home-3.html">Home 3</a></li>

                          <li><a href="home-4.html">Home 4</a></li>

                          <li><a href="home-5.html">Home 5</a></li>

                          <li><a href="home-6.html">Home 6</a></li>

                          <li><a href="home-7.html">Home 7</a></li>

                          <li><a href="home-8.html">Home 8</a></li>

                          <li><a href="home-9.html">Home 9</a></li>

                          <li><a href="home-10.html">Home 10</a></li>

                        </ul>

                      </li>


                      <li class="menu-item-has-children -has-mega-menu">
                        <a data-barba href="#">
                          <span class="mr-10">Categories</span>
                          <i class="icon icon-chevron-sm-down"></i>
                        </a>

                        <ul class="subnav mega-mobile">
                          <li class="subnav__backBtn js-nav-list-back">
                            <a href="#"><i class="icon icon-chevron-sm-down"></i> Category</a>
                          </li>

                          <li class="menu-item-has-children">
                            <a data-barba href="#">
                              <span class="mr-10">Hotel</span>
                              <i class="icon icon-chevron-sm-down"></i>
                            </a>

                            <ul class="subnav">
                              <li class="subnav__backBtn js-nav-list-back">
                                <a href="#"><i class="icon icon-chevron-sm-down"></i> Hotel</a>
                              </li>


                              <li><a href="hotel-list-1.html">Hotel List v1</a></li>

                              <li><a href="hotel-list-2.html">Hotel List v2</a></li>

                              <li><a href="hotel-single-1.html">Hotel Single v1</a></li>

                              <li><a href="hotel-single-2.html">Hotel Single v2</a></li>

                              <li><a href="booking-pages.html">Booking Page</a></li>

                            </ul>
                          </li>

                          <li class="menu-item-has-children">
                            <a data-barba href="#">
                              <span class="mr-10">Tour</span>
                              <i class="icon icon-chevron-sm-down"></i>
                            </a>

                            <ul class="subnav">
                              <li class="subnav__backBtn js-nav-list-back">
                                <a href="#"><i class="icon icon-chevron-sm-down"></i> Tour</a>
                              </li>

                              <li><a href="tour-list-1.html">Tour List v1</a></li>

                              <li><a href="tour-grid-1.html">Tour List v2</a></li>

                              <li><a href="tour-map.html">Tour Map</a></li>

                              <li><a href="tour-single.html">Tour Single</a></li>

                            </ul>
                          </li>

                          <li class="menu-item-has-children">
                            <a data-barba href="#">
                              <span class="mr-10">Activity</span>
                              <i class="icon icon-chevron-sm-down"></i>
                            </a>

                            <ul class="subnav">
                              <li class="subnav__backBtn js-nav-list-back">
                                <a href="#"><i class="icon icon-chevron-sm-down"></i> Activity</a>
                              </li>

                              <li><a href="activity-list-1.html">Activity List v1</a></li>

                              <li><a href="activity-grid-1.html">Activity List v2</a></li>

                              <li><a href="activity-map.html">Activity Map</a></li>

                              <li><a href="activity-single.html">Activity Single</a></li>

                            </ul>
                          </li>

                          <li class="menu-item-has-children">
                            <a data-barba href="#">
                              <span class="mr-10">Rental</span>
                              <i class="icon icon-chevron-sm-down"></i>
                            </a>

                            <ul class="subnav">
                              <li class="subnav__backBtn js-nav-list-back">
                                <a href="#"><i class="icon icon-chevron-sm-down"></i> Rental</a>
                              </li>

                              <li><a href="rental-list-1.html">Rental List v1</a></li>

                              <li><a href="rental-grid-1.html">Rental List v2</a></li>

                              <li><a href="rental-map.html">Rental Map</a></li>

                              <li><a href="rental-single.html">Rental Single</a></li>

                            </ul>
                          </li>

                          <li class="menu-item-has-children">
                            <a data-barba href="#">
                              <span class="mr-10">Car</span>
                              <i class="icon icon-chevron-sm-down"></i>
                            </a>

                            <ul class="subnav">
                              <li class="subnav__backBtn js-nav-list-back">
                                <a href="#"><i class="icon icon-chevron-sm-down"></i> Car</a>
                              </li>

                              <li><a href="car-list-1.html">Car List v1</a></li>

                              <li><a href="car-grid-1.html">Car List v2</a></li>

                              <li><a href="car-map.html">Car Map</a></li>

                              <li><a href="car-single.html">Car Single</a></li>

                            </ul>
                          </li>

                          <li class="menu-item-has-children">
                            <a data-barba href="#">
                              <span class="mr-10">Cruise</span>
                              <i class="icon icon-chevron-sm-down"></i>
                            </a>

                            <ul class="subnav">
                              <li class="subnav__backBtn js-nav-list-back">
                                <a href="#"><i class="icon icon-chevron-sm-down"></i> Cruise</a>
                              </li>

                              <li><a href="cruise-list-1.html">Cruise List v1</a></li>

                              <li><a href="cruise-grid-1.html">Cruise List v2</a></li>

                              <li><a href="cruise-map.html">Cruise Map</a></li>

                              <li><a href="cruise-single.html">Cruise Single</a></li>

                            </ul>
                          </li>

                          <li class="menu-item-has-children">
                            <a data-barba href="#">
                              <span class="mr-10">Flights</span>
                              <i class="icon icon-chevron-sm-down"></i>
                            </a>

                            <ul class="subnav">
                              <li class="subnav__backBtn js-nav-list-back">
                                <a href="#"><i class="icon icon-chevron-sm-down"></i> Flights</a>
                              </li>

                              <li><a href="flights-list.html">Flights List v1</a></li>

                            </ul>
                          </li>
                        </ul>
                      </li>

                      <li>
                        <a href="destinations.html">
                          Destinations
                        </a>
                      </li>


                      <li class="menu-item-has-children">
                        <a data-barba href="#">
                          <span class="mr-10">Blog</span>
                          <i class="icon icon-chevron-sm-down"></i>
                        </a>


                        <ul class="subnav">
                          <li class="subnav__backBtn js-nav-list-back">
                            <a href="#"><i class="icon icon-chevron-sm-down"></i> Blog</a>
                          </li>

                          <li><a href="blog-list-1.html">Blog list v1</a></li>

                          <li><a href="blog-list-2.html">Blog list v2</a></li>

                          <li><a href="blog-single.html">Blog single</a></li>

                        </ul>

                      </li>


                      <li class="menu-item-has-children">
                        <a data-barba href="#">
                          <span class="mr-10">Pages</span>
                          <i class="icon icon-chevron-sm-down"></i>
                        </a>


                        <ul class="subnav">
                          <li class="subnav__backBtn js-nav-list-back">
                            <a href="#"><i class="icon icon-chevron-sm-down"></i> Pages</a>
                          </li>

                          <li><a href="404.html">404</a></li>

                          <li><a href="about.html">About</a></li>

                          <li><a href="become-expert.html">Become expert</a></li>

                          <li><a href="help-center.html">Help center</a></li>

                          <li><a href="login.html">Login</a></li>

                          <li><a href="signup.html">Register</a></li>

                          <li><a href="terms.html">Terms</a></li>

                          <li><a href="invoice.html">Invoice</a></li>

                          <li><a href="ui-elements.html">UI elements</a></li>

                        </ul>

                      </li>


                      <li class="menu-item-has-children">
                        <a data-barba href="#">
                          <span class="mr-10">Dashboard</span>
                          <i class="icon icon-chevron-sm-down"></i>
                        </a>


                        <ul class="subnav">
                          <li class="subnav__backBtn js-nav-list-back">
                            <a href="#"><i class="icon icon-chevron-sm-down"></i> Dashboard</a>
                          </li>

                          <li><a href="db-dashboard.html">Dashboard</a></li>

                          <li><a href="db-booking.html">Booking</a></li>

                          <li><a href="db-settings.html">Settings</a></li>

                          <li><a href="db-wishlist.html">Wishlist</a></li>

                          <li><a href="db-vendor-dashboard.html">Vendor dashboard</a></li>

                          <li><a href="db-vendor-add-hotel.html">Vendor add hotel</a></li>

                          <li><a href="db-vendor-booking.html">Vendor booking</a></li>

                          <li><a href="db-vendor-hotels.html">Vendor hotels</a></li>

                          <li><a href="db-vendor-recovery.html">Vendor recovery</a></li>

                        </ul>

                      </li>


                      <li>
                        <a href="{{ route('contact') }}">Contact</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>


        <div class="col-auto">
          <div class="d-flex items-center">

            <div class="row x-gap-20 items-center xxl:d-none">



            <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
              <a href="{{ route('contact') }}" class="button px-30 fw-400 text-14 -blue-1 bg-white h-50 text-dark-1">Contact Us</a>
              {{-- <a href="signup.html" class="button px-30 fw-400 text-14 border-white -blue-1 h-50 text-white ml-20">Sign In / Register</a> --}}
            </div>
          </div>
        </div>

      </div>
    </div>
  </header>
