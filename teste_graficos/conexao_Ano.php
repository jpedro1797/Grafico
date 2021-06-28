<?php

$pdo = new PDO('mysql:host=191.234.176.212; dbname=pclab_desenv; port=3306;charset=utf8', 'dashboard', 'Dash@52#35xYh');

$sql = "SELECT Ano
        FROM BI_ComboFiltroAno
        ORDER BY Ano ASC";

$statement = $pdo->prepare($sql);

$statement->execute();

while($results = $statement->fetch(PDO::FETCH_ASSOC)) 
{
    $result[] = $results;
}

echo json_encode($result);