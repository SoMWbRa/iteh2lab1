<?php

include 'conn.php';
if(isset($_POST['ward_name'])) {

    $stmt = $dbh->query('SELECT max(id_ward) FROM ward;');
    $ward_id = $stmt->fetch();

    $stmt=$dbh->prepare('INSERT INTO ward(id_ward, name) VALUES (?,?);');
    $stmt->execute(array($ward_id[0] + 1,$_POST['ward_name']));

    echo "Добавленно";
}