<?php
// Functie om opgegeven gegevens toe te voegen en te wijzigen in database
function Save($id, $name, $price, $description, PDO $pdo): void
{
    // Als id boven de 0 is update de sql variabele het aangegeven product, anders voegt de variabele een nieuw product toe
    $sql = $id > 0 ?
        "UPDATE producten SET product_naam = :name, prijs_per_stuk = :price, omschrijving = :description WHERE product_code = :id" :
        "INSERT INTO producten (product_code, product_naam, prijs_per_stuk, omschrijving) VALUES (:id, :name, :price, :description) ";

    // Bereidt query voor en bind daarna de variabelen aan de placeholders om hem vervolgens uit te voeren
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ':id' => $id,
        ':name' => $name,
        ':price' => $price,
        ':description' => $description
    ]);
}

// Haalt gegevens op van opgegeven id en geeft een array terug
function GetRecordById(int $id, PDO $pdo): array
{
    // Bereidt query voor en bind daarna de variabelen aan de placeholders om hem vervolgens uit te voeren
    $statement = $pdo->prepare("SELECT * FROM  producten WHERE product_code = :id");
    $statement->execute([':id' => $id]);

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Functie om gegevens van de opgegeven id te verwijderen
function Delete($id, PDO $pdo): void
{
    // Bereidt query voor en bind daarna de variabelen aan de placeholders om hem vervolgens uit te voeren
    $statement = $pdo->prepare("DELETE FROM producten WHERE product_code = :id");
    $statement->execute([':id' => $id]);
}

//functie om inputfields te maken in een form
function InputField($type, $field, $label, bool $bool): void
{
    $required = !$bool ? 
        NULL : "required";
    
    echo "<label for='$field'>$label:</label>";
    echo "<input type='$type' name='$field' $required>";
     
}

?>
