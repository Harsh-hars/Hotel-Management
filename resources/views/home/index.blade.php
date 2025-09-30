<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css');
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        @include('home.header');
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    <section class="banner_main">
        @include('home.slider')
    </section>
    <!-- end banner -->
    <!-- about -->
    <div class="about">
        @include('home.about');
    </div>
    <!-- end about -->
    <!-- our_room -->
    <div class="our_room">
        @include('home.room', ['data' => $data])
    </div>
    <!-- end our_room -->
    <!-- gallery -->
    <div class="gallery">
        @include('home.gallery');
    </div>
    <!-- end gallery -->
    <!-- blog -->
    <div class="blog">
        @include('home.blog');
    </div>
    <!-- end blog -->
    <!--  contact -->
    <div class="contact">
        @include('home.contact');
    </div>
    <!-- end contact -->
    <!--  footer -->
    <footer>
        @include('home.footer');
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
