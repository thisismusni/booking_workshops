@extends('layouts.app')

@push('page_style')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('title_page')
    Dashboard
@endpush

@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Dashboard </h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <h1>Welcome to Dashboard</h1>
            <!--end: Datatable-->
        </div>
    </div>
@endsection
