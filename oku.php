<?php require_once "header.php"; ?>

<?php

if (!isset($_GET["id"]) || empty($_GET["id"])){
    header("Location:index.php");
    exit;
}

$sorgu = $db->prepare("SELECT * FROM dersler WHERE id = ?");
$sorgu->execute([$_GET["id"]]);
$ders = $sorgu->fetch(PDO::FETCH_ASSOC);
print_r($ders);

if (!$ders){
    header("Location:index.php");
    exit;
}

?>