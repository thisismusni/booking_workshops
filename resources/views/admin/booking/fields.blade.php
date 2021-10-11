@csrf
<div class="form-group row">
	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 pt-2">
		<label>User *</label>
		<select class="form-control select2  @error('user_id') is-invalid @enderror" id="kt_select2_1" name="user_id">
			<option></option>
			@foreach (App\Models\User::all() as $item)
			<option @isset($bookData) @if ($bookData->user_id == $item->id)
				{{ "selected" }}
				@endif
				@endisset
				value="{{ $item->id }}">
				{{ $item->name }}
			</option>
			@endforeach
		</select>

		@error('user_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
	</div>
	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 pt-2">
		<label>Order Date *</label>
		<div class="input-group date" id="kt_datetimepicker_1" data-target-input="nearest">
			<input type="text" name="order_date"
				class="form-control datetimepicker-input @error('order_date') is-invalid @enderror"
				placeholder="Select date & time" data-target="#kt_datetimepicker_1" />
			<div class="input-group-append" data-target="#kt_datetimepicker_1" data-toggle="datetimepicker">
				<span class="input-group-text">
					<i class="ki ki-calendar"></i>
				</span>
			</div>
		</div>
		@error('order_date')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
	</div>
	<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 pt-2">
		<label>status *</label>
		<select class="form-control select2  @error('status') is-invalid @enderror" id="kt_select2_2" name="status">
			<option></option>
			<option @isset($bookData) @if ($bookData->status == 1) {{ "selected" }} @endif @endisset value="1">
				Book
			</option>
			<option @isset($bookData) @if ($bookData->status == 2) {{ "selected" }} @endif @endisset value="2">
				Process
			</option>
			<option @isset($bookData) @if ($bookData->status == 3) {{ "selected" }} @endif @endisset value="3">
				Finished
			</option>
		</select>
		@error('status')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
	</div>
</div>

<div id="item">
</div>
<div class="form-group row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<table class="table table-separate table-head-custom collapsed" id="kt_datatable">
			<thead>
				<tr>
					<th>#</th>
					<th>image</th>
					<th>category</th>
					<th>name</th>
					<th>price</th>
					<th>stock</th>
					<th>duration</th>
					<th>description</th>
					<th>status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@php
				$no = 1;
				@endphp
				@foreach ($data as $value)
				<tr>
					<td>{{ $no++}}</td>
					<td>
						<div class="symbol symbol-50 symbol-light mr-2">
							<span class="symbol-label">
								<img src="{{ $value->image ?? ''  }}" style="height: 20px;"
									class="h-50 align-self-center" alt="">
							</span>
						</div>
					</td>
					<td>{{ App\Models\Category::find($value->category_id)->name }}</td>
					<td>{{ $value->name }}</td>
					<td>@currency($value->price)</td>
					<td>{{ $value->stock }}</td>
					<td>{{ $value->duration  }} Minutes</td>
					<td>{{ $value->description  }}</td>
					<td>{{ $value->status == 1 ? 'Publish' : 'Draft' }}</td>
					<td>
						<a class="btn btn-primary" onclick="add({{ $value, $value->category->name }})">Add</a>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>#</th>
					<th>image</th>
					<th>category_id</th>
					<th>name</th>
					<th>price</th>
					<th>stock</th>
					<th>duration</th>
					<th>description</th>
					<th>status</th>
					<th>Action</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

@push('page_style')
<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/pages/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
<script src="{{ asset('js/pages/custom/user/edit-user.js') }}"></script>
<script src="{{ asset('js/pages/crud/forms/validation/form-widgets.js') }}"></script>
<script>
	let i = 0; 
	function add(data,id) {
		console.log(data);
		let item = `
        <div class="form-group row align-items-center" id="row[${i}]">
			<input type="hidden" value="${data.id}" name="product[${i}]">
			<input type="hidden" value="${data.duration}" name="duration[${i}]">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12 pt-2">
				<label>Product </label>
                <input disabled type="text" value="${data.name}" class="form-control"  />
            </div> 
			<div class="col-lg-2 col-md-2 col-sm-12 col-12 pt-2">
				<label>Category </label>
                <input disabled type="text" value="${data.category.name}" class="form-control"  />
            </div> 
			<div class="col-lg-2 col-md-2 col-sm-12 col-12 pt-2">
				<label>Price </label>
                <input disabled type="number" value="${data.price}" class="form-control"  />
            </div> 
            <div class="col-lg-2 col-md-2 col-sm-6 col-6 pt-2">
				<label>Duration in Minutes</label>
                <input disabled type="number" value="${data.duration}" class="form-control"  />
            </div> 
            <div class="col-lg-2 col-md-2 col-sm-6 col-6 pt-2">   
                <a href="javascript:;" onclick="deleteBtn(${i})" class="btn btn-sm font-weight-bolder btn-light-danger mt-7">
                    <i class="la la-trash-o"></i>Delete
                </a>
            </div>
        </div>
        `;
        i++;
        $("#item").append(item);  
	}

	function deleteBtn(id) {
        let myobj = `row[${id}]`
        myobj = document.getElementById(myobj);
        myobj.remove();
    }

	function formSubmit() { 
		document.getElementById("kt_form").submit();
	}
</script>
<script>
	// Class definition
	var KTSelect2 = function() {
		// Private functions
		var demos = function() {
			// basic
			$('#kt_select2_1').select2({
				placeholder: "Select a user"
			}); 

			$('#kt_select2_2').select2({
				placeholder: "Select Status"
			}); 

			$('#kt_select2_103').select2({
				placeholder: "Select Status"
			}); 
 
			$('#kt_datetimepicker_1').datetimepicker();
		}
		 
		// Public functions
		return {
			init: function() {
				demos(); 
			}
		};
	}();
// Initialization
jQuery(document).ready(function() {
	KTSelect2.init();
}); 
</script>
@endpush

@push('page_style')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/pages/crud/datatables/extensions/responsive_content.js') }}"></script>
@endpush