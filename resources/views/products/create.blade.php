@extends('layouts.app')

@section('content')
<x-card class="col-md-6 p-0">
    <x-card-header>
        <h3>New Product</h3>
    </x-card-header>
    <x-card-body>
        <x-form action="{{ route('products.store') }}">
            <div class="form-group">
                <x-label for="name" value="Name" />
                <x-input id="name" type="text" name="name" value="{{ old('name') }}" />
            </div>
            <div class="form-group">
                <x-label for="rate" value="Rate" />
                <x-input id="rate" type="text" name="rate" value="{{ old('rate') }}" placeholder="0.00"/>
            </div>
            <div class="form-group">
                <x-label for="cost" value="Cost" />
                <x-input id="cost" type="text" name="cost" value="{{ old('cost') }}" placeholder="0.00"/>
            </div>
            <button class="btn btn-primary">Save</button>
        </x-form>
    </x-card-body>
</x-card>
@endsection