@extends('pages.layouts.user-template')
@section('content')
    <div class="container">
        <div>
            <ol class="breadcrumb pl-5">
                <li class="breadcrumb-item"><a href="{{ route('pages.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="#">My Events</a></li>
            </ol>
        </div>
        <div class="d-flex flex-row-reverse p-4 ">
            <a class="btn btn-primary m-2" href="{{ route('pages.user.add-events') }}">Add Events </a>
        </div>
        @if (Session::has('eventAdded'))
            <x-pages.alert alertType="success" message="{{ Session::get('eventAdded') }}"></x-pages.alert>
        @endif
        @if (Session::has('eventEdited'))
            <x-pages.alert alertType="warning" message="{{ Session::get('eventEdited') }}"></x-pages.alert>
        @endif
        @if (Session::has('eventDeleted'))
            <x-pages.alert alertType="danger" message="{{ Session::get('eventDeleted') }}"></x-pages.alert>
        @endif
        @if (!$events->count())
            <h1 class="text-center m-5 text-danger"> No events were created</h1>
        @endif
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    @foreach ($events as $item)
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
                                    <div class="flex row  ">
                                        <p><a href="{{ route('pages.user.edit-event', ['id' => $item->id]) }}"
                                                class="p-2">Edit Event <i class="ion-ios-arrow-forward"></i></a></p>
                                        <a href="{{ route('pages.user.destroy-event', ['id' => $item->id]) }}">Delete Event
                                            <i class="icon icon-remove"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
