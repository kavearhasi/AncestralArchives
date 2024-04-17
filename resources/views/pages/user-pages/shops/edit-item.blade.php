@extends('pages.layouts.user-template')
@section('content')
    <div>
        <ol class="breadcrumb pl-5">
            <li class="breadcrumb-item"><a href="{{ route('pages.user.my-shops') }}">My Shops</a></li>
            <li class="breadcrumb-item active"><a href="#">Edit Item</a></li>

        </ol>
    </div>
    <div class="container">
        <div class="d-flex flex-row-reverse p-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addItem">
                Add Item
            </button>

            <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItem"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addItem">Add Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('pages.user.add-item') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="product_name"
                                        placeholder="Item Name (required)" required>
                                </div>
                                <div class="form-group">
                                    <label>Item Image</label>
                                    <input type="file" name="product_image" class="form-control "
                                        placeholder=" upload your  item image">
                                </div>
                                <div class="form-group">
                                    <textarea name="product_description" id="" cols="30" rows="7" maxlength="250" minlength="20"
                                        class="form-control" placeholder="Short description about your product (required)"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="shop_id" value="{{ $shopId }}">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="price" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="quantity" placeholder="Quantity (eg.per kg)">
                                </div>
                                <div class="modal-footer ">
                                    <div class="form-group">
                                        <input type="submit" value="Add Item" class="btn btn-primary ">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            @if (Session::has('itemsAdded'))
                <x-pages.alert alertType="success" message="{{ Session::get('itemsAdded') }}"></x-pages.alert>
            @endif
            @if (Session::has('itemsDeleted'))
                <x-pages.alert alertType="danger" message="{{ Session::get('itemsDeleted') }}"></x-pages.alert>
            @endif
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th> S.No </th>
                        <th> Name</th>
                           <th>Description</th>
                           <th>Image</th>
                           <th>Price</th>
                           <th>Quantity</th>
                        <th> Delete </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($shopItems as $item)
                        <tr>
                            <td> {{ $i++ }} </td>
                            <td> {{ $item->product_name }} </td>
                            <td> {{ $item->product_description }} </td>
                           <td><img src="{{asset("$item->product_image")}}" alt="Product Image" style="width:100px;height:100px"></td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->quantity}}</td>

                            <td>
                                <a href="{{ route('pages.user.destroy-item', ['id' => $item->id,'shopId'=>$item->shop_id]) }}"
                                    class="btn btn-danger"><span class=" p-1 icon icon-trash"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
