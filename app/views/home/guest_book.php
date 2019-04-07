<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Персональный сайт Герцовской Карины. Гостевая книга.</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="/script/onMenuHoverBackgr.js"></script>
    <script src="/script/sessionStorageHistory.js"></script>
    <script src="/script/globalHistory.js"></script>
</head>
<body onload="sessionStorageHistory('Гостевая книга'); setCookie('Гостевая книга')">
<div class="wrapper">
    <div class="content">
        <div class="user-banner">
            <div class="currentTime" id="currentTime"></div>
            <div class="user-info">
                <?php
                echo $args["userInfo"];
                ?>
            </div>
        </div>
        <a name="top"></a>
        <header>
            <h1>Вы попали на персональный сайт <br> Герцовской Карины Владиславовны</h1>
        </header>
        <nav>
            <ul class="mainMenu">
                <li><a id="MainPage" href="/">Главная</a></li>
                <li><a id="AboutMe" href="/aboutMe" onmouseover="setBackground('AboutMe')" onmouseout="restore('AboutMe')">Обо мне</a></li>
                <li><a onclick = "showList()" id="myInterests" href="#" onmouseover="setBackground('myInterests')" onmouseout="restore('myInterests')">Мои интересы</a></li>
                <li><a id="Photoalbum" href="/photoalbum" onmouseover="setBackground('Photoalbum')" onmouseout="restore('Photoalbum')">Мой фотоальбом</a></li>
                <li><a id="Education" href="/education" onmouseover="setBackground('Education')" onmouseout="restore('Education')">Образование</a></li>
                <li><a id="Connection" href="/contacts" onmouseover="setBackground('Connection')" onmouseout="restore('Connection')">Связь со мной</a></li>
                <li><a id="Test" href="/test" onmouseover="setBackground('Test')" onmouseout="restore('Test')">Входное тестирование</a></li>
                <li class="active"><a id="Guest" href="/guest_book" onmouseover="setBackground('Guest')" onmouseout="restore('Guest_book')">Гостевая книга</a></li>
                <li><a id="Blog" href="/blog" onmouseover="setBackground('Blog')" onmouseout="restore('Blog')">Блог</a></li>
                <?php
                if($args["isAdmin"]) {
                    echo '<li><a href="/admin">Админ</a></li>';
                }
                ?>
                <li class="last"><a id="History" href="/history" onmouseover="setBackground('History')" onmouseout="restore('History')">История просмотров</a></li>
            </ul>
            <div class="mainMenu navigation" id ="inter">
                <script src="script/dropMenu.js"></script>
            </div>
        </nav>
        <section>
            <form id="contacts" method="post">
                <!--                onchange="checkedForm()"-->
                <h3>Для добавления отзыва заполните форму.</h3>
                <p>Ваше ФИО:<br>
                    <input
                            id="fullName"
                            type="text"
                            size="40"
                            name="FIO"
                            class="inputLength1"
                            title="Фамилия Имя Отчество полностью"
                            placeholder="Фамилия Имя Отчество полностью"
                            data-tooltip-message="Введите Фамилия Имя Отчество полностью"
                    >
                </p>
                <p>Ваш e-mail:<br>
                    <input id="email" type="email" name="email" class="inputLength1" placeholder="Ваш e-mail" data-tooltip-message="Введите Ваш e-mail в формате: имя_ящика@домен">
                </p>
                <p>Оставьте свой отзыв:<br>
                    <textarea id="question" name="question" data-tooltip-message="Текст отзыва" placeholder="Текст отзыва"></textarea>
                </p>
                <input type="submit" name="submit" class="submit" form="contacts" id="submit" disabled value="Отправить">
                <input type="reset" id="reset" name="reset" class="reset" value="Сбросить">
            </form>

       <a class="loadRecordsBtn" href="/loadRecordsFromFile" role="button">Загрузить отзывы из файла</a>

            <h3>Отзывы пользователей</h3>
            <table border="1" class="educationTable">
                <tr>
                    <th>№</th>
                    <th>ФИО</th>
                    <th>Email</th>
                    <th>Текст отзыва</th>
                    <th>Дата</th>
                </tr>
                <tbody>
                <?php
                $number = 1;
                foreach($args["reviews"] as $model) {
                    echo '<tr>';
                    echo '<td>' . $number++ . '</td>';
                    echo '<td>' . $model->Fio . '</td>';
                    echo '<td>' . $model->Email . '</td>';
                    echo '<td><p style="word-wrap: normal">' . $model->Review . '</p></td>';
                    echo '<td>' . $model->Date . '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </section>

    </div>
    <footer>
        <p class="footerNote1">&copy; 2019 GRIDI</p>
        <p class="footerNote2">г. Севастополь СевГУ</p>
        <p class="anchor1"><a href="#top">Наверх</a></p>
    </footer>
</div>
<script src="/script/jquery-3.2.0.js"></script>

<!--<script src="/script/jquery-3.3.1.min.js"></script>-->
<script src="/script/currentTime.js"></script>
<script src="/script/guestBook.js"></script>
<script src="/script/functions.js"></script>
</body>
</html>