@extends('backEnd.dashboard')

@section('title_page')
    Roles
@endsection
@section('table')
    / show Users
@endsection
@section('content')
    <div class="p-5 con-table">
        <div class="big_div mb-5">
            <div class="table_name">
                <h2>Table Name</h2>
                <h5 class="text-danger">Roles</h5>
            </div>

            <a href="{{ route('roles.index') }}" class="btn add_section">
                Back
            </a>

        </div>
        <table class="display" id="myTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <span class="badge rounded-pill bg-success fs-5">{{ $v }}</span>
                            @endforeach
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


@endsection


{{--  --}}
