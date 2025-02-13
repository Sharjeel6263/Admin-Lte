@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Show Product') }}</div>
                <div class="card-body">
                    <a href="{{route('products.index')}}" class="btn btn-success mb-2">Back</a>
                    <p><strong>Name:</strong> {{$product->name}} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
