@extends('pages.layouts.main')
@section('content')
    <x-pages.banner pageTitle="About" bannerImage="assets/images/bg_7.jpg">
        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
                    href="{{url('/home')}}">Home</a></span><span class="mr-2"><a
                    href="{{url('/about')}}">About</a></span></p>
    </x-pages.banner>
    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 d-flex ftco-animate">
                    <div class="img img-about align-self-stretch"
                         style="background-image: url({{asset('assets/images/bg_3.jpg')}}); width: 100%;"></div>
                </div>
                <div class="col-md-6 pl-md-5 ftco-animate">
                    <h2 class="mb-4">Welcome to Welfare Stablished Since 1898</h2>
                    <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question
                        Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven
                        versalia, put her initial into the belt and made herself on the way.</p>
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                        would have been rewritten a thousand times and everything that was left from its origin would be
                        the word "and" and the Little Blind Text should turn around and return to its own, safe country.
                        But nothing the copy said could convince her and so it didn’t take long until a few insidious
                        Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their
                        agency, where they abused her for their.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-counter ftco-intro ftco-intro-2" id="section-counter">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 color-1 align-items-stretch">
                        <div class="text">
                            <span>Served Over</span>
                            <strong class="number" data-number="1432805">0</strong>
                            <span>Children in 190 countries in the world</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 color-2 align-items-stretch">
                        <div class="text">
                            <h3 class="mb-4">Donate Money</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts.</p>
                            <p><a href="#" class="btn btn-white px-3 py-2 mt-2">Donate Now</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 color-3 align-items-stretch">
                        <div class="text">
                            <h3 class="mb-4">Be a Volunteer</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts.</p>
                            <p><a href="#" class="btn btn-white px-3 py-2 mt-2">Be A Volunteer</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Latest Donations</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                        live the blind texts.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="d-flex mb-4">
                            <div class="img"
                                 style="background-image: url({{asset('assets/images/person_1.jpg')}});"></div>
                            <div class="info ml-4">
                                <h3><a href="#">Ivan Jacobson</a></h3>
                                <span class="position">Donated Just now</span>
                                <div class="text">
                                    <p>Donated <span>$300</span> for <a href="#">Children Needs Food</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="d-flex mb-4">
                            <div class="img"
                                 style="background-image: url({{asset('assets/images/person_2.jpg')}});"></div>
                            <div class="info ml-4">
                                <h3><a href="teacher-single.html">Ivan Jacobson</a></h3>
                                <span class="position">Donated Just now</span>
                                <div class="text">
                                    <p>Donated <span>$150</span> for <a href="#">Children Needs Food</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex mb-sm-4 ftco-animate">
                    <div class="staff">
                        <div class="d-flex mb-4">
                            <div class="img"
                                 style="background-image: url({{asset('assets/images/person_3.jpg')}});"></div>
                            <div class="info ml-4">
                                <h3><a href="teacher-single.html">Ivan Jacobson</a></h3>
                                <span class="position">Donated Just now</span>
                                <div class="text">
                                    <p>Donated <span>$250</span> for <a href="#">Children Needs Food</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection