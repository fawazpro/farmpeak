<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <link rel="title icon" href="asset/images/p.svg" type="image/svg" />
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="asset/StyleSheet/main.css" />
    <link rel="stylesheet" href="asset/StyleSheet/main.css" />
    <title><?= $title ?> - Farmpeak</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bgSide border-right" id="sidebar-wrapper">
            <div class="sidebar-heading pt-5 d-flex justify-content-center align-items-center">
                <a href="/index.html" style="text-decoration: none" class="d-block">
                    <div>
                        <img src="asset/images/p.svg" style="width: 100px; height: auto" class="mx-auto" alt="p" />
                    </div>
                    <div>
                        <p class="ml-2 text-white">Farmpeak</p>
                    </div>
                </a>
            </div>
            <div class="list-group list-group-flush mt-5">
                <a href="dashboard" class="list-group-item list-group-item-action bgItem"><i style="font-size: 19px" class="fa fa-building mr-3"></i>Farm</a>
                <a href="investment.html" class="list-group-item list-group-item-action bgItem"><i style="font-size: 19px" class="fa fa-list mr-3"></i>My
                    Investment</a>
                <a href="wallet.html" class="list-group-item list-group-item-action bgItem"><i style="font-size: 19px" class="fas fa-wallet mr-3"></i>Wallet</a>
                <a href="profile" class="list-group-item list-group-item-action bgItem"><i style="font-size: 19px" class="fa fa-user mr-3"></i>My
                    Profile</a>
                <a href="help.html" class="list-group-item list-group-item-action bgItem"><i style="font-size: 19px" class="fa fa-question-circle mr-3"></i>Help Center</a>
                <a href="logout" class="list-group-item list-group-item-action bgItem"><i style="font-size: 19px" class="fas fa-sign-out-alt mr-3"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn" style="background-color: #039730 !important" id="menu-toggle">
                    <span class="fas fa-bars" style="color: #ffffff"></span>
                </button>
                <!-- Full name and email display -->
                <div class="ml-auto mt-2">
                    <p class="mb-0" style="font-weight: bold; font-size: 17px">
                        Abdullah Ryan
                    </p>
                    <p class="mb-0" style="font-size: 14px">abdullah@gmail.com</p>
                </div>
                <!-- Full name and email display -->
            </nav>