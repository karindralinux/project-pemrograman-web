CREATE TABLE campaigners (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone_number VARCHAR(20),
    organization_name VARCHAR(255),
    website VARCHAR(255),
    address TEXT,
    logo_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ALTER TABLE campaigns
ADD COLUMN campaigner_id INT,
ADD FOREIGN KEY (campaigner_id) REFERENCES campaigners(id);

INSERT INTO campaigners (email, phone_number, organization_name, website, address, logo_url) VALUES
('info@yayasanpendidikan.com', '081234567890', 'Yayasan Pendidikan Anak Yatim', 'https://yayasanpendidikan.com', 'Jl. Pendidikan No. 123, Jakarta', 'https://via.placeholder.com/100'),
('contact@masjiddesa.org', '081298765432', 'Masjid Desa Sejahtera', 'https://masjiddesa.org', 'Jl. Masjid No. 45, Bandung', 'https://via.placeholder.com/100'),
('support@bencanaalam.org', '081212345678', 'Bantuan Bencana Alam', 'https://bencanaalam.org', 'Jl. Bencana No. 67, Surabaya', 'https://via.placeholder.com/100');

UPDATE campaigns SET campaigner_id = 1 WHERE id = 1;
UPDATE campaigns SET campaigner_id = 2 WHERE id = 2;
UPDATE campaigns SET campaigner_id = 3 WHERE id = 3;


