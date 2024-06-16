@extends('pages.layouts.main')
@section('content')
<x-pages.banner pageTitle="Blog" bannerImage="{{$blog->blog_banner}}">
  <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a
              href="{{ url('/home') }}">Home</a></span><span class="mr-2"><a
              href="">Blog</a></span></p>
</x-pages.banner>
    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        
           <h1>{{$blog->blog_title}}</h1>
           <p>{{{$blog->blog_content}}}</p>
     <a href="{{$blog->blog_video_link}}">Video Link</a>
            </div>
            <div class="col-md-8 ftco-animate">
            <h2 class="mb-3"></h2>
         
      </div>
    </section> <!-- .section -->
    @endsection