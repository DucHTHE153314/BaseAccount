Create database base_account
CREATE TABLE Account(
    user_name varchar(32) not null PRIMARY KEY,
	pass_word varchar(255) NOT null,
    role_id int REFERENCES role(role_id)
)
CREATE TABLE Customer(
	customer_id int AUTO_INCREMENT PRIMARY KEY,
    full_name text not null,
    birth_date Date not null,
    gender bit default 1,
    email varchar(255) not null,
    phone varchar(10) not null,
    address text null
)
CREATE TABLE active(
	customer_id int NOT null PRIMARY KEY REFERENCES customer(customer_id),
    user_name varchar(32) not null REFERENCES account(user_name),
    status bit DEFAULT 1
)