@extends('layouts.app')

@push('subheader')
@push('title_page')
booking
@endpush
@push('sub_title_page')
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item text-muted">
        <a href="" class="text-muted">Form</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="" class="text-muted">Create</a>
    </li>
</ul>
@endpush

@section('content')
<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">Create booking</h3>
        <div class="card-toolbar">
            <a href="{{ route('booking.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
            <div class="btn-group">
                <button type="button" onclick="formSubmit()" class="btn btn-primary font-weight-bolder">
                    Save
                </button>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form action="{{ route('booking.store') }}" method="post" enctype="multipart/form-data" class="form" id="kt_form">
        <div class="card-body">
            @include('admin.booking.fields')
        </div>
    </form>
    <!--end::Form-->
</div>
@endsection