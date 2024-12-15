CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, email, is_active) VALUES 
('admin123', '$2y$10$e0MYzXyjpJS7Pd0RVvHwHeFQx8r8H7Q5f5f5f5f5f5f5f5f5f5f5', 'admin123@gmail.com', TRUE);