@extends('pages.layouts.user-template')
@section('content')
    <div class="container">
        <div>
            <ol class="breadcrumb pl-5 mt-5">
                <li class="breadcrumb-item "><a href="{{ route('pages.admin.users') }}">Admin Panel</a></li>
                <li class="breadcrumb-item active"><a href="#">User Shop</a></li>
            </ol>
        </div>
        @if (!$shop->count())
            <h1 class="text-center m-5 text-danger"> No shops were created</h1>
        @else
            @if (Session::has('shopActivityDeleted'))
                <x-pages.alert alertType="danger" message="{{ Session::get('shopActivityDeleted') }}"></x-pages.alert>
            @endif
            @if (Session::has('shopSingleApproved'))
                <x-pages.alert alertType="info" message="{{ Session::get('shopSingleApproved') }}"></x-pages.alert>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> S.No </th>
                        <th>Shop Name</th>
                        <th>Info</th>
                        <th>Delete</th>
                        <th>Approval</th>
                    </tr>
                </thead>
                @php
                    $i = 1;
                @endphp
                @foreach ($shop as $item)
                    <tr>
                        <td> {{ $i++ }} </td>
                        <td>{{ $item->name }}</td>
                        <td><a href="{{ route('pages.shops-single', ['id' => $item->id]) }}"
                                class="btn btn-primary">Info</a>
                        </td>
                        <td><a href="{{ route('pages.admin.destroy-shop-activity', ['id' => $item->id]) }}"
                                class="btn btn-primary">Delete</a></td>
                        <td>
                            @if ($item->shop_approved_status == 0)
                            <a href="{{ route('pages.admin.approve-shop', ['id' => $item->id, 'status' => 1]) }}"
                                class="btn btn-primary">Approve</a>
                            @else
                            <a href="{{ route('pages.admin.approve-shop', ['id' => $item->id, 'status' => 0]) }}"
                                class="btn btn-primary">Disapprove</a>
                            @endif
                            
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
