

<h3>Dersler</h3>

<?php

$sorgu = $db->prepare("SELECT * FROM dersler");
$sorgu->execute();
$dersler = $sorgu->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if ($dersler): ?>

<ul>
    <?php foreach ($dersler as $ders): ?>
    <li>
        <?php print $ders["baslik"]?>
        <?php if ($ders["onay"] == 1): ?>
            <a href="index.php/?sayfa=oku&id=<?php print $ders["id"] ?>">[OKU]</a>
        <?php endif ?>
        <a href="index.php/?sayfa=guncelle&id=<?php print $ders["id"] ?>">[DÜZENLE]</a>
        <a href="index.php/?sayfa=sil&id=<?php print $ders["id"] ?>">[SİL]</a>
    </li>
    <?php endforeach ?>
</ul>

<?php else: ?>
    <div>Henüz eklenmiş ders yok !</div>
<?php endif ?>
