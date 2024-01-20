<?php
ini_set('display_errors', 0);
require_once 'dbconn.php';
require_once 'functions.php';

$res = [];

// Als het formulier wordt verzonden (POST-methode)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verkrijg gegevens uit het POST-verzoek
    $id = $_POST['productId'];
    $name = $_POST['productName'];
    $price = $_POST['productPrice'];
    $description = $_POST['description'];

    // Roep de Save-functie aan om gegevens op te slaan in de database
    Save($id, $name, $price, $description, $pdo);
}
// Als het formulier wordt ingediend met GET-methode (bijv. bij het tonen of verwijderen van gegevens)
else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Verkrijg product ID uit het GET-verzoek
    $id = $_GET['productId'];

    // Controleer of de "toon product" knop is ingedrukt
    if (isset($_GET['submit'])) {
        // Roep GetRecordById-functie aan om gegevens op te halen voor het opgegeven product ID
        $res = GetRecordById($id, $pdo);
    }
    // Als "delete" knop is ingedrukt
    else {
        // Roep Delete-functie aan om gegevens van het opgegeven product ID te verwijderen
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
        <input type="submit" value="toon product" name="submit">
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
            foreach ($res as $row) {
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