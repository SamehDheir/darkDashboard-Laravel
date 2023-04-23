@extends('backEnd.dashboard')

@section('title_page')
    Book
@endsection

@section('table')
    / edit book
@endsection

@section('content')
    <div class="container">
        <div class="mt-5 w-100">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit Book</h6>
                <form method="post" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-floating mb-3">
                        <input type="text" name="name" value="{{ $book->name }}" class="form-control"
                            id="floatingInput" placeholder="Enter Book Name">
                        <label for="floatingInput">Name Book</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="desc" placeholder="Enter Book Description" id="floatingTextarea"
                            style="height: 150px;">{{ $book->desc }} </textarea>
                        <label for="floatingTextarea">Description Book</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="price"value="{{ $book->price }}" class="form-control"
                            id="floatingInput" placeholder="Enter Book Price">
                        <label for="floatingInput">Price Book</label>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label text-white">Image Book</label>
                        <input class="form-control bg-dark" name="image" type="file" id="formFile">
                    </div>

                    <select class="form-select mb-3" name="section_id" aria-label="Default select example">
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary my-4 w-100">UPDATE</button>
                </form>

            </div>
        </div>
    </div>
@endsection
