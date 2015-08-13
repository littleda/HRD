$(document).ready(function () {
    $("#SDate").change(function () {
//alert("dskkd");
        var cutdate = $("#SDate").val().split("/");
        if (parseInt(cutdate[2]) < "2500") {
            var year = parseInt(cutdate[2]) + 543;
            $("#SDate").val(cutdate[0] + "/" + cutdate[1] + "/" + year);
            //alert(year);
        }

    });
    $("#EDate").change(function () {
        var cutdate = $("#EDate").val().split("/");
        if (parseInt(cutdate[2]) < "2500") {
            var year = parseInt(cutdate[2]) + 543;
            $("#EDate").val(cutdate[0] + "/" + cutdate[1] + "/" + year);
            //alert(year);
        }
    });
});