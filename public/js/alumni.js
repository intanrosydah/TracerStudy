$(function () {
    // get data
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var table = $("#tableAlumni").DataTable({
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
            },
            {
                data: "nama_lengkap",
                name: "Nama Lengkap",
            },
            {
                data: "tanggal_lahir",
                name: "Tanggal Lahir",
            },
            {
                data: "jenis_kelamin",
                name: "Jenis kelamin",
            },
            {
                data: "status_pernikahan.status_pernikahan",
                name: "Status Pernikahan",
            },
            {
                data: "alumni_angkatan.tahun_angkatan",
                name: "Alumni Angkatan",
            },
            {
                data: "jurusan.jurusan",
                name: "Jurusan",
            },
            {
                data: "posisi_saat_ini.posisi",
                name: "Posisi Saat Ini",
            },
            {
                data: "nama_instansi",
                name: "Nama Instansi",
            },
            {
                data: "bidang_instansi",
                name: "Bidang Instansi",
            },
            {
                data: "posisi_pekerjaan",
                name: "Posisi Pekerjaan",
            },
            {
                data: "alamat_lengkap",
                name: "Alamat ",
            },
        ],
    });

    $("#tambahAlumni").click(function () {
        $("#id_alumni").val();
        $("#formAlumni").trigger("reset");
        $("#modalHeading").html("Tambah Data Alumni");
        $("#modalAlumni").modal("show");
    });

    // simpan data
    $("#btnSimpan").click(function (e) {
        e.preventDefault();

        var data = $("#formAlumni").serialize();

        $.ajax({
            data: data,
            url: routeSimpan,
            type: "POST",
            dataType: "json",
            success: function (data) {
                $("#formAlumni").trigger("reset");
                $("#modalAlumni").modal("hide");
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
    $("body").on("click", ".hapusAlumni", function () {
        var idAlumni = $(this).data("id");
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
                    url: routeSimpan + "/" + idAlumni,
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
    $("body").on("click", ".editAlumni", function () {
        var idAlumni = $(this).data("id");
        $.get(routeIndex + "/" + idAlumni + "/edit", function (data) {
            $("#modalHeading").html("Edit Data Alumni");
            $("#modalAlumni").modal("show");
            // data
            $("#id_alumni").val(data.id);
            $("#nama_lengkap").val(data.nama_lengkap);
            $("#tanggal_lahir").val(data.tanggal_lahir);
            $("#jenis_kelamin").val(data.jenis_kelamin);
            $("#status_pernikahan").val(data.id_status_menikah);
            $("#alumni_angkatan").val(data.id_alumni_angkatan);
            $("#jurusan").val(data.id_jurusan);
            $("#posisi_saat_ini").val(data.id_posisi_saat_ini);
            $("#nama_instansi").val(data.nama_instansi);
            $("#bidang_instansi").val(data.bidang_instansi);
            $("#posisi_pekerjaan").val(data.posisi_pekerjaan);
            $("#alamat_lengkap").val(data.alamat_lengkap);
        });
    });
});
