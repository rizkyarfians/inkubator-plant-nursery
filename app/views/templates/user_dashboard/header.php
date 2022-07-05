<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $data['judul'];  ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= BASEURL;?>/css/style.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="burger_button">
                <div>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <input type="checkbox" name="burger" id="burger">
            </div>
            <ul>
                <li>
                    <a href="<?= BASEURL;?>">
                        <img src="<?= BASEURL;?>/img/icon24/dashboard.svg" alt="" id="dashboard">
                        <p>Dashboard</p>
                    </a>
                </li>

                <li>
                    <a href="<?= BASEURL;?>/datalog">
                        <img src="<?= BASEURL;?>/img/icon24/graph.svg" alt="" id="datalog">
                        <p>Datalog</p>
                    </a>
                </li>


                <li>
                    <a href="<?= BASEURL;?>/logout" style=" color: blue;">
                        <img src="<?= BASEURL;?>/img/icon24/logout.svg" alt="" id="datalog"
                            style="transform: scale(0.8);">
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </div>