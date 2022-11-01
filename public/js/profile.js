$(document).ready(function () {
    $("#passwordBaru").hide();

    $("#ubahPassword").click(function () {
        $("#passwordBaru").show();
    });
});

$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // simpan data
    $("#updatePassword").click(function (e) {
        e.preventDefault();

        var data = $("#formUpdatePassword").serialize();

        $.ajax({
            data: data,
            url: routeSimpan,
            type: "POST",
            dataType: "json",
            success: function (data) {
                $("#formUpdatePassword").trigger("reset");
                $("#passwordBaru").hide();

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Password berhasil diupdate!",
                    showConfirmButton: false,
                    timer: 1500,
                });
            },
            error: function (data) {
                console.log("Error: " + data);
            },
        });
    });
});
