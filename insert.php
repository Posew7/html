<?php

$sorgu = $db->prepare("INSERT INTO dersler SET baslik = ?,icerik = ?,onay = ?");

$ekle = $sorgu->execute(["matematik", "diferansiyel denklemler", 1]);

if ($ekle) {
    print "başarı ile eklendi";
} else {
    print_r($sorgu->errorInfo());
}