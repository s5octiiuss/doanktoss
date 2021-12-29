<table class='table table-striped table-dark'>
    <?php
    foreach ($data as $r) {
    ?>
        <tr>
            <td><?php echo $r['book_id']; ?></td>
            <td><?php echo $r['book_name']; ?></td>
            <td><?php echo $r['price']; ?></td>
            <td>
                <a href="./index.php?controller=sach&action=detail&id=<?php echo $r['book_id'] ?>">
                    Chi tiet
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>