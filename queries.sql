--List out all the valid funders
SELECT * FROM funder;

--List out all the projects currently looing for crodfunding 
SELECT * FROM project WHERE DATE(end_data) > CURDATE();

--List out all the projects in the education category
SELECT * FROM project p WHERE p.category = 'education';

--List out all the projects funder buwei has donated money to
SELECT p.title, p.description, p.owner, p.start_date, p.end_date, p.category, f.amount 
FROM project p, fund f
WHERE f.project_title = p.title AND f.funder_name = 'buwei';

--List out all the funders who have donated money to project plant
SELECT u.name, f.amount 
FROM funder u, fund f, project p
WHERE f.funder_name = u.name AND f.project_title = p.title AND p.title = 'plant';

--List out all the projects related to entrepreneur green
SELECT * FROM project p WHERE p.owner = 'green';