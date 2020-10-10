@extends('layouts.app')

@section('content')
<x-card>
    <x-card-header>
        <div class="row align-items-center">
            <div class="col">
                <h3>Products</h3>
            </div>
            <div class="col text-right">
                <a class="btn btn-primary" href="{{ route('products.create') }}">Add New</a>
            </div>
        </div>
    </x-card-header>
    <x-card-body>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Rate</th>
                        <th>Cost</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->rate}}</td>
                        <td>{{$product->cost}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                                <x-form action="{{ route('products.destroy', $product->id) }}" method="DELETE"
                                    onsubmit="return confirm('Are you sure you want to delete ?')">
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </x-form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-card-body>
</x-card>
@endsection