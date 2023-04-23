@extends('backEnd.dashboard')
@section('title_page')
    Roles
@endsection
@section('table')
    / add roles
@endsection


@section('content')
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
        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
        <div class="row p-4" style="background-color: #191c24">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control mt-2" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Name</label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br />
                 
                    @foreach ($permission as $value)
                        <div class="form-check">
                            <input class="form-check-input" name="permission[]" type="checkbox" value="{{ $value->id }}"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $value->name }}
                            </label>
                        </div>
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
