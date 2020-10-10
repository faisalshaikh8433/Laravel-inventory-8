@extends('layouts.app')

@section('content')
<x-card class="col-md-6 p-0">
    <x-card-header>
        <h3>Edit Product</h3>
    </x-card-header>
    <x-card-body>
        <form action="{{ route('products.update', $product) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <x-label for="name" value="Name" />
                <x-input id="name" type="text" name="name" value="{{$product->name}}" />
            </div>
            <div class="form-group">
                <x-label for="rate" value="Rate" />
                <x-input id="rate" type="text" name="rate" value="{{$product->rate}}" placeholder="0.00"/>
            </div>
            <div class="form-group">
                <x-label for="cost" value="cost" />
                <x-input id="cost" type="text" name="cost" value="{{$product->cost}}" placeholder="0.00"/>
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </x-card-body>
</x-card>
@endsection