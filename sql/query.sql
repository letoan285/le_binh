SELECT categories.id as cate_id, 
    products.id as pro_id, 
    categories.name as cate_name, 
    products.name as pro_name 
FROM products 
    LEFT JOIN categories 
        ON products.category_id = categories.id
SELECT categories.id as cate_id, products.id as pro_id, categories.name as cate_name, products.name as pro_name FROM products RIGHT JOIN categories ON products.category_id = categories.id

SELECT c.id as cate_id, 
	p.id as pro_id, 
    c.name as cate_name, 
    p.name as pro_name 
   FROM categories as c 
   LEFT JOIN products as p 
   	ON p.category_id = c.id


       SELECT roles.id, roles.name
CASE WHEN roles.status == 1 THEN 'Hien thi'
    WHEN roles.status == 3 THEN 'khong hien thi'
	WHEN roles.status == 2  THEN 'cho duyet'
END
FROM users;