Drop database if exists base_account;
Create database base_account;
Use base_account;
CREATE TABLE Customer(
    customer_id int AUTO_INCREMENT PRIMARY KEY,
    first_name text not null,
    last_name text not null,
    birth_date Date not null,
    gender bit default 1,
    email varchar(255) not null,
    phone varchar(10) not null,
    address text null,
    password varchar(255) NOT null,
    role_id int REFERENCES role(role_id)
);
CREATE TABLE Role(
    role_id int AUTO_INCREMENT PRIMARY KEY,
    description varchar(100) not null
);
INSERT INTO Role(description) values ('Admin'),('Customer');