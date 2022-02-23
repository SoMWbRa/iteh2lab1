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
<form action="fid_ward.php" method="get">
    <p> Перечень палат, в которых дежурит медсестра №
        <select name="id_nurse">
            <?php
            include 'conn.php';
            $stmt = $dbh->query('SELECT id_nurse FROM nurse ORDER BY id_nurse;');
            while ($row = $stmt->fetchColumn())
                echo "<option>$row</option>"
            ?>
        </select>
        <input type="submit">
    </p>
</form>

<form action="id_nurse.php">
    <p> Медсестры отделения №
        <select name="department">
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
        <select name="shift">
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

<form method="post" action="add_nurse.php">
    <p> Добавить медсестру с именем:
        <input type="text" name="nurse_name"> в
        <select name="department">
            <?php
            include 'conn.php';
            $stmt = $dbh->query('SELECT DISTINCT department FROM nurse;');
            while ($row = $stmt->fetchColumn())
                echo "<option>$row</option>"
            ?>
        </select> отдел
        на
        <select name="shift">
            <?php
            include 'conn.php';
            $stmt = $dbh->query('SELECT DISTINCT shift FROM nurse;');
            while ($row = $stmt->fetchColumn())
                echo "<option>$row</option>"
            ?>
        </select> смену за дату
        <input type="date" name="date">
        <input type="submit">
    </p>
</form>

<form method="post" action="add_ward.php">
    <p> Добавить палату с именем:
        <input type="text" name="ward_name">
        <input type="submit">
    </p>
</form>

<form method="post" action="add_nurse_to_ward.php">
    <p> Назначить медсестру №
        <select name="id_nurse">
            <?php
            include 'conn.php';
            $stmt = $dbh->query('SELECT id_nurse FROM nurse;');
            while ($row = $stmt->fetchColumn())
                echo "<option>$row</option>"
            ?>
        </select> в палату №
        <select name="id_ward">
            <?php
            include 'conn.php';
            $stmt = $dbh->query('SELECT id_ward FROM ward;');
            while ($row = $stmt->fetchColumn())
                echo "<option>$row</option>"
            ?>
        </select>
        <input type="submit">
</form>

</body>
</html>