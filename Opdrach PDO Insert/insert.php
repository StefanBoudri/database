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
try 
{
     $pdo = new PDO($dsn, $user, $pass, $options);
     echo 'Connected to database '. $db;
} 
catch (\PDOException $e) 
{
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insert.php" method="post">
        <input type="text" name="product_naam" placeholder="productnaam" required>
        <input type="number" name="prijs_per_stuk" placeholder="productprijs" step="0.01" required>
        <input type="text" name="omschrijving" placeholder="omschrijving" required>
        <button name="submit">Submit</button>
    </form>
</body>
</html>

<?php
    if (isset($_POST["submit"]) == "POST") {
        $statement = $pdo->prepare("INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)");
        $statement->bindParam(':product_naam',  $_POST['product_naam']);
        $statement->bindParam(':prijs_per_stuk',  $_POST['prijs_per_stuk']);
        $statement->bindParam(':omschrijving',  $_POST['omschrijving']);
        $statement->execute();
    }
?>