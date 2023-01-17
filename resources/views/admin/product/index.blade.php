@extends('layouts.main')

@section('content')
    <div class="bg-light rounded">
        <h2>Products</h2>
        <div class="lead">
            Manage your products here.
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-sm float-right">Add
                product</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-responsive table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">@lang('app.name')</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="3" width="1%"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        <img width="50" height="50" src="{{ $product->getFirstFile() ? asset($product->getFirstFile()->path()) : "-" }}"/>
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->status }}</td>
                    <td><a href="{{ route('admin.product.edit', $product->id) }}"
                           class="btn btn-info btn-sm">Edit</a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['admin.category.destroy', $product->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm delete']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
@endsection
