@extends('pages.layouts.main')
@section('content')
    <x-pages.banner pageTitle="Event" bannerImage="assets/images/cyprus-4519137_1920.jpg">
        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
                    href="{{ url('/home') }}">Home</a></span><span class="mr-2"><a
                    href="{{ url('/event') }}">Event</a></span></p>
    </x-pages.banner>
    <section class="ftco-section" id="event">
        <div class="container ">
            <div class="d-flex flex-row-reverse">
                <a href="#upcoming_events" class="btn btn-dark m-3 ">Upcoming Events<i
                        class="icon icon-calendar p-2"></i></a>
            </div>
            <form action="{{ route('pages.event-search') }}" method="POST">
                @csrf
                <div class="input-group w-50 my-5">
                    <input type="text" class="form-control rounded" name= "search"placeholder="yyyy-mm-dd"
                        aria-label="Search" aria-describedby="search-addon" />
                    <button class="btn btn-dark mx-2 rounded" type="submit"><span class="icon icon-search" "></span></button>
                                            <label id = "filter" class=" my-3 mx-3">Filter By : </label>
                                            <select name="filter" class="form-control ml-2 p-1" id="filter" >
                                                <option value="date" default>Date</option>
                                                <option value="name" >Name</option>
                                                <option value="location">Location</option>
                                                
                                               </select>
                                </div>
            <div class="row">
                @foreach ($events as $item)
                @if ($item->event_approved_status)
                    
               
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
                                    <div><a href="#"><span><i class="icon-person_outline"></i>
                                                {{ auth()->user()->name }}</span></a></div>
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
            <hr id="upcoming_events">
            <h1 class="text-center">Upcoming Events</h1>
            <div class="row">
                @foreach ($upcomingEvents as $item)
                @if ($item->event_approved_status)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="#" class="block-20"
                                style="background-image: url('{{ asset("$item->event_banner") }}');">
                            </a>
                            <div class="text p-4 d-block">
                                <span class="  badge badge-info">Upcoming</span>
                                <div class="meta mb-3">
                                    @if ($item->event_date == null)
                                        <div><small>Date not yet updated</small></div>
                                    @else
                                        <div><a href="#">{{ $item->event_date }}</a></div>
                                    @endif
                                    <div><a href="#"><span><i class="icon-person_outline"></i>
                                                {{ auth()->user()->name }}</span></a></div>
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
            <div class="text-center m-5">
                <a href="#event" class="btn btn-dark ">Back To Top <span class="icon icon-arrow-circle-o-up"></span></a>
            </div>
            {{-- <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
@endsection
