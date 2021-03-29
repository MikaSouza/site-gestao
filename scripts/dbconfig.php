<?php
    $db_host = "mysql08-farm2.uni5.net";
    $db_name = "twflex14";
    $db_user = "twflex14";
    $db_pass = "7g7LWEnB";
try {
    $db_con = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8", $db_user, $db_pass);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}