@extends('website.layouts.master')
@section('website.content')
<div class="ratio ratio-16:9">
    <div class="map-ratio">
      <div class="map js-map-single">
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1956.784519335915!2d74.38952028990742!3d34.21651471783902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s%201st%20floor%20Dar%20Complex%2C%20Kanispora%2C%20Baramulla%20-%20193103%2C%20Jammu%20and%20Kashmir!5e1!3m2!1sen!2sin!4v1745313944377!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>

  <section>
    <div class="relative container">
      <div class="row justify-end">
        <div class="col-xl-5 col-lg-7">
          <div class="map-form px-40 pt-40 pb-50 lg:px-30 lg:py-30 md:px-24 md:py-24 bg-white rounded-4 shadow-4">
            <div class="text-22 fw-500">
              Send a message
            </div>

            <div class="row y-gap-20 pt-20">
              <div class="col-12">

                <div class="form-input ">
                  <input type="text" required>
                  <label class="lh-1 text-16 text-light-1">Full Name</label>
                </div>

              </div>
              <div class="col-12">

                <div class="form-input ">
                  <input type="text" required>
                  <label class="lh-1 text-16 text-light-1">Email</label>
                </div>

              </div>
              <div class="col-12">

                <div class="form-input ">
                  <input type="text" required>
                  <label class="lh-1 text-16 text-light-1">Subject</label>
                </div>

              </div>
              <div class="col-12">

                <div class="form-input ">
                  <textarea required rows="4"></textarea>
                  <label class="lh-1 text-16 text-light-1">Your Messages</label>
                </div>

              </div>
              <div class="col-auto">

                <a href="#" class="button px-24 h-50 -dark-1 bg-blue-1 text-white">
                  Send a Messsage <div class="icon-arrow-top-right ml-15"></div>
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="layout-pt-md layout-pb-lg">
    <div class="container">
      <div class="row x-gap-80 y-gap-20 justify-between">
        <div class="col-12">
          <div class="text-30 sm:text-24 fw-600">Contact Us</div>
        </div>

        <div class="col-lg-3">
          <div class="text-14 text-light-1">Address</div>
          <div class="text-18 fw-500 mt-10">328 Queensberry Street, North Melbourne VIC 3051, Australia.</div>
        </div>

        <div class="col-auto">
          <div class="text-14 text-light-1">Toll Free Customer Care</div>
          <div class="text-18 fw-500 mt-10">+(1) 123 456 7890</div>
        </div>

        <div class="col-auto">
          <div class="text-14 text-light-1">Need live support?</div>
          <div class="text-18 fw-500 mt-10">hi@gotrip.com</div>
        </div>

        <div class="col-auto">
          <div class="text-14 text-light-1">Follow us on social media</div>
          <div class="d-flex x-gap-20 items-center mt-10">
            <a href="#"><i class="icon-facebook text-14"></i></a>
            <a href="#"><i class="icon-twitter text-14"></i></a>
            <a href="#"><i class="icon-instagram text-14"></i></a>
            <a href="#"><i class="icon-linkedin text-14"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="layout-pt-lg layout-pb-lg bg-blue-2">
    <div class="container">
      <div class="row justify-center text-center">
        <div class="col-auto">
          <div class="sectionTitle -md">
            <h2 class="sectionTitle__title">Why Choose Us</h2>
            <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
          </div>
        </div>
      </div>

      <div class="row y-gap-40 justify-between pt-50">

        <div class="col-lg-3 col-sm-6">

          <div class="featureIcon -type-1 ">
            <div class="d-flex justify-center">
              <img src="#" data-src="{{ website_assets() }}/img/featureIcons/1/1.svg" alt="image" class="js-lazy">
            </div>

            <div class="text-center mt-30">
              <h4 class="text-18 fw-500">Best Price Guarantee</h4>
              <p class="text-15 mt-10">Get the best price on flights, hotels, and packages—guaranteed. If you find a lower rate, we’ll match it!</p>
            </div>
          </div>

        </div>

        <div class="col-lg-3 col-sm-6">

          <div class="featureIcon -type-1 ">
            <div class="d-flex justify-center">
              <img src="#" data-src="{{ website_assets() }}/img/featureIcons/1/2.svg" alt="image" class="js-lazy">
            </div>

            <div class="text-center mt-30">
              <h4 class="text-18 fw-500">Easy & Quick Booking</h4>
              <p class="text-15 mt-10">Book your flights, hotels, and packages in just a few clicks—fast, simple, and secure.</p>

            </div>
          </div>

        </div>

        <div class="col-lg-3 col-sm-6">

          <div class="featureIcon -type-1 ">
            <div class="d-flex justify-center">
              <img src="#" data-src="{{ website_assets() }}/img/featureIcons/1/3.svg" alt="image" class="js-lazy">
            </div>

            <div class="text-center mt-30">
              <h4 class="text-18 fw-500">Customer Care 24/7</h4>
              <p class="text-15 mt-10">Our customer care team is available 24/7 to assist you with any travel needs or queries—always here to help.</p>

            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

  <section class="layout-pt-md layout-pb-md bg-dark-2">
    <div class="container">
      <div class="row y-gap-30 justify-between items-center">
        <div class="col-auto">
          <div class="row y-gap-20  flex-wrap items-center">
            <div class="col-auto">
              <div class="icon-newsletter text-60 sm:text-40 text-white"></div>
            </div>

            <div class="col-auto">
              <h4 class="text-26 text-white fw-600">Your Travel Journey Starts Here</h4>
              <div class="text-white">Sign up and we'll send the best deals to you</div>
            </div>
          </div>
        </div>

        <div class="col-auto">
          <div class="single-field -w-410 d-flex x-gap-10 y-gap-20">
            <div>
              <input class="bg-white h-60" type="text" placeholder="Your Email">
            </div>

            <div>
              <button class="button -md h-60 bg-blue-1 text-white">Subscribe</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
