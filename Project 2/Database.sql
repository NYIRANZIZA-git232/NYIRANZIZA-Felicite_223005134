-- database.sql
-- Create database
CREATE DATABASE IF NOT EXISTS student_registration;
USE student_registration;

-- Create table for student registrations
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    mobile VARCHAR(20) NOT NULL,
    dob_day INT NOT NULL,
    dob_month INT NOT NULL,
    dob_year INT NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    address TEXT NOT NULL,
    city VARCHAR(100) NOT NULL,
    pincode VARCHAR(20) NOT NULL,
    state VARCHAR(100) NOT NULL,
    country VARCHAR(100) NOT NULL,
    hobbies TEXT,
    board10 VARCHAR(100) NOT NULL,
    percentage10 DECIMAL(5,2) NOT NULL,
    year10 INT NOT NULL,
    board12 VARCHAR(100) NOT NULL,
    percentage12 DECIMAL(5,2) NOT NULL,
    year12 INT NOT NULL,
    boardGrad VARCHAR(100) NOT NULL,
    percentageGrad DECIMAL(5,2) NOT NULL,
    yearGrad INT NOT NULL,
    boardMasters VARCHAR(100),
    percentageMasters DECIMAL(5,2),
    yearMasters INT,
    course ENUM('BCA', 'B.Com', 'B.Sc', 'B.A') NOT NULL,
    hobbies_other_text TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
