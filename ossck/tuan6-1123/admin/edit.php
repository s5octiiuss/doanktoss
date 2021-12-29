<?php
$id = $_GET['id'];

require_once './config.php';
$sql_cat = "SELECT * FROM category";
$query_cat = mysqli_query($connect, $sql_cat);
$sql_pub = "SELECT * FROM publisher";
$query_pub = mysqli_query($connect, $sql_pub);

$sql_book = "SELECT * FROM book where book_id = '$id'";
$query_book = mysqli_query($connect, $sql_book);
$row_book = mysqli_fetch_assoc($query_book);

if (isset($_POST['submit'])) {
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $pub_name = $_POST['pub'];
    $cat_name = $_POST['cat'];

    $image = $_FILES['img']['name'];

    $sql = "UPDATE book SET book_id= '$book_id', book_name = '$book_name', description='$description', price='$price', img='$image', pub_id='$pub_name', cat_id='$cat_name' WHERE book_id ='$id'";
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
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        #input-img {
            border: none;
        }
    </style>
    <div class="container">
        <div class="title">
            <p>Thêm sản phẩm</p>
        </div>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input-book-id">Mã sách</label>
                    <input type="text" class="form-control" name="book_id" id="input-book-id" placeholder="Nhập mã số" required value="<?php echo $row_book['book_id'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="input-book-name">Tên sách</label>
                    <input type="text" class="form-control" name="book_name" id="input-book-name" placeholder="Nhập tên sách" required value="<?php echo $row_book['book_name'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="input-desc">Miêu tả</label>
                <textarea class="form-control" id="input-desc" name="description" placeholder="Miêu tả" required><?php echo $row_book['description'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="input-price">Giá</label>
                <input type="text" class="form-control" name="price" id="input-price" placeholder="Giá tiền" value="<?php echo $row_book['price'] ?>">
            </div>
            <div class="form-group">
                <label for="input-img">Hình ảnh</label>
                <input type="file" class="form-control" name="img" id="input-img">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputState">Nhà sản xuất</label>
                    <select id="inputState" class="form-control" name="pub" required selected="<?php echo $row_book['pub_name'] ?>">
                        <?php
                        while ($row_pub = mysqli_fetch_assoc($query_pub)) { ?>
                            <option value="<?php echo $row_pub['pub_id'] ?>"><?php echo $row_pub['pub_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Loại</label>
                    <select id="inputState" class="form-control" name="cat" required selected="<?php echo $row_book['cat_name'] ?>">
                        <?php
                        while ($row_cat = mysqli_fetch_assoc($query_cat)) { ?>
                            <option value="<?php echo $row_cat['cat_id'] ?>"><?php echo $row_cat['cat_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
</body>

</html>