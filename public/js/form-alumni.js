$(function () {
    function restrictNumber(e) {
        var newValue = this.value.replace(new RegExp(/[^0-9\.]/g, "ig"), "");
        this.value = newValue;
    }

    $("#nis").on("input", restrictNumber);
    $("#nomor_telepon").on("input", restrictNumber);
    $("#tahun_menikah").on("input", restrictNumber);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // simpan data
    $("#btnSimpan").click(function (e) {
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
                    title: "Data berhasil diperbaharui",
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
