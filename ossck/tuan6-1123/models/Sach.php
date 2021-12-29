<?php
if (!defined('HOST')) {
    exit;
}
class Sach extends Db
{
    // cac phuong thuc 
    function all()
    {
        return $this->selectQuery('select * from book');
    }

    function random($n)
    {
        return $this->selectQuery("select * from book order by rand() limit 0, $n");
    }

    function filterWithCat($cat){

        return $this->selectQuery("select * from book inner join category on book.cat_id = category.cat_id where '$cat' = category.cat_id");

    }

    function search($kw)
    {
        $s = 'select * from book where book_name like ?';
        $a = ["%$kw%"];
        return $this->selectQuery($s, $a);
    }

    function panigation()
    {

        $pageSize = 4;
        $startRow = 0;
        $pageNum = 1;
        if (isset($_GET['pageNum'])  == true) $pageNum = $_GET['pageNum'];
        $startRow = ($pageNum - 1) * $pageSize;
        return  $this->selectQuery("select * from book order by book_id limit $startRow," . $pageSize . "");
    }

    function detail($id)
    {
        $data = $this->selectQuery('select * from book where book_id=?', [$id]);
        return $data[0];
    }

    function filterPub($pub)
    {
        return $this->selectQuery("select * from book inner join publisher on book.pub_id = publisher.pub_id where '$pub' = publisher.pub_id");
    }
}