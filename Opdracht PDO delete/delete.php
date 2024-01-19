<?php
require_once 'index.php';

// Controleer of de product_code parameter is ingesteld in de URL
if (isset($_GET['product_code'])) {
    $id = $_GET['product_code'];

    // Voorbereidde query om het product te verwijderen
    $deleteStatement = $pdo->prepare("DELETE FROM producten WHERE product_code = :product_code");
    $deleteStatement->execute([':product_code' => $id]);

    // Redirect terug naar de index.php na het verwijderen
    header("Location: index.php");
    exit();
} 
?>
