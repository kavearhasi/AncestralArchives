@extends('pages.layouts.user-template')
@section('content')
    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div>
                <ol class="breadcrumb pl-5">
                    <li class="breadcrumb-item"><a href="{{ route('pages.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('pages.user.my-blogs') }}">My blog</a></li>
                    <li class="breadcrumb-item active"><a href="#">Add Blog</a></li>
                </ol>
            </div>
            <div class="row block-9">
                <div class="col-md-10 pr-md-5">
                    <h4 class="mb-4">Fill the Blog Details Below</h4>
                    <form action="{{ route('pages.user.store-blog') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label>Blog Title <sup style="color: red">*</sup></label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="blog_title">
                        </div>
                        
                       
                        
                        <label>Blog Content <sup style="color: red">*</sup></label>
                        <div class="form-group">
                            <textarea name="blog_content" id="" cols="30" rows="50" 
                                class="form-control"></textarea>
                        </div>

                       
                        <div class="form-group">
                            <input type="hidden" name="user_id" class="form-control" value="{{ auth()->user()->id }}">
                        </div>
                        <label>Blog Banner <sup style="color: red">*</sup></label>
                        <div class="form-group">
                            <input type="file" name="blog_banner" class="form-control "
                                placeholder=" upload your  banner image" >
                        </div>
                        <label>Link for videos </label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="blog_video_link">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add " class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
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
                </div>
            </div>
        </div>
    </section>
@endsection
