-- สร้างตาราง users
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- เพิ่มข้อมูลตัวอย่าง
INSERT INTO users (name) VALUES
    ('John Doe'),
    ('Jane Smith')
ON CONFLICT DO NOTHING;