-- Create database
CREATE DATABASE IF NOT EXISTS blog_admin CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE blog_admin;

-- Create admin users table
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'editor', 'author') DEFAULT 'author',
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create blog posts table
CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    content LONGTEXT NOT NULL,
    excerpt TEXT,
    featured_image VARCHAR(255),
    author_id INT NOT NULL,
    status ENUM('draft', 'published', 'archived') DEFAULT 'draft',
    category VARCHAR(100) DEFAULT 'Uncategorized',
    tags TEXT,
    view_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    published_at TIMESTAMP NULL,
    FOREIGN KEY (author_id) REFERENCES admin_users(id) ON DELETE CASCADE
);

-- Insert default admin user (password: admin123)
INSERT INTO admin_users (username, email, password, full_name, role) VALUES 
('admin', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin');

-- Insert sample blog posts
INSERT INTO blog_posts (title, slug, content, excerpt, author_id, status, category) VALUES 
('Welcome to Our Blog', 'welcome-to-our-blog', '<p>This is our first blog post. Welcome to our new blog platform!</p>', 'Welcome to our new blog platform where we share interesting content.', 1, 'published', 'General'),
('Getting Started with PHP', 'getting-started-with-php', '<p>PHP is a popular server-side scripting language. In this post, we will explore the basics of PHP programming.</p>', 'Learn the fundamentals of PHP programming language.', 1, 'published', 'Programming');