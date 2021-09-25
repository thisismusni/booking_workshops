"use strict";

// Class definition
var KTUserEdit = (function () {
    // Base elements
    var avatar;

    var initUserForm = function () {
        avatar = new KTImageInput("kt_user_edit_avatar");
    };

    var avatar1;

    var initUserForm1 = function () {
        avatar1 = new KTImageInput("kt_user_edit_avatar1");
    };

    return {
        // public functions
        init: function () {
            initUserForm();
            initUserForm1();
        },
    };
})();

jQuery(document).ready(function () {
    KTUserEdit.init();
});
