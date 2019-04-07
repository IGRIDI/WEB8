<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Персональный сайт Герцовской Карины. Статистика посещений.</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="/script/onMenuHoverBackgr.js"></script>
    <script src="/script/sessionStorageHistory.js"></script>
    <script src="/script/globalHistory.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="content">
        <div class="user-banner">
            <div class="currentTime" id="currentTime"></div>
        </div>
        <a name="top"></a>
        <header>
            <h1>Статистика поcещений</h1>
        </header>
        <a class="loadRecordsBtn" href="/admin" role="button">Назад</a>
        <?php
        echo "<div class='pull-right'>";
        for( $i = 0; $i < $args["countPages"]; $i++ ) {
            $index = $i + 1;
            if($i == $args["page"]) {
                echo "<a class='pagesBtn' href='/visits?page=$i' role='button'>$index</a>";
            } else {
                echo "<a class='pagesBtn' href='/visits?page=$i' role='button'>$index</a>";
            }
        }
        echo "</div>";
        ?>
        <table border="1" class="educationTable">
            <thead>
            <tr>
                <th>Дата посещения</th>
                <th>Страница</th>
                <th>Ip-address</th>
                <th>Хост</th>
                <th>Браузер</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($args["records"] as $value) {
                echo "<tr>
                <td>$value->VisitingTime</td>
                <td>$value->VisitPage</td>
                <td>$value->IpAddress</td>
                <td>$value->HostName</td>
                <td><p>$value->BrowserName</p></td>
            </tr>";
            }
            ?>
            </tbody>
        </table>
        <?php
        echo "<div class='pull-right'>";
        for( $i = 0; $i < $args["countPages"]; $i++ ) {
            $index = $i + 1;
            if($i == $args["page"]) {
                echo "<a class='pagesBtn' href='/visits?page=$i' role='button'>$index</a>";
            } else {
                echo "<a class='pagesBtn' href='/visits?page=$i' role='button'>$index</a>";
            }
        }
        echo "</div>";
        ?>


    </div>
    <footer>
        <p class="footerNote1">&copy; 2019 GRIDI</p>
        <p class="footerNote2">г. Севастополь СевГУ</p>
        <p class="anchor1"><a href="#top">Наверх</a></p>
    </footer>
</div>
<script src="/script/jquery-3.3.1.min.js"></script>
<script src="/script/currentTime.js"></script>
</body>
</html>