-- Create the database (if not already created)
CREATE DATABASE IF NOT EXISTS alimehbo_phpwebsite;
USE alimehbo_phpwebsite;

-- Create the table to store user information
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data (replace values as needed)
INSERT INTO contacts (full_name, email, message)
VALUES ('John Doe', 'johndoe@example.com', 'This is a test message');

