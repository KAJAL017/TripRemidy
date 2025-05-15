<!DOCTYPE html>
<html lang="zxx" class="js">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta name="author" content="Softnio">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" href="{{ admin_assets() }}/images/favicon.png">
      <title>Admin || @yield('admin.title')</title>
      <link rel="stylesheet" href="{{ admin_assets() }}/assets/css/dashlitee1e3.css?ver=3.2.4">
      <link id="skin-default" rel="stylesheet" href="{{ admin_assets() }}/assets/css/themee1e3.css?ver=3.2.4">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
      @stack('admin.styles')
   </head>
   <body class="nk-body bg-lighter npc-general has-sidebar ">
      <div class="nk-app-root">
         <div class="nk-main ">
        @include('admin.partials.sidebar')
            <div class="nk-wrap ">
        @include('admin.partials.header')
              @yield('admin.content')
        @include('admin.partials.footer')
            </div>
         </div>
      </div>
      <div class="modal fade" tabindex="-1" role="dialog" id="region">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <a href="#" class="close" data-bs-dismiss="modal"><em
                  class="icon ni ni-cross-sm"></em></a>
               <div class="modal-body modal-body-md">
                  <h5 class="title mb-4">Select Your Country</h5>
                  <div class="nk-country-region">
                     <ul class="country-list text-center gy-2">
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/arg.png" alt=""
                           class="country-flag"><span class="country-name">Argentina</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/aus.png" alt=""
                           class="country-flag"><span class="country-name">Australia</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/bangladesh.png" alt=""
                           class="country-flag"><span class="country-name">Bangladesh</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/canada.png" alt=""
                           class="country-flag"><span class="country-name">Canada
                           <small>(English)</small></span></a>
                        </li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/china.png" alt=""
                           class="country-flag"><span class="country-name">Centrafricaine</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/china.png" alt=""
                           class="country-flag"><span class="country-name">China</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/french.png" alt=""
                           class="country-flag"><span class="country-name">France</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/germany.png" alt=""
                           class="country-flag"><span class="country-name">Germany</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/iran.png" alt=""
                           class="country-flag"><span class="country-name">Iran</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/italy.png" alt=""
                           class="country-flag"><span class="country-name">Italy</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/mexico.png" alt=""
                           class="country-flag"><span class="country-name">México</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/philipine.png" alt=""
                           class="country-flag"><span class="country-name">Philippines</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/portugal.png" alt=""
                           class="country-flag"><span class="country-name">Portugal</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/s-africa.png" alt=""
                           class="country-flag"><span class="country-name">South Africa</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/spanish.png" alt=""
                           class="country-flag"><span class="country-name">Spain</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/switzerland.png" alt=""
                           class="country-flag"><span class="country-name">Switzerland</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/uk.png" alt=""
                           class="country-flag"><span class="country-name">United Kingdom</span></a></li>
                        <li><a href="#" class="country-item"><img src="{{ admin_assets() }}/images/flags/english.png" alt=""
                           class="country-flag"><span class="country-name">United State</span></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script src="{{ admin_assets() }}/assets/js/bundlee1e3.js?ver=3.2.4"></script>
      <script src="{{ admin_assets() }}/assets/js/scriptse1e3.js?ver=3.2.4"></script>
      <script src="{{ admin_assets() }}/assets/js/demo-settingse1e3.js?ver=3.2.4"></script>
      <script src="{{ admin_assets() }}/assets/js/charts/chart-hotele1e3.js?ver=3.2.4"></script>
      <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
      @if(session('success'))
      <script>
          const notyf = new Notyf({
              duration: 5000,
              ripple: true,
              position: {
                  x: 'right',
                  y: 'bottom',
              },
              types: [
                  {
                      type: 'success',
                      background: '#38b2ac',
                      icon: {
                          className: 'fas fa-check-circle',
                          tagName: 'i',
                          color: 'white'
                      },
                      dismissible: true
                  }
              ],
              dismissible: true
          });

          // Modern animation with slight delay for better visibility
          setTimeout(() => {
              notyf.success({
                  message: '{{ session("success") }}',
                  className: 'modern-notyf',
                  background: '#38b2ac',
                  icon: {
                      className: 'fas fa-check-circle',
                      tagName: 'i',
                      color: 'white'
                  }
              });
          }, 300);
      </script>


      @endif

      <script>
        document.addEventListener('DOMContentLoaded', function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

      @stack('admin.scripts')
   </body>
</html>
