"use strict";
// Class definition

var KTDropzoneDemo = (function () {
    // Private functions
    var demo1 = function () {
        // single file upload
        $("#kt_dropzone_1").dropzone({
            url: "http://localhost:8000/admin/product/upload", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: 5, // MB
            addRemoveLinks: true,
            accept: function (file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    console.log("file name", file);
                    done();
                }
            },
        });
    };

    return {
        // public functions
        init: function () {
            demo1();
        },
    };
})();

KTUtil.ready(function () {
    KTDropzoneDemo.init();
});
