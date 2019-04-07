<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/layout.css" rel="stylesheet">
    <title>Персональный сайт Герцовской Карины. Страницв ответов на тест.</title>
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
            <h1>Страница ответов на тест</h1>
        </header>
         <div class="container">
        <a class="loadRecordsBtn" href="/test" role="button">Назад</a>
        <table border="1" class="educationTable">
            <thead>
            <tr>
                <th>№</th>
                <th>Дата</th>
                <th>Ф.И.О.</th>
                <th>Группа</th>
                <th>Ответ 1</th>
                <th>Ответ 2</th>
                <th>Ответ 3</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $number = 1;
                foreach($args['models'] as $model) {
                    echo '<tr>';
                    echo '<td>' . $number++ . '</td>';
                    echo '<td>' . $model->DatePassage . '</td>';
                    echo '<td>' . $model->Fio . '</td>';
                    echo '<td>' . $model->Group . '</td>';
                    echo '<td>' . $model->Answer1 . '</td>';
                    echo '<td>' . $model->Answer2 . '</td>';
                    echo '<td>' . $model->Answer3 . '</td>';
                    echo '</tr>';
                }
            ?>
            </tbody>
        </table>

    </div>
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