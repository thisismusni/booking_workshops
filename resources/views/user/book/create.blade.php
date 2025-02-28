@extends('layouts.user.app')

@section('content')
<!-- Page Content -->
<section id="page-content">
    <div class="container">
        <div class="row">
            <div class="content col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Chose Date, Time And Parts if you need</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('book.store') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-4">
                                    <label for="example-date-input" class="col-form-label text-right">Date</label>
                                    <input class="form-control" onchange="dateChange()" type="date" name="order_date"
                                        value="2021-10-11" id="example-date-input">
                                </div>
                                <div class="col-4" id="selectTime">
                                    <label for="example-date-input" class="col-form-label text-right">Time</label>
                                    <select id="inputState" name="schedule_id" class="form-control">
                                        <option> Choose Time </option>
                                        @foreach ($schedules as $schedule)
                                        <option value="{{ $schedule->id }}">
                                            {{ $schedule->start }} - {{ $schedule->end }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="keterangan" class="col-form-label text-right">Keterangan</label>
                                    <input class="form-control" type="text" name="keterangan" id="keterangan">
                                </div>
                                <div class="col-4">
                                    <br>
                                    <input type="submit" value="Book" class="btn btn-primary" style="margin-top: 13px">
                                </div>
                            </div>
                            <div id="item">
                            </div>
                        </form>
                        @include('user.book.product')
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
    let i = 0; 
	function add(data,id) {
		console.log(data);
		let item = `
        <div class="form-group row align-items-center" id="row[${i}]">
			<input type="hidden" value="${data.id}" name="product[${i}]"> 
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 pt-2">
				<label>Product </label>
                <input disabled type="text" value="${data.name}" class="form-control"  />
            </div> 
			<div class="col-lg-3 col-md-3 col-sm-12 col-12 pt-2">
				<label>Category </label>
                <input disabled type="text" value="${data.category.name}" class="form-control"  />
            </div> 
			<div class="col-lg-2 col-md-2 col-sm-12 col-12 pt-2">
				<label>Price </label>
                <input disabled type="text" value="${data.price}" class="form-control"  />
            </div>  
            <div class="col-lg-2 col-md-2 col-sm-6 col-6 pt-2">   
            <br>
                <a href="javascript:" onclick="deleteBtn(${i})" class="btn btn-danger mt-2">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        </div>
        `;
        i++;
        $("#item").append(item);  
	}
    $(document).ready(function() {
       
        let today = new Date();
        
        document.getElementById("example-date-input").value = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    });

    function deleteBtn(id){
        let myobj = `row[${id}]`
        myobj = document.getElementById(myobj);
        myobj.remove();
    }
    
    async function dateChange() {

        let date = document.getElementById("example-date-input").value;
        let selectTime = document.getElementById("inputState");
        if(selectTime != null){
            selectTime.remove()
        }
        console.log(selectTime);
        $("#selectTime").append(`<select id="inputState" name="time" class="form-control"><option >  Choose Time  </option> </select>`); 

        $.get(
            `/schedule/${date}`,
            function (res) {  
                console.log(res);
                res.forEach((data) => {
                    let component = `<option value="${data.id}" >  ${data.start} - ${data.start}  </option>`
                    $("#inputState").append(component);
                }); 
            }
        );
    }
</script>
@endpush