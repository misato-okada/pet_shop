<?php

require_once __DIR__ . '/functions.php';

$dbh = connectDb();

$sql = 'SELECT * FROM animals';

$stmt = $dbh->prepare($sql);

$stmt->execute();

$members = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETSHOP</title>
</head>
<body>
    <h2>本日のご紹介ペット!</h2>
    <?php foreach ($animals as $animal): ?>
        <div>
            <p><?= h($animal['type']) . 'の' . h($animal['name']) . 'ちゃん' ?></p><br>
            <p><?= h($animal['description']) ?></p><br>
            <p><?= h($animal['birthday']) . '生まれ'?></p><br>
            <p><?= '出身地' . h($animal['birthplace'])?></p><br>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>