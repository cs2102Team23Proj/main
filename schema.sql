DROP TABLE IF EXISTS funder;
DROP TABLE IF EXISTS entrepreneur;
DROP TABLE IF EXISTS admin;
DROP TABLE IF EXISTS fund;
DROP TABLE IF EXISTS project;

CREATE TABLE funder(
name VARCHAR(255) PRIMARY KEY,
password VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL UNIQUE
);


CREATE TABLE entrepreneur (
name VARCHAR(255) PRIMARY KEY,
password VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL UNIQUE
);


CREATE TABLE admin (
name VARCHAR(255) PRIMARY KEY,
password VARCHAR(255) NOT NULL
);


CREATE TABLE project (
title VARCHAR(255) PRIMARY KEY,
description TEXT,
owner VARCHAR(255) NOT NULL,
start_date DATE NOT NULL,
end_date DATE NOT NULL,
category VARCHAR(255) NOT NULL, 
target_amount INT NOT NULL,
current_amount INT DEFAULT 0,
FOREIGN KEY (owner) REFERENCES entrepreneur(name) ON UPDATE CASCADE ON DELETE CASCADE,
CHECK (target_amount > 0),
CHECK (end_date > start_date)
);


CREATE TABLE fund (
funder_name VARCHAR(255) REFERENCES funder(name) ON UPDATE CASCADE,
project_title VARCHAR(255) REFERENCES project(title) ON UPDATE CASCADE,
amount FLOAT,
CHECK (amount > 0) 
);


