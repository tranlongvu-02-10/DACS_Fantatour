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


     
    $("#error").hide();
    $("#message").hide();
    $('#error_login').hide();
        // Handle form submission for signin
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


    // Handle form submission for signup
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

   

    
    $('#price').on('change', filterTours);
    $('input[name="domain"]').on('change', filterTours);
    $('input[name="filter_star"]').on('change', filterTours);
    $('input[name="duration"]').on('change', filterTours);

    //lọc tour
    function filterTours(){
        var price = $('#price').val();
        var domain = $('input[name="domain"]:checked').val();
        var star = $('input[name="filter_star"]:checked').val();
        var duration = $('input[name="duration"]:checked').val();

        var formDataFilter = {
            'price': price,
            'domain': domain,
            'star': star,
            'time': duration
        };

        $.ajax({
            url: filterToursUrl,
            method: 'GET',
            data: formDataFilter,
            success: function(res) {
                console.log(res);
                // Xử lý kết quả ở đây
                $('#tours-container').html(res);
                console.log($('#tours-container').html(res));
            }
        });

    }


     
   
});




