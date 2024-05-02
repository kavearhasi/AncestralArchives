@extends('pages.layouts.user-template')
@section('content')
    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div>
                <ol class="breadcrumb pl-5">
                    <li class="breadcrumb-item "><a href="{{ route('pages.index') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('pages.admin.users') }}">Admin Panel</a></li>
                </ol>
            </div>
            @if (Session::has('shopActivityDeleted'))
                <x-pages.alert alertType="danger" message="{{ Session::get('shopActivityDeleted') }}"></x-pages.alert>
            @endif
            @if (Session::has('shopStatus'))
                <x-pages.alert alertType="warning" message="{{ Session::get('shopStatus') }}"></x-pages.alert>
            @endif
            @if (Session::has('blogSingleApproved'))
                <x-pages.alert alertType="warning" message="{{ Session::get('blogSingleApproved') }}"></x-pages.alert>
            @endif
            <div class="row d-flex  h-100">
                @php
                    $i = 1;
                @endphp
                @foreach ($users as $item)
                    @if ($item->name != 'admin' && $item->name != $currentUser->name)
                        <div class="col col-lg-6 mb-4 mb-lg-0">
                            <div class="card mb-3" style="border-radius: .5rem;">
                                <div class="row g-0">
                                    <div class="col-md-4 gradient-custom text-center text-white "
                                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                            alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                        <h5>{{ $item->name }}</h5>
                                        @php
                                            $userRoles = $item->getRoleNames();
                                        @endphp
                                        <span>Role :
                                            @foreach ($userRoles as $items)
                                                {{ $items }}
                                            @endforeach
                                        </span>
                                        <i class="far fa-edit mb-5"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h6> Details</h6>
                                            <hr class="mt-0 mb-4">
                                            <h6>Email</h6>
                                            <p class="text-muted">{{ $item->email }}</p>
                                            <h6> Activiy</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <a href="{{ route('pages.admin.shop-activity', ['id' => $item->id]) }}">View
                                                        Shops</a><br>
                                                    <a href="{{ route('pages.admin.blog-activity', ['id' => $item->id]) }}">View
                                                        Blogs</a><br>
                                                    @role('super-admin')
                                                    @php
                                                         $role = [];
                                                        foreach ($userRoles as $items){
                                                        $role[] =  $items ;
                                                        }
                                                    @endphp
                                                     
                                                        @if (in_array('admin', $role))
                                                       
                                                            <a
                                                                href="{{ route('pages.admin.admin-remove', ['id' => $item->id]) }}">Remove
                                                                admin  </a>
                                                        @else
                                                            <a
                                                                href="{{ route('pages.admin.admin-access', ['id' => $item->id]) }}">Make
                                                                admin  </a>
                                                        @endif
                                                    @endrole
                                                </div>
                                                <div class="col-6 mb-3">
                                                    @if (!$item->is_shop_approved)
                                                        <a href="{{ route('pages.admin.shop-approval', ['status' => true, 'id' => $item->id]) }}"
                                                            data-mdb-ripple-init>Approve
                                                            Shop</a><br>
                                                    @else
                                                        <a href="{{ route('pages.admin.shop-approval', ['status' => 0, 'id' => $item->id]) }}"
                                                            data-mdb-ripple-init>Cancel
                                                            Shop</a><br>
                                                    @endif
                                                    <a
                                                        href="{{ route('pages.admin.event-activity', ['id' => $item->id]) }}">View
                                                        Events</a><br>


                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                                <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                                <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
