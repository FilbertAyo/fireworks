@extends('layouts.front-app')

@section('content')


    <section class="section main-banner " id="top" data-section="section1" style="height: 20vh; background-image: url('{{ asset('assets/images/kenseep.jpg') }}');">
        <div class="video-overlay header-text text-center">
            <div class="container">
                <div class="row">
                        <div class="caption">
                            <h2 style="font-size: 40px;">Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container-fluid bg-primary mb-5" style="padding: 20px;">

    </div>


    <div class="container-xxl ">
        <div class="container">

            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-6 col-lg-4">
                            <div class=" rounded p-3" style="background-color: rgba(185, 0, 0, 0.3);">
                                <div class="d-flex align-items-center bg-white rounded p-3"
                                  >
                                    <div class="icon me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <span>Ubungo External, Dar es salaam, TZ</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="rounded p-3" style="background-color: rgba(185, 0, 0, 0.3);">
                                <div class="d-flex align-items-center bg-white rounded p-3">
                                    <div class="icon me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-envelope-open text-primary"></i>
                                    </div>
                                    <span>kenseepexecutivefireworks@gmail.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="rounded p-3" style="background-color: rgba(185, 0, 0, 0.3);">
                                <div class="d-flex align-items-center bg-white rounded p-3">
                                    <div class="icon me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-phone-alt text-primary"></i>
                                    </div>
                                    <span>+255 673 443 706</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <iframe class="position-relative rounded w-100 h-100"
                   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d355554.22144880914!2d39.145270221339686!3d-6.817569823190105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c49379dacc0d7%3A0x789626112ec5fd97!2sExternal%20Bus%20Stop!5e1!3m2!1sen!2stz!4v1737907905948!5m2!1sen!2stz"
                        frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>

           @endsection
