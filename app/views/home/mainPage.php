<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Персональный сайт Герцовской Карины. Главная страница.</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="/script/onMenuHoverBackgr.js"></script>
    <script src="/script/sessionStorageHistory.js"></script>
    <script src="/script/globalHistory.js"></script>
</head>
<body onload="sessionStorageHistory('Главная'); setCookie('Главная', 0)">
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
                    <li class="active"><a id="MainPage" href="/">Главная</a></li>
                    <li><a id="AboutMe" href="/aboutMe" onmouseover="setBackground('AboutMe')" onmouseout="restore('AboutMe')">Обо мне</a></li>
                    <li><a onclick = "showList()" id="myInterests" href="#" onmouseover="setBackground('myInterests')" onmouseout="restore('myInterests')">Мои интересы</a></li>
                    <li><a id="Photoalbum" href="/photoalbum" onmouseover="setBackground('Photoalbum')" onmouseout="restore('Photoalbum')">Мой фотоальбом</a></li>
                    <li><a id="Education" href="/education" onmouseover="setBackground('Education')" onmouseout="restore('Education')">Образование</a></li>
                    <li><a id="Connection" href="/contacts" onmouseover="setBackground('Connection')" onmouseout="restore('Connection')">Связь со мной</a></li>
                    <li><a id="Test" href="/test" onmouseover="setBackground('Test')" onmouseout="restore('Test')">Входное тестирование</a></li>
                    <li><a id="Guest" href="/guest_book" onmouseover="setBackground('Guest')" onmouseout="restore('Guest_book')">Гостевая книга</a></li>
                    <li><a id="Blog" href="/blog" onmouseover="setBackground('Blog')" onmouseout="restore('Blog')">Блог</a></li>
<!--                    <li><a id="Admin" href="/admin" onmouseover="setBackground('Admin')" onmouseout="restore('Admin')">Админ</a></li>-->
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
                <h2>Здравствуйте!</h2>
                <figure>
                    <p><img src="img/pic1.jpg" alt="Its me" title="Это я"></p>
                    <figcaption>Это я!</figcaption>
                </figure>
                <table class="tableMainPage">
                    <tr>
                        <th>Дисциплина</th>
                        <th>Номер работы</th>
                        <th>Тема работы</th>
                    </tr>
                    <tr>
                        <td>"Веб-технологии</td>
                        <td>№7</td>
                        <td>“Исследование механизма сессий”</td>
                    </tr>
                </table>
            </section>
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