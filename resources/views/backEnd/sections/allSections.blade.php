@extends('backEnd.dashboard')

@section('title_page')
    Sections
@endsection
@section('table')
    / all sections
@endsection


@section('content')
    <div class="py-5 con-table container">
        {{-- @if (session()->has('delete'))      
                <div class="alert alert-danger">
                    {{Session::get('delete');}}
                </div>           
        @endif --}}
        <div class="big_div">
            <div class="table_name">
                <h2>Table Name</h2>
                <h5 class="text-danger">Sections</h5>
            </div>

            {{-- Add Section --}}
            @can('operate-sections')
                <a href="{{ route('sections.create') }}" class="btn add_section" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Add +
                </a>
            @endcan


            <!-- Add Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">New <span>Section</span></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('sections.store') }}">
                                @csrf
                                <div class="mb-3 div_input">
                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" name="name" class="form-control" required id="recipient-name">
                                </div>
                                <div class="mb-3 div_input">
                                    <label for="message-text" class="col-form-label">Description:</label>
                                    <textarea class="form-control" name="desc" required id="message-text"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Send message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <table id="myTable" class="display m-0">
            <thead>
                <tr class="rowtr">
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    @can('operate-sections')
                        <th class="text-center">Oparations</th>
                    @endcan

                </tr>
            </thead>
            <tbody>
                {{ $i = 1 }}
                @foreach ($sections as $section)
                    <tr class="rowtr">
                        <td>{{ $i++ }}</td>
                        <td>{{ $section->name }}</td>
                        <td>{{ $section->desc }}</td>
                        @can('operate-sections')
                            <td class="action">
                                <a href="{{ route('sections.edit', $section->id) }}" class="edit_btn px-1"><i
                                        class='fas fa-pen'></i></a>
                                <form action="{{ route('sections.destroy', $section->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete_btn" type="submit"><i class='fas fa-trash'></i></button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>




    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection
