DROP TABLE IF EXISTS funding;
DROP TABLE IF EXISTS project;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS entrepreneur;
DROP TABLE IF EXISTS admin;


CREATE TABLE user(
name VARCHAR(255) PRIMARY KEY,
<<<<<<< Updated upstream:scheme.sql
password VARCHAR(255) NOT NULL
=======
password VARCHAR(255) NOT NULL,
CHECK (length(password) > 8),
>>>>>>> Stashed changes:schema.sql
);


CREATE TABLE entrepreneur (
name VARCHAR(255) PRIMARY KEY,
<<<<<<< Updated upstream:scheme.sql
password VARCHAR(255) NOT NULL
=======
password VARCHAR(255) NOT NULL,
CHECK (length(password) > 8),
>>>>>>> Stashed changes:schema.sql
);


CREATE TABLE admin (
name VARCHAR(255) PRIMARY KEY,
<<<<<<< Updated upstream:scheme.sql
password VARCHAR(255) NOT NULL
=======
password VARCHAR(255) NOT NULL,
CHECK (length(password) > 8),
>>>>>>> Stashed changes:schema.sql
);


CREATE TABLE project (
<<<<<<< Updated upstream:scheme.sql
id INT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
=======
title VARCHAR(255) PRIMARY KEY UNIQUE,
>>>>>>> Stashed changes:schema.sql
description TEXT,
owner VARCHAR(255) NOT NULL,
start_date DATE NOT NULL,
end_date DATE NOT NULL,
category VARCHAR(255) NOT NULL, -- TODO use enum?
target_amount INT NOT NULL,
FOREIGN KEY (owner) REFERENCES entrepreneur(name) ON UPDATE CASCADE ON DELETE CASCADE,
CHECK (target_amount > 0),
<<<<<<< Updated upstream:scheme.sql
CHECK (end_date > start_date)
);


CREATE TABLE funding (
funding_id INT PRIMARY KEY,
=======
CHECK (end_date > start_date),
CHECK (category = "education" OR category = "envirinment" OR category = "art" OR category = "technology"),
);

DROP TABLE IF EXISTS fund;
CREATE TABLE fund (
--fund_id INT NOT NULL,
>>>>>>> Stashed changes:schema.sql
user_name VARCHAR(255) NOT NULL,
project_id INT NOT NULL,
amount INT NOT NULL,
<<<<<<< Updated upstream:scheme.sql
FOREIGN KEY (user_name) REFERENCES user(name) ON UPDATE CASCADE,
FOREIGN KEY (project_id) REFERENCES project(id) ON UPDATE CASCADE,
CHECK (amount > 0)
=======
PRIMARY KEY (user_name, project_title),
FOREIGN KEY (user_name) REFERENCES user(name) ON UPDATE CASCADE ON DELETE CASCADE,
FOREIGN KEY (project_title) REFERENCES project(title) ON UPDATE CASCADE ON DELETE CASCADE,
CHECK (amount > 0),
>>>>>>> Stashed changes:schema.sql
);

Insert into entrepreneur (name, password) values ('entrepreneur1', '1');
Insert into entrepreneur (name, password) values ('entrepreneur2', '2');
Insert into entrepreneur (name, password) values ('entrepreneur3', '3');
Insert into entrepreneur (name, password) values ('entrepreneur4', '4');
Insert into entrepreneur (name, password) values ('entrepreneur5', '5');