<?php

$sorgu = $db->prepare("INSERT INTO dersler SET 
baslik = ?,
icerik = ?,
onay = ?
");

$ekle = $sorgu->execute([
    "fizik", "basit harmonik hareket", 1
]);

if ($ekle) {
    print "veriler başarılı bir şekilde yüklendi";
} else {
    print_r($sorgu->errorInfo());
}