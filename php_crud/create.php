<?php 
require_once "db.php";
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
                <form action="save-product.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input placeholder=" vd: product-one.html " type="text" name="slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Short description</label>
                        <textarea name="short_desc" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">List price</label>
                        <input type="number" name="list_price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Selling price</label>
                        <input type="number" name="selling_price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">Choose category</option>
                            <?php foreach ($categories as $key => $cate): ?>
                            <option value="<?= $cate['id']?>"><?= $cate['name']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Chon User</label>
                        <select name="user_id" class="form-control">
                            <?php foreach ($users as $key => $user): ?>
                            <option value="<?= $user['id']?>"><?= $user['name']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Choose Status</label>
                        <select name="status" class="form-control">
                            <option value="0">Khong hien thi</option>
                            <option value="1">Hien thi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
        
        </div>
    
    </div>
</body>
</html>