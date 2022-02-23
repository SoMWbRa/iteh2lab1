<?php
// Перечень палат, в которых дежурит медсестра №
include 'conn.php';
if(isset($_POST['nurse_name'],$_POST['department'],$_POST['shift'],$_POST['date'])) {

    $stmt = $dbh->query('SELECT max(id_nurse) FROM nurse;');
    $nurse_id = $stmt->fetch();

    $stmt=$dbh->prepare('INSERT INTO nurse(id_nurse, name, date, department, shift) VALUES (?,?,?,?,?);');
    $stmt->execute(array($nurse_id[0] + 1,$_POST['nurse_name'],$_POST['date'],$_POST['department'],$_POST['shift']));

    echo "Добавленно";
}