<?php

if (!isset($_GET["id"]) || empty($_GET["id"])){
    header("Location:index.php/sayfa=kategoriler");
    exit;
}

$sorgu = $db->prepare("DELETE FROM kategoriler WHERE id = ?");
$sil = $sorgu->execute([$_GET["id"]]);

if ($sil){
    header("Location:index.php/?sayfa=kategoriler");
} else{
    print "bir hata oluştu";
}