<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=db", "root", "posew7");
} catch (PDOException $e) {
    print $e->getMessage();
}

?>