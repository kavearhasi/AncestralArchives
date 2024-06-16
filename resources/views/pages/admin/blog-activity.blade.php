@extends('pages.layouts.user-template')
@section('content')
    <div class="container">
        
        <div>
            <ol class="breadcrumb pl-5 mt-5">
                <li class="breadcrumb-item "><a href="{{ route('pages.admin.users') }}">Admin Panel</a></li>
                <li class="breadcrumb-item active"><a href="#">Blog</a></li>
            </ol>
        </div>
        
       
        @if (Session::has('blogDeleted'))
            <x-pages.alert alertType="danger" message="{{ Session::get('blogDeleted') }}"></x-pages.alert>
        @endif
        @if (!$blog->count())
            <h1 class="text-center m-5 text-danger"> No Blogs were created </h1>
        @endif
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    @foreach ($blog as $item)
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
                                        @if ($item->blog_approved_status == 0)
                                        <a href="{{ route('pages.admin.approve-blog', ['id' => $item->id, 'status' => 1]) }}"
                                          class="pr-2" >Approve </a>
                                        @else
                                        <a href="{{ route('pages.admin.approve-blog', ['id' => $item->id, 'status' => 0]) }}"
                                            class="pr-2" >Disapprove</a>
                                        @endif
                                        
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
