<!-- resources/views/hotelApiTemp/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Hotel API Temp')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

      @stack('styles')
</head>

<body>

    @include('hotelApiTemp.partials.header')

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 p-0 bg-light">
                @include('hotelApiTemp.partials.sidebar')
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>

    @include('hotelApiTemp.partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    @stack('scripts')
</body>

</html>
