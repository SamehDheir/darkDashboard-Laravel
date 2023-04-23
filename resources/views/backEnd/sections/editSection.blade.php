@extends('backEnd.dashboard')

@section('title_page')
 Section

@endsection
@section('table')
   / edit section

@endsection


@section('content')
    <div class="container">
        <div class="mt-5 w-100">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit Section</h6>
                <form action="{{route('sections.update', $section->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-floating mb-3">
                        <input type="text" name="name" value="{{ $section->name }}" class="form-control" id="floatingInput" placeholder="Enter New Section Name">
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" name="desc" placeholder="Enter New Section Name" id="floatingTextarea" style="height: 150px;">{{ $section->desc }}</textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                    <button type="submit" class="btn btn-primary my-4 w-100">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
