$(document).ready(function () {

    $("#sign-up").click(function () {
        $(".sign-in").hide();
        $(".signup").show();
    });
    $("#sign-in").click(function () {
        $(".signup").hide();
        $(".sign-in").show();
    });

        // Home page
    $("#start_date, #end_date").datetimepicker({
        format: "Y/m/d H:i",        // Hiển thị ngày + giờ
        timepicker: false,           //  Bật chọn giờ

    });

    $("#userDropdown").click(function () {
    $("#dropdownMenu").toggle(); // Toggle dropdown menu when user clicks
    });
    
});


