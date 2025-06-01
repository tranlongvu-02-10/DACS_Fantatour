# DACS_Fantatour

##  Giới thiệu
FantaTour là giao diện người dùng của hệ thống đặt tour du lịch trực tuyến **FantaTour**. Dự án được thiết kế để mang lại trải nghiệm đặt tour nhanh chóng, tiện lợi và trực quan cho người dùng.
### Đồ án cơ sở_FantaTour 
## Thành viên
| Mã Thành Viên | Họ Tên |
|--------------|---------|
| 2280603758       | Trần Long Vũ | 
| 2280601752       | Lê Đại Thanh Long | 
| 2280607474       | Nguyễn Khắc Minh Hiếu |

## ✨ Tính năng nổi bật

### 🔹 Người dùng

- **Tìm kiếm tour**: Lọc tour theo từ khóa, điểm đến, thời gian, mức giá,...
- **Đặt tour**: Giao diện thân thiện
- **Quản lý tài khoản**:
  - Cập nhật thông tin cá nhân
  - Xem lịch sử đặt tour
  - Đổi mật khẩu hoặc xóa tài khoản
- **Hỗ trợ trực tuyến**: Gửi tin nhắn cho quản trị viên để được hỗ trợ.
- **Đăng nhập an toàn**:
  - Hỗ trợ Google
  - Kích hoạt email khi đăng ký

### 🔸 Quản trị viên

- **Quản lý tour**:
  - Thêm, sửa, xóa tour
  - Quản lý hành trình, đánh giá và tình trạng còn chỗ
  - Phân tích số liệu tour
- **Quản lý người dùng**:
  - Xem/sửa thông tin người dùng
  - Theo dõi lịch sử đặt chỗ
  - Cấm hoặc xóa người dùng
- **Khuyến mãi**: Tạo & quản lý mã giảm giá hoặc chiến dịch khuyến mãi.
- **Báo cáo**:
  - Thống kê doanh thu
  - Phân tích lượt đặt tour

## 🔧 Công nghệ sử dụng

- **Frontend**:
  - HTML, CSS, JavaScript, Bootstrap
  - jQuery, AJAX
  - DateTimePicker (chọn ngày)
- **Backend**:
  - PHP Laravel Framework
  - MySQL
- **Khác**:
  - Mẫu Blade (Laravel View Engine)
  - Đăng nhập với Google
  - Kích hoạt email xác thực
 
travela/
├── app/               # Controllers, Models, Services (xử lý logic backend)
├── database/          # Migrations và Seeders (khởi tạo dữ liệu)
├── public/            # Tài nguyên công khai (JS, CSS, hình ảnh,...)
├── resources/         # Giao diện người dùng với Blade Templates
├── routes/            # Định tuyến ứng dụng (web.php, api.php)
├── storage/           # Lưu trữ file, cache và logs
└── tests/             # Unit Test và Feature Test tự động



