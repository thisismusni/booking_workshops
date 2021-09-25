"use strict";
var KTDatatablesExtensionsResponsive = (function () {
    var initTable1 = function () {
        var table = $("#kt_datatable");
        console.log(table);
        // begin first table
        table.DataTable({
            responsive: true,

            columnDefs: [
                {
                    width: "400px",
                    targets: 1,
                },
            ],
        });
    };

    return {
        //main function to initiate the module
        init: function () {
            initTable1();
        },
    };
})();

jQuery(document).ready(function () {
    KTDatatablesExtensionsResponsive.init();
});
