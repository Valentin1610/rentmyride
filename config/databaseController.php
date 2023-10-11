<?php

require_once __DIR__ . '/constants.php';

function connect()
{
    try {
        $pdo = new PDO(DSN, USER, PASSWORD);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
    return $pdo;
}
