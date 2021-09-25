"use strict";
// Class definition

var KTDatatableHtmlTableDemo = (function () {
    // Private functions

    // demo initializer
    var demo = function () {
        var datatable = $("#kt_datatable").KTDatatable({
            data: {
                saveState: { cookie: false },
            },
            search: {
                input: $("#kt_datatable_search_query"),
                key: "generalSearch",
            },
            layout: {
                class: "datatable-brand",
            },
            columns: [
                {
                    field: "ID",
                    type: "number",
                    width: 30,
                },
                {
                    field: "SKP",
                    type: "number",
                    width: 30,
                },
                {
                    field: "Action",
                    type: "text",
                    orderable: false,
                    width: 120,
                },
                {
                    field: "Dibuat Pada",
                    type: "date",
                    autoHide: false,
                },
                {
                    field: "Dibuat Oleh",
                    type: "text",
                    autoHide: false,
                },
                {
                    field: "Status",
                    title: "Status",
                    autoHide: false,
                },
            ],
        });
        console.log("ini table data : ", datatable);

        $("#kt_datatable_search_status").on("change", function () {
            datatable.search($(this).val().toLowerCase(), "Status");
        });

        $("#kt_datatable_search_type").on("change", function () {
            datatable.search($(this).val().toLowerCase(), "Type");
        });

        $(
            "#kt_datatable_search_status, #kt_datatable_search_type"
        ).selectpicker();
    };

    return {
        // Public functions
        init: function () {
            // init dmeo
            demo();
        },
    };
})();

jQuery(document).ready(function () {
    KTDatatableHtmlTableDemo.init();
});
