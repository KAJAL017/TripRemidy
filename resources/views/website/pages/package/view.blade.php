@extends('website.layouts.master')
@section('website.content')
<section class="py-10 d-flex items-center bg--2">
    <div class="container">
      <div class="row y-gap-10 items-center justify-between">
        <div class="col-auto">
          <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
            <div class="col-auto">
              <div class="">Home</div>
            </div>
            <div class="col-auto">
              <div class="">></div>
            </div>
            <div class="col-auto">
              <div class=""></div>
            </div>
            <div class="col-auto">
              <div class="">></div>
            </div>
            <div class="col-auto">
              <div class="text-dark-1">{{ $package->heading }}</div>
            </div>
          </div>
        </div>

        <div class="col-auto">
          <a href="#" class="text-14 text-blue-1 underline">All Hotel in London</a>
        </div>
      </div>
    </div>
  </section>

  <section class="pt-40">
    <div class="container">
      <div class="row y-gap-15 justify-between items-end">
        <div class="col-auto">
          <h1 class="text-30 fw-600">{{ $package->heading }}</h1>
          <div class="row x-gap-20 y-gap-20 items-center pt-10">
            <div class="col-auto">
              <div class="row x-gap-10 items-center">
                <div class="col-auto">
                  <div class="d-flex x-gap-5 items-center">
                    <i class="icon-placeholder text-16 text-light-1"></i>
                    <div class="text-15 text-light-1">{{ $package->location }}</div>
                  </div>
                </div>

                <div class="col-auto">
                  <button data-x-click="mapFilter" class="text-blue-1 text-15 underline">Show on map</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-auto">
          <div class="row x-gap-10 y-gap-10">
            <div class="col-auto">
              <button class="button px-15 py-10 -blue-1">
                <i class="icon-share mr-10"></i>
                Share
              </button>
            </div>

            <div class="col-auto">
              <button class="button px-15 py-10 -blue-1 bg-light-2">
                <i class="icon-heart mr-10"></i>
                Save
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pt-40 js-pin-container">
    <div class="container">
      <div class="row y-gap-30">
        <div class="col-lg-8">
          <div class="relative d-flex justify-center overflow-hidden js-section-slider" data-slider-cols="base-1" data-nav-prev="js-img-prev" data-nav-next="js-img-next">
            <div class="swiper-wrapper">
                @foreach ($package_images as $item)
                <div class="swiper-slide">
                    <img src="{{ asset($item->image_path) }}" alt="image" class="rounded-4 col-12 h-full object-cover">
                  </div>
                @endforeach


            </div>

            <div class="absolute h-full col-11">

              <button class="section-slider-nav -prev flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-img-prev">
                <i class="icon icon-chevron-left text-12"></i>
              </button>

              <button class="section-slider-nav -next flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-img-next">
                <i class="icon icon-chevron-right text-12"></i>
              </button>

            </div>

            <div class="absolute h-full col-12 z-2 px-20 py-20 d-flex justify-end items-end">
                @if(count($package_images) > 0)
                <a href="{{ asset($package_images[0]->image_path) }}" class="button -blue-1 px-24 py-15 bg-white text-dark-1 js-gallery" data-gallery="gallery2">
                  See All {{ count($package_images) }} Photos
                </a>

                @foreach ($package_images as $key => $item)
                  @if($key != 0)
                    <a href="{{ asset($item->image_path) }}" class="js-gallery" data-gallery="gallery2"></a>
                  @endif
                @endforeach
              @endif

              </div>

          </div>

          <h3 class="text-22 fw-500 mt-30">
            Tour snapshot
          </h3>

          <div class="row y-gap-30 justify-between pt-20">
            <div class="col-md-auto col-6">
              <div class="d-flex">
                <i class="icon-customer text-22 text-blue-1 mr-10"></i>
                <div class="text-15 lh-15">
                  Group size:<br> {{ $package->group_size }}
                </div>
              </div>
            </div>

            <div class="col-md-auto col-6">
              <div class="d-flex">
                <i class="icon-route text-22 text-blue-1 mr-10"></i>
                <div class="text-15 lh-15">
                  Near public<br> transportation
                </div>
              </div>
            </div>

            <div class="col-md-auto col-6">
              <div class="d-flex">
                <i class="icon-access-denied text-22 text-blue-1 mr-10"></i>
                <div class="text-15 lh-15">
                  Free cancellation <br><a href='#' class='text-blue-1 underline'>Learn more</a>
                </div>
              </div>
            </div>

          </div>

          <div class="border-top-light mt-40 mb-40"></div>

          <div class="row x-gap-40 y-gap-40">
            <div class="col-12">
              <h3 class="text-22 fw-500">Overview</h3>

              <p class="text-dark-1 text-15 mt-20">
                {!! $package->overview !!}
              </p>

              <a href="#" class="d-block text-14 text-blue-1 fw-500 underline mt-10">Show More</a>
            </div>

            <div class="col-md-6">
              <h5 class="text-16 fw-500">Available languages</h5>
              <div class="text-15 mt-10">
                @foreach(json_decode($package->languages) as $language)
                    <span class="language-badge bg-blue-1-05 text-blue-1 px-10 py-5 rounded-4 mr-5 mb-5 inline-flex items-center">
                        <i class="icon-globe mr-5 text-12"></i>
                        {{ ucfirst($language) }}
                    </span>
                @endforeach
            </div>
            </div>

            <div class="col-md-6">
              <h5 class="text-16 fw-500">Cancellation policy</h5>
              <div class="text-15 mt-10">For a full refund, cancel at least 24 hours in advance of the start date of the experience.</div>
            </div>

            <div class="col-12">
              <h5 class="text-16 fw-500">Highlights</h5>
              {!! $package->highlights !!}
            </div>
          </div>

          <div class="mt-40 border-top-light">
            <div class="row x-gap-40 y-gap-40 pt-40">
              <div class="col-12">
                <h3 class="text-22 fw-500">What's Included</h3>

                <div class="row x-gap-40 y-gap-40 pt-20">
                    {!! $package->included_items !!}
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="d-flex justify-end js-pin-content">
            <div class="w-360 lg:w-full d-flex flex-column items-center">
              <div class="px-30 py-30 rounded-4 border-light bg-white shadow-4">
                <div class="text-14 text-light-1">
                  From <span class="text-20 fw-500 text-dark-1 ml-5">₹{{ $package->price }}
                </span>
                </div>

                <div class="row y-gap-20 pt-30">
                  <div class="col-12">

                    <div class="searchMenu-date px-20 py-10 border-light rounded-4 -right js-form-dd js-calendar js-calendar-el">

                      <div data-x-dd-click="searchMenu-date">
                        <h4 class="text-15 fw-500 ls-2 lh-16">Date</h4>

                        <div class="capitalize text-15 text-light-1 ls-2 lh-16">
                          <span class="js-first-date">Wed 2 Mar</span>
                          -
                          <span class="js-last-date">Fri 11 Apr</span>
                        </div>
                      </div>


                      <div class="searchMenu-date__field shadow-2" data-x-dd="searchMenu-date" data-x-dd-toggle="-is-active">
                        <div class="bg-white px-30 py-30 rounded-4">
                          <div class="elCalendar js-calendar-el-calendar"></div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="col-12">

                    <div class="searchMenu-guests px-20 py-10 border-light rounded-4 js-form-dd js-form-counters">

                      <div data-x-dd-click="searchMenu-guests">
                        <h4 class="text-15 fw-500 ls-2 lh-16">Number of travelers</h4>

                        <div class="text-15 text-light-1 ls-2 lh-16">
                          <span class="js-count-adult">2</span> adults
                          -
                          <span class="js-count-child">1</span> childeren
                          -
                          <span class="js-count-room">1</span> room
                        </div>
                      </div>


                      <div class="searchMenu-guests__field shadow-2" data-x-dd="searchMenu-guests" data-x-dd-toggle="-is-active">
                        <div class="bg-white px-30 py-30 rounded-4">
                          <div class="row y-gap-10 justify-between items-center">
                            <div class="col-auto">
                              <div class="text-15 fw-500">Adults</div>
                            </div>

                            <div class="col-auto">
                              <div class="d-flex items-center js-counter" data-value-change=".js-count-adult">
                                <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                  <i class="icon-minus text-12"></i>
                                </button>

                                <div class="flex-center size-20 ml-15 mr-15">
                                  <div class="text-15 js-count">2</div>
                                </div>

                                <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                  <i class="icon-plus text-12"></i>
                                </button>
                              </div>
                            </div>
                          </div>

                          <div class="border-top-light mt-24 mb-24"></div>

                          <div class="row y-gap-10 justify-between items-center">
                            <div class="col-auto">
                              <div class="text-15 lh-12 fw-500">Children</div>
                              <div class="text-14 lh-12 text-light-1 mt-5">Ages 0 - 17</div>
                            </div>

                            <div class="col-auto">
                              <div class="d-flex items-center js-counter" data-value-change=".js-count-child">
                                <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                  <i class="icon-minus text-12"></i>
                                </button>

                                <div class="flex-center size-20 ml-15 mr-15">
                                  <div class="text-15 js-count">1</div>
                                </div>

                                <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                  <i class="icon-plus text-12"></i>
                                </button>
                              </div>
                            </div>
                          </div>

                          <div class="border-top-light mt-24 mb-24"></div>

                          <div class="row y-gap-10 justify-between items-center">
                            <div class="col-auto">
                              <div class="text-15 fw-500">Rooms</div>
                            </div>

                            <div class="col-auto">
                              <div class="d-flex items-center js-counter" data-value-change=".js-count-room">
                                <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down">
                                  <i class="icon-minus text-12"></i>
                                </button>

                                <div class="flex-center size-20 ml-15 mr-15">
                                  <div class="text-15 js-count">1</div>
                                </div>

                                <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up">
                                  <i class="icon-plus text-12"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="col-12">
                    <button class="button -dark-1 py-15 px-35 h-60 col-12 rounded-4 bg-blue-1 text-white">
                      Book Now
                    </button>
                  </div>
                </div>

                <div class="d-flex items-center pt-20">
                  <div class="size-40 flex-center bg-light-2 rounded-full">
                    <i class="icon-heart text-16 text-green-2"></i>
                  </div>
                  <div class="text-14 lh-16 ml-10">94% of travelers recommend this experience</div>
                </div>
              </div>

              <div class="px-30">
                <div class="text-14 text-light-1 mt-30">Not sure? You can cancel this reservation up to 24 hours in advance for a full refund.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="pt-40">
    <div class="container">
      <div class="pt-40 border-top-light">
        <div class="row x-gap-40 y-gap-40">
          <div class="col-auto">
            <h3 class="text-22 fw-500">Important information</h3>
          </div>
        </div>

        <div class="row x-gap-40 y-gap-40 justify-between pt-20">
         {!! $package->important_info !!}
        </div>
      </div>
    </div>
  </section>

  <div class="container mt-40 mb-40">
    <div class="border-top-light"></div>
  </div>

@endsection
