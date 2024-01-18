<?php 
$host = 'localhost';
$db   = 'Winkel';
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="update.php" method="post">
        <input type="text" name="product_naam" placeholder="Productnaam" >
        <input type="number" name="prijs_per_stuk" placeholder="Prijs per stuk" step="0.01">
        <input type="text" name="omschrijving" placeholder="Omschrijving product">
        <button name="submit">Toevoegen</button>
    </form>
</body>
</html>

<?php
$naam = $_POST['product_naam'];
$prijs = $_POST['prijs_per_stuk'];
$omschrijving = $_POST['omschrijving'];

if (isset($_POST["submit"]) == "POST"){
    $sql = "UPDATE producten SET product_naam = :naam, prijs_per_stuk = :prijs, omschrijving = :omschrijving WHERE product_code = 2";
    $statement = $pdo->prepare($sql);
    $statement->execute([':naam' => $naam, ':prijs' => $prijs, ':omschrijving' => $omschrijving]);
}
?>