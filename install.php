<?php
/**
 * Installation Script for Admin Panel
 * Chạy file này để cài đặt hệ thống admin panel
 */

// Check if already installed
if (file_exists('src/config/installed.txt')) {
    die('Hệ thống đã được cài đặt. Xóa file src/config/installed.txt để cài đặt lại.');
}

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db_host = $_POST['db_host'];
    $db_name = $_POST['db_name'];
    $db_user = $_POST['db_user'];
    $db_pass = $_POST['db_pass'];
    
    // Test database connection
    try {
        $pdo = new PDO("mysql:host=$db_host;charset=utf8mb4", $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Create database if not exists
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $pdo->exec("USE `$db_name`");
        
        // Read and execute SQL file
        $sql = file_get_contents('src/config/init.sql');
        $pdo->exec($sql);
        
        // Update database config
        $config_content = "<?php
// Database configuration
define('DB_HOST', '$db_host');
define('DB_NAME', '$db_name');
define('DB_USER', '$db_user');
define('DB_PASS', '$db_pass');
define('DB_CHARSET', 'utf8mb4');

// Database connection class
class Database {
    private \$host = DB_HOST;
    private \$db_name = DB_NAME;
    private \$username = DB_USER;
    private \$password = DB_PASS;
    private \$charset = DB_CHARSET;
    public \$conn;

    public function getConnection() {
        \$this->conn = null;

        try {
            \$dsn = \"mysql:host=\" . \$this->host . \";dbname=\" . \$this->db_name . \";charset=\" . \$this->charset;
            \$this->conn = new PDO(\$dsn, \$this->username, \$this->password);
            \$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            \$this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException \$exception) {
            echo \"Connection error: \" . \$exception->getMessage();
        }

        return \$this->conn;
    }
}
?>";
        
        file_put_contents('src/config/database.php', $config_content);
        
        // Create uploads directory
        if (!file_exists('src/uploads')) {
            mkdir('src/uploads', 0755, true);
        }
        
        // Create installed marker
        file_put_contents('src/config/installed.txt', date('Y-m-d H:i:s'));
        
        $success = true;
        
    } catch (PDOException $e) {
        $errors[] = 'Lỗi kết nối database: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài đặt Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .install-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        .install-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 15px 15px 0 0;
        }
        .install-body {
            padding: 40px;
        }
    </style>
</head>
<body>
    <div class="install-card">
        <div class="install-header">
            <i class="fas fa-cogs fa-3x mb-3"></i>
            <h3>Cài đặt Admin Panel</h3>
            <p class="mb-0">Hệ thống quản lý Blog & Bài viết</p>
        </div>
        
        <div class="install-body">
            <?php if ($success): ?>
                <div class="text-center">
                    <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                    <h4 class="text-success">Cài đặt thành công!</h4>
                    <p class="text-muted">Hệ thống đã được cài đặt hoàn tất.</p>
                    
                    <div class="alert alert-info">
                        <h6><i class="fas fa-info-circle me-2"></i>Thông tin đăng nhập:</h6>
                        <p class="mb-1"><strong>URL:</strong> <code>src/modules/auth/login.php</code></p>
                        <p class="mb-1"><strong>Username:</strong> <code>admin</code></p>
                        <p class="mb-0"><strong>Password:</strong> <code>admin123</code></p>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <a href="src/modules/auth/login.php" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-2"></i>Đăng nhập ngay
                        </a>
                        <a href="README.md" class="btn btn-outline-secondary">
                            <i class="fas fa-book me-2"></i>Xem hướng dẫn
                        </a>
                    </div>
                    
                    <div class="mt-4">
                        <small class="text-muted">
                            <i class="fas fa-shield-alt me-1"></i>
                            Vui lòng xóa file install.php sau khi cài đặt để bảo mật
                        </small>
                    </div>
                </div>
            <?php else: ?>
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger" role="alert">
                        <h5><i class="fas fa-exclamation-triangle me-2"></i>Có lỗi xảy ra:</h5>
                        <ul class="mb-0">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <h5 class="mb-3">
                        <i class="fas fa-database me-2"></i>Cấu hình Database
                    </h5>
                    
                    <div class="mb-3">
                        <label for="db_host" class="form-label">Database Host</label>
                        <input type="text" class="form-control" id="db_host" name="db_host" 
                               value="<?php echo isset($_POST['db_host']) ? htmlspecialchars($_POST['db_host']) : 'localhost'; ?>" required>
                        <div class="form-text">Thường là localhost hoặc 127.0.0.1</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="db_name" class="form-label">Database Name</label>
                        <input type="text" class="form-control" id="db_name" name="db_name" 
                               value="<?php echo isset($_POST['db_name']) ? htmlspecialchars($_POST['db_name']) : 'blog_admin'; ?>" required>
                        <div class="form-text">Tên database sẽ được tạo tự động</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="db_user" class="form-label">Database Username</label>
                        <input type="text" class="form-control" id="db_user" name="db_user" 
                               value="<?php echo isset($_POST['db_user']) ? htmlspecialchars($_POST['db_user']) : 'root'; ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="db_pass" class="form-label">Database Password</label>
                        <input type="password" class="form-control" id="db_pass" name="db_pass" 
                               value="<?php echo isset($_POST['db_pass']) ? htmlspecialchars($_POST['db_pass']) : ''; ?>">
                        <div class="form-text">Để trống nếu không có password</div>
                    </div>
                    
                    <div class="alert alert-warning">
                        <h6><i class="fas fa-exclamation-triangle me-2"></i>Lưu ý:</h6>
                        <ul class="mb-0 small">
                            <li>Đảm bảo MySQL/MariaDB đang chạy</li>
                            <li>User database cần quyền tạo database</li>
                            <li>Hệ thống sẽ tạo database và bảng tự động</li>
                            <li>Tài khoản admin mặc định: admin / admin123</li>
                        </ul>
                    </div>
                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-rocket me-2"></i>Bắt đầu cài đặt
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>