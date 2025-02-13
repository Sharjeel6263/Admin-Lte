@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('products') }}</div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @can('product-create')
                    <a href="{{route('products.create')}}" class="btn btn-success mb-2">Create Product</a>
                    @endcan
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 60px">Id</th>
                                <th>Name</th>
                                <th style="width: 200px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <form action="{{route('products.destroy', $product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        @can('product-list')
                                        <a href="{{route('products.show',$product->id)}}"class="btn btn-info btn-sm">Show</a>
                                        @endcan
                                        @can('product-edit')
                                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        @endcan
                                        @can('product-delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
