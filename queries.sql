--1 List out all the projects currently looing for crodfunding 
SELECT * FROM project WHERE DATE(end_data) > CURDATE();

--2 List out all the projects in the education category
SELECT * FROM project p WHERE p.category = 'education';

--3 List out all the projects' details of user buwei
SELECT p.id, p.title, p.description, p.owner, p.start_date, p.end_date, p.category, f.amount 
FROM project p, funding f, user u
WHERE f.project_id = p.id AND f.user_name = u.name; 