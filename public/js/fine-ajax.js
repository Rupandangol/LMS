$(function () {
    $('#fine-cal').on('click', function () {
        var id = $("#isbn-id").val();
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/api/fine",
            data: {'fine_id': id},
            cache: false,
            success: function (data) {
                if (data.status===true) {
                    $('#sName').val(data.studentName);
                    $('#bName').val(data.bookName);
                    $('#fine_name').val(data.asdfsadf);

                }else{
                    $('#sName').val(data.noDataElement);
                    $('#bName').val(data.noDataElement);
                }
                console.log(data);
            }
        });
        // console.log(id);

    })
})