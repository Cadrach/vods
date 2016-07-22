<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <link href="css/app.css" rel="stylesheet" type="text/css">

    <!-- Libraries -->
    <!-- build:js dist/libs.js -->
    <script type="text/javascript" src="bower/angular/angular.js"></script>
    <script type="text/javascript" src="bower/angular-route/angular-route.js"></script>
    <script type="text/javascript" src="bower/angular-animate/angular-animate.js"></script>
    <script type="text/javascript" src="bower/angular-growl/build/angular-growl.js"></script>
    <script type="text/javascript" src="bower/angular-strap/dist/angular-strap.js"></script>
    <script type="text/javascript" src="bower/angular-strap/dist/angular-strap.tpl.js"></script>
    <script type="text/javascript" src="bower/promise-tracker/promise-tracker.js"></script>
    <!-- endbuild -->

    <!-- Application -->
    <!-- NO-build:js dist/app.js -->
    <script type="text/javascript" src="js/ctrlHome.js"></script>
    <script type="text/javascript" src="js/application.js"></script>
    <!-- NO-endbuild -->

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body ng-app="Application">
    <div ng-view></div>
<!--<div class="container">-->
<!--    <div class="content">-->
<!--        <div class="title">[{{test}}]</div>-->
<!--    </div>-->
<!--</div>-->
</body>
</html>
