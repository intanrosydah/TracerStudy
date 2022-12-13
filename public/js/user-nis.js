$(function () {
    // get data
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // simpan data
    $("#cekNis").click(function (e) {
        e.preventDefault();

        var data = $("#formCekNis").serialize();

        $.ajax({
            data: data,
            url: routeCekNis,
            type: "POST",
            // dataType: "json",
            success: function (data) {
                $("#formCekNis").trigger("reset");

                if (data.message == "Success") {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Data teridentifikasi",
                        showConfirmButton: false,
                        timer: 1800,
                    });

                    window.location.href = routeFormAlumni;
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops..",
                        text: "Nomor Induk Siswa tidak valid!",
                        showConfirmButton: true,
                        timer: 1800,
                    });
                }
            },
            error: function (data) {
                Swal.fire({
                    icon: "error",
                    title: "Oops..",
                    text: "Something went wrong!",
                    showConfirmButton: true,
                    timer: 1500,
                });

                console.log("Error: " + data);
                $("#cekNis").html("Lanjut");
            },
        });
    });
});
