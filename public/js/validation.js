var JsValidator = function() {
    $('#registerform').validate({
        rules: {
            name: {
                required: !0
            },
            email: {
                required: !0,
                email: !0
            },
            password: {
                required: !0
            },
            password_confirmation: {
                required: !0,
                equalTo: "#password"
            },
            location: {
                required: true
            },
            gender: {
                required: true
            },
            months: {
                required: !0
            },
            days: {
                required: !0
            },
            years: {
                required: !0
            }
        }
    }),
};
jQuery(document).ready(function() {
    JsValidator()
});