--List out all the valid funders
SELECT f.name, f.email FROM funder f;

--List out all the projects currently looing for crodfunding 
SELECT p.title, p.description, p.start_date, p.end_date, p.category, p.target_amount, p.current_amount 
FROM project p WHERE p.status = true;

--List out all the projects in the education category
SELECT p.title, p.description, p.start_date, p.end_date, p.category, p.target_amount, p.current_amount, 
CASE WHEN p.status <> true THEN 'closed' ELSE 'open' END
AS education
FROM project p WHERE p.category = 'education';

--List out all the projects funder buwei has donated money to
SELECT p.title, p.description, p.owner, p.start_date, p.end_date, p.category, f.amount,
CASE WHEN p.status <> true THEN 'closed' ELSE 'open' END 
FROM project p, fund f
WHERE f.project_title = p.title AND f.funder_name = 'buwei';

--List out all the funders who have donated money to project computers
SELECT u.name, f.amount 
FROM funder u, fund f, project p
WHERE f.funder_name = u.name AND f.project_title = p.title AND p.title = 'computers';

--List out all the projects related to entrepreneur growup
SELECT p.title, p.description, p.owner, p.start_date, p.end_date, p.category, p.target_amount, p.current_amount,
CASE WHEN p.status <> true THEN 'closed' ELSE 'open' END 
FROM project p WHERE p.owner = 'growup';

--List out all the projects funder yuxin has donated according to increasing order of donating amount
SELECT p.title, p.description, p.owner, p.start_date, p.end_date, p.category, p.target_amount, p.current_amount,
CASE WHEN p.status <> true THEN 'closed' ELSE 'open' END 
FROM project p, fund f
WHERE f.funder_name = 'yuxin' AND f.project_title = p.title
ORDER BY f.amount ASC;