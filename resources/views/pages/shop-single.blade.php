@extends('pages.layouts.main')
@section('content')
    @if ($shop->shop_image == null)
        <x-pages.banner pageTitle="{{ $shop->name }}" bannerImage="assets/images/koyasan-6207617_1920.jpg">
        </x-pages.banner>
    @else
        <x-pages.banner pageTitle="{{ $shop->name }}" bannerImage="{{ $shop->shop_image }}">
        </x-pages.banner>
    @endif
    <div class="container">
       
      
        <div class="staff mb-2">
            
            <marquee>To order Product contact the owners .The details are mentioned in shop Info</marquee>
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link" href="#products">products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#shop_details">Shop Info</a>
                </li>
            </ul>
        </div>
        <div class="row" id="products">
            
            @foreach ($shopItems as $item)
                <div class="col-md-4 ftco-animate">
                    <div class="cause-entry">
                        <a href="#" class="img"
                            style="background-image: url('{{ asset($item->product_image) }}');"></a>
                        <div class="text p-3 p-md-4">
                            <h3><a href="#">{{$item->product_name}}</a></h3>
                            <p>{{$item->product_description}}</p>

                            <p class="btn btn-primary"> $ {{$item->price}} {{$item->quantity}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="staff my-3 ftco-animate" id="shop_details">
            <h3 class="text-center">Shop Details</h3>
            <strong>Shop Name : {{$shop->name}} </strong>
            <hr>
            <strong>Owner Name :{{$shop->owner_name}} </strong>
            <hr>
            <strong>Mobile Number : {{$shop->mobile_number}}</strong>
            <hr>
            <strong>Email : {{$shop->email}}</strong>
            <hr>
            <strong>Address :<address>{{$shop->address}}</address> </strong>
            <hr>
            <strong>License Number:{{$shop->license_number}} </strong>
            <hr>
        </div>
    </div>
    <div class="text-center m-5">
        <a href="#products" class="btn btn-dark ">Back To Products <span class="icon icon-arrow-circle-o-up"></span></a>
    </div>
@endsection
