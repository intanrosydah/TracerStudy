$(function () {
    // get data
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var table = $("#tableAlumniAngkatan").DataTable({
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
                data: "tahun_angkatan",
                name: "Tahun Angkatan",
            },
        ],
    });

    $("#tambahAlumniAngkatan").click(function () {
        $("#id_alumni_angkatan").val();
        $("#formAlumniAngkatan").trigger("reset");
        $("#modalHeading").html("Tambah Data Alumni Angkatan");
        $("#modalAlumniAngkatan").modal("show");
    });

    // simpan data
    $("#btnSimpan").click(function (e) {
        e.preventDefault();

        var data = $("#formAlumniAngkatan").serialize();

        $.ajax({
            data: data,
            url: routeSimpan,
            type: "POST",
            dataType: "json",
            success: function (data) {
                $("#formAlumniAngkatan").trigger("reset");
                $("#modalAlumniAngkatan").modal("hide");
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
    $("body").on("click", ".hapusAlumniAngkatan", function () {
        var idAlumniAngkatan = $(this).data("id");
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
                    url: routeSimpan + "/" + idAlumniAngkatan,
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
    $("body").on("click", ".editAlumniAngkatan", function () {
        var idAlumniAngkatan = $(this).data("id");
        $.get(routeIndex + "/" + idAlumniAngkatan + "/edit", function (data) {
            $("#modalHeading").html("Edit Data Alumni Angkatan");
            $("#modalAlumniAngkatan").modal("show");
            // data
            $("#id_alumni_angkatan").val(data.id);
            $("#alumni_angkatan").val(data.tahun_angkatan);
        });
    });
});
