@csrf
<input type="hidden" name="status" id="status" value="1">

<div class="form-group row">
	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
		<label>Name *</label>
		<input type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Example pliers"
			name="name" id="name" value="{{ $data->name ?? '' }}" />
		@error('name')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
	</div>

	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
		<label>Duration in Minutes*</label>
		<input type="text" class="form-control  @error('duration') is-invalid @enderror" placeholder="Example 10"
			name="duration" id="duration" value="{{ $data->duration ?? '' }}" />
		@error('duration')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
	</div>

	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
		<label>Price *</label>
		<input type="number" class="form-control  @error('price') is-invalid @enderror" placeholder="Example 100000"
			name="price" id="price" value="{{ $data->price ?? '' }}" />

		@error('price')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
	</div>

	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
		<label>Category *</label>
		<select class="form-control select2  @error('category_id') is-invalid @enderror" id="kt_select2_1"
			name="category_id">
			<option></option>
			@foreach (App\Models\Category::all() as $item)
			<option value="{{ $item->id }}">
				{{ $item->name }}
			</option>
			@endforeach
		</select>

		@error('category_id')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
	</div>
</div>


<div class="form-group row">
	<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
		<label>Description *</label>
		<textarea class="summernote  @error('description') is-invalid @enderror" id="kt_summernote_1"
			name="description">{{ $data->description ?? '' }}</textarea>
		<span class="form-text text-muted"></span>
		@error('description')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
	</div>
	<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
		<label>Product Photo *</label>
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="dropzone dropzone-default" id="kt_dropzone_1">
				<div class="dropzone-msg dz-message needsclick">
					<h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
					<span class="dropzone-msg-desc">This is just a demo dropzone. Selected files are
						<strong>not</strong>actually uploaded.</span>
				</div>
			</div>
		</div>
		@error('file')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
		@enderror
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
	// Class definition
	var KTSelect2 = function() {
		// Private functions
		var demos = function() {
			// basic
			$('#kt_select2_1').select2({
				placeholder: "Select a tag"
			});
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
<script src="{{ asset('js/pages/crud/forms/editors/summernote.js') }}"></script>
<script>
	function formSubmit(value) {
        document.getElementById("status").value = value;
		document.getElementById("kt_form").submit();
	}
</script>
<script>
	// Class definition
	var KTSummernoteDemo = function() {
		// Private functions
		var demos = function() {
			$('.summernote').summernote({
				height: 200,
				name: "summary"
			});
		}
		return {
			// public functions
			init: function() {
				demos();
			}
		};
	}();

	// Initialization
	jQuery(document).ready(function() {
		KTSummernoteDemo.init();
}); 
</script>
<script src="{{ asset('js/dropzonejs.js') }}"></script>
@endpush