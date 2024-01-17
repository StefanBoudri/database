<?php include 'select.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>product_code</th>
                    <th>product_naam</th>
                    <th>prijs_per_stuk</th>
                    <th>omschrijving</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Hoe je alles selecteert in een query zonder variabele
                $data = $pdo->query("SELECT * FROM producten")->fetchAll();

                foreach ($data as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['product_code'] . '</td>';
                    echo '<td>' . $row['product_naam'] . '</td>';
                    echo '<td>' . $row['prijs_per_stuk'] . '</td>';
                    echo '<td>' . $row['omschrijving'] . '</td>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>product_code</th>
                    <th>product_naam</th>
                    <th>prijs_per_stuk</th>
                    <th>omschrijving</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Hoe je een single row selecteert met placeholders
                $statement = $pdo->prepare("SELECT * FROM  producten WHERE product_code = '1'");
                $statement->execute();

                $res = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach ($res as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['product_code'] . '</td>';
                    echo '<td>' . $row['product_naam'] . '</td>';
                    echo '<td>' . $row['prijs_per_stuk'] . '</td>';
                    echo '<td>' . $row['omschrijving'] . '</td>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th>product_code</th>
                    <th>product_naam</th>
                    <th>prijs_per_stuk</th>
                    <th>omschrijving</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //Hoe je een single row selecteert met named parameters
                $id = 2;
                
                $statement = $pdo->prepare("SELECT * FROM  producten WHERE product_code = :id");
                $statement->execute([':id' => $id]);

                $res = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach ($res as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['product_code'] . '</td>';
                    echo '<td>' . $row['product_naam'] . '</td>';
                    echo '<td>' . $row['prijs_per_stuk'] . '</td>';
                    echo '<td>' . $row['omschrijving'] . '</td>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>