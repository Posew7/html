<?php require_once "header.php"; ?>

<?php

require_once "baglan.php";

if (!isset($_GET["sayfa"])){
    $_GET["sayfa"] = "index";
}

switch ($_GET["sayfa"]){

    case "index";
        require_once "homepage.php";
    break;

    case "insert";
        require_once "insert.php";
    break;

    case "oku";
        require_once "oku.php";
    break;

    case "guncelle";
        require_once "guncelle.php";
    break;

    case "sil";
        require_once "sil.php";
    break;

    case "kategoriler";
        require_once "kategoriler.php";
    break;

    case "kategori_ekle";
        require_once "kategori_ekle.php";
    break;

    case "kategori_sil";
        require_once "kategori_sil.php";
    break;
}

?>
