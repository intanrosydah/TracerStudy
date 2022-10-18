$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // simpan data
    $("#btnSubmitData").click(function (e) {
        e.preventDefault();

        var data = $("#formSubmitAlumni").serialize();

        $.ajax({
            data: data,
            url: routeSimpan,
            type: "POST",
            dataType: "json",
            success: function (data) {
                $("#formSubmitAlumni").trigger("reset");

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Data berhasil disubmit",
                    showConfirmButton: false,
                    timer: 1500,
                });
            },
            error: function (data) {
                console.log("Error: " + data);
                $("#btnSubmitData").html("Simpan");
            },
        });
    });
});
