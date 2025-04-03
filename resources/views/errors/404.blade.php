<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kenseep executive fireworks</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <link href="{{ asset('assets/images/icon-deal.png') }}" rel="icon">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-edu-meeting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="bg-white p-0">
    @include('layouts.top-nav')

    <section class="section main-banner " id="top" data-section="section1" style="height: 20vh; background-image: url('{{ asset('assets/images/kenseep.jpg') }}');">

        <div class="video-overlay header-text text-center">
            <div class="container">
                <div class="row">
                        <div class="caption">
                            <h2 style="font-size: 30px;">Page Not found</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 20px;">

    </div>


      @include('elements.footer')

     <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


              <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/video.js') }}"></script>
    <script src="{{ asset('assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
                <script>
                    //according to loftblog tut
                    $('.nav li:first').addClass('active');

                    var showSection = function showSection(section, isAnimate) {
                        var
                            direction = section.replace(/#/, ''),
                            reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                            reqSectionPos = reqSection.offset().top - 0;

                        if (isAnimate) {
                            $('body, html').animate({
                                    scrollTop: reqSectionPos
                                },
                                800);
                        } else {
                            $('body, html').scrollTop(reqSectionPos);
                        }

                    };

                    var checkSection = function checkSection() {
                        $('.section').each(function() {
                            var
                                $this = $(this),
                                topEdge = $this.offset().top - 80,
                                bottomEdge = topEdge + $this.height(),
                                wScroll = $(window).scrollTop();
                            if (topEdge < wScroll && bottomEdge > wScroll) {
                                var
                                    currentId = $this.data('section'),
                                    reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                                reqLink.closest('li').addClass('active').
                                siblings().removeClass('active');
                            }
                        });
                    };

                    $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
                        e.preventDefault();
                        showSection($(this).attr('href'), true);
                    });

                    $(window).scroll(function() {
                        checkSection();
                    });
                </script>



</body>

</html>
