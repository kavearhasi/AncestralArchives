@extends('pages.layouts.main')
@section('content')
    <x-pages.banner pageTitle="" bannerImage="assets/images/building-6536320_1920.jpg">
        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
                    href="{{ url('/home') }}">Home</a></span></p>
        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">A people without the knowledge of
            their past history, origin and culture is like a tree without roots.</h1>
    </x-pages.banner>
    
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-2 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Our Motive</h2>
                </div>
            </div>
            <p>
                Our aim is to raise awareness about the importance of cultural heritage, preserve historical narratives,
                foster a sense of belonging, attract visitors, generate revenue, and support and strengthen society by
                crystallizing values and providing a sense of continuity with the past
                . Additionally, these websites often serve as platforms to showcase tangible and intangible cultural assets,
                promote tourism, and contribute to the economic development of local and regional economies
                . Ultimately, the primary goal of websites promoting heritage and culture is to highlight the significance
                of preserving and celebrating cultural heritage for current and future generations.
            </p>
        </div>
    </section>
   
   
    
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Recent from blog</h2>
                    <p></p>
                </div>
            </div>
            <div class="row d-flex">
                @php
                $recentBlog = 0;
            @endphp
                @foreach ($blog as $item) 
                @php
                    $recentBlog ++;
                @endphp
                    @if ($item->blog_approved_status && $recentBlog <6)
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="blog-entry align-self-stretch">
                                <a href="#" class="block-20"
                                    style="background-image: url('{{ asset("$item->blog_banner") }}');">
                                </a>
                                <div class="text p-4 d-block">
                                    <div class="meta mb-3">
                                        <div><a href="#" class="p-2">{{ $item->created_at }}</a></div>
                                    </div>
                                    <h3 class="heading mt-3 "><a
                                            href="{{ route('pages.user.blog-single', ['id' => $item->id]) }}">{{ $item->blog_title }}</a>
                                    </h3>
                                    <p
                                        style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;
                        line-clamp: 2;
                        -webkit-box-orient: vertical;">
                                        {{ $item->blog_content }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                   
                @endforeach
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h2 class="mb-4">Our Latest Events</h2>
                </div>
            </div>
            <div class="row">
                @php
                $recentEvent = 0;
            @endphp
                @foreach ($event as $item)
                @php
                $recentEvent ++;
            @endphp
                @if ($item->event_approved_status && $recentEvent <6)
                    
               
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="#" class="block-20"
                                style="background-image: url('{{ asset("$item->event_banner") }}');">
                            </a>
                            <div class="text p-4 d-block">
                                <div class="meta mb-3">
                                    @if ($item->event_date == null)
                                        <div><small>Date not yet updated</small></div>
                                    @else
                                        <div><a href="#">{{ $item->event_date }}</a></div>
                                    @endif
                                    
                                </div>
                                <h3 class="heading mb-4"><a href="#">{{ $item->event_name }}</a></h3>
                                @if ($item->event_time == '::AM')
                                    <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i>
                                            - </span>
                                    @else
                                    <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i>
                                            {{ $item->event_time }}</span>
                                @endif
                                @if ($item->event_location == null)
                                    <span><i class="icon-map-o"></i> Event venue not yet updated </span>
                                @else
                                    <span><i class="icon-map-o"></i> {{ $item->event_location }}</span>
                                @endif
                                </p>
                                <p>{{ $item->event_description }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    {{-- <section class="ftco-section-3 img" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row d-md-flex">
                <div class="col-md-6 d-flex ftco-animate">
                    <div class="img img-2 align-self-stretch"
                        style="background-image: url({{ asset('assets/images/bg_4.jpg') }});"></div>
                </div>
                <div class="col-md-6 volunteer pl-md-5 ftco-animate">
                    <h3 class="mb-3">Be a volunteer</h3>
                    <form action="#" class="volunter-form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-white py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
