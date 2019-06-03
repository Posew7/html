<h3>Dersler</h3>

<?php

$dersler = $db->query("SELECT dersler.id, dersler.baslik, kategoriler.ad as kategori_ad, dersler.onay FROM dersler 
INNER JOIN kategoriler ON kategoriler.id = dersler.kategori_id 
ORDER BY dersler.id DESC")->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if ($dersler): ?>

    <ul>
        <?php foreach ($dersler as $ders): ?>
            <li>
                <?php print $ders["baslik"] ?>
                (<?php print $ders["kategori_ad"] ?>)
                <div>
                    <?php if ($ders["onay"] == 1): ?>
                        <a href="index.php/?sayfa=oku&id=<?php print $ders["id"] ?>">[OKU]</a>
                    <?php endif ?>
                    <a href="index.php/?sayfa=guncelle&id=<?php print $ders["id"] ?>">[DÜZENLE]</a>
                    <a href="index.php/?sayfa=sil&id=<?php print $ders["id"] ?>">[SİL]</a>
                </div>
            </li>
        <?php endforeach ?>
    </ul>

<?php else: ?>
    <div>Henüz eklenmiş ders yok !</div>
<?php endif ?>
