jQuery(document).ready(function($) {

    //toastr messages
    toastr.options.timeOut = 1500; // 1.5s
    if ("fadeInSuccessMessage" in localStorage) {
        toastr['success'](localStorage.fadeInSuccessMessage);
        delete localStorage.fadeInSuccessMessage;
    }

    $('.order-btn').click(function() {
        $('#product-number').val($(this).attr('product-id'));
        $('#product-amount').val($(this).attr('product-price'));
        $('.order-price').text($(this).attr('product-price') + ".00");
        $('#product-name').text($(this).attr('product-name') + ' × 1');
        $('#place_order').removeClass("disabled");
    });
    $("#payment-form").submit(function(e) {
        if ($('#place_order').hasClass("disabled")) {
            return false;
        }
    });
    //profile info change actions
    //personal info change
    $('#frm-personal').on('submit', function(event) {
        event.preventDefault();
        var fd = new FormData();
        var other_data = $('#frm-personal').serializeArray();
        $.each(other_data, function(key, input) {
            fd.append(input.name, input.value);
        });
        $('.woocommerce-MyAccount-content').find(".error").hide();
        var hasError = false;
        if ($('#account_display_name').val() == '') {
            $("#account_display_name").after('<span class="error">Please re-enter your password.</span>');
            hasError = true;
        }
        if (hasError == true) { return false; }
        if (hasError == false) {
            $.ajax({
                url: '/profile/info-change',
                data: fd,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(res) {
                    if (JSON.parse(res)['message'] == 'success') {
                        localStorage.fadeInSuccessMessage = "Profile details changed!";
                        window.location = location;
                    }
                }
            });
        };
    });
    //password info change
    $('#frm-password').on('submit', function(event) {
        event.preventDefault();
        var fd = new FormData();
        var other_data = $('#frm-password').serializeArray();
        $.each(other_data, function(key, input) {
            fd.append(input.name, input.value);
        });

        var hasError = false;
        if ($('#password_current').val() == '') {
            $("#password_current").after('<span class="error">Please re-enter your password.</span>');
            hasError = true;
        } else if ($('#password_1').val() == '') {
            $("#password_1").after('<span class="error">Please re-enter your password.</span>');
            hasError = true;
        } else if ($('#password_2').val() != $('#password_1').val()) {
            $("#password_2").after('<span class="error">Passwords do not match.</span>');
            hasError = true;
        }
        if (hasError == true) { return false; }
        if (hasError == false) {
            $.ajax({
                url: '/profile/password-change',
                data: fd,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(res) {
                    if (JSON.parse(res)['message'] == 'success') {
                        localStorage.fadeInSuccessMessage = "Password changed!";
                        window.location = location;
                    }
                    if (JSON.parse(res)['message'] == 'pwd-error') {
                        $("#password_current").after('<span class="error">Please re-enter your password.</span>');
                        hasError = true;
                        $('input[name="_token"]').val(JSON.parse(res)['token']);
                        //localStorage.fadeInSuccessMessage = "Profile details changed!";
                        //window.location = location;
                    }
                }
            });
        };
    });
    //avatar change
    $('#frm-avatar').on('submit', function(event) {
        event.preventDefault();
        var fd = new FormData();
        var other_data = $('#frm-avatar').serializeArray();
        $.each(other_data, function(key, input) {
            fd.append(input.name, input.value);
        });

        $.ajax({
            url: '/profile/avatar-change',
            data: fd,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function(res) {
                if (JSON.parse(res)['message'] == 'success') {
                    localStorage.fadeInSuccessMessage = "Profile image changed!";
                    window.location = location;
                }
            },
            error: function() {
                toastr['error']("Internal server error!");
            }
        });
    });
});