<?php

$Valor_Ano = $_POST['Valor_Ano'];

$pdo = new PDO('mysql:host=191.234.176.212; dbname=pclab_desenv; port=3306;charset=utf8', 'dashboard', 'Dash@52#35xYh');

$sql = "SELECT Qtde, DATE_FORMAT(DataRef,'%m/%Y') DataRef
        FROM BI_Atendimentos
        WHERE (DataRef >= '$Valor_Ano-01-01') AND (DataRef <= '$Valor_Ano-12-31')
        ORDER BY DATE_FORMAT(DataRef,'%m') ASC";

$statement = $pdo->prepare($sql);

$statement->execute();

while ($results = $statement->fetch(PDO::FETCH_ASSOC)) {
    $result[] = $results;
}

echo json_encode($result);