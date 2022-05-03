<!doctype html>
<html lang="en">
<head>
    <script src=ajax.js></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3> Запросы </h3>
<p> Перечень палат, в которых дежурит медсестра №
    <select name="id_nurse" id=0>
        <?php
        include 'conn.php';
        $stmt = $dbh->query('SELECT id_nurse FROM nurse ORDER BY id_nurse;');
        while ($row = $stmt->fetchColumn())
            echo "<option>$row</option>"
        ?>
    </select>
    <button type="button" onclick="load_fid_ward()">Change Content</button>
</p>

<p> Медсестры отделения №
    <select name="department" id=1>
        <?php
        include 'conn.php';
        $stmt = $dbh->query('SELECT DISTINCT department FROM nurse;');
        while ($row = $stmt->fetchColumn())
            echo "<option>$row</option>"
        ?>
    </select>
    <button type="button" onclick="load_id_nurse()">Change Content</button>
</p>

<p> Дежурства (в любых палатах) в смену:
    <select name="shift" id=2>
        <?php
        include 'conn.php';
        $stmt = $dbh->query('SELECT DISTINCT shift FROM nurse;');
        while ($row = $stmt->fetchColumn())
            echo "<option>$row</option>"
        ?>
    </select>
    <button type="button" onclick="load_name_shift()">Change Content</button>

</p>
<h>Результат</h>

<div id="demo">
    <h2>Let AJAX change this text</h2>
</div>
</body>
</html>