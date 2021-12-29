<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$sach = new Sach();
if ($action == 'index') {
    $data = $sach->panigation();
    //print_r($data);
    include './views/sach/index.php';
}
if ($action == 'tatca') {
    $data = $sach->all();
    include './views/sach/index.php';
}
if ($action == 'search') {
    $kw = isset($_GET['kw']) ? $_GET['kw'] : '';
    $data = $sach->search($kw);
    include './views/sach/index.php';
}

if ($action == 'detail') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $data = $sach->detail($id);

    include './views/sach/detail.php';
}

if ($action== 'about') {
    include './views/sach/about.php';
}

if ($action == 'filterCat') {
    $cat = isset($_GET['cat']) ? $_GET['cat'] : '';
    $data = $sach->filterWithCat($cat);
    include './views/sach/index.php';
}

if ($action == 'filterPub') {
    $pub = isset($_GET['pub']) ? $_GET['pub'] : '';
    $data = $sach->filterPub($pub);
    include './views/sach/index.php';
}
