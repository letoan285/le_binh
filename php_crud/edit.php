<?php 
require_once "db.php";

$id = $_GET['id'];

$sql_product = "select * from products where id = ".$id;

$dbh_1 = $conn->prepare($sql_product);

$dbh_1->execute();

$product = $dbh_1->fetch();
/*
if(!isset($product) || $product == null){
    echo "<h1>San pham khong ton tai <br><a href='index.php'>Tro lai</a></h1>";
    die;
}
*/

$sql = "select * from categories";

$stmt = $conn->prepare($sql);

$stmt->execute();

$categories = $stmt->fetchAll();

//lay ra toan bo user
$query = "select * from users";

$dbh = $conn->prepare($query);

$dbh->execute();

$users = $dbh->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2 class="text-center mt-2 mb-2">Danh sach san pham</h2>
                <form action="update-product.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $product['id'] ?>">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input placeholder=" vd: product-one.html" value="<?= $product['slug'] ?>" type="text" name="slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Short description</label>
                        <textarea name="short_desc" class="form-control"  cols="30" rows="3"><?= $product['short_description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="5"><?= $product['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <img src="<?=$product['image']?>" width="150" alt="">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">List price</label>
                        <input type="number" name="list_price" class="form-control" value="<?= $product['list_price'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Selling price</label>
                        <input type="number" name="selling_price" class="form-control" value="<?= $product['selling_price'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Choose category</option>
                            <?php foreach ($categories as $key => $cate): ?>
                            <option <?php if($product['category_id'] ==$cate['id'] ){ echo "selected";} ?> value="<?= $cate['id']?>"><?= $cate['name']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Chon User</label>
                        <select name="user_id" class="form-control">
                            <?php foreach ($users as $key => $user): ?>
                            <option <?php if($product['user_id'] ==$user['id'] ){ echo "selected";} ?> value="<?= $user['id']?>"><?= $user['name']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Choose Status</label>
                        <select name="status" class="form-control">
                            <option <?php if($product['status'] == 0 ){ echo "selected";} ?> value="0">Khong hien thi</option>
                            <option <?php if($product['status'] == 1 ){ echo "selected";} ?> value="1">Hien thi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Update">
                    </div>
                </form>
            </div>
        
        </div>
    
    </div>
</body>
</html>