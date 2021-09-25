"use strict";
// Class definition

var KTCkeditor = function () {    
    // Private functions
    var demos = function () {
		ClassicEditor
			.create( document.querySelector( '#kt-ckeditor-5' ) )
			.then( editor => {
				console.log('Thank you')
			})
			.catch( error => {
				console.error( error );
			} );
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
    KTCkeditor.init();
});