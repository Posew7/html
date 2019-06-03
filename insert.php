<?php
/*
$sorgu = $db->prepare("INSERT INTO dersler SET baslik = ?,icerik = ?,onay = ?");

$ekle = $sorgu->execute(["matematik", "diferansiyel denklemler", 1]);

if ($ekle) {
    print "başarı ile eklendi";
} else {
    $hata = $sorgu->errorInfo();
    print $hata[2];
}
*/

$kategoriler = $db->query("SELECT * FROM kategoriler ORDER BY ad ASC ")->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["submit"])) {

    $baslik = isset($_POST["baslik"]) ? $_POST["baslik"] : null;
    $icerik = isset($_POST["icerik"]) ? $_POST["icerik"] : null;
    $onay = isset($_POST["onay"]) ? $_POST["onay"] : 0;

    if (!$baslik) {
        print "başlık ekleyin";
    } elseif (!$icerik) {
        print "içerik ekleyin";
    } else {
        $sorgu = $db->prepare("INSERT INTO dersler SET baslik = ?, icerik = ?, onay = ?");
        $ekle = $sorgu->execute([$baslik, $icerik, $onay]);
        if ($ekle) {
            header("Location:index.php");
        } else {
            $hata = $sorgu->errorInfo();
            print $hata[2];
        }
    }

}

?>

<form action="" method="post">
    Başlık : <br>
    <input type="text" value="<?php print isset($_POST["baslik"]) ? $_POST["baslik"] : "" ?>" name="baslik"> <br> <br>

    İçerik : <br>
    <textarea name="icerik" cols="30" rows="5"><?php print isset($_POST["icerik"]) ? $_POST["icerik"] : "" ?></textarea> <br> <br>
    Kategori : <br>
    <select name="kategori_id">
        <?php foreach ($kategoriler as $kategori): ?>
            <option value="<?php  $kategori["id"] ?>"><?php print $kategori["ad"]  ?></option>
        <?php endforeach ?>
    </select> <br><br>
    Onay Durumu : <br>
    <select name="onay">
        <option value="1">Onaylı</option>
        <option value="0">Onaylı Değil</option>
    </select> <br> <br>

    <input type="hidden" name="submit" value="1">

    <button type="submit">Gönder</button>
</form>
