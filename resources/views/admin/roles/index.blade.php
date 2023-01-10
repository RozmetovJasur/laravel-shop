@extends('layouts.main')

@section('content')
    <div class="bg-light rounded">
        <h1>Roles</h1>
        <div class="lead">
            Manage your roles here.
            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm float-right">Add role</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-responsive table-hover table-striped text-center">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col" colspan="3" width="1%"></th>
            </tr>
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('admin.roles.show', [ $role->id]) }}">Show</a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm delete']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $roles->links() !!}
        </div>

    </div>
@endsection
