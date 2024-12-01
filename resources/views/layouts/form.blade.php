<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ !empty($header_title) ? $header_title : '' }}</title>
    <!-- CSS -->
    <!-- Bootstrap CSS-->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ URL::to('assets/css/wizard.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/vendor/nouislider/nouislider.min.css') }}">


    <!-- Favicon -->
    <link rel="icon" href="{{ URL::to('assets/img/logo_.png') }}">
</head>

<body>

@yield('header')
@yield('content')

<!-- JS -->
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
<!-- Include other dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.0/nouislider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.2.0/wNumb.min.js"></script>
<!-- Bootstrap Bundle with Popper -->

<!-- Include your custom.js -->
<script src="{{ URL::to('assets/js/custom.js') }}"></script>

</body>

</html>
