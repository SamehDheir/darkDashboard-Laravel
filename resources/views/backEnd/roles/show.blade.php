@extends('backEnd.dashboard')

@section('title_page')
    Roles
@endsection
@section('table')
    / show roles
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
                    <th width="280px">Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        @if (!empty($rolePermissions))
                            @foreach ($rolePermissions as $v)
                                <label class="label label-success">{{ $v->name }},</label>
                                <br>
                            @endforeach
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    @endsection
