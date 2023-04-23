@extends('backEnd.dashboard')

@section('title_page')
    Books
@endsection

@section('table')
    / all book
@endsection

@section('content')
    <div class="p-5 con-table">

        <div class="big_div">
            <div class="table_name">
                <h2>Table Name</h2>
                <h5 class="text-danger">Books</h5>
            </div>

            @can('operate-sections')
                <a href="{{ route('books.create') }}" class="btn add_section">
                    Add +
                </a>
            @endcan

            {{-- change text button bassed on route --}}

            {{-- @if (Route::currentRouteName() == 'books.create')
                <a href="{{ route('books.index') }}" class="btn add_section">
                    All Books
                </a>
            @else
                <a href="{{ route('books.create') }}" class="btn add_section">
                    Add
                </a>
            @endif --}}

        </div>
        <table id="myTable" class="display m-0">
            <thead>
                <tr class="rowtr">
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Section</th>
                    @can('operate-books')
                        <th class="text-center">Oparations</th>
                    @endcan

                </tr>
            </thead>
            <tbody>
                {{ $i = 1 }}
                @foreach ($books as $book)
                    <tr class="rowtr">
                        <td>{{ $i++ }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->desc }}</td>
                        <td>{{ $book->price }}</td>
                        <td class="text-center"><img src="assets/backEnd/img/books/{{ $book->image }}" width="80%"
                                height="80px" alt="image {{ $book->name }}"></td>
                        <td>{{ $book->sections->name ?? 'None' }}</td>

                        @can('operate-books')
                            <td>
                                <div class="action">
                                    <a href="{{ route('books.edit', $book->id) }}" class="edit_btn px-1" type="submit"><i
                                            class='fas fa-pen'></i></a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete_btn" type="submit"><i class='fas fa-trash'></i></button>
                                    </form>
                                </div>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>




        {{-- @yield('add_book') --}}
    @endsection
