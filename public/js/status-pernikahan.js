$(function () {
    // get data
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var table = $("#tableStatusPernikahan").DataTable({
        // scrollX: true,
        serverSide: true,
        processing: true,
        ajax: routeIndex,
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
            },
            {
                data: "aksi",
                name: "Aksi",
            },
            {
                data: "status_pernikahan",
                name: "Status Pernikahan",
            },
        ],
        aaSorting: [[0, "desc"]],
    });

    $("#tambahStatusPernikahan").click(function () {
        $("#id_status_pernikahan").val();
        $("#formStatusPernikahan").trigger("reset");
        $("#modalHeading").html("Tambah Data Status Pernikahan");
        $("#modalStatusPernikahan").modal("show");
    });

    // simpan data
    $("#btnSimpan").click(function (e) {
        e.preventDefault();

        var data = $("#formStatusPernikahan").serialize();

        $.ajax({
            data: data,
            url: routeSimpan,
            type: "POST",
            dataType: "json",
            success: function (data) {
                $("#formStatusPernikahan").trigger("reset");
                $("#modalStatusPernikahan").modal("hide");
                table.draw();

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Data berhasil disimpan",
                    showConfirmButton: false,
                    timer: 1600,
                });
            },
            error: function (data) {
                console.log("Error: " + data);
                $("#btnSimpan").html("Simpan");
            },
        });
    });

    // hapus data
    $("body").on("click", ".hapusStatusPernikahan", function () {
        var idStatusPernikahan = $(this).data("id");
        Swal.fire({
            title: "Apakah kamu yakin?",
            text: "Anda tidak akan dapat mengembalikan data ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            confirmButtonText: "Ya, hapus",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: routeSimpan + "/" + idStatusPernikahan,
                    success: function (data) {
                        Swal.fire(
                            "Terhapus!",
                            "Data anda telah dihapus.",
                            "success"
                        );

                        table.draw();
                    },
                    error: function (data) {
                        console.log("Error: " + data);
                    },
                });
            }
        });
    });

    // edit data
    $("body").on("click", ".editStatusPernikahan", function () {
        var idStatusPernikahan = $(this).data("id");
        $.get(routeIndex + "/" + idStatusPernikahan + "/edit", function (data) {
            $("#modalHeading").html("Edit Data Status Pernikahan");
            $("#modalStatusPernikahan").modal("show");
            // data
            $("#id_status_pernikahan").val(data.id);
            $("#status_pernikahan").val(data.status_pernikahan);
        });
    });
});
