@extends('backEnd.dashboard')

@section('title_page')
    Roles
@endsection
@section('table')
    / show Users
@endsection
@section('content')
    <div class="py-5 con-table container">

        <div class="big_div mb-4">
            <div class="table_name">
                <h2>Table Name</h2>
                <h5 class="text-danger">Users</h5>
            </div>

            @can('operate-users')
                <a href="{{ route('users.create') }}" class="btn add_section">
                    Add +
                </a>
            @endcan

        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="display" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    @can('operate-users')
                        <th width="280px">Action</th>
                    @endcan
                </tr>
            </thead>
            @foreach ($data as $key => $user)
                <tbody>
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="fs-5">
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                    <span class="badge rounded-pill bg-success">{{ $v }}</span>
                                @endforeach
                            @endif
                        </td>
                        @can('operate-users')
                            <td>
                                <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                @can('delete_rples')
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>
                        @endcan
                    </tr>
                </tbody>
            @endforeach
        </table>
        {!! $data->render() !!}
    </div>
@endsection
