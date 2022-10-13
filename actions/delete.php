<?php

require_once '../db.php';

$conf_id = $_GET['id'];

$sql = 'DELETE FROM `conferences` WHERE `conferences`.`id` = :id';
$query = $pdo->prepare($sql);
$query->execute(['id' => $conf_id]);

header('Location: /questsite/');
