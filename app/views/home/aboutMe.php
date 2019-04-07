<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Персональный сайт Герцовской Карины. Обо мне.</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="script/onMenuHoverBackgr.js"></script>
    <script src="script/sessionStorageHistory.js"></script>
    <script src="script/globalHistory.js"></script>
</head>
<body onload="sessionStorageHistory('Обо мне'); setCookie('Обо мне')">
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
                <li><a id="MainPage" href="/" onmouseover="setBackground('MainPage')" onmouseout="restore('MainPage')">Главная</a></li>
                <li class="active"><a id="AboutMe" href="/aboutMe">Обо мне</a></li>
                <li><a onclick = "showList()" id="myInterests" href="#" onmouseover="setBackground('myInterests')" onmouseout="restore('myInterests')">Мои интересы</a></li>
                <li><a id="Photoalbum" href="/photoalbum" onmouseover="setBackground('Photoalbum')" onmouseout="restore('Photoalbum')">Мой фотоальбом</a></li>
                <li><a id="Education" href="/education" onmouseover="setBackground('Education')" onmouseout="restore('Education')">Образование</a></li>
                <li><a id="Connection" href="/contacts" onmouseover="setBackground('Connection')" onmouseout="restore('Connection')">Связь со мной</a></li>
                <li><a id="Test" href="/test" onmouseover="setBackground('Test')" onmouseout="restore('Test')">Входное тестирование</a></li>
                <li><a id="Guest" href="/guest_book" onmouseover="setBackground('Guest')" onmouseout="restore('Guest_book')">Гостевая книга</a></li>
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
        <section class="autobiography">
            <h2>Моя автобиография</h2>
            <p>Я, Герцовская Карина Владиславовна, родилась 13 ноября 1996 года в г.Мелитополь Запорожской области (Украина).</p>
            <p>Мать - Гридасова Оксана Владимировна.</p>
            <p>Отец - Гридасова Владислав Владимирович.</p>
            <p>В 2002 году я пошла в 1 класс Мелитопольской общеобразовательной щколы I-III уровней №24.
                В 2011 году после окончания 9-го класса поступила на 1 курс Мелитопольского промышленно-экономического колледжа на специальность "Компьютерные сети".
                В 2015 после окончания колледжа с красным дипломом поступила на 2 курс Харьковского Авиационно-Космического Университета им. Жуковского, который окончила с отличием в 2018 году и
                получила специальность инженера радиотехнических систем летательных аппаратов.
                В 2016 году поступила на 1 курс Севастопольского Государственного Университета на специальность "Информационные системы и технологии", где обучаюсь и ныне.</p>
                <p>Замужем.</p>
                <p>Мое хобби - вкусно есть, крепко спать, котики, альпаки, С++, С#.</p>
                <p>В работе отличаюсь ответственностью и пунктуальносью.</p>
            </p>
        </section>
    </div>
    <footer>
        <p class="footerNote1">&copy; 2019 GRIDI</p>
        <p class="footerNote2">г. Севастополь СевГУ</p>
        <p class="anchor1"><a href="#top">Наверх</a></p>
    </footer>
</div>
<script src="script/jquery-3.3.1.min.js"></script>
<script src="script/currentTime.js"></script>
</body>
</html>