--List out all the valid users
SELECT * FROM user;

--List out all the projects currently looing for crodfunding 
SELECT * FROM project WHERE DATE(end_data) > CURDATE();

--List out all the projects in the education category
SELECT * FROM project p WHERE p.category = 'education';

--List out all the projects user buwei has donated money to
SELECT p.id, p.title, p.description, p.owner, p.start_date, p.end_date, p.category, f.amount 
FROM project p, funding f
WHERE f.project_id = p.id AND f.user_name = 'buwei';

--List out all the users who have donated money to project plant
SELECT u.name, f.amount 
FROM user u, funding f, project p
WHERE f.user_name = u.name AND f.project_id = p.id AND p.title = 'plant';

--List out all the projects related to entrepreneur green
SELECT * FROM project p WHERE p.owner = 'green';