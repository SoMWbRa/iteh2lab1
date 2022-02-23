<?php
// Перечень палат, в которых дежурит медсестра №
include 'conn.php';
if(isset($_GET['id_nurse'])) {
    echo "Перечень палат, в которых дежурит медсестра №".$_GET['id_nurse'].":";

    $stmt=$dbh->prepare('SELECT nurse_ward.fid_ward FROM nurse_ward WHERE nurse_ward.fid_nurse = ?;');
    $stmt->execute([$_GET['id_nurse']]);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    include "output.php";
}
