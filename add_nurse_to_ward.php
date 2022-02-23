<?php

include 'conn.php';
if(isset($_POST['id_nurse'],$_POST['id_ward'])) {

    $stmt=$dbh->prepare('INSERT INTO nurse_ward(fid_nurse, fid_ward) VALUES (?,?);');
    $stmt->execute(array($_POST['id_nurse'],$_POST['id_ward']));

    echo "Добавленно";
}