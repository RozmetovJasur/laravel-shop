@extends('layouts.main')

@section('content')
    <div class="bg-light rounded">
        <h2>Permissions</h2>
        <div class="lead">
            Manage your permissions here.
            <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary btn-sm float-right">Add
                permissions</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-responsive table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Guard</th>
                <th scope="col" colspan="3" width="1%"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td><a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-info btn-sm">Edit</a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['admin.permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm delete']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
