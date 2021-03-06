<?php 
//1. ket noi database
require_once "db.php";

$id = $_POST['id'];


//2. thu thap du lieu tu form
$name = $_POST['name'];
$slug = $_POST['slug'];
$short_desc = $_POST['short_description'];
$description = $_POST['description'];
$image = $_FILES['image'];
$fileName = "";
if($image['size'] > 0){
    $fileName = 'uploads/'.uniqid().time().'-'.$image['name'];
    move_uploaded_file($image['tmp_name'],  $fileName);
}
$status = $_POST['status'];
$user = $_POST['user_id'];
$category = $_POST['category_id'];
$list_price = $_POST['list_price'];
$selling_price = $_POST['selling_price'];


//3. viet cau query 
$sql = "UPDATE products set name = :name, 
                    slug = :slug, ";

if($image['size'] > 0) {
    $sql .="image =:image, ";
}

$sql .="description = :description, 
        short_description = :short_description, 
        category_id = :category_id, 
        user_id = :user_id, 
        list_price = :list_price, 
        selling_price = :selling_price, 
        status = :status
        WHERE id = $id";

//4. thuc thi cau query 
$stmt = $conn->prepare($sql);

//5. bind value
$stmt->bindValue(':name', $name);
$stmt->bindValue(':slug', $slug);
if($image['size'] > 0){
    $stmt->bindValue(':image', $fileName);
}
$stmt->bindValue(':description', $$description);
$stmt->bindValue(':short_description', $short_desc);
$stmt->bindValue(':category_id', $category);
$stmt->bindValue(':user_id', $user);
$stmt->bindValue(':list_price', $list_price);
$stmt->bindValue(':selling_price', $selling_price);
$stmt->bindValue(':status', $status);

//6. insert data vao db
$stmt->execute();
    //7. redirect ve trang chu
header('location: index.php');
