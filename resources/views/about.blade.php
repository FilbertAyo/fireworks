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

    <section class="section main-banner " id="top" data-section="section1" style="height: 20vh">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/course-video.mp4" type="video/mp4" />
        </video>
        <div class="video-overlay header-text text-center">

            <div class="container">
                <div class="row">
                        <div class="caption">
                            <h2 style="font-size: 40px;">About Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>



        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 20px;">

        </div>

        <section class="upcoming-meetin" id="meetings">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading mb-2 wow fadeInUp">
                            <p class="text-black text-justify my-3">Kenseep Executive Fireworks is a leading fireworks company
                                dedicated to adding sparkle and excitement to celebrations. Specializing in both the sale of
                                high-quality fireworks and professional event execution, the company ensures unforgettable
                                moments for every occasion. Whether you're planning a wedding, corporate event, festival, or
                                private celebration, Kenseep Executive Fireworks provides expertly trained specialists to
                                handle breathtaking displays with safety and precision. Committed to quality, innovation,
                                and customer satisfaction, Kenseep Executive Fireworks transforms ordinary events into
                                extraordinary memories.</p>
                        </div>

                    </div>

                    <div class="col-lg-12 wow fadeInUp">
                        <div class="row d-flex align-items-stretch">
                            <div class="col-lg-4">
                                <div class="meeting-item h-100">
                                    <div class="thumb">
                                        <div class="price">
                                            <span class="text-danger">Event Celebrations</span>
                                        </div>
                                        <a href="meeting-details.html"><img src="assets/images/wedding picture ideas, fireworks.jpeg" alt="Event Celebrations"></a>
                                    </div>
                                    <div class="down-content">
                                        <a class="text-white">Make your events unforgettable with spectacular fireworks displays for weddings, New Year’s, and more.</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="meeting-item h-100">
                                    <div class="thumb">
                                        <div class="price">
                                            <span class="text-danger">Online Fireworks Shop</span>
                                        </div>
                                        <a href="meeting-details.html"><img src="assets/images/56 First Date Ideas for Every Budget.jpeg" alt="Online Fireworks Shop"></a>
                                    </div>
                                    <div class="down-content">
                                        <a class="text-white">Buy fireworks online and have them delivered to your doorstep. Perfect for DIY celebrations. <br> <br>  </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="meeting-item h-100">
                                    <div class="thumb">
                                        <div class="price">
                                            <span class="text-primary">Special Occasions</span>
                                        </div>
                                        <a href="meeting-details.html"><img src="assets/images/Concert B&W Wallpaper.jpeg" alt="Special Occasions"></a>
                                    </div>
                                    <div class="down-content">
                                        <a class="text-white">Enhance ceremonies like baby showers, football events, and club parties with breathtaking fireworks.</a>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            </div>
        </section>


        <div class="container-xxl py-5">

                <div class="text-center mx-auto mb-5 wow fadeInUp" style="max-width: 600px;">
                    <h1 class="mb-3">Our Team</h1>
                    <p>Meet our team</p>
                </div>
                <div class="row g-4 wow fadeInUp">

                    @foreach ($users as $user)
                    <div class="col-lg-3 col-md-6" >
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/team-4.jpg" alt="">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">{{ $user->name }}</h5>
                                <small>Designation</small>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

        </div>

        @include('elements.footer')

        <!-- Back to Top -->
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
     <script>
         // Set the target date and time
         const targetDate = new Date('August 14, 2025 00:00:00').getTime();

         function animateElement(element) {
             element.classList.add("pop");
             setTimeout(() => {
                 element.classList.remove("pop");
             }, 500);
         }

         function updateCountdown() {
             const now = new Date().getTime();
             const timeRemaining = targetDate - now;

             // Calculate days, hours, minutes, and seconds
             const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
             const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
             const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
             const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

             // Get HTML elements
             const daysElement = document.getElementById('days');
             const hoursElement = document.getElementById('hours');
             const minutesElement = document.getElementById('minutes');
             const secondsElement = document.getElementById('seconds');

             // Update HTML elements with animation
             if (daysElement.textContent != days) {
                 daysElement.textContent = days;
                 animateElement(daysElement);
             }
             if (hoursElement.textContent != hours) {
                 hoursElement.textContent = hours;
                 animateElement(hoursElement);
             }
             if (minutesElement.textContent != minutes) {
                 minutesElement.textContent = minutes;
                 animateElement(minutesElement);
             }
             if (secondsElement.textContent != seconds) {
                 secondsElement.textContent = seconds;
                 animateElement(secondsElement);
             }

             // Check if the countdown is finished
             if (timeRemaining < 0) {
                 clearInterval(countdownInterval);
                 document.querySelector('.counter').innerHTML = "The event has started!";
             }
         }

         // Update countdown every second
         const countdownInterval = setInterval(updateCountdown, 1000);
     </script>

</body>

</html>


