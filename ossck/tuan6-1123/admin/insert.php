<?php
require_once './config.php';
$sql_cat = "SELECT * FROM category";
$query_cat = mysqli_query($connect, $sql_cat);
$sql_pub = "SELECT * FROM publisher";
$query_pub = mysqli_query($connect, $sql_pub);

if (isset($_POST['submit'])) {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $pub_name = $_POST['pub'];
    $cat_name = $_POST['cat'];

    $image = $_FILES['img']['name'];

    $sql = "INSERT INTO book (book_id, book_name, description, price, img, pub_id, cat_id) VALUES ( '$book_id', '$book_name', '$description','$price',  '$image', '$pub_name', '$cat_name')";
    $query = mysqli_query($connect, $sql);
    header("location: ../admin/admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sách</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="title">
            <p>Thêm sản phẩm</p>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input-book-id">Mã sách</label>
                    <input type="text" class="form-control" name="book_id" id="input-book-id" placeholder="Nhập mã số" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="input-book-name">Tên sách</label>
                    <input type="text" class="form-control" name="book_name" id="input-book-name" placeholder="Nhập tên sách" required>
                </div>
            </div>
            <div class="form-group">
                <label for="input-desc">Miêu tả</label>
                <textarea class="form-control" id="input-desc" name="description" placeholder="Miêu tả" required></textarea>
            </div>
            <div class="form-group">
                <label for="input-price">Giá</label>
                <input type="text" class="form-control" name="price" id="input-price" placeholder="Giá tiền">
            </div>
            <div class="form-group">
                <label for="input-img">Hình ảnh</label>
                <input type="file" class="form-control" name="img" id="input-img">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputState">Nhà sản xuất</label>
                    <select id="inputState" class="form-control" name="pub" required>
                        <?php
                        while ($row_pub = mysqli_fetch_assoc($query_pub)) { ?>
                            <option value="<?php echo $row_pub['pub_id'] ?>"><?php echo $row_pub['pub_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Loại</label>
                    <select id="inputState" class="form-control" name="cat" required>
                        <?php
                        while ($row_cat = mysqli_fetch_assoc($query_cat)) { ?>
                            <option value="<?php echo $row_cat['cat_id'] ?>"><?php echo $row_cat['cat_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</body>

</html>