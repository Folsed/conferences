<?php

require_once '../db.php';

$title = $_POST['title'];
$date = $_POST['date'];
$latitude = $_POST['lat'];
$longitude = $_POST['lng'];
$country = $_POST['country'];

$sql = 'INSERT INTO `conferences` (`id`, `title`, `date`, `latitude`, `longitude`, `country`) VALUES (NULL, :title, :date, :latitude, :longitude, :country)';
$query = $pdo->prepare($sql);
$query->execute(['title' => $title, 'date' => $date, 'latitude' => $latitude, 'longitude' => $longitude, 'country' => $country]);

header('Location: /questsite/');
