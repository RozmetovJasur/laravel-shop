@extends('layouts.main')

@section('content')
    <div class="bg-light rounded">
        <h2>Categories</h2>
        <div class="lead">
            Manage your categories here.
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm float-right">Add
                category</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-responsive table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="3" width="1%"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->getIsActiveText() }}</td>
                    <td><a href="{{ route('admin.category.edit', $category->id) }}"
                           class="btn btn-info btn-sm">Edit</a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['admin.category.destroy', $category->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm delete']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection
