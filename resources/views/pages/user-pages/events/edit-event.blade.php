@extends('pages.layouts.user-template')
@section('content')
    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div>
                <ol class="breadcrumb pl-5">
                    <li class="breadcrumb-item"><a href="{{ route('pages.user.my-events') }}">My Event</a></li>
                    <li class="breadcrumb-item active"><a href="#">Edit Event </a></li>

                </ol>
            </div>
            <div class="row block-9">
                <div class="col-md-10 pr-md-5">
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <h4 class="mb-4">Edit Your Details</h4>
                    <form action="{{route('pages.user.update-event',['id'=>$event->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label>Event Name <sup style="color: red">*</sup></label>
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$event->event_name}}" name="event_name">
                        </div>
                        <label>Event Date </label>
                        <div class="form-group">
                            <input type="date" class="form-control" value="{{$event->event_date}}" name="event_date"
                                placeholder="Event  Date ">
                        </div>
                        <label>Event Time</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="hours">Hours</label>
                                        <select class="form-control" name="hour">
                                            <option selected value="{{$time[0]}}">{{$time[0]}} </option>
                                            <option value="1"> 1 </option>
                                            <option value="2"> 2 </option>
                                            <option value="3"> 3 </option>
                                            <option value="4"> 4 </option>
                                            <option value="5"> 5 </option>
                                            <option value="6"> 6 </option>
                                            <option value="7"> 7 </option>
                                            <option value="8"> 8 </option>
                                            <option value="9"> 9 </option>
                                            <option value="10"> 10 </option>
                                            <option value="11"> 11 </option>
                                            <option value="12"> 12 </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="minutes">Minutes</label>
                                        <select class="form-control" name="minutes">
                                            <option selected value="{{$time[1]}}"> {{$time[1]}}</option>
                                            <option value="00"> 00 </option>
                                            <option value="10"> 10 </option>
                                            <option value="20"> 20 </option>
                                            <option value="30"> 30 </option>
                                            <option value="40"> 40 </option>
                                            <option value="50"> 50 </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="hours">Select Meridiem</label>
                                        <select class="form-control" name="meridian">
                                            <option selected="" value="{{$time[2]}}"> {{$time[2]}}</option>
                                            <option  value="AM"> AM </option>
                                            <option value="PM"> PM </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <label>Event Description <sup style="color: red">*</sup></label>
                        <div class="form-group">
                            <textarea name="event_description" id="" cols="30" rows="7" maxlength="250" minlength="20"
                                class="form-control" >{{$event->event_description}}</textarea>
                        </div>

                        <label>Event location </label>
                        <div class="form-group">
                            <textarea name="event_location" id="" cols="30" rows="4" maxlength="50" minlength="20"
                                class="form-control"  >{{$event->event_location}}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="user_id" class="form-control" value="{{ auth()->user()->id }}">
                        </div>
                       <div class="m-2">
                            @if ($event->event_banner !== null)
                                <label> Event Banner</label><br>
                                <img src="{{ asset($event->event_banner) }}" alt="event banner"
                                    style="height: 200px;width:auto"> <br>
                            @endif
                           
                            
                            <label for="image" class="p-2">Choose Your Banner</label>
                            <input type="file" name="event_banner" id="image" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add " class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
      


        </div>
    </section>
    @endsection