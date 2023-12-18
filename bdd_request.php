<?php

$bddPath = './test.db';
$bdd = new SQLite3($bddPath);
if (!$bdd) {
    die("La connexion à la base de données a échoué.");
}
$stm = $bdd->prepare('SELECT * FROM TEST WHERE id_test=:id');
$stm -> bindValue(':id', 1, SQLITE3_INTEGER);
$res = $stm->execute();

if ($res) {
    while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
        print_r($row);
    }
} else {
    echo "Erreur d'exécution de la requête : " . $db->lastErrorMsg();
}
$bdd ->close();
