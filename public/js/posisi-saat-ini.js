$(function () {
    // get data
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var table = $("#tablePosisiSaatIni").DataTable({
        // scrollX: true,
        // serverSide: true,
        processing: true,
        ajax: routeIndex,
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                searchable: false,
            },
            {
                data: "aksi",
                name: "Aksi",
                // orderable: false,
                searchable: false,
            },
            {
                data: "posisi",
                name: "Posisi",
            },
        ],
    });

    $("#tambahPosisiSaatIni").click(function () {
        $("#id_posisi_saat_ini").val();
        $("#formPosisiSaatIni").trigger("reset");
        $("#modalHeading").html("Tambah Data Posisi Saat Ini");
        $("#modalPosisiSaatIni").modal("show");
    });

    // simpan data
    $("#btnSimpan").click(function (e) {
        e.preventDefault();

        var data = $("#formPosisiSaatIni").serialize();

        $.ajax({
            data: data,
            url: routeSimpan,
            type: "POST",
            dataType: "json",
            success: function (data) {
                $("#formPosisiSaatIni").trigger("reset");
                $("#modalPosisiSaatIni").modal("hide");
                table.ajax.reload();

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Data berhasil disimpan",
                    showConfirmButton: false,
                    timer: 1500,
                });
            },
            error: function (data) {
                console.log("Error: " + data);
                $("#btnSimpan").html("Simpan");
            },
        });
    });

    // hapus data
    $("body").on("click", ".hapusPosisiSaatIni", function () {
        var idPosisiSaatIni = $(this).data("id");
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
                    url: routeSimpan + "/" + idPosisiSaatIni,
                    success: function (data) {
                        table.ajax.reload();

                        Swal.fire(
                            "Terhapus!",
                            "Data anda telah dihapus.",
                            "success"
                        );
                    },
                    error: function (data) {
                        console.log("Error: " + data);
                    },
                });
            }
        });
    });

    // edit data
    $("body").on("click", ".editPosisiSaatIni", function () {
        var idPosisiSaatIni = $(this).data("id");
        $.get(routeIndex + "/" + idPosisiSaatIni + "/edit", function (data) {
            $("#modalHeading").html("Edit Data Posisi Saat Ini");
            $("#modalPosisiSaatIni").modal("show");
            // data
            $("#id_posisi_saat_ini").val(data.id);
            $("#posisi_saat_ini").val(data.posisi);
        });
    });
});
