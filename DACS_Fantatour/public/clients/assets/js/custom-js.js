$(document).ready(function () {
    var sqlInjectionPattern = /[<>'"%;()&+]/;

    

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
                type: "POST",
                url: $(this).attr("action"),
                data: formData,
                success: function (response) {
                    if (response.success) {
                        window.location.href = "/";
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    toastr.error("Có lỗi xảy ra. Vui lòng thử lại sau.");
                },
            });

        }
    });


       // xử lý đăng kí
    $("#register-form").on("submit", function (e) {
        e.preventDefault();
        $(".loader").show();
        $("#register-form").addClass("hidden-content");

        // Lấy giá trị của các trường nhập liệu
        var userName = $("#username_register").val().trim();
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
        if (sqlInjectionPattern.test(userName)) {
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
            username_regis: userName,
            email: email,
            password_regis: password,
            _token: $('input[name="_token"]').val()
            };

            console.log(formData, $(this).attr("action"));

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: formData,
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message, {timeOut :5000});
                        $("#register-form").removeClass("hidden-content").trigger("reset");
                        $(".loader").hide();
                    } else {
                        toastr.error(response.message);
                    }
                    
                },
                error: function (xhr, textStatus, errorThrown) {
                    toastr.error("Có lỗi xảy ra. Vui lòng thử lại sau.");
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
                if (response.success) {
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                toastr.error("Có lỗi xảy ra. Vui lòng thử lại sau.");
            },
        });

    });
    
     $('#update_password_profile').on('click', function() {
    $('#card_change_password').toggle()
    });

    $(".change_password_profile").on("submit", function (e) {
        e.preventDefault();
        var oldPass = $("#inputOldPass").val();
        var newPass = $("#inputNewPass").val();
        var isValid = true;

        // Kiểm tra độ dài mật khẩu
        if (oldPass.length < 6 || newPass.length < 6) {
            isValid = false;
            $("#validate_password")
                .show()
                .text("Mật khẩu phải có ít nhất 6 ký tự.");
        }

        if (sqlInjectionPattern.test(newPass)) {
            isValid = false;
            $("#validate_password")
                .show()
                .text("Mật khẩu không được chứa ký tự đặc biệt.");
        }

        if (isValid) {
            $("#validate_password").hide().text("");
            var updatePass = {
                oldPass: oldPass,
                newPass: newPass,
                _token: $('input[name="_token"]').val(),
            };

            console.log(updatePass);

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: updatePass,
                success: function (response) {
                    if (response.success) {
                        $("#validate_password").hide().text("");
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $("#validate_password")
                        .show()
                        .text(xhr.responseJSON.message);
                    toastr.error(xhr.responseJSON.message);
                },
            });
        }
    });

    //Cập nhật avatar
    $("#avatar").on("change", function () {
        const file = event.target.files[0];
        if (file) {
            // Hiển thị ảnh vừa chọn trước khi gửi lên server
            const reader = new FileReader();
            reader.onload = function (e) {
                $("#avatarPreview").attr("src", e.target.result);
                $(".img-account-profile").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
            var __token = $(this)
                .closest(".card-body")
                .find("input.__token")
                .val();
            var url_avatar = $(this)
                .closest(".card-body")
                .find("input.label_avatar")
                .val();
            // Tạo FormData để gửi file qua AJAX
            const formData = new FormData();
            formData.append("avatar", file);

            console.log(url_avatar);

            // // Gửi AJAX đến server
            $.ajax({
                url: url_avatar,
                type: "POST",
                headers: {
                    "X-CSRF-TOKEN": __token,
                },
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    toastr.error("Có lỗi xảy ra. Vui lòng thử lại sau.");
                },
            });
        }

    });

      /****************************************
     *             PAGE BOOKING             *
     * ***************************************/
    let discount = 0; // Giảm giá, có thể cập nhật khi áp dụng mã giảm giá

    function updateSummary() {
        // Lấy số lượng người lớn và trẻ em
        const numAdults = parseInt($("#numAdults").val());
        const numChildren = parseInt($("#numChildren").val());

        // Lấy giá từ thuộc tính data-price
        const adultPrice = parseInt($("#numAdults").data("price-adults"));
        const childPrice = parseInt($("#numChildren").data("price-children"));

        // Tính toán tổng giá cho người lớn và trẻ em
        const adultsTotal = numAdults * adultPrice;
        const childrenTotal = numChildren * childPrice;

        // Cập nhật hiển thị số lượng và giá tiền cho từng loại
        $(".quantity__adults").text(numAdults);
        $(".quantity__children").text(numChildren);
        $(".summary-item:nth-child(1) .total-price").text(
            adultPrice.toLocaleString() + " VNĐ"
        );
        $(".summary-item:nth-child(2) .total-price").text(
            childPrice.toLocaleString() + " VNĐ"
        );

        // Tính tổng giá trị
        totalPrice = adultsTotal + childrenTotal - discount;
        $(".summary-item.total-price span:last").text(
            totalPrice.toLocaleString() + " VNĐ"
        );
    }
        // Sử kiện tăng/giảm số lượng người lớn và trẻ em
        $('.quantity-selector').on('click', '.quantity-btn', function () {
            const input = $(this).siblings('input');
            const min = parseInt(input.attr('min'));
            let value = parseInt(input.val());

            // Kiểm tra nút tăng hay giảm
            if ($(this).text() === '+') {
                value++;
            } else if (value > min) {
                value--;
            }

            // Cập nhật số lượng vào input
            input.val(value);

            // Cập nhật lại tổng giá
            updateSummary();
        });

        // Áp dụng mã giảm giá
    $(".btn-coupon").on("click", function (e) {
        e.preventDefault();
        const couponCode = $(".order-coupon input").val();

        // Giả sử mã giảm giá là "DISCOUNT10" giảm 10%
        if (couponCode === "DISCOUNT10") {
            discount =
                0.1 *
                (parseInt($("#numAdults").val()) *
                    $("#numAdults").data("price-adults") +
                    parseInt($("#numChildren").val()) *
                        $("#numChildren").data("price-children"));
            toastr.success("Áp dụng mã giảm giá thành công!");
        } else {
            discount = 0;
            toastr.error("Mã giảm giá không hợp lệ!");
        }

        $(".summary-item:nth-child(3) .total-price").text(
            discount.toLocaleString() + " VNĐ"
        );
        updateSummary();
    });

     // Sự kiện khi thay đổi trạng thái checkbox
    $("#agree").on("change", function () {
        toggleButtonState();
    });

    // Hàm thay đổi trạng thái của nút
    function toggleButtonState() {
        if ($("#agree").is(":checked")) {
            $(".btn-submit-booking")
                .removeClass("inactive")
                .css("pointer-events", "auto");
        } else {
            $(".btn-submit-booking")
                .addClass("inactive")
                .css("pointer-events", "none");
        }
    }

     // Kiểm tra tính hợp lệ khi nhấn nút submit
    $(".btn-submit-booking").on("click", function (e) {
        e.preventDefault();
        let isValid = true;

        // Xóa thông báo lỗi cũ
        $(".error-message").hide();
        // Kiểm tra họ và tên (không được để trống)
        const username = $("#username").val().trim();
        if (username === "") {
            $("#usernameError").text("Họ và tên không được để trống").show();
            isValid = false;
        }

        // Kiểm tra email (phải đúng định dạng email)
        const email = $("#email").val().trim();
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
        if (email === "") {
            $("#emailError").text("Email không được để trống").show();
            isValid = false;
        } else if (!emailPattern.test(email)) {
            $("#emailError").text("Email không đúng định dạng").show();
            isValid = false;
        }
        // Kiểm tra số điện thoại (phải là số và từ 10-11 ký tự)
        const tel = $("#tel").val().trim();
        const telPattern = /^[0-9]{10,11}$/;
        if (tel === "") {
            $("#telError").text("Số điện thoại không được để trống").show();
            isValid = false;
        } else if (!telPattern.test(tel)) {
            $("#telError").text("Số điện thoại phải có 10-11 chữ số").show();
            isValid = false;
        }
        // Kiểm tra địa chỉ (không được để trống)
        const address = $("#address").val().trim();
        if (address === "") {
            $("#addressError").text("Địa chỉ không được để trống").show();
            isValid = false;
        }
        if(isValid)
        {
            alert("from hợp lệ! tiến hành gửi dữ liệu");
        }

    });
    updateSummary();
    toggleButtonState();
    
  


});



     
   





