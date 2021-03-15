$(document).ready(function() {
    if ("fadeInErrorMessage" in localStorage) {
        $.notify({
            title: "Error : ",
            message: localStorage.fadeInErrorMessage,
            icon: 'fa fa-check'
        }, {
            type: "danger"
        });
        delete localStorage.fadeInErrorMessage;
    }
    var table = $('#blog_table').DataTable({
        "scrollX": true,
        'columnDefs': [{
            'targets': 0,
            'checkboxes': {
                'selectRow': true
            }
        }],
        'select': {
            'style': 'multi'
        },
        'order': [
            [1, 'asc']
        ]
    });
    // Handle form submission event 
    $('#frm-example').on('submit', function(e) {
        var form = this;

        var rows_selected = table.column(0).checkboxes.selected();

        // Prevent actual form submission
        e.preventDefault();
    });
    $('#frm-example .submit-btn').on('click', function() {

        $checked = $('#frm-example tbody tr.selected');
        var data = [];
        $checked.each(function() {
            data.push(Number($(this).attr('data-id')));
        });
        var url = '';
        if ($(this).attr('id') == 'approve-btn')
            url = '/manage/blogs/approve';
        else if ($(this).attr('id') == 'reject-btn')
            url = '/manage/blogs/reject';
        else if ($(this).attr('id') == 'delete-btn')
            url = '/manage/blogs/delete';
        if (data.length > 0) {
            swal({
                title: "Confirm",
                text: "Are you sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, go ahead!",
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,
                        data: { ids: data, _token: $('input[name="_token"]').val() },
                        type: 'POST',
                        success: function(res) {
                            if (JSON.parse(res)['message'] == "success") {
                                swal({
                                    title: "Done!",
                                    text: "Action Successed.",
                                    type: "success",
                                }, function() {
                                    window.location = location;
                                });
                            }
                        },
                        error: function(res) {
                            localStorage.fadeInErrorMessage = "Action Failed";
                            //window.location = location;
                        }
                    });

                } else {
                    swal("Cancelled", "Action Cancelled", "error");
                }
            });
        }
    });


    $('#demoNotify').click(function() {
        $.notify({
            title: "Update Complete : ",
            message: "Something cool is just updated!",
            icon: 'fa fa-check'
        }, {
            type: "info"
        });
    });
    $('#demoSwal').click(function() {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });

});