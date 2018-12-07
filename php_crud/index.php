<?php 
require_once "db.php";

$sql = "select * from products";

$stmt = $conn->prepare($sql);

$stmt->execute();

$products = $stmt->fetchAll();

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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Anh san pham</th>
                            <th>Ten san pham</th>
                            <th>Danh muc</th>
                            <th>Trang thai</th>
                            <th> <a class="btn btn-success" href="create.php">Them moi</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $key => $value): ?>
                            <tr>
                                <td><?= $key+1; ?></td>
                                <td>
                                    <a href="detail.php?id=<?= $value['id'] ?>">
                                        <img width="120" src="<?= $value['image'] ?>" alt="<?= $value['name'] ?>">
                                    </a>
                                </td>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['category_id'] ?></td>
                                <td><?= $value['status'] == 1 ? 'Hien thi' : 'Khong hien thi' ?></td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="edit.php?id=<?= $value['id'] ?>">sua</a>
                                    <a class="btn btn-sm btn-danger" href="edit.php?action=del&id=<?= $value['id'] ?>">xoa</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        
        </div>
    
    </div>
</body>
</html>