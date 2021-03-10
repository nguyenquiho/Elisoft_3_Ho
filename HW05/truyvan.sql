--1--Viết câu lệnh truy vấn lấy id, tên, giá của sản phẩm có giá từ 10 triệu đến 20 triệu ?

SELECT `id`,`name`,`price` FROM fs_product WHERE `price` BETWEEN 10000000 AND 20000000

--2--Viết câu lệnh truy vấn lấy tên và trạng thái hiển thị (ẩn hoặc hiện) của chủng loại 
--(Cột active có giá trị 0 nghĩa là ẩn; 1 nghĩa là hiện)

SELECT `name`,`active` FROM `fs_category`

--3 Viết câu lệnh truy vấn lấy tên, giá của sản phẩm có id là 1, 5, 8, 20 ?
SELECT `name`,`price` FROM `fs_product` WHERE `id` IN (1, 5, 8, 20)

--4 Viết câu lệnh truy vấn lấy id, tên, giá của sản phẩm có tên bắt đầu bằng ký tự "L" ?
SELECT `id`,`name`,`price` FROM `fs_product` WHERE `name` LIKE "L%"

--5 Viết câu lệnh truy vấn lấy id, tên, giá của 10 sản phẩm được quan tâm (xem) nhiều nhất ?
SELECT `id`,`name`,`price` FROM `fs_product` ORDER BY `view` desc LIMIT 10


