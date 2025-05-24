SET foreign_key_checks = 0;

DROP TABLE IF EXISTS alerts;
DROP TABLE IF EXISTS resources;
DROP TABLE IF EXISTS payment_records;
DROP TABLE IF EXISTS expense_types;
DROP TABLE IF EXISTS user_teams;
DROP TABLE IF EXISTS teams;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    encrypted_password VARCHAR(255) NOT NULL,
    is_manager BOOLEAN DEFAULT FALSE,
    profile_picture_url VARCHAR(500)
);

CREATE TABLE teams (
    id INT PRIMARY KEY AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE user_teams (
    id INT PRIMARY KEY AUTO_INCREMENT PRIMARY KEY,
    joined_at DATE,
    team_id INT,
    user_id INT,
    FOREIGN KEY (team_id) REFERENCES teams(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE expense_types (
    id INT PRIMARY KEY AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) UNIQUE,
    icon_url VARCHAR(500)
);

CREATE TABLE payment_records (
    id INT PRIMARY KEY AUTO_INCREMENT PRIMARY KEY,
    description TEXT,
    amount FLOAT,
    payable_id INT,
    payable_type VARCHAR(50), 
    expense_type_id INT,
    FOREIGN KEY (expense_type_id) REFERENCES expense_types(id)
);

CREATE TABLE resources (
    id INT PRIMARY KEY AUTO_INCREMENT PRIMARY KEY,
    file_path VARCHAR(500),
    payment_records_id INT,
    FOREIGN KEY (payment_records_id) REFERENCES payment_records(id)
);

CREATE TABLE alerts (
    id INT PRIMARY KEY AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    message TEXT,
    is_read BOOLEAN,
    alert_date DATE,
    user_id INT,
    user_team_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (user_team_id) REFERENCES user_teams(id)
);


SET foreign_key_checks = 1;