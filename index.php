<?php

require_once "baglan.php";

if (!isset($_GET["sayfa"])){
    $_GET["sayfa"] = "index";
}

switch ($_GET["sayfa"]){
        case "insert";
            require_once "insert.php";
        break;

        case "index";
            require_once "homepage.php";
        break;
}

?>