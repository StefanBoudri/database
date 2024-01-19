<?php
$host = 'localhost';
$db   = 'winkel';
$user = 'root';
$pass = 'rootPW30@';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

$statement = $pdo->prepare("SELECT * FROM producten ORDER BY product_code");
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten overzicht</title>
</head>

<body>
    <h1>Producten Overzicht</h1>

    <table>
        <thead>
            <tr>
                <th>Productcode</th>
                <th>Productnaam</th>
                <th>Prijs per stuk</th>
                <th>Omschrijving</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= $product['product_code'] ?></td>
                    <td><?= $product['product_naam'] ?></td>
                    <td><?= $product['prijs_per_stuk'] ?></td>
                    <td><?= $product['omschrijving'] ?></td>
                    <td>
                        <!-- Link naar delete.php met product_code parameter -->
                        <a href="delete.php?product_code=<?= $product['product_code'] ?>">Verwijder</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
