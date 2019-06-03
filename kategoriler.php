<hr>
<a href="index.php/?sayfa=kategori_ekle">Kategori Ekle</a>

<h3>Kategoriler</h3>

<?php

$sorgu = $db->prepare("SELECT * FROM kategoriler");
$sorgu->execute();
$kategoriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if ($kategoriler): ?>

<ul>
    <?php foreach ($kategoriler as $kategori): ?>
    <li>
        <?php print $kategori["ad"]?>
        <a href="index.php/?sayfa=kategori_sil&id=<?php print $kategori["id"] ?>">SİL</a>
    </li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<div>Henüz hiç kategori girilmemiş !</div>
<?php endif; ?>