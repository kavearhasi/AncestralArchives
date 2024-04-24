@extends('pages.layouts.user-template')
@section('content')
    <div class="container">
        <div>
            <ol class="breadcrumb pl-5 mt-5">
                <li class="breadcrumb-item "><a href="{{ route('pages.admin.users') }}">Admin Panel</a></li>
                <li class="breadcrumb-item active"><a href="#">User Event</a></li>
            </ol>
        </div>
        @if (!$event->count())
            <h1 class="text-center m-5 text-danger"> No events were created</h1>
        @else
            @if (Session::has('EventActivityDeleted'))
                <x-pages.alert alertType="danger" message="{{ Session::get('EventActivityDeleted') }}"></x-pages.alert>
            @endif
            <div class="row">
                @foreach ($event as $item)
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
                                    
                                    <a href="{{ route('pages.admin.destroy-event-activity', ['id' => $item->id]) }}">Delete Event
                                        <i class="icon icon-remove"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
    </div>
@endsection
