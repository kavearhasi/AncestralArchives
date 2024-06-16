@extends('pages.layouts.main')
@section('content')
    <x-pages.banner pageTitle="Shops" bannerImage="assets/images/koyasan-6207617_1920.jpg">
        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
                    href="{{ url('/home') }}">Home</a></span><span class="mr-2"><a
                    href="{{ url('/blog') }}">shops</a></span></p>
    </x-pages.banner>
    <section class="ftco-section bg-light">
        <div class="container">
            <form action="{{ route('pages.shop-search') }}" method="POST">
                @csrf
                <div class="input-group w-50 my-5">
                    <input type="text" class="form-control rounded" name= "search"placeholder="Search"
                        aria-label="Search" aria-describedby="search-addon" />
                    <button class="btn btn-dark mx-2 rounded" type="submit"><span class="icon icon-search" "></span></button>
                                            <label id = "filter" class=" my-3 mx-3">Filter By : </label>
                                            <select name="filter" class="form-control ml-2 p-1" id="filter" >
                                                <option value="product&shop" default>Product & Shop</option>
                                                <option value="product">Product</option>
                                                <option value="shop">Shop</option>
                                                <option value="location">Location</option>
                                               </select>
                                </div>
                            </form>
                                <div class="row" id="products">
                        @if ( $allProducts != null)
                        
                            @foreach ($allProducts as $item)
                           
                              @if ( !in_array( $item->shop_id, $shopDisapproved ))
                                  
                             
                               
                           
                                <div class="col-md-4 ftco-animate">
                                    <div class="cause-entry">
                                        <a href="#" class="img"
                                            style="background-image: url('{{ asset($item->product_image) }}');"></a>
                                        <div class="text p-3 p-md-4">
                                            <h3><a href="#">{{ $item->product_name }}</a></h3>
                                            <p>{{ $item->product_description }}</p>
                                            <strong> $ {{ $item->price }} {{ $item->quantity }}</strong> <br>
                                            <a href="{{ route('pages.shops-single', ['id' => $item->shop_id]) }}"
                                                class="btn btn-primary">Visit Shop</a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                </div>
                <hr>
                <h1 class="text-center">Our Shops</h1>
                @if ($allShops != null)
               
                                
                    @foreach ($allShops as $item)
                    @if ( !in_array( $item->id, $shopDisapproved ))
                   
                        <div class="card m-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">{{ $item->description }}</p>
                                <a href="{{ route('pages.shops-single', ['id' => $item->id]) }}"
                                    class="btn btn-dark">View</a>
                            </div>
                        </div>

                      @endif
                        
                    @endforeach
                @endif
        </div>
    </section>
@endsection
