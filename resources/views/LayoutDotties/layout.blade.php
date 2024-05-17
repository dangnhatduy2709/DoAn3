<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hades</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet"  href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <link rel="stylesheet" href="/WebsiteDottiesShoes/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/WebsiteDottiesShoes/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/WebsiteDottiesShoes/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/WebsiteDottiesShoes/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/WebsiteDottiesShoes/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/WebsiteDottiesShoes/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/WebsiteDottiesShoes/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/WebsiteDottiesShoes/css/style.css" type="text/css">
    <link rel="stylesheet" href="/WebsiteDottiesShoes/css/Login interface.css" type="text/css">
    <!-- <link rel="stylesheet" href="/WebsiteDottiesShoes/css/Signup interface.css" type="text/css"> -->
    <link rel="icon" href="/WebsiteDottiesShoes/img/Logo-HADES.jpg">
    

</head>

<body>

@include('/LayoutDotties/header')

@yield('content')

@include('/LayoutDotties/footer')

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="/WebsiteDottiesShoes/js/jquery-3.3.1.min.js"></script>
    <script src="/WebsiteDottiesShoes/js/bootstrap.min.js"></script>
    <script src="/WebsiteDottiesShoes/js/jquery.nice-select.min.js"></script>
    <script src="/WebsiteDottiesShoes/js/jquery.nicescroll.min.js"></script>
    <script src="/WebsiteDottiesShoes/js/jquery.magnific-popup.min.js"></script>
    <script src="/WebsiteDottiesShoes/js/jquery.countdown.min.js"></script>
    <script src="/WebsiteDottiesShoes/js/jquery.slicknav.js"></script>
    <script src="/WebsiteDottiesShoes/js/mixitup.min.js"></script>
    <script src="/WebsiteDottiesShoes/js/owl.carousel.min.js"></script>
    <script src="/WebsiteDottiesShoes/js/main.js"></script>

    

</body>

</html>