@extends('layouts.app')

@push('page_style')
<link href="{{ secure_asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

@endpush

@push('page_script')
{{-- <script src="{{ secure_asset('js/pages/crud/ktdatatable/base/html-table.js') }}"></script> --}}

<script src="{{ secure_asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ secure_asset('js/pages/crud/datatables/extensions/responsive.js') }}"></script>
@endpush

@push('title_page')
Category
@endpush

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label"> Category List</h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">
                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="la la-download"></i>Export</button>
                <!--begin::Dropdown Menu-->
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <ul class="nav flex-column nav-hover">
                        <li class="nav-header font-weight-bolder text-uppercase text-primary pb-2">Choose an
                            option:</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon la la-print"></i>
                                <span class="nav-text">Print</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon la la-copy"></i>
                                <span class="nav-text">Copy</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon la la-file-excel-o"></i>
                                <span class="nav-text">Excel</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon la la-file-text-o"></i>
                                <span class="nav-text">CSV</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon la la-file-pdf-o"></i>
                                <span class="nav-text">PDF</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--end::Dropdown Menu-->
            </div>
            <!--end::Dropdown-->
            <!--begin::Button-->
            <a href="{{ route('category.create') }}" class="btn btn-primary font-weight-bolder">
                <i class="la la-plus"></i> New Record</a>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <!--begin: Datatable-->
        @include('admin.category.table')
        <!--end: Datatable-->
    </div>
</div>
@endsection