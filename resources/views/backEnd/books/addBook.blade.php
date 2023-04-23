@extends('backEnd.dashboard')

@section('title_page')
   Book
@endsection
@section('table')
   / Add

@endsection

@section('content')
    <div class="p-5 con-table">

        <div class="big_div">
            <div class="table_name">
                <h2>Table Name</h2>
                <h5 class="text-danger">Books</h5>
            </div>
            <a href="{{ route('books.index') }}" class="btn add_section">
                All Books
            </a>
        </div>

        {{-- Add Book --}}
        <div class="container">
            <div class="mt-5 w-100">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">ADD BOOK</h6>
                    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingInput"
                                placeholder="Enter Book Name">
                            <label for="floatingInput">Name Book</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="desc" placeholder="Enter Book Description" id="floatingTextarea"
                                style="height: 150px;"></textarea>
                            <label for="floatingTextarea">Description Book</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="text" name="price" class="form-control" id="floatingInput"
                                placeholder="Enter Book Price">
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
                        <button type="submit" class="btn btn-primary add_button my-4 w-100">ADD</button>
                    </form>

                </div>
            </div>
        </div>
    @endsection



    {{-- <select name="section_id">
        @foreach ($sections as $section)
            <option value="{{ $section->id }}">{{ $section->name }}</option>
        @endforeach
    </select> --}}
