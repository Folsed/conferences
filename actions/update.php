<?php

require_once '../db.php';

$conf_id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];
$latitude = $_POST['lat'];
$longitude = $_POST['lng'];
$country = $_POST['country'];

$sql = 'UPDATE `conferences` SET `title` = :title, `date` = :date, `latitude` = :latitude, `longitude` = :longitude, `country` = :country WHERE `conferences`.`id` = :id';
$query = $pdo->prepare($sql);
$query->execute(['title' => $title, 'date' => $date, 'latitude' => $latitude, 'longitude' => $longitude, 'country' => $country, 'id' => $conf_id]);

header('Location: ../conf_details.php?id=' . $conf_id);
