jQuery(document).ready(function($) {

    if ("fadeInSuccessMessage" in localStorage) {
        if (localStorage.fadeInSuccessMessage == "comment_success") {
            toastr['success']("Comment submitted successfully");
            delete localStorage.fadeInSuccessMessage;
        }
    }
    $("#commentform").submit(function(e) {
        if ($('#comment').val() == "") {
            toastr["error"]("Fill in the comment form.");
            return false;
        } else {
            localStorage.fadeInSuccessMessage = "comment_success"; //alert for draft saved
            $(this).submit();
        }
    });
});