<?php

$Valor_Ano = $_POST['Valor_Ano'];

$pdo = new PDO('mysql:host=191.234.176.212; dbname=pclab_desenv; port=3306;charset=utf8', 'dashboard', 'Dash@52#35xYh');

$sql = "SELECT Nome_Exame, Qtde
        FROM BI_Exames 
        WHERE (DataRef >= '$Valor_Ano-01-01') AND (DataRef <= '$Valor_Ano-12-31')
        ORDER BY Qtde DESC";

$statement = $pdo->prepare($sql);

$statement->execute();

while ($results = $statement->fetch(PDO::FETCH_ASSOC)) {
    $result[] = $results;
}

echo json_encode($result);
