<?php
include("../../php/include/config.php");
include("../../php/include/functions.php");
session_start();
if ($_SESSION["username"] != "admin") {
    header("Location: ../../index.php");
}

insertDB("DELETE FROM faq WHERE faq_id = " . $_GET["id"], $link);

header("Location: ./crud_faq.php");
