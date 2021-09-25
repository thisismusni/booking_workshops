@csrf
<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">Name *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <input type="text" value="{{ $data->name ?? '' }}"
                class="form-control col-9 @error('email') is-invalid @enderror" placeholder="Name" name="name" />
        </div>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">User *</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <select class="form-control select2 col-9" id="kt_select2_1" name="user_id">
                <option></option>
                @foreach (App\Models\User::all() as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
                @endforeach
            </select>
            <span class="form-text text-muted"></span>
        </div>
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
			// nested
			$('#kt_select2_2').select2({
				placeholder: "Select a state"
			});
			// multi select
			$('#kt_select2_3').select2({
				placeholder: "Select a tag",
			});
			$('#kt_select2_101').select2({
				placeholder: "Select a content",
			});
			$('#kt_select2_102').select2({
				placeholder: "Choose category",
			});
			// basic
			$('#kt_select2_4').select2({
				placeholder: "Select a lecture",
				allowClear: true
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
@endpush