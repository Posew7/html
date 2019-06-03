<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=ders", "root", "posew7");
} catch (PDOException $e) {
    print $e->getMessage();
}

?>