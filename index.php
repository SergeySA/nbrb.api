<?php

require __DIR__ . './vendor/autoload.php';

use App\Client;

$client = new Client();
$rates = $client->getRates();
?>

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
<table>
<thead>
<tr>
    <td>id</td>
    <td>Abbreviation</td>
    <td>OfficialRate</td>
</tr>
</thead>
<tbody>
    <?php foreach($rates as $rate): ?>
        <tr>
            <td><?= $rate->Cur_ID ?></td>
            <td><?= $rate->Cur_Abbreviation ?></td>
            <td><?= $rate->Cur_OfficialRate ?></td>
        </tr>
    <?php endforeach ?>
</tbody>
</table>
</body>
</html>

