DROP TABLE IF EXISTS funder;
CREATE TABLE funder (
name VARCHAR(255) PRIMARY KEY,
password VARCHAR(255) NOT NULL,
);

DROP TABLE IF EXISTS entrepreneur;
CREATE TABLE entrepreneur (
name VARCHAR(255) PRIMARY KEY,
password VARCHAR(255) NOT NULL,
);

DROP TABLE IF EXISTS admin;
CREATE TABLE admin (
name VARCHAR(255) PRIMARY KEY,
password VARCHAR(255) NOT NULL,
);


DROP TABLE IF EXISTS project;
CREATE TABLE project (
title VARCHAR(255) NOT NULL,
description TEXT,
owner VARCHAR(255) NOT NULL,
start_date DATE NOT NULL,
end_date DATE NOT NULL,
category VARCHAR(255) NOT NULL,
target_amount INT NOT NULL,
FOREIGN KEY (owner) REFERENCES entrepreneur(name) ON UPDATE CASCADE,
CHECK (target_amount > 0),
CHECK (end_date > start_date),
CHECK (category = ""),
);

DROP TABLE IF EXISTS funding;
CREATE TABLE funding (
funding_id INT PRIMARY KEY,
funder_name VARCHAR(255) NOT NULL,
project_title VARCHAR(255) NOT NULL,
amount INT NOT NULL,
FOREIGN KEY (funder_name) REFERENCES funder(name) ON UPDATE CASCADE,
FOREIGN KEY (project_title) REFERENCES project(title) ON UPDATE CASCADE,
CHECK (amount > 0),
);

