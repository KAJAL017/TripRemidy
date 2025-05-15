<!DOCTYPE html>
<html lang="zxx" class="js">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" href="{{ admin_assets() }}/images/favicon.png">
      <title>Login | TripRemidy</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="{{ admin_assets() }}/assets/css/dashlitee1e3.css?ver=3.2.4">
      <link id="skin-default" rel="stylesheet" href="{{ admin_assets() }}/assets/css/themee1e3.css?ver=3.2.4">
   </head>
   <body class="nk-body bg-dark npc-general pg-auth">
      <div class="nk-app-root">
         <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
               <div class="nk-content ">
                  <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                     <div class="brand-logo pb-4 text-center">
                        {{-- <a href="{{ admin_assets() }}/index.html" class="logo-link"><img
                           class="logo-light logo-img logo-img-lg" src="{{ admin_assets() }}/images/logo.png"
                           srcset="{{ admin_assets() }}/images/logo2x.png" alt="logo"><img
                           class="logo-dark logo-img logo-img-lg" src="{{ admin_assets() }}/images/logo-dark.png"
                           srcset="{{ admin_assets() }}/images/logo-dark.png 2x" alt="logo-dark"></a> --}}
                     </div>
                     <div class="card card-bordered" style="border: none; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div class="card-inner card-inner-lg" style="padding: 40px;">
                           <div class="nk-block-head" >
                              <div class="nk-block-head-content">
                                 <h4 class="nk-block-title" style="font-size: 28px; font-weight: 700; color: #2a2a2a; margin-bottom: 10px; position: relative; display: inline-block;">
                                    Login
                                    <span style="position: absolute; bottom: -5px; left: 0; width: 50px; height: 3px; background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%); border-radius: 3px;"></span>
                                 </h4>
                                 <div class="nk-block-des">
                                    <p style="color: #7a7a7a; font-size: 15px;">Access the Admin panel using your email and passcode.</p>
                                 </div>
                              </div>
                           </div>
                           <form id="loginForm">
                              <div class="form-group" style="margin-bottom: 25px; position: relative;">
                                 <div class="form-control-wrap">
                                    <input
                                       type="email"
                                       class="form-control form-control-lg"
                                       id="email"
                                       placeholder="Enter your email"
                                       style="
                                       height: 52px;
                                       border: 1px solid #e6e6e6;
                                       border-radius: 8px;
                                       padding-left: 15px;
                                       font-size: 15px;
                                       transition: all 0.3s ease;
                                       box-shadow: none;
                                       "
                                       onfocus="this.style.borderColor='#2575fc'; this.parentElement.querySelector('.input-icon').style.color='#2575fc'"
                                       onblur="this.style.borderColor='#e6e6e6'; this.parentElement.querySelector('.input-icon').style.color='#a0a0a0'"
                                       >
                                    <span class="input-icon" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #a0a0a0; transition: color 0.3s ease;">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                          <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                          <polyline points="22,6 12,13 2,6"></polyline>
                                       </svg>
                                    </span>
                                 </div>
                              </div>
                              <div class="form-group" style="margin-bottom: 25px; position: relative;">
                                 <div class="form-control-wrap">
                                    <input
                                       type="password"
                                       class="form-control form-control-lg"
                                       id="password"
                                       placeholder="Enter your passcode"
                                       style="
                                       height: 52px;
                                       border: 1px solid #e6e6e6;
                                       border-radius: 8px;
                                       padding-left: 15px;
                                       font-size: 15px;
                                       transition: all 0.3s ease;
                                       box-shadow: none;
                                       padding-right: 45px;
                                       "
                                       onfocus="this.style.borderColor='#2575fc'"
                                       onblur="this.style.borderColor='#e6e6e6'"
                                       >
                                    <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #a0a0a0; transition: color 0.3s ease;">
                                    <em class="passcode-icon icon-show icon ni ni-eye" style="display: none;"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off" style="display: inline-block;"></em>
                                    </a>
                                 </div>
                              </div>
                              <div class="form-group" style="margin-top: 35px;">
                                 <button
                                    class="btn btn-lg btn-primary btn-block"
                                    style="
                                    height: 52px;
                                    border: none;
                                    border-radius: 8px;
                                    background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
                                    color: white;
                                    font-weight: 600;
                                    font-size: 15px;
                                    cursor: pointer;
                                    transition: all 0.3s ease;
                                    box-shadow: 0 4px 15px rgba(37, 117, 252, 0.3);
                                    position: relative;
                                    overflow: hidden;
                                    "
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(37, 117, 252, 0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(37, 117, 252, 0.3)'"
                                    >
                                 <span style="position: relative; z-index: 2;" id="btnText">Sign in</span>
                                 <span style="
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                    background: linear-gradient(90deg, #2575fc 0%, #6a11cb 100%);
                                    opacity: 0;
                                    transition: opacity 0.3s ease;
                                    z-index: 1;
                                    "></span>
                                 </button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="{{ admin_assets() }}/assets/js/bundlee1e3.js?ver=3.2.4"></script>
      <script src="{{ admin_assets() }}/assets/js/scriptse1e3.js?ver=3.2.4"></script>
      <script src="{{ admin_assets() }}/assets/js/demo-settingse1e3.js?ver=3.2.4"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


      <script>
        document.querySelector('.passcode-switch').addEventListener('click', function(e) {
          e.preventDefault();
          const target = document.getElementById(this.getAttribute('data-target'));
          const iconShow = this.querySelector('.icon-show');
          const iconHide = this.querySelector('.icon-hide');

          if (target.type === 'password') {
            target.type = 'text';
            iconShow.style.display = 'inline-block';
            iconHide.style.display = 'none';
            this.style.color = '#2575fc';
          } else {
            target.type = 'password';
            iconShow.style.display = 'none';
            iconHide.style.display = 'inline-block';
            this.style.color = '#a0a0a0';
          }
        });

        document.querySelector('.btn-primary').addEventListener('mouseover', function() {
          this.querySelector('span:last-child').style.opacity = '1';
        });

        document.querySelector('.btn-primary').addEventListener('mouseout', function() {
          this.querySelector('span:last-child').style.opacity = '0';
        });

        document.querySelector('.card').addEventListener('mouseover', function() {
          this.style.transform = 'translateY(-5px)';
          this.style.boxShadow = '0 15px 40px rgba(0, 0, 0, 0.12)';
        });

        document.querySelector('.card').addEventListener('mouseout', function() {
          this.style.transform = 'translateY(0)';
          this.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.08)';
        });
     </script>
     <script>
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
     </script>
     <script>
        $('#loginForm').submit(function(e) {
           e.preventDefault();
           var formData = {
              email: $('#email').val(),
              password: $('#password').val(),
              _token: '{{ csrf_token() }}'
           };

           $('#btnText').html('<span class="spinner-border spinner-border-sm"></span> Please wait...');

           $.ajax({
              url: "{{ route('admin.login.process') }}",
              type: "POST",
              data: formData,
              success: function(response) {
                 if (response.status === true) {
                    toastr.success(response.message);
                    setTimeout(() => {
                       window.location.href = response.redirect_url;
                    }, 1500);
                 } else {
                    toastr.error(response.message);
                    $('#btnText').text('Sign in');
                 }
              },
              error: function(xhr) {
                 toastr.error("Something went wrong!");
                 $('#btnText').text('Sign in');
              }
           });
        });
     </script>
</html>
