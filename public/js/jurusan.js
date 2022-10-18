$(function () {
    // get data
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var table = $("#tableJurusan").DataTable({
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
                data: "jurusan",
                name: "Jurusan",
            },
        ],
    });

    $("#tambahJurusan").click(function () {
        $("#id_jurusan").val();
        $("#formJurusan").trigger("reset");
        $("#modalHeading").html("Tambah Data Jurusan");
        $("#modalJurusan").modal("show");
    });

    // simpan data
    $("#btnSimpan").click(function (e) {
        e.preventDefault();

        var data = $("#formJurusan").serialize();

        $.ajax({
            data: data,
            url: routeSimpan,
            type: "POST",
            dataType: "json",
            success: function (data) {
                $("#formJurusan").trigger("reset");
                $("#modalJurusan").modal("hide");
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
    $("body").on("click", ".hapusJurusan", function () {
        var idJurusan = $(this).data("id");
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
                    url: routeSimpan + "/" + idJurusan,
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
    $("body").on("click", ".editJurusan", function () {
        var idJurusan = $(this).data("id");
        $.get(routeIndex + "/" + idJurusan + "/edit", function (data) {
            $("#modalHeading").html("Edit Data Jurusan");
            $("#modalJurusan").modal("show");
            // data
            $("#id_jurusan").val(data.id);
            $("#jurusan").val(data.jurusan);
        });
    });
});
