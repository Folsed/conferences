<?php

require_once 'db.php';

$conf_id = $_GET['id'];
$sql = 'SELECT * FROM `conferences` WHERE `id` = :id';
$query = $pdo->prepare($sql);
$query->execute(['id' => $conf_id]);
$conference = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://kit.fontawesome.com/0f1a2fa745.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="intro" id="intro">
        <script src="js/three.min.js"></script>
        <script src="js/vanta.globe.min.js"></script>
        <script>
            VANTA.GLOBE({
                el: "#intro",
                mouseControls: true,
                touchControls: true,
                gyroControls: false,
                minHeight: 200.00,
                minWidth: 200.00,
                scale: 1.00,
                scaleMobile: 1.00,
                color: 0x5c5ce8,
                backgroundColor: 0x2d2d2d
            })
        </script>
        <aside>
            <img src="img/logoimg.png" alt="logotype">
            <span class="logo">SpaceConf</span>
        </aside>
        <a href="create.php">
            <li><button class="button1 button-new">Create</button></li>
        </a>
        <a href="index.php">
            <li><button class="button1 button-new">Home</button></li>
        </a>
    </div>
    <div class="features1" style="position:relative; left: 100px;">
        <h1 style="text-align:left"><?= $conference['title'] ?></h1>
        <h2>
            <span style="font-size:25px; color:rgb(168, 168, 233); text-transform:capitalize;">
                Date:
            </span>
            <span style="font-size:25px; text-transform:capitalize;">
                <?= $conference['date'] ?>
            </span>
        </h2>
        <h2>
            <span style="font-size:25px; color:rgb(168, 168, 233); text-transform:capitalize;">
                Latitude:
            </span>
            <span style="font-size:25px; text-transform:capitalize;">
                <?= $conference['latitude'] ?>
            </span>
        </h2>
        <h2>
            <span style="font-size:25px; color:rgb(168, 168, 233); text-transform:capitalize;">
                Longitude:
            </span>
            <span style="font-size:25px; text-transform:capitalize;">
                <?= $conference['longitude'] ?>
            </span>
        </h2>
        <div id="map"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEc3vmC1YlaVA6ABfNgyOKjDJEJMUphIE&callback=initMap&v=weekly" defer></script>
        <script>
            let map;

            function initMap() {
                lat = parseFloat(<?= $conference['latitude'] ?>);
                lng = parseFloat(<?= $conference['longitude'] ?>);
                const myLatLng = {
                    lat: lat,
                    lng: lng
                };
                map = new google.maps.Map(document.getElementById("map"), {
                    center: myLatLng,
                    zoom: 12,
                });
                new google.maps.Marker({
                    position: myLatLng,
                    map,
                    title: "<?= $conference['country'] ?>",
                });
            }
            window.initMap = initMap;
        </script>
        <style type="text/css">
            #map {
                position: relative;
                bottom: -5px;
                left: -6px;
                height: 350px;
                width: 500px;
                margin-top: 0px;
                margin-bottom: 10px;
            }
        </style>
        <h2>
            <span style="font-size:25px; color:rgb(168, 168, 233); text-transform:capitalize;">
                Country:
            </span>
            <span style="font-size:25px; text-transform:capitalize;">
                <?= $conference['country'] ?>
            </span>
        </h2>
        <a href="update.php?id=<?= $conference['id'] ?>" class="button2 button-new">Edit</a>
        <a href="actions/delete.php?id=<?= $conference['id'] ?>"><button onclick="return check()" class="button2 button-new">Delete</button></a>
        <script>
            function check() {
                if (confirm("Delete?")) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
        </script>
    </div>
    <div class="wrapper">
        <div class="push"></div>
    </div>
    <div class="footer"></div>
    </div>
</body>

</html>