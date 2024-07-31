<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
    <meta name="keywords" content="DataSoft, DS ChatAPP,DS chat, messenger, conversation, social, communication" />
    <meta name="description" content="Welcome To DataSoft ChatAPP" />
    <meta name="subject" content="communication">
    <meta name="copyright" content="datasoft-bd.com">
    <meta name="author" content="Rashiqul Rony">
    <title>ChatApp </title>

    <link type="text/css" href="{{ asset('assets/webfonts/inter/inter.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    @vite(['resources/js/app.js'])
<body>
<div id="app">
    <router-view :key="$route.fullPath" ></router-view>
</div>

<script src="{{ asset('assets/vendors/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/vendors/svg-inject/svg-inject.min.js') }}"></script>
<script src="{{ asset('assets/vendors/modal-stepes/modal-steps.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
