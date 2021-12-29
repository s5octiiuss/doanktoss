<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sách</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style type="text/css">
        .wrapper {
            width: 700px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }

        th {
            min-width: 130px;
        }

        .desc {
            white-space: nowrap;
            width: 500px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="pull-left">Quản đồ thể thao</h2>
                    <a href="insert.php" class="btn btn-primary">Thêm đồ</a>
                    <span>
                        <a class="btn btn-primary" href="../../../Quản lý sách/tuan6-1123/index.php">Quay lại </a>
                    </span>
                </div>
                <?php
                // Include file config.php
                require_once "config.php";

                // Cố gắng thực thi truy vấn
                $sql = "SELECT * FROM book inner join publisher on book.pub_id = publisher.pub_id
                                                 join category on book.cat_id = category.cat_id    
                ";
                $query = mysqli_query($connect, $sql);
                ?>
                <table class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th>Mã sách</th>
                            <th>Tên sách</th>
                            <th>Mô tả</th>
                            <th>Giá sách</th>
                            <th>Nhà xuất bản</th>
                            <th>Loại sách</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <th><?php echo $row['book_id'] ?></th>
                                <th><?php echo $row['book_name'] ?></th>
                                <th>
                                    <p class="desc"><?php echo $row['description'] ?></p>
                                </th>
                                <th><?php echo $row['price'] ?></th>
                                <th><?php echo $row['pub_name'] ?></th>
                                <th><?php echo $row['cat_name'] ?></th>
                                <th>
                                    <a href="../admin/edit.php?id=<?php echo $row['book_id']; ?>" class="" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa"><i class="btn btn-primary">Sửa</i></a>
                                    <a href="../admin/delete.php?id=<?php echo $row['book_id']; ?>" class="" data-toggle="tooltip" data-placement="top" title="Xóa"><i class="btn btn-primary">Xóa</i></a>
                                </th>
                            </tr>
                        <?php
                        }
                        ?>
            </div>
        </div>
    </div>
</body>

</html>