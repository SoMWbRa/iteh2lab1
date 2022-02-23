<?php
// Медсестры отделения №
include 'conn.php';
if(isset($_GET['department'])) {
    echo "Медсестры отделения №".$_GET['department'].":";

    $stmt=$dbh->prepare('SELECT nurse.id_nurse FROM nurse WHERE nurse.department = ?;');
    $stmt->execute([$_GET['department']]);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    include "output.php";
}
