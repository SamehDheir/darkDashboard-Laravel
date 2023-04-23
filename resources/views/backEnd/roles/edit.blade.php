@extends('backEnd.dashboard')

@section('title_page')
    Roles
@endsection
@section('table')
    / show roles
@endsection
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-4 con-table p-5">
        <div class="big_div">
            <div class="table_name">
                <h2>Table Name</h2>
                <h5 class="text-danger">Roles</h5>
            </div>

            <a href="{{ route('roles.index') }}" class="btn add_section">
                All Roles
            </a>
            <!-- Add Modal -->
        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
        <div class="row p-4" style="background-color: #191c24">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <div class="form-floating mb-3">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control mt-2']) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br />
                    @foreach ($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                            {{ $value->name }}</label>
                        <br />
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary w-100 mt-4">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
