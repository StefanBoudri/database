<?php
require_once 'dbconn.php';
require_once 'functions.php';

$res = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['productId'];
    $name = $_POST['productName'];
    $price = $_POST['productPrice'];
    $description = $_POST['description'];

    Save($id, $name, $price, $description, $pdo);
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['productId'];

    if (isset($_GET['submit'])) {
        $res = GetRecordById($id, $pdo);
    } else {
        Delete($id, $pdo);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>functies toepassen</title>
</head>

<body>
    <form action="index.php" method="post">
        <?php
        InputField("number", "productId", "Productcode", false);
        InputField("text", "productName", "Productnaam", true);
        InputField("number", "productPrice", "Productprijs", true);
        InputField("text", "description", "Omschrijving", true);
        ?>
        <button value="submit">Verzenden</button>
    </form>
    <form action="index.php" method="get">
        <?php
        InputField("number", "productId", "id van product waar je gegevens van wilt tonen / verwijderen", true);
        ?>
        <input type="submit" value="toon product" name = "submit">
        <input type="submit" value="delete">
    </form>

    <table>
        <thead>
            <th>productId:</th>
            <th>productNaam:</th>
            <th>productPrijs:</th>
            <th>omschrijving:</th>
        </thead>
        <tbody>
            <?php 
            foreach($res as $row){
                echo "<tr>";
                echo "<td>" . $row['product_code'] . "</td>";
                echo "<td>" . $row['product_naam'] . "</td>";
                echo "<td>" . $row['prijs_per_stuk'] . "</td>";
                echo "<td>" . $row['omschrijving'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>
