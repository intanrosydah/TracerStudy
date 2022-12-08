$(document).ready(function () {
    $("#loginForm").hide();
    $("#nisLogin").hide();

    $("#role").change(function () {
        var roleVal = $("#role").val();

        if (roleVal === "superadmin_or_guru") {
            $("#loginForm").show();
            $("#nisLogin").hide();
            $("#nis").removeAttr("required");
        } else if (roleVal === "user") {
            $("#loginForm").hide();
            $("#nisLogin").show();
            $("#username").removeAttr("required");
            $("#exampleInputPassword").removeAttr("required");
        }
    });
});
