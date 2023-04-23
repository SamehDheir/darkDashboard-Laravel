@extends('backEnd.dashboard')

@section('title_page')
    Roles
@endsection
@section('table')
    / show Users
@endsection
@section('content')

    <div class="container mt-4 con-table p-5">
        <div class="big_div">
            <div class="table_name">
                <h2>Table Name</h2>
                <h5 class="text-danger">Roles</h5>
            </div>

            <a href="{{ route('users.index') }}" class="btn add_section">
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
        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
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
                    <div class="form-floating mb-3">
                        <input type="text" name="email" class="form-control mt-2" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" name="password" class="form-control mt-2" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Password</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" name="confirm-password" class="form-control mt-2" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Confirm Password</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 ">

                <select name="roles[]" class="form-select h-75" multiple>
                    <?php foreach ($roles as $value => $label): ?>
                    <option value="<?= $value ?>"><?= $label ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </div>

    </div>
    {!! Form::close() !!}
    </div>
@endsection
