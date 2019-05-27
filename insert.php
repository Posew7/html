<?php

if (isset($_POST["submit"])) {
    $baslik = isset($_POST["baslik"]) ? $_POST["baslik"] : null;
    $icerik = isset($_POST["icerik"]) ? $_POST["icerik"] : null;
    $onay = isset($_POST["onay"]) ? $_POST["onay"] : null;

    if (!$baslik) {
        print "başlık girin";
    } elseif (!$icerik) {
        print "içerik girin";
    } else {
        $sorgu = $db->prepare("INSERT INTO dersler SET baslik=?,icerik=?,onay=?");

        $ekle = $sorgu->execute([$baslik, $icerik, $onay]);

        if ($ekle) {
            header("Location:index.php");
        } else {
            $hata = $sorgu->errorInfo();
            print "MYSQL hatası : " . $hata[2];
        }
    }
}

?>

<form action="" method="post">
    Başlık : <br>
    <input type="text" name="baslik">
    <hr>
    İçerik : <br>
    <textarea name="icerik" cols="30" rows="5"></textarea>
    <hr>
    Onay : <br>
    <select name="onay">
        <option value="1">Onaylı</option>
        <option value="0">Onaylı Değil</option>
    </select>
    <hr>
    <input type="hidden" name="submit" value="1">
    <button type="submit">GÖNDER</button>
</form>
