<?php
/*

*/

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location:index.php");
    exit;
}

$sorgu = $db->prepare("SELECT * FROM dersler WHERE id = ?");
$sorgu->execute([$_GET["id"]]);
$ders = $sorgu->fetch(PDO::FETCH_ASSOC);

if (!$ders) {
    header("Location:index.php");
    exit;
}

if (isset($_POST["submit"])) {

    $baslik = isset($_POST["baslik"]) ? $_POST["baslik"] : $ders["baslik"];
    $icerik = isset($_POST["icerik"]) ? $_POST["icerik"] : $ders["icerik"];
    $onay = isset($_POST["onay"]) ? $_POST["onay"] : 0;

    if (!$baslik) {
        print "başlık ekleyin";
    } elseif (!$icerik) {
        print "içerik ekleyin";
    } else {
        $sorgu = $db->prepare("UPDATE dersler SET baslik = ?, icerik = ?, onay = ? WHERE id = ?");
        $guncelle = $sorgu->execute([$baslik, $icerik, $onay, $ders["id"]]);

        if ($guncelle) {
            header("Location:index.php?sayfa=oku&id=" . $ders["id"]);
        } else {
            print "güncelleme başarısız";
        }
    }
}

?>

<form action="" method="post">
    Başlık : <br>
    <input type="text" name="baslik" value="<?php print $ders["baslik"] ?>"> <br>

    İçerik : <br>
    <textarea name="icerik" cols="30" rows="5"><?php print $ders["icerik"] ?></textarea><br>

    <select name="onay">
        <option value="1">Onaylı</option>
        <option value="0">Onaylı Değil</option>
    </select> <br> <br>

    <input type="hidden" name="submit" value="1">

    <button type="submit">Güncelle</button>
</form>
