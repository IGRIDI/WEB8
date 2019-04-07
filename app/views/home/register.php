<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Персональный сайт Герцовской Карины. Тестирование.</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
<div class="wrapper">
    <div class="content">
        <div class="user-banner">
            <div class="currentTime" id="currentTime"></div>
        </div>
        <a name="top"></a>
        <header>
            <h1>Вы попали на персональный сайт <br> Герцовской Карины Владиславовны</h1>
        </header>
        <section>

        </section>
        <a class="loadRecordsBtn" href="/" role="button">Главная страница</a>
        <form id ="contacts" method="post" class="form-horizontal">
            <p>Логин:<br>
                <input style="width: 100%;" type="text" class="form-control" id="form_login" name="login" placeholder="Логин">
            </p>
            <p>Пароль:<br>
                <input style="width: 100%;" type="password" class="form-control" id="form_password" name="password" placeholder="Пароль">
            </p>
            <p>Ф.И.О.<br>
                <input style="width: 100%;" type="text" class="form-control" id="form_fio" name="fio" placeholder="Ф.И.О.">
            </p>
            <p>Email<br>
                <input style="width: 100%;" type="email" class="form-control" id="form_email" name="email" placeholder="Email">
            </p>
            <input style="margin-top: 10px;" id="submit" type="submit" value="Отправить">
        </form>
        <?php
        TestValidation::showErrors($args['errors']);
        ?>
    </div>
    <footer>
        <p class="footerNote1">&copy; 2019 GRIDI</p>
        <p class="footerNote2">г. Севастополь СевГУ</p>
        <p class="anchor1"><a href="#top">Наверх</a></p>
    </footer>
</div>
<script src="script/jquery-3.2.0.js"></script>
<script src="script/currentTime.js"></script>
<script src="script/validationMessage.js"></script>
<script src="script/register.js"></script>
</body>
</html>