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

$kategoriler = $db->query("SELECT * FROM kategoriler")->fetchAll(PDO::FETCH_ASSOC);

if (!$ders) {
    header("Location:index.php");
    exit;
}

if (isset($_POST["submit"])) {

    $baslik = isset($_POST["baslik"]) ? $_POST["baslik"] : $ders["baslik"];
    $icerik = isset($_POST["icerik"]) ? $_POST["icerik"] : $ders["icerik"];
    $onay = isset($_POST["onay"]) ? $_POST["onay"] : 0;
    $kategori_id = isset($_POST["kategori_id"]) ? $_POST["kategori_id"] : null;


    if (!$baslik) {
        print "başlık ekleyin";
    } elseif (!$icerik) {
        print "içerik ekleyin";
    } else {
        $sorgu = $db->prepare("UPDATE dersler SET baslik = ?, icerik = ?, kategori_id = ?, onay = ? WHERE id = ?");
        $guncelle = $sorgu->execute([$baslik, $icerik, $kategori_id, $onay, $ders["id"]]);

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
    <textarea name="icerik" cols="30" rows="5"><?php print $ders["icerik"] ?></textarea><br><br>
    Kategori Seçin : <br>
    <select name="kategori_id">
        <option value="">-- kategori seçin --</option>
        <?php foreach ($kategoriler as $kategori): ?>
            <option value="<?php print $kategori["id"] ?>"><?php print $kategori["ad"] ?></option>
        <?php endforeach; ?>
    </select> <br><br>
    Onay Durumu : <br>
    <select name="onay">
        <option value="1">Onaylı</option>
        <option value="0">Onaylı Değil</option>
    </select> <br> <br>

    <input type="hidden" name="submit" value="1">

    <button type="submit">Güncelle</button>
</form>
