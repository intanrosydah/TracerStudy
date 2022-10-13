$(function () {
    // get data
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var table = $("#tableAlumni").DataTable({
        scrollX: true,
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
                data: "id_status_menikah",
                name: "Status Pernikahan",
            },
            {
                data: "id_alumni_angkatan",
                name: "Alumni Angkatan",
            },
            {
                data: "id_jurusan",
                name: "Jurusan",
            },
            {
                data: "id_posisi_saat_ini",
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
        $(this).html("Simpan");

        $.ajax({
            data: $("#formAlumni").serialize(),
            url: routeSimpan,
            type: "POST",
            dataType: "json",
            success: function (data) {
                $("#formAlumni").trigger("reset");
                $("#modalAlumni").modal("hide");
                table.draw();
            },
            error: function (data) {
                console.log("Error: " + data);
                $("#btnSimpan").html("Simpan");
            },
        });
    });
});
