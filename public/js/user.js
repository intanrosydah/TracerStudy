$(function () {
    $(".admin-input").hide();
    $(".user-input").hide();
    $(".nama-lengkap").hide();
    $(".user-pass").hide();

    $("#role").change(function () {
        var roleVal = $("#role").val();

        if (roleVal === "superadmin" || roleVal === "guru") {
            $(".admin-input").show();
            $(".user-input").hide();
            $(".nama-lengkap").show();
            $(".user-pass").show();
        } else {
            $(".user-input").show();
            $(".admin-input").hide();
            $(".nama-lengkap").show();
            $(".user-pass").show();
        }
    });

    // get data
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var table = $("#tableUser").DataTable({
        scrollX: true,
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
                searchable: false,
                render: function (data, type, row, meta) {
                    var btnEditData =
                        `<a href="javascript:void(0)" data-toggle="tooltip" data-id="` +
                        row.id +
                        `"
                        data-original-title="Edit" class="btn btn-success btn-sm editUser"><i class="fas fa-fw fa-pen"></i></a>`;

                    var btnDeleteData =
                        `<a href="javascript:void(0)" data-toggle="tooltip" data-id="` +
                        row.id +
                        `"
                        data-original-title="Hapus" class="btn btn-danger btn-sm hapusUser ml-1"><i class="fas fa-fw fa-trash-alt"></i></a>`;

                    return btnEditData + btnDeleteData;
                },
            },
            {
                data: "nis",
                name: "NIS",
            },
            {
                data: "username",
                name: "Username",
            },
            {
                data: "name",
                name: "Nama Lengkap",
            },
            {
                data: "role",
                name: "Role",
            },
            {
                data: "jenis_kelamin",
                name: "Jenis Kelamin",
            },
            {
                data: "tempat_lahir",
                name: "Tempat Lahir",
            },
            {
                data: "tanggal_lahir",
                name: "Tanggal Lahir",
            },
            {
                data: "wali_kelas",
                name: "Wali Kelas",
            },
            {
                data: "jurusan",
                name: "Jurusan",
            },
            {
                data: "alumni_angkatan",
                name: "Alumni Angkatan",
            },
            {
                data: "alamat_lengkap",
                name: "alamat",
            },
        ],
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
                $("#formUser").trigger("reset");
                $("#modalUser").modal("hide");
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
    $("body").on("click", ".editUser", function () {
        var idUser = $(this).data("id");
        $.get(routeIndex + "/" + idUser + "/edit", function (data) {
            $("#modalHeading").html("Edit Data User");
            $("#modalUser").modal("show");

            if (data.role === "superadmin" || data.role === "guru") {
                $(".admin-input").show();
                $(".user-input").hide();
                $(".nama-lengkap").show();
                $(".user-pass").show();
                $("#pass").html("(Tidak usah diisi jika tidak diganti)");
            } else {
                $(".user-input").show();
                $(".admin-input").hide();
                $(".nama-lengkap").show();
                $(".user-pass").show();
                $("#pass").html("(Tidak usah diisi jika tidak diganti)");
            }
            // data
            $("#id_user").val(data.id);
            $("#nama_lengkap").val(data.name);
            $("#nis").val(data.nis);
            $("#jenis_kelamin").val(data.jenis_kelamin);
            $("#tempat_lahir").val(data.tempat_lahir);
            $("#tanggal_lahir").val(data.tanggal_lahir);
            $("#jurusan").val(data.id_jurusan);
            $("#wali_kelas").val(data.wali_kelas);
            $("#alamat_lengkap").val(data.alamat_lengkap);
            $("#username").val(data.username);
            $("#role").val(data.role);
            $("#alumni_angkatan").val(data.id_alumni_angkatan);
        });
    });
});
