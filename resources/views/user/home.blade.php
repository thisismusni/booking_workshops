@extends('layouts.user.app')

@push('page_style')
<style>
    .card:hover {
        cursor: pointer;
    }
</style>
@endpush

@section('content')
<!-- Page Content -->
<section id="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="card" onclick="menuClick('history')">
                    <div class="card-body text-center">
                        History
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="card" onclick="menuClick('book')">
                    <div class="card-body text-center">
                        Book
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="card" onclick="menuClick('product')">
                    <div class="card-body text-center">
                        Product
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end: Page Content -->
@endsection

@push('page_script')
<script>
    function menuClick(params) {
        if ("product" == params) {
            window.location.href = "{{ route('user.product')}}";  
        } else if("book" == params){
            window.location.href = "{{ route('book')}}";  
        } else if("history" == params){
            window.location.href = "{{ route('user.history')}}";  
        }
    }
</script>
@endpush