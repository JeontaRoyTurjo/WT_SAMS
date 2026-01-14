CREATE DATABASE IF NOT EXISTS sams_db;
USE sams_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    email VARCHAR(100),
    password VARCHAR(100),
    role VARCHAR(20)
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    name VARCHAR(100),
    phone VARCHAR(20),
    current_university VARCHAR(100),
    address TEXT
);

CREATE TABLE universities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    name VARCHAR(100),
    location VARCHAR(100),
    address TEXT,
    ranking INT,
    description TEXT
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    university_id INT,
    course_name VARCHAR(100),
    department VARCHAR(100)
);

CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    university_id INT,
    course_name VARCHAR(100),
    status VARCHAR(20) DEFAULT 'pending'
);

CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    university_id INT,
    message TEXT,
    created_at VARCHAR(20)
);
