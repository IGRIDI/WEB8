<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Персональный сайт Герцовской Карины. Редактор блога.</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="/script/onMenuHoverBackgr.js"></script>
    <script src="/script/sessionStorageHistory.js"></script>
    <script src="/script/globalHistory.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="content">
        <div class="currentTime" id="currentTime"></div>
        <a name="top"></a>
        <header>
            <h1>Страница редактора блога</h1>
        </header>
        <section>
            <h2>Вы попали на страницу редактора блога <br>заполните форму</h2>
        </section>
        <a class="loadRecordsBtn" href="/admin" role="button">Назад</a>
        <form enctype="multipart/form-data" id="contacts" method="post">
            <h3>Для добавления новой записи блога заполните форму</h3>
            <div class="radio">
                <label>
                    <input type="radio" id="form_manual" name="mode" checked value="manual">
                    Форма ввода руками
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" id="form_auto" name="mode" value="file">
                    Форма ввода из файла
                </label>
            </div>
            <p>Тема записи:<br>
                <input type="text" class="form-control" name="topic" id="form_topic" placeholder="Тема сообщения">
            </p>
            <p>Автор:<br>
                <input type="text" class="form-control" name="author" id="form_author" placeholder="Автор">
            </p>
            <p>Изображение:<br>
                <input type="file" accept=".png,.jpeg,.jpg" name="photo" id="form_photo">
            </p>
            <p>Сообщение:<br>
                <textarea class="form-control" name="message" id="form_message" rows="3" placeholder="Сообщение"></textarea>
            </p>
            <p>Загрузка файла с записями:<br>
                <input type="file" accept=".csv" name="records" id="form_file">
            </p>
            <input type="submit" id = "submit" class="submit" value="Отправить">
            <input type="reset" class="reset" value="Сбросить" onclick="location.reload()">
            </form>
    </div>
    <footer>
        <p class="footerNote1">&copy; 2019 GRIDI</p>
        <p class="footerNote2">г. Севастополь СевГУ</p>
        <p class="anchor1"><a href="#top">Наверх</a></p>
    </footer>
</div>
<script src="/script/jquery-3.2.0.js"></script>
<script src="/script/functions.js"></script>
<script src="/script/blogEdit.js"></script>
<script src="/script/currentTime.js"></script>
</body>
</html>