-- Create the database
CREATE DATABASE IF NOT EXISTS mydatabase;
USE esr;

-- Create a user and grant privileges
CREATE USER 'myuser'@'%' IDENTIFIED BY 'mypassword';
GRANT ALL PRIVILEGES ON mydatabase.* TO 'myuser'@'%';
FLUSH PRIVILEGES;

-- Create a sample table (optional)
CREATE TABLE IF NOT EXISTS mytable (
    id INT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

-- Insert some sample data (optional)
INSERT INTO mytable (id, name) VALUES
    (1, 'John Doe'),
    (2, 'Jane Smith');
