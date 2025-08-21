# Admin Panel - Quản lý Blog & Bài viết

Một hệ thống quản trị blog hoàn chỉnh được xây dựng bằng PHP, Bootstrap, và JavaScript với giao diện hiện đại và dễ sử dụng.

## 🚀 Tính năng chính

### 📝 Quản lý bài viết
- **Tạo bài viết mới** với trình soạn thảo rich text (Summernote)
- **Chỉnh sửa bài viết** với preview real-time
- **Xóa bài viết** với xác nhận
- **Quản lý trạng thái**: Nháp, Xuất bản, Lưu trữ
- **Tải lên hình ảnh** đại diện cho bài viết
- **Phân loại theo danh mục** và tags
- **Tìm kiếm và lọc** bài viết theo nhiều tiêu chí
- **Phân trang** cho danh sách bài viết

### 👥 Quản lý người dùng
- **Hệ thống đăng nhập** an toàn với session
- **Phân quyền người dùng**: Admin, Editor, Author
- **Quản lý tài khoản** admin

### 📊 Dashboard
- **Thống kê tổng quan**: Số bài viết, người dùng
- **Bài viết gần đây** và phổ biến
- **Thao tác nhanh** đến các chức năng chính

### 🎨 Giao diện
- **Responsive design** với Bootstrap 5
- **Giao diện hiện đại** với gradient và shadow
- **Icons Font Awesome** cho trải nghiệm tốt hơn
- **Dark sidebar** với navigation dễ sử dụng

## 🛠️ Cài đặt

### Yêu cầu hệ thống
- PHP 7.4 trở lên
- MySQL 5.7 trở lên hoặc MariaDB 10.2 trở lên
- Web server (Apache/Nginx)
- Extensions PHP: PDO, PDO_MySQL

### Bước 1: Cài đặt database
1. Tạo database mới trong MySQL
2. Import file `src/config/init.sql` để tạo bảng và dữ liệu mẫu

```sql
-- Tạo database
CREATE DATABASE blog_admin CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE blog_admin;

-- Import file init.sql
source src/config/init.sql;
```

### Bước 2: Cấu hình database
Chỉnh sửa file `src/config/database.php` với thông tin database của bạn:

```php
define('DB_HOST', 'localhost');     // Host database
define('DB_NAME', 'blog_admin');    // Tên database
define('DB_USER', 'root');          // Username
define('DB_PASS', '');              // Password
```

### Bước 3: Cấu hình web server

#### Apache (.htaccess đã có sẵn)
Đảm bảo mod_rewrite được bật và .htaccess hoạt động.

#### Nginx
Thêm vào cấu hình server:

```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### Bước 4: Phân quyền thư mục
```bash
chmod 755 src/uploads
chmod 644 src/config/database.php
```

## 🔐 Đăng nhập

Sau khi cài đặt, truy cập vào trang admin:

**URL**: `http://your-domain/src/modules/auth/login.php`

**Tài khoản mặc định**:
- Username: `admin`
- Password: `admin123`

## 📁 Cấu trúc thư mục

```
src/
├── config/          # Cấu hình database
├── helper/          # Helper functions
├── components/      # Header, footer components
├── modules/         # Các trang chính
│   ├── auth/        # Đăng nhập, đăng xuất
│   ├── dashboard.php
│   ├── posts.php
│   ├── add-post.php
│   └── edit-post.php
├── uploads/         # Thư mục lưu hình ảnh
└── assets/          # CSS, JS, images
```

## 🎯 Cách sử dụng

### 1. Tạo bài viết mới
1. Đăng nhập vào admin panel
2. Click "Thêm bài viết mới" từ sidebar hoặc dashboard
3. Điền thông tin bài viết:
   - **Tiêu đề**: Tự động tạo slug
   - **Nội dung**: Sử dụng trình soạn thảo rich text
   - **Tóm tắt**: Mô tả ngắn gọn
   - **Danh mục**: Phân loại bài viết
   - **Tags**: Từ khóa phân cách bằng dấu phẩy
   - **Hình ảnh**: Tải lên hình đại diện
4. Chọn trạng thái và lưu

### 2. Quản lý bài viết
- **Xem danh sách**: Tất cả bài viết với thông tin chi tiết
- **Tìm kiếm**: Theo tiêu đề hoặc nội dung
- **Lọc**: Theo trạng thái hoặc danh mục
- **Chỉnh sửa**: Click icon edit để sửa bài viết
- **Thay đổi trạng thái**: Dropdown để chuyển trạng thái
- **Xóa**: Click icon trash với xác nhận

### 3. Dashboard
- **Thống kê**: Tổng số bài viết, người dùng
- **Bài viết gần đây**: 5 bài viết mới nhất
- **Bài viết phổ biến**: Theo lượt xem
- **Thao tác nhanh**: Link đến các chức năng chính

## 🔧 Tùy chỉnh

### Thay đổi giao diện
- Chỉnh sửa CSS trong `src/components/header.php`
- Thay đổi màu sắc gradient trong `.sidebar`
- Tùy chỉnh Bootstrap theme

### Thêm tính năng mới
- Tạo file PHP mới trong `src/modules/`
- Thêm link navigation trong `src/components/header.php`
- Tạo helper functions trong `src/helper/functions.php`

### Cấu hình bảo mật
- Thay đổi password mặc định
- Cấu hình session timeout
- Thêm CSRF protection
- Bật HTTPS

## 🐛 Xử lý lỗi thường gặp

### Lỗi kết nối database
- Kiểm tra thông tin database trong `src/config/database.php`
- Đảm bảo MySQL service đang chạy
- Kiểm tra quyền truy cập database

### Lỗi upload hình ảnh
- Kiểm tra quyền thư mục `src/uploads/`
- Đảm bảo PHP có quyền ghi file
- Kiểm tra cấu hình `upload_max_filesize` trong php.ini

### Lỗi 404
- Kiểm tra cấu hình .htaccess
- Đảm bảo mod_rewrite được bật
- Kiểm tra đường dẫn file

## 📝 Ghi chú

- Hệ thống sử dụng PDO để bảo mật database
- Tất cả input được sanitize để tránh XSS
- Hình ảnh được validate type và size
- Session được sử dụng cho authentication
- Responsive design hoạt động trên mobile

## 🤝 Đóng góp

Nếu bạn muốn đóng góp vào dự án:
1. Fork repository
2. Tạo feature branch
3. Commit changes
4. Push to branch
5. Tạo Pull Request

## 📄 License

Dự án này được phát hành dưới MIT License.

---

**Tác giả**: Admin Panel Team  
**Phiên bản**: 1.0.0  
**Cập nhật**: 2024