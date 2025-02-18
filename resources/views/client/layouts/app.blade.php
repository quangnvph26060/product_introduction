<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Mirrored from en.zglpdb.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 07 Oct 2024 13:26:22 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="keywords" content="Guangdong Lipin Flooring Technology Co., Ltd">
    <meta name="description" content="Guangdong Lipin Flooring Technology Co., Ltd">
    <link rel="icon" href="{{ asset('assets/img/kaiadmin/logo-sgo.png') }}" type="image/x-icon" />
</head>

<body>
    <link rel="stylesheet" href="{{ asset('assets/client-assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client-assets/css/at.alicdn.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client-assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client-assets/css/lipin.css') }}">
    <script src="{{ asset('assets/client-assets/js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('assets/client-assets/js/at.alicdn.js') }}"></script>
    <script src="{{ asset('assets/client-assets/js/SuperSlide.2.1.1.js') }}"></script>
    <script src="{{ asset('assets/client-assets/js/slick.min.js') }}"></script>

    @include('partials.header')

    @include('partials.banner')


        @yield('content')


    @include('partials.footer')


    <script src="{{ asset('assets/client-assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/client-assets/js/jquery.countup.min.js') }}"></script>
    <script type="text/javascript">
        $('.counter').countUp();
    </script>
    <script>
        $(function() {
            var cfw = $(".cf_ic").width();
            $(".cf_c>ul>li").hover(function() {
                let cfi = $(this).index();
                $(this).addClass("on").siblings().removeClass("on");
                $(".cf_ic").css({
                    "transform": "translateX(" + -parseInt(cfw * cfi) + "px)"
                });
                $(".cf_ic>.cf_i").eq(cfi).addClass("on").siblings().removeClass("on");
            })
            $(".cf_i tr").slick({
                dots: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true
            });
        })
        $(function() {
            $(".ys_con li").hover(function() {
                $(this).addClass("cur").siblings().removeClass("cur")
            })
        })
        $(function() {
            var neww = $(".news_cc").width();
            $(".news_nav>ul>li").hover(function() {
                var nIndex = $(this).index();
                $(".news_cc").css({
                    "transform": "translateX(" + -parseInt(neww * nIndex) + "px)"
                })
                $(this).addClass("on").siblings().removeClass("on");
            })
        })
        $(function() {
            $(".gc_rc .news_div").slick({
                dots: false,
                slidesToShow: 2,
                slidesToScroll: 1,
                prevArrow: ".gc_prev",
                nextArrow: ".gc_next",
                autoplay: true,
                vertical: true
            });
            $(".par_item tr").slick({
                dots: false,
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true
            });
        })
        $(".gototop").click(function() {
            var scrollTop = document.documentElement.scrollTop || window.pageYOffset || document.body
                .scrollTop;
            if (scrollTop > 0) {
                $("html,body").animate({
                    scrollTop: 0
                }, "slow");
            }
        });
        $(function() {
            $(".plan_main>div").hover(function() {
                $(this).addClass("cur").siblings().removeClass("cur")
            })
        })
        $(".prod2 tr>td>a:first-child").each(function() {
            proatext = $(this).find('span').find('a').html();
            proaurl = $(this).find('span').find('a').attr('href');
            $(this).append("<div class='ceshigo'>" + "<a>" + "<p class='p3'>Detail &gt;</p>" + "</a>" + "</div>" +
                "<div class='beta5'>" + "</div>");
            $(this).find('.ceshigo').find('a').attr('href', proaurl)
        });
        jQuery(".prod2").slide({
            mainCell: "table tbody",
            effect: "topMarquee",
            autoPlay: true,
            vis: 3,
            interTime: 25
        });
        $(function() {
            $(".bann").slick({
                dots: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: ".ban_prev",
                nextArrow: ".ban_next",
                dotsClass: "ban_dot",
                appendDots: ".ban_dots",
                autoplay: true
            });
        })
    </script>
 @stack('scripts')
</body>

</html>
