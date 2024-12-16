CREATE TABLE campaigns (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    goal_amount DECIMAL(15, 2) NOT NULL,
    raised_amount DECIMAL(15, 2) DEFAULT 0,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by INT,
    updated_by INT,
    FOREIGN KEY (created_by) REFERENCES users(id),
    FOREIGN KEY (updated_by) REFERENCES users(id)
);

INSERT INTO campaigns (title, description, image_url, goal_amount, raised_amount, start_date, end_date, is_active, created_by, updated_by) VALUES
('Bantu Pendidikan Anak Yatim', 'Kami menggalang dana untuk membantu pendidikan anak-anak yatim di daerah terpencil.', 'https://images.pexels.com/photos/29765590/pexels-photo-29765590/free-photo-of-child-walking-to-school-with-colorful-backpack.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 10000000.00, 2500000.00, '2024-01-01', '2024-12-31', TRUE, 1, 1),
('Pembangunan Masjid di Desa', 'Proyek pembangunan masjid di desa yang membutuhkan dukungan dana dari para donatur.', 'https://plus.unsplash.com/premium_photo-1697729958605-b27137644fbf?q=80&w=2671&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 50000000.00, 10000000.00, '2024-02-01', '2024-11-30', TRUE, 1, 1),
('Bantuan Bencana Alam', 'Menggalang dana untuk korban bencana alam yang terjadi di wilayah timur.', 'https://images.unsplash.com/photo-1728320771441-17a19df0fe4c?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 20000000.00, 5000000.00, '2024-03-01', '2024-10-31', TRUE, 1, 1);

INSERT INTO campaigns (title, description, image_url, goal_amount, raised_amount, start_date, end_date, is_active, created_by, updated_by) VALUES
('Pengadaan Air Bersih', 'Proyek pengadaan air bersih untuk desa yang mengalami kekeringan.', 'https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 30000000.00, 7500000.00, '2024-04-01', '2024-09-30', TRUE, 1, 1),
('Bantuan Medis untuk Lansia', 'Menggalang dana untuk menyediakan bantuan medis bagi lansia di panti jompo.', 'https://images.unsplash.com/photo-1512070800540-0a7d7c3b5f8b?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 15000000.00, 3000000.00, '2024-05-01', '2024-08-31', TRUE, 1, 1),
('Renovasi Sekolah Rusak', 'Dana untuk renovasi sekolah yang rusak akibat bencana alam.', 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 40000000.00, 10000000.00, '2024-06-01', '2024-12-31', TRUE, 1, 1),
('Bantuan Pangan untuk Keluarga Miskin', 'Menggalang dana untuk menyediakan bantuan pangan bagi keluarga miskin.', 'https://images.unsplash.com/photo-1517685352821-92cf88aee5a5?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 25000000.00, 5000000.00, '2024-07-01', '2024-11-30', TRUE, 1, 1),
('Pembangunan Jembatan Desa', 'Proyek pembangunan jembatan untuk memudahkan akses transportasi di desa terpencil.', 'https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 60000000.00, 15000000.00, '2024-08-01', '2024-10-31', TRUE, 1, 1);

