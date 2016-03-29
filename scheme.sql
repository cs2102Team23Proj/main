DROP TABLE IF EXISTS funding;
DROP TABLE IF EXISTS project;
DROP TABLE IF EXISTS funder;
DROP TABLE IF EXISTS entrepreneur;
DROP TABLE IF EXISTS admin;


CREATE TABLE funder (
name VARCHAR(255) PRIMARY KEY,
password VARCHAR(255) NOT NULL
);


CREATE TABLE entrepreneur (
name VARCHAR(255) PRIMARY KEY,
password VARCHAR(255) NOT NULL
);


CREATE TABLE admin (
name VARCHAR(255) PRIMARY KEY,
password VARCHAR(255) NOT NULL
);


CREATE TABLE project (
id INT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT,
owner VARCHAR(255) NOT NULL,
start_date DATE NOT NULL,
end_date DATE NOT NULL,
category VARCHAR(255) NOT NULL, -- TODO use enum?
target_amount INT NOT NULL,
FOREIGN KEY (owner) REFERENCES entrepreneur(name) ON UPDATE CASCADE,
CHECK (target_amount > 0),
CHECK (end_date > start_date)
);


CREATE TABLE funding (
funding_id INT PRIMARY KEY,
funder_name VARCHAR(255) NOT NULL,
project_id INT NOT NULL,
amount INT NOT NULL,
FOREIGN KEY (funder_name) REFERENCES funder(name) ON UPDATE CASCADE,
FOREIGN KEY (project_id) REFERENCES project(id) ON UPDATE CASCADE,
CHECK (amount > 0)
);
