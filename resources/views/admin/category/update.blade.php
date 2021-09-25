@extends('layouts.app')

@push('title_page')
{{ trans('admin.panel.category') }}
@endpush
@push('sub_title_page')
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item text-muted">
        <a href="" class="text-muted">Form</a>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="" class="text-muted">Update</a>
    </li>
</ul>
@endpush

@section('content')
<div class="card card-custom example example-compact">
    <div class="card-header">
        <h3 class="card-title">{{ trans('admin.crud.create') }} {{ trans('admin.panel.category') }}</h3>
        <div class="card-toolbar">
            <a href="{{ route('admin.category.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                <i class="ki ki-long-arrow-back icon-xs"></i>Back</a>
            <div class="btn-group">
                <button type="button" onclick="formSubmit()" class="btn btn-primary font-weight-bolder">
                    <i class="ki ki-check icon-xs"></i>Save And Publish</button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <ul class="nav nav-hover flex-column">
                        <li class="nav-item">
                            <a onclick="formSubmitDraft()" class="nav-link deleteButton">
                                <i class="nav-icon flaticon-doc"></i>
                                <span class="nav-text">Save Draft</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form action="{{ route('admin.category.update', $data->id) }}" method="POST" enctype="multipart/form-data"
        id="kt_form">
        @csrf
        <div class="card-body">
            @include('admin.category.fields')
        </div>
    </form>
    <!--end::Form-->
</div>
@endsection