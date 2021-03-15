$(document).ready(function() {
    toastr.options.timeOut = 1500; // 1.5s
    if ("fadeInSuccessMessage" in localStorage) {
        if (localStorage.fadeInSuccessMessage == "1") {
            toastr['success']("Submit new post successed!");
            delete localStorage.fadeInSuccessMessage;
        }
        if (localStorage.fadeInSuccessMessage == "2") {
            toastr['success']("Draft saved!");
            delete localStorage.fadeInSuccessMessage;
        }
    }

    $('.wpfepp-button').click(function() {
        var permission = 1; //submit a post as new.
        if ($(this).attr('id') == "post-draft-submit") {
            permission = 2; //permission for draft
        }
        if ($('#blog-title').val() == "" || $('.summernote-content').find('.note-editable').html() == "") {
            toastr.error("Please fill in all forms");
            if ($('#blog-title').val() == "") {
                $('#blog-title').addClass('error');
            }
            if ($('.summernote-content').find('.note-editable').html() == "") {
                // $('.summernote-content').find('.note-editable').addClass('error');
            }
        } else {
            var fd = new FormData();
            var other_data = $('#new-blog-form').serializeArray();
            $.each(other_data, function(key, input) {
                fd.append(input.name, input.value);
            });
            fd.append("blog_content", $('.summernote-content').find('.note-editable').html());
            fd.append("blog_thumbnail", $('#blog-thumbnail').attr('src'));
            fd.append("permission", permission);
            $.ajax({
                url: '/post_new',
                data: fd,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data) {
                    if (JSON.parse(data)['message'] == "success") {
                        localStorage.fadeInSuccessMessage = "1";
                        if ($(this).attr('id') == "post-draft-submit") {
                            localStorage.fadeInSuccessMessage = "2"; //alert for draft saved
                        }
                        window.location = location;
                    }
                },
                error: function(data) {
                    toastr['error'] = "Submit new post error!";
                    window.location = location;
                }
            });
        }
    });
    $('#blog-title').on('input', function() {
        $(this).removeClass('error');
    });
    $('.summernote-content').on('focus', '.note-editable', function() {
        $('.summernote-content').find('.note-editable').removeClass('error');
    });

});