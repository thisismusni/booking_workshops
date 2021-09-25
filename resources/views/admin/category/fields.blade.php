<input type="hidden" name="created_by" value="{{ Auth::user()->id }}" />
<input type="hidden" name="status" id="status" value="1">
<div class="form-group row">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <label>{{ trans('admin.panel.name') }} *</label>
        <input type="text" class="form-control"
            placeholder="{{ trans('admin.general.add') }} {{ trans('admin.panel.name') }}" name="name" id="name" onkeyup="slugChange(this.value)"
            value="{{ $data->name ?? '' }}" />
        <span class="form-text text-muted"></span>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        <label>{{ trans('admin.panel.slug') }} *</label>
        <input type="text" class="form-control"
            placeholder="{{ trans('admin.general.add') }} {{ trans('admin.panel.slug') }}" name="slug" id="slug"
            value="{{ $data->slug ?? '' }}" />
        <span class="form-text text-muted"></span>
    </div>
</div>

<div class="form-group row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <label>{{ trans('admin.panel.description') }} *</label>
        <textarea class="summernote" id="kt_summernote_1" name="description">{{ $data->description ?? '' }}</textarea>
        <span class="form-text text-muted"></span>
    </div>
</div>

{{-- <div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">{{ trans('admin.panel.status') }}</label>
<div class="col-lg-9 col-md-9 col-sm-9 col-9">
    <div class="input-group">
        <select class="form-control" name="status" id="exampleSelect1">
            <option value="1">Enable</option>
            <option value="0">Disable</option>
        </select>
    </div>
</div>
</div>

<div class="form-group row">
    <label class="col-form-label col-lg-3 col-sm-3 col-3 text-right">{{ trans('admin.panel.comment.status') }}</label>
    <div class="col-lg-9 col-md-9 col-sm-9 col-9">
        <div class="input-group">
            <select class="form-control" name="comment_status" id="exampleSelect1">
                <option value="1" {{ optionSelectedValue($data->comment_status ?? '', '1') }}>Enable</option>
                <option value="0" {{ optionSelectedValue($data->comment_status ?? '', '0') }}>Disable</option>
            </select>
        </div>
    </div>
</div> --}}

@push('page_style')
<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/pages/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('page_script')
<script src="{{ asset('js/pages/custom/user/edit-user.js') }}"></script>
<script src="{{ asset('js/pages/crud/forms/validation/form-widgets.js') }}"></script>
<script src="{{ asset('js/pages/crud/forms/editors/summernote.js') }}"></script>
<script>
    function formSubmit() {
        document.getElementById("status").value = "1";
		document.getElementById("kt_form").submit();
	}
    function formSubmitDraft() {
        document.getElementById("status").value = "0";
		document.getElementById("kt_form").submit();
	}
	function slugChange(slug) {
		// slug = document.getElementById("slug").value;
        document.getElementById("slug").value = slug.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
	}
	// $("#name").change(function(){
	// 	alert("The text has been changed.");
	// });
</script>
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
			// basic
			$('#kt_select2_4').select2({
				placeholder: "Select a lecture",
				allowClear: true
			});
			// loading data from array
			var data = [{
				id: 0,
				text: 'Enhancement'
			}, {
				id: 1,
				text: 'Bug'
			}, {
				id: 2,
				text: 'Duplicate'
			}, {
				id: 3,
				text: 'Invalid'
			}, {
				id: 4,
				text: 'Wontfix'
			}];
			$('#kt_select2_5').select2({
				placeholder: "Select a value",
				data: data
			});
			// loading remote data
			function formatRepo(repo) {
				if(repo.loading) return repo.text;
				var markup = "<div class='select2-result-repository clearfix'>" + "<div class='select2-result-repository__meta'>" + "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
				if(repo.description) {
					markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
				}
				markup += "<div class='select2-result-repository__statistics'>" + "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" + "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" + "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" + "</div>" + "</div></div>";
				return markup;
			}

			function formatRepoSelection(repo) {
				return repo.full_name || repo.text;
			}
			$("#kt_select2_6").select2({
				placeholder: "Search for git repositories",
				allowClear: true,
				ajax: {
					url: "https://api.github.com/search/repositories",
					dataType: 'json',
					delay: 250,
					data: function(params) {
						return {
							q: params.term, // search term
							page: params.page
						};
					},
					processResults: function(data, params) {
						// parse the results into the format expected by Select2
						// since we are using custom formatting functions we do not need to
						// alter the remote JSON data, except to indicate that infinite
						// scrolling can be used
						params.page = params.page || 1;
						return {
							results: data.items,
							pagination: {
								more: (params.page * 30) < data.total_count
							}
						};
					},
					cache: true
				},
				escapeMarkup: function(markup) {
					return markup;
				}, // let our custom formatter work
				minimumInputLength: 1,
				templateResult: formatRepo, // omitted for brevity, see the source of this page
				templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
			});
			// custom styles
			// tagging support
			$('#kt_select2_12_1, #kt_select2_12_2, #kt_select2_12_3, #kt_select2_12_4').select2({
				placeholder: "Select an option",
			});
			// disabled mode
			$('#kt_select2_7').select2({
				placeholder: "Select an option"
			});
			// disabled results
			$('#kt_select2_8').select2({
				placeholder: "Select an option"
			});
			// limiting the number of selections
			$('#kt_select2_9').select2({
				placeholder: "Select an option",
				maximumSelectionLength: 2
			});
			// hiding the search box
			$('#kt_select2_10').select2({
				placeholder: "Select an option",
				minimumResultsForSearch: Infinity
			});
			// tagging support
			$('#kt_select2_11').select2({
				placeholder: "Add a tag",
				tags: true
			});
			// disabled results
			$('.kt-select2-general').select2({
				placeholder: "Select an option"
			});
		}
		var modalDemos = function() {
				$('#kt_select2_modal').on('shown.bs.modal', function() {
					// basic
					$('#kt_select2_1_modal').select2({
						placeholder: "Select a state"
					});
					// nested
					$('#kt_select2_2_modal').select2({
						placeholder: "Select a state"
					});
					// multi select
					$('#kt_select2_3_modal').select2({
						placeholder: "Select a state",
					});
					// basic
					$('#kt_select2_4_modal').select2({
						placeholder: "Select a state",
						allowClear: true
					});
				});
			}
			// Public functions
		return {
			init: function() {
				demos();
				modalDemos();
			}
		};
	}();
// Initialization
jQuery(document).ready(function() {
	KTSelect2.init();
}); 
</script>
<script>
    // Class definition
	var KTSummernoteDemo = function() {
		// Private functions
		var demos = function() {
			$('.summernote').summernote({
				height: 390,
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
@endpush