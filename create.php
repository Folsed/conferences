<?php

require_once 'db.php';

$sql = 'SELECT * FROM `countries` WHERE `countries`.`id` <= 252';
$result = $pdo->prepare($sql);
$result->execute();
$data = $result->fetchAll()

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <div class="features1" enctype="multipart/form-data">
        <h1>Create</h1>
        <form action="actions/create.php" method="post" id='form'>
            <input type="text" name="title" class="form-control" placeholder="Title" required="" id="id_title"><br>
            <input type="date" name="date" class="form-control" placeholder="Date" required="" id="id_date"><br>
            <input type="text" id="latclicked" class="form-control" id="id_lat" name="lat" placeholder="Latitude">
            <input type="text" id="longclicked" class="form-control" id="id_lng" name="lng" placeholder="Longitude">
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEc3vmC1YlaVA6ABfNgyOKjDJEJMUphIE&callback=initMap&v=weekly" defer></script>
            <div style="padding:10px">
                <div id="map"></div>
            </div>
            <script type="text/javascript">
                var map;
                var marker = null;

                function initMap() {
                    var aa = {
                        lat: 50.44756892174481,
                        lng: 30.604547427911612
                    };

                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 12,
                        center: aa
                    });

                    // This event listener will call addMarker() when the map is clicked.
                    map.addListener('click', function(event) {
                        addMarker(event.latLng);
                        document.getElementById("latclicked").value = event.latLng.lat();
                        document.getElementById("longclicked").value = event.latLng.lng();
                    });

                    // Update lat/long value of div when anywhere in the map is clicked	
                    google.maps.event.addListener(map, 'click', function(event) {
                        document.getElementById('latclicked').innerHTML = event.latLng.lat();
                        document.getElementById('longclicked').innerHTML = event.latLng.lng();
                    });
                }

                // Adds a marker to the map and push to the array.
                function addMarker(location) {
                    if (marker)
                        marker.setPosition(location);
                    else
                        marker = new google.maps.Marker({
                            position: location,
                            flat: false,
                            map: map,
                            draggable: true
                        });

                }

                // Sets the map on all markers in the array.
                function setMapOnAll(map) {

                    marker.setMap(map);

                }

                // Removes the markers from the map, but keeps them in the array.
                function clearMarkers() {
                    marker.setMap(null);
                }

                // Shows any markers currently in the array.
                function showMarkers() {
                    marker.setMap(map);
                }

                // Deletes all markers in the array by removing references to them.
                function deleteMarkers() {
                    clearMarkers();
                }
            </script>
            <style type="text/css">
                #map {
                    position: relative;
                    bottom: 24px;
                    left: -20px;
                    height: 350px;
                    width: 500px;
                    margin-top: 0px;
                    margin-bottom: 10px;
                }
            </style>


            <select name="country" id="id_country">
                <option disabled selected>Country</option>
                <?php
                foreach ($data as $country) :
                ?>
                    <option>
                        <?= $country['name'] ?>
                    </option>
                <?php
                endforeach;
                ?>
            </select>
            <button class="button2 button-new" type="submit">Create</button>
        </form>
    </div>
    <div class="wrapper">
        <div class="push"></div>
    </div>
    <div class="footer"></div>
    </div>
</body>

</html>