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
    @vite([
        'resources/js/app.js',
        'resources/assets/webfonts/inter/inter.css',
        'resources/assets/css/app.min.css',
        'resources/assets/css/custom.css',
        'resources/assets/vendors/jquery/jquery.js',
        'resources/assets/vendors/bootstrap/bootstrap.bundle.min.js',
        'resources/assets/vendors/magnific-popup/jquery.magnific-popup.min.js',
        'resources/assets/vendors/svg-inject/svg-inject.min.js',
        'resources/assets/vendors/modal-stepes/modal-steps.min.js',
        'resources/assets/js/custom.js',
    ])

<body>
<div id="app">
    <router-view :key="$route.fullPath" ></router-view>
</div>
</body>
</html>
