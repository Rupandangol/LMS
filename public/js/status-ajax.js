$(function () {
    $("#status_btn").on('click', function () {
        var status = $(this).val();
        var status_id = $("#status_id").val();
        var base_url = window.location.origin;
        $.ajax({
            url: base_url + "/api/status",
            data: {'status_val': status, 's_id': status_id},
            cache: false,
            success: function (data) {
                console.log(data);
            }
        });
    });
});