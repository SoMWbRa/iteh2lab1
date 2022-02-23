<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3> Запросы </h3>
<form action="fid_ward.php">
    <p> Перечень палат, в которых дежурит медсестра №
        <select>
            <?php
            include 'conn.php';
            $stmt = $dbh->query('SELECT id_nurse FROM nurse;');
            while ($row = $stmt->fetchColumn())
                echo "<option>$row</option>"
            ?>
        </select>
        <input type="submit">
    </p>
</form>

<form action="id_nurse.php">
    <p> Медсестры отделения №
        <select>
            <?php
            include 'conn.php';
            $stmt = $dbh->query('SELECT DISTINCT department FROM nurse;');
            while ($row = $stmt->fetchColumn())
                echo "<option>$row</option>"
            ?>
        </select>
        <input type="submit">
    </p>
</form>

<form action="name_shift.php">
    <p> Дежурства (в любых палатах) в смену:
        <select>
            <?php
            include 'conn.php';
            $stmt = $dbh->query('SELECT DISTINCT shift FROM nurse;');
            while ($row = $stmt->fetchColumn())
                echo "<option>$row</option>"
            ?>
        </select>
        <input type="submit">
    </p>
</form>

<h3> Добавить </h3>

</body>
</html>