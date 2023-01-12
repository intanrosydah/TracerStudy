$(function () {
    // get data
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var table = $("#tableListAlumni2019").DataTable({
        scrollX: true,
        // serverSide: true,
        processing: true,
        ajax: routeDataAlumni2019,
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                searchable: false,
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
                data: "id_jurusan",
                name: "Jurusan",
            },
            {
                data: "id_alumni_angkatan",
                name: "Alumni Angkatan",
            },
            {
                data: "nomor_telepon",
                name: "Nomor Telepon",
            },
            {
                data: "id_status_menikah",
                name: "Status Menikah",
            },
            {
                data: "tahun_menikah",
                name: "Tahun Menikah",
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
                data: "jurusan_kuliah",
                name: "Jurusan Kuliah",
            },
            {
                data: "posisi_pekerjaan",
                name: "Posisi Pekerjaan",
            },
            {
                data: "alamat_lengkap",
                name: "alamat",
            },
        ],
    });
});
