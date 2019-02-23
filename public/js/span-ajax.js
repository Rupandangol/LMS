$(function () {
    $('#student_id').on('keyup', function () {
        var student = $(this).val();
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/api/check-student",
            data: {'student_id': student},
            cache: false,
            success: function (data) {
                if (data.status === true) {
                    $('#student_name').html(data.student);
                    $('#student_name').show();
                } else {
                    $('#student_name').html('No Data');
                    $('#student_name').show();
                }
                console.log(data);
            }
        });
    });
});

$(function () {
    $('#isbn_id').on('keyup', function () {
        var book = $(this).val();
        var bookName = $('#book_name');
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/api/check-book",
            data: {'book_id': book},
            cache: false,
            success: function (data) {
                if (data.status === true) {
                    bookName.html(data.book);
                    bookName.show();
                } else {
                    bookName.html('No Data');
                    bookName.show();
                }
                console.log(data);
            }

        });
    });
});