<?php
// Дежурства (в любых палатах) в смену:
include 'conn.php';

if(isset($_GET['shift'])) {
    echo "Дежурства (в любых палатах) в смену ".$_GET['shift'].":";

    $stmt=$dbh->prepare('SELECT nurse.name FROM nurse WHERE nurse.shift = ?;');
    $stmt->execute([$_GET['shift']]);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    include 'xml_generator.php';

}
