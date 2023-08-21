<!doctype html>
<html lang="en">

<head>
    @include('share.css')
</head>

<body>
    <div class="wrapper">
        <div class="header-wrapper">
            @include('admin.header')
            @include('admin.menu')
        </div>
        <div class="page-wrapper">
            <div class="page-content">
                @yield('noi_dung')
            </div>
        </div>

        <div class="overlay toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        @include('share.footer')
    </div>
    @include('share.color')
    @include('share.js')
    @yield('js')
</body>

</html>
