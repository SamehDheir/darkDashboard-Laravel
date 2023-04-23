@extends('backEnd.dashboard')

@section('title_page')
    Sameh Panal
@endsection

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Sections</p>
                        <h6 class="mb-0">
                            @if (
                                $countSection =
                                    DB::table('sections')->whereNull('deleted_at')->count() == 0)
                                0
                            @else
                                {{ $countSection = DB::table('sections')->whereNull('deleted_at')->count() }}
                            @endif
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Books</p>
                        <h6 class="mb-0">
                            @if (
                                $countBooks =
                                    DB::table('books')->whereNull('deleted_at')->count() == 0)
                                0
                            @else
                                {{ $countBooks = DB::table('books')->whereNull('deleted_at')->count() }}
                            @endif
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Visitors</p>
                        <h6 class="mb-0">1232</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Active Visitors</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
