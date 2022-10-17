$(function () {
    // get data
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var table = $("#tableUser").DataTable({
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
                data: "name",
                name: "Nama Lengkap",
            },
            {
                data: "email",
                name: "Email",
            },
            {
                data: "role",
                name: "Role",
            },
        ],
        aaSorting: [[0, "desc"]],
    });

    $("#tambahUser").click(function () {
        $("#id_user").val();
        $("#formUser").trigger("reset");
        $("#modalHeading").html("Tambah Data User");
        $("#modalUser").modal("show");
    });

    // simpan data
    $("#btnSimpan").click(function (e) {
        e.preventDefault();

        var data = $("#formUser").serialize();

        $.ajax({
            data: data,
            url: routeSimpan,
            type: "POST",
            dataType: "json",
            success: function (data) {
                table.draw();
                $("#formUser").trigger("reset");
                $("#modalUser").modal("hide");

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
    $("body").on("click", ".hapusUser", function () {
        var idUser = $(this).data("id");
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
                    url: routeSimpan + "/" + idUser,
                    success: function (data) {
                        table.draw();
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
    $("body").on("click", ".editUser", function () {
        var idUser = $(this).data("id");
        $.get(routeIndex + "/" + idUser + "/edit", function (data) {
            $("#modalHeading").html("Edit Data User");
            $("#modalUser").modal("show");
            // data
            $("#id_user").val(data.id);
            $("#nama_lengkap").val(data.name);
            $("#email").val(data.email);
            $("#role").val(data.role);
        });
    });
});
