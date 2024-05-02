@extends('pages.layouts.main')
@section('content')
    <x-pages.banner pageTitle="Blog" bannerImage="assets/images/archaeological-site-2370325_1920.jpg">
        <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
                    href="{{ url('/home') }}">Home</a></span><span class="mr-2"><a
                    href="{{ url('/blog') }}">Blogs</a></span></p>
    </x-pages.banner>
    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex">
                
                @foreach ($blog as $item)
                @if ($item->blog_approved_status)
                    
               
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="#" class="block-20"
                                    style="background-image: url('{{ asset("$item->blog_banner") }}');">
                                </a>
                            <div class="text p-4 d-block">
                                <div class="meta mb-3">
                                    <div><a href="#" class="p-2">{{ $item->created_at }}</a></div>


                                </div>
                                <h3 class="heading mt-3 "><a href="{{route('pages.user.blog-single', ['id' => $item->id])}}">{{ $item->blog_title }}</a></h3>
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
