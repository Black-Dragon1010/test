jQuery(document).ready(function($) {
    adjustRemaining();
    toastr.options.timeOut = 1500; // 1.5s
    if ("fadeInSuccessMessage" in localStorage) {
        if (localStorage.fadeInSuccessMessage == "credit_edit_saved") {
            toastr['success']("Credit edit saved");
            delete localStorage.fadeInSuccessMessage;
        }
        if (localStorage.fadeInSuccessMessage == "post_deleted") {
            toastr['success']("Post deleted successfully");
            console.log("dsdfd");
            delete localStorage.fadeInSuccessMessage;
        }
    }
    if ($(document).height() > $(window).height() + $('.footer-bottom').height())
        $('.footer-bottom').addClass('hidden');
    jQuery(window).scroll(function() {
        var position = $(window).scrollTop();
        var bottom = $(document).height() - $(window).height();
        if (position == bottom) {
            var row = Number($('.news-community').length);
            var cate_name = $('#cate_name').text();
            var allcount = Number($('#all_counts').text());

            if (row < allcount) {
                $.ajax({
                    url: '/post_limits',
                    type: 'get',
                    data: { offset: row, cate_name: cate_name },
                    success: function(response) {
                        $("#blog_list_loop").append(response).show().fadeIn("slow");
                    }
                });
            } else {
                $('.footer-bottom').removeClass('hidden');
            }
        }
    });
    $('#edit_btn').on('click', function() {
        $(this).addClass('hidden');
        $('#edit_save_btn').removeClass('hidden');
        $('#edit_cancel_btn').removeClass('hidden');
        $('td input').removeAttr('disabled');
        $.ajax({
            url: '/log_credit_edit_start',
            type: 'get',
            success: function(response) {
                $('#total_credits').text(response);
            },
            error: function() {
                toastr['error']('internal server error!');
            }
        });
    });
    $('#edit_save_btn').on('click', function() {
        var credit_obj = {};
        var sum = 0;
        $('td .each-credits').each(function() {
            credit_obj[$(this).attr('data-id')] = $(this).val();
            sum += Number($(this).val());
        });
        if (sum > Number($('#total_credits').text())) {
            toastr["error"]("Total credits exceed the limit.");
            window.location = location;
        } else {
            $.ajax({
                url: '/log_credit_edit_save',
                type: 'get',
                data: { credit_obj: credit_obj },
                success: function(response) {
                    $('#total_credits').text(response);
                    if (response == "exceeds") {
                        toastr["error"]("Total credits exceed the limit.");
                    } else {
                        localStorage.fadeInSuccessMessage = "credit_edit_saved"; //alert for draft saved
                        window.location = location;
                    }

                },
                error: function() {
                    toastr['error']('internal server error!');
                }
            })
        }

    });
    $('#edit_cancel_btn').on('click', function() {
        window.location = location;
    });
    $('td .each-credits').on('input', function() {
        adjustRemaining('Total credits exceed the limit.');
    });
    //delete action
    $(document).on('click', '#smallButton', function(event) {
        let blog_id = $(this).attr('data-id');
        $('input[name="delete_id"]').val(blog_id);
    });
    $('#post-delete-form').on('submit', function() {
        localStorage.fadeInSuccessMessage = "post_deleted"; //alert for draft saved
    });

    function adjustRemaining() {
        $sum = Number($('#total_credits').text());
        $('td .each-credits').each(function() {
            $sum -= Number($(this).val());
        });
        if ($sum < 0) {
            toastr['error']("Total credits exceed the limit.");
        } else {
            $('#remaining_credits').text($sum);
        }
    }
});