$(function () {
    // get data
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var table = $("#tableDashboardAlumni").DataTable({
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
});
