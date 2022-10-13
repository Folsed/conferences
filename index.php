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
    <?php include_once 'actions/print_conf.php'; ?>
    <div class="wrapper">
        <div class="push"></div>
    </div>
    <div class="footer"></div>
    </div>
</body>

</html>