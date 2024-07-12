$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".custom-file-input").on("change", function (e) {
        var fileName = $(this)[0].files.length ? $(this)[0].files[0].name : "";

        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;

        e.preventDefault();

        var dataUploadImage = new FormData($("form#formUploadImage")[0]);

        $.ajax({
            type: "POST",
            url: routeUploadImage,
            data: dataUploadImage,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (data) {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Foto berhasil diunggah!",
                    showConfirmButton: false,
                    timer: 1500,
                });

                location.reload();
            },
            error: function (data) {
                console.log("Error: " + data);
            },
        });
    });
});
