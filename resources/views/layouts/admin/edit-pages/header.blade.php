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
    @notifyCss
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>
@include('notify::components.notify')
@notifyJs
  
  
  <div id="uiBlocker" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.5); z-index:9999;">
        <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
            <img src="{{ asset('assets/loader/loading-spinner.gif') }}" alt="Loading..." style="height:150px; width:150px;"/>
        </div>
    </div>
