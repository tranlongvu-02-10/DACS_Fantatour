$(document).ready(function () {

    $("#sign-up").click(function () {
        $(".sign-in").hide();
        $(".signup").show();
    });
    $("#sign-in").click(function () {
        $(".signup").hide();
        $(".sign-in").show();
    });

        /****************************************
                    trang chủ        
        ***************************************/
    $("#start_date, #end_date").datetimepicker({
        format: "Y/m/d H:i",        // Hiển thị ngày + giờ
        timepicker: false,           //  Bật chọn giờ

    });

    $("#userDropdown").click(function () {
    $("#dropdownMenu").toggle(); // Toggle dropdown menu when user clicks
    });


    /****************************************
                    Xử lý đăng nhập, đăng kí       
        ***************************************/ 
    $("#error").hide();
    $("#message").hide();
    $('#error_login').hide();
        // xử lý đăng nhập
    $("#login-form").on("submit", function (e) {
        e.preventDefault();
        var username = $("#username_login").val().trim();
        var password = $("#password_login").val().trim();

        // Đặt lại nội dung thông báo lỗi và ẩn chúng
        $("#validate_username").hide().text("");
        $("#validate_password").hide().text("");

        var isValid = true;

        // Kiểm tra độ dài mật khẩu
        if (password.length < 6) {
            isValid = false;
            $("#validate_password")
                .show()
                .text("Mật khẩu phải có ít nhất 6 ký tự.");
        }

        // Kiểm tra tên đăng nhập và mật khẩu không chứa ký tự đặc biệt (SQL injection)
        
        if (sqlInjectionPattern.test(username)) {
            isValid = false;
            $("#validate_username")
                .show()
                .text("Tên đăng nhập không được chứa ký tự đặc biệt.");
        }

        if (sqlInjectionPattern.test(password)) {
            isValid = false;
            $("#validate_password")
                .show()
                .text("Mật khẩu không được chứa ký tự đặc biệt.");
        }

        if (isValid) {
            $('#error_login').hide();
            var formData = {
                'username': username,
                'password': password,
                '_token': $('input[name="_token"]').val(),
            };
            console.log(formData, $(this).attr("action"));

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
              success: function(response) {
                    if (response.success) {
                        window.location.href ="/";
                    } else {
                        $('#error_login').text(response.message).show();
                    }
                },
                error: function(xhr, textStatus, errorThrown){
                    alert('Có lỗi xảy ra!');
                }
            });

        }
    });


       // xử lý đăng kí
    $("#register-form").on("submit", function (e) {
        e.preventDefault();
        $(".loader").show();
        $("#register-form").addClass("hidden-content");

        // Lấy giá trị của các trường nhập liệu
        var username = $("#username_register").val().trim();
        var email = $("#email_register").val().trim();
        var password = $("#password_register").val().trim();
        var rePass = $("#re_pass").val().trim();

        // Đặt lại nội dung thông báo lỗi và ẩn chúng
        $("#validate_username_regis").hide().text("");
        $("#validate_email_regis").hide().text("");
        $("#validate_password_regis").hide().text("");
        $("#validate_repass").hide().text("");

        // Kiểm tra lỗi
        var isValid = true;

        // Kiểm tra tên đăng nhập không chứa ký tự SQL injection
        if (sqlInjectionPattern.test(username)) {
            isValid = false;
            $("#validate_username_regis")
                .show()
                .text("Tên tài khoản không được chứa ký tự đặc biệt.");
        }

        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            isValid = false;
            $("#validate_email_regis").show().text("Email không hợp lệ.");
        }

        if (password.length < 6) {
            isValid = false;
            $("#validate_password_regis")
                .show()
                .text("Mật khẩu phải có ít nhất 6 ký tự.");
        }

        if (sqlInjectionPattern.test(password)) {
            isValid = false;
            $("#validate_password_regis")
                .show()
                .text("Mật khẩu không được chứa ký tự đặc biệt.");
        }

        // Kiểm tra nhập lại mật khẩu
        if (password !== rePass) {
            isValid = false;
            $("#validate_repass").show().text("Mật khẩu nhập lại không khớp.");
        }

        if (isValid) {
            var formData = {
                'username_regis': username,
                'email': email,
                'password_regis': password,
                '_token': $('input[name="_token"]').val(),
            };
            console.log(formData);

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: formData,
                success: function (response) {
                    if (response.success) {
                        $('#message').text(response.message).show();
                        $('#error').hide();
                    } else {
                        $('#message').hide();
                        $('#error').text(response.message)
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    alert("Có lỗi xảy ra. Vui lòng thử lại sau.");
                },
            });
        }
    });

   
    /****************************************
                    Lọc tour      
        ***************************************/
    
       // Kiểm tra nếu thanh trượt đã tồn tại
    if ($(".price-slider-range").length) {
        $(".price-slider-range").on("slide", function (event, ui) {
            filterTours(ui.values[0], ui.values[1]);
        });
    }
    $('input[name="domain"]').on("change", filterTours);
    $('input[name="filter_star"]').on("change", filterTours);
    $('input[name="duration"]').on("change", filterTours);

    $("#sorting_tours").on("change", function () {
        filterTours(null, null);
    });

    function filterTours(minPrice = null, maxPrice = null) {
        $(".loader").show();
        $("#tours-container").addClass("hidden-content");

        if (minPrice === null || maxPrice === null) {
            minPrice = $(".price-slider-range").slider("values", 0);
            maxPrice = $(".price-slider-range").slider("values", 1);
        }

        var domain = $('input[name="domain"]:checked').val();
        var star = $('input[name="filter_star"]:checked').val();
        var duration = $('input[name="duration"]:checked').val();
        var sorting = $("#sorting_tours").val();

        formDataFilter = {
            minPrice: minPrice,
            maxPrice: maxPrice,
            domain: domain,
            star: star,
            time: duration,
            sorting: sorting,
        };
        console.log(formDataFilter);

        $.ajax({
            url: filterToursUrl,
            method: "GET",
            data: formDataFilter,
            success: function (res) {
                $("#tours-container").html(res).removeClass("hidden-content");
                $("#tours-container .destination-item").addClass("aos-animate");
                $(".loader").hide();
            },
        });
    }

    $(document).on("click", ".pagination-tours a", function (e) {
        e.preventDefault();
        $(".loader").show();
        $("#tours-container").addClass("hidden-content");

        var url = $(this).attr("href");
        console.log(url);

        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (response) {
                // Cập nhật toàn bộ nội dung (tours và phân trang)
                $("#tours-container")
                    .html(response.tours)
                    .removeClass("hidden-content");
                $("#tours-container .destination-item").addClass("aos-animate");
                $("#tours-container .pagination-tours").addClass("aos-animate");
                $(".loader").hide();
            },
            error: function (xhr, status, error) {
                console.log("Có lỗi xảy ra trong quá trình tải dữ liệu!");
            },
        });
    });

    // Hàm để clear các filter đã chọn
    $(".clear_filter a").on("click", function (e) {
        e.preventDefault();
        $(".loader").show();
        $("#tours-container").addClass("hidden-content");
        // Reset slider giá về giá trị mặc định (ví dụ: 0 đến 20000000)
        $(".price-slider-range").slider("values", [0, 20000000]);

        // Bỏ chọn radio và checkbox
        $('input[name="domain"]').prop("checked", false);
        $('input[name="filter_star"]').prop("checked", false);
        $('input[name="duration"]').prop("checked", false);

        
        var url = $(this).attr("href");

        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (response) {
                // Cập nhật toàn bộ nội dung (tours và phân trang)
                $("#tours-container")
                    .html(response.tours)
                    .removeClass("hidden-content");
                $("#tours-container .destination-item").addClass("aos-animate");
                $("#tours-container .pagination-tours").addClass("aos-animate");
                $(".loader").hide();
            },
            error: function (xhr, status, error) {
                console.log("Có lỗi xảy ra trong quá trình tải dữ liệu!");
            },
        });
    });


       /****************************************
                    thông tin cá nhân        
        ***************************************/
    $(".updateUser").on("submit", function (e){
         e.preventDefault();
        var fullName = $("#inputFullName").val();
        var address = $("#inputLocation").val();
        var email = $("#inputEmailAddress").val();
        var phone = $("#inputPhone").val();

        var dataUpdate = {
            'fullName': fullName,
            'address': address,
            'email': email,
            'phone': phone,
            '_token': $('input[name="_token"]').val(),
        };
        console.log(dataUpdate);

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: dataUpdate,
            success: function (response) {
                console.log(response);

                //if (response.success) {
                   // toastr.success(response.message);
               // } else {
                //    toastr.error(response.message);
               // }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert("Có lỗi xảy ra. Vui lòng thử lại sau.");
            },
        });

    });
    
     



     
   
});




