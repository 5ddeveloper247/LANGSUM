<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Langsam</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('assets/website/img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('assets/website/img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/website/img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/website/img/apple-touch-icon-114x114.png') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/bootstrap.css') }}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/fonts/font-awesome/css/font-awesome.css') }}">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/nivo-lightbox/nivo-lightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/website/css/nivo-lightbox/default.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/lobibox@1.2.7/dist/css/lobibox.min.css" rel="stylesheet">
    <!-- Scripts
    ================================================== -->
    <script type="text/javascript" src="{{ asset('assets/website/js/jquery.1.11.1.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lemonadejs/dist/lemonade.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@lemonadejs/signature/dist/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lobibox@1.2.7/dist/js/lobibox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js" integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
         .is-invalid {
        border-color: #dc3545 !important;
        padding-right: calc(1.5em + .75rem) !important;
        background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns%3D"http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg" viewBox%3D"0 0 8 8"%3E%3Cpath fill%3D"%23dc3545" d%3D"M5.719 4l1.438-1.438-.719-.719L4 3.281 2.281 1.844 1.562 2.562 2.999 4 .562 5.438l.719.719L4 4.719l1.438 1.438.719-.719L5.281 4z"%3E%3C%2Fpath%3E%3C%2Fsvg%3E') !important;
        background-repeat: no-repeat !important;
        background-position: right calc(.375em + .1875rem) center !important;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem) !important;
    }
    </style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top" style="padding-right:20px;padding-left:20px;">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand page-scroll" href="{{url('/')}}"><img
                        src="{{ asset('assets/website/img/header-logo.png') }}" class=""
                        style="width: 100%;"></a>
                <div class="phone"><span>Call Today</span>320-123-4321</div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/#services" class="page-scroll">Services</a></li>
                    <li><a href="/#testimonials" class="page-scroll">Projects</a></li>
                    <li><a href="{{ url('inquiry') }}" class="page-scroll">Inquiry Form</a></li>
                    <li><a href="{{ url('tenant-inquiry') }}" class="page-scroll">Tenant Inquiry Form</a></li>
                    <li><a href="/#requirement" class="page-scroll">Inquiry Requirement</a></li>
                    <li><a href="/#about" class="page-scroll">About</a></li>
                    <li><a href="/#contact" class="page-scroll">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>
  
  <div id="uiBlocker" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); z-index:9999;">
        <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
            <img src="{{ asset('assets/loader/loading-spinner.gif') }}" alt="Loading..." style="height:150px; width:150px;"/>
        </div>
    </div>
