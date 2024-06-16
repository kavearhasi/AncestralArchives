@extends('pages.layouts.user-template')
@section('content')
    <div class="container">
        <div>
            <ol class="breadcrumb pl-5">
                <li class="breadcrumb-item"><a href="{{ route('pages.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="#">My Blogs</a></li>
            </ol>
        </div>
        <div class="d-flex flex-row-reverse p-4 ">
            <a class="btn btn-primary m-2" href="{{ route('pages.user.add-blog') }}">Add Blog</a>
        </div>
        @if (Session::has('blogAdded'))
            <x-pages.alert alertType="success" message="{{ Session::get('blogAdded') }}"></x-pages.alert>
        @endif
        @if (Session::has('blogEdited'))
            <x-pages.alert alertType="warning" message="{{ Session::get('blogEdited') }}"></x-pages.alert>
        @endif
        @if (Session::has('blogDeleted'))
            <x-pages.alert alertType="danger" message="{{ Session::get('blogDeleted') }}"></x-pages.alert>
        @endif
        @if (!$blogs->count())
            <h1 class="text-center m-5 text-danger"> No Blogs were created</h1>
        @endif
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    @foreach ($blogs as $item)
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="blog-entry align-self-stretch">
                                <a href="#" class="block-20"
                                    style="background-image: url('{{ asset("$item->blog_banner") }}');">
                                </a>
                                <div class="text p-4 d-block">
                                    <div class="meta mb-3">
                                        <div><a href="#"><span><i class="icon-person_outline"></i>
                                                    {{ auth()->user()->name }}</span></a></div>
                                    </div>
                                    <h3 class="heading mb-4"><a href="{{route('pages.user.blog-single', ['id' => $item->id])}}">{{ $item->blog_title }}</a></h3>
                                    
                                    <p style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;
                                    line-clamp: 2;
                                    -webkit-box-orient: vertical;">{{ $item->blog_content }}</p>
                                    <div class="flex row  ">
                                        <p> <a href="{{ route('pages.user.edit-blog', ['id' => $item->id]) }}"
                                                class="p-2">Edit Blog <i class="ion-ios-arrow-forward"></i></a></p>
                                        <a href="{{ route('pages.user.destroy-blog', ['id' => $item->id]) }}">Delete Blog
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
