<?php

if (!isset($_GET["id"]) || empty($_GET["id"])){
    header("Location:index.php");
    exit;
}

$sorgu = $db->prepare("DELETE FROM dersler WHERE id = ?");
$sil = $sorgu->execute([$_GET["id"]]);

if ($sil){
    header("Location:index.php");
} else{
    print "silinemedi";
}