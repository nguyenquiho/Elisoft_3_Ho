<?php 
// Kết nối CSDL
$conn = new mysqli('localhost', 'root', '', 'faceshop_v2');
 
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} 
 
// Câu SQL lấy danh sách
$sql1 = "SELECT * FROM 	fs_department";
$sql2 = "SELECT * FROM 	fs_category " ;
 
// Thực thi câu truy vấn và gán vào $result
$result = $conn->query($sql1);
$result2 = $conn->query($sql2);
 


// Kiểm tra số lượng record trả về có lơn hơn 0
// Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
if (($result->num_rows > 0) && ($result2->num_rows > 0)) 
{
    //Sử dụng vòng lặp while để lặp kết quả
    while($row = $result->fetch_assoc()) {
        echo "<b>". $row['name']."</b>: <br>";
        // echo "</pre>";
            while($row2 = $result2->fetch_assoc()){
                if($row2['department_id'] == $row['id']) {
                    echo $row2['name'];
                }
            }
            //mysqli_data_seek($result2,offset,0);
        
    }

} 
else {
    echo "Không có record nào";
}
 
// ngắt kết nối
$conn->close();

?>


<!-- tên loại sản phẩm và chủng loại của nó -->
<!-- SELECT fs_category.id, fs_category.name FROM fs_category LEFT JOIN fs_department ON `fs_category`.`department_id` = `fs_department`.`id` -->