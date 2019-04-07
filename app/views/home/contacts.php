<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Персональный сайт Герцовской Карины. Связь со мной.</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body onload = "hideCalendar(); sessionStorageHistory('Связь со мной'); setCookie('Связь со мной')">
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
                <li><a id="AboutMe" href="/aboutMe" onmouseover="setBackground('AboutMe')" onmouseout="restore('AboutMe')">Обо мне</a></li>
                <li><a onclick = "showList()" id="myInterests" href="#" onmouseover="setBackground('myInterests')" onmouseout="restore('myInterests')">Мои интересы</a></li>
                <li><a id="Photoalbum" href="/photoalbum" onmouseover="setBackground('Photoalbum')" onmouseout="restore('Photoalbum')">Мой фотоальбом</a></li>
                <li><a id="Education" href="/education" onmouseover="setBackground('Education')" onmouseout="restore('Education')">Образование</a></li>
                <li class="active"><a id="Connection" href="/contacts">Связь со мной</a></li>
                <li><a id="Test" href="/test" onmouseover="setBackground('Test')" onmouseout="restore('Test')">Входное тестирование</a></li>
                <li><a id="Guest" href="/guest_book" onmouseover="setBackground('Guest')" onmouseout="restore('Guest_book')">Гостевая книга</a></li>
                <li><a id="Blog" href="/blog" onmouseover="setBackground('Blog')" onmouseout="restore('Blog')">Блог</a></li>
                <?php
                if($args["isAdmin"]) {
                    echo '<li><a href="/admin">Админ</a></li>';
                }
                ?>
                <li><a id="History" href="/history" onmouseover="setBackground('History')" onmouseout="restore('History')">История просмотров</a></li>
            </ul>
            <div class="mainMenu navigation" id ="inter">
                <script src="script/dropMenu.js"></script>
            </div>
        </nav>
        <section>
            <form id="contacts" method="post" onchange="<?Validation::validate()?>" name="contactsForm" role="form">
<!--                onchange="checkedForm()"-->
                <h3>Для связи со мной напишите свои личные данные и, по желанию, задайте вопрос.</h3>
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
                <p>Ваш телефон:<br>
                    <input id="telephone"
                        type="tel"
                        name="tel"
                        placeholder="+7/+3XXXXXXXXXXX"
                        title="+7 или +3 и 9-11 цифр"
                        data-tooltip-message="Введите номер телефона в формате: +7 или +3 и 9-11 цифр"
                    >
                </p>
                <p id="sexSelection" class="focusP2">Ваш пол<br>
                    <label data-tooltip-message="Выберите Ваш пол" for="men"><input id="men" type="radio" name="pol" value="a1">Мужской<br></label>
                    <label data-tooltip-message="Выберите Ваш пол" for="women"><input id="women" type="radio" name="pol" value="a2">Женский<br></label>
                </p>
                <p id="ageSelection" class="focusP2">Ваш возраст: <br>
                    <select id="ageSelectOption" class="focusSelect3" name="age" data-tooltip-message="Выберите свой возраст">
                        <option value="">Выберите свой возраст</option>
                        <option value="от 15 до 18">от 15 до 18</option>
                        <option value="от 19 до 22">от 19 до 22</option>
                        <option value="от 23 до 26">от 23 до 26</option>
                        <option value="от 27 до 30">от 27 до 30</option>
                        <option value="от 31 до 34">от 31 до 34</option>
                        <option value="от 35 до 38">от 35 до 38</option>
                        <option value="от 39 до 42">от 39 до 42</option>
                        <option value="от 43 до 46">от 43 до 46</option>
                        <option value="от 47 до 50">от 47 до 50</option>
                        <option value="от 51 до 54">от 51 до 54</option>
                    </select>
                </p>
                <p>Ваш e-mail:<br>
                    <input id="email" type="email" name="email" class="inputLength1" placeholder="Ваш e-mail" data-tooltip-message="Введите Ваш e-mail в формате: имя_ящика@домен">
                </p>
                <p id="date_of_birth">Дата рождения:<br>
                    <input name = "dateOfBirth" id = "dateOfBirth" data-tooltip-message="Выберите дату Вашего рождения" onclick = "showCalendar(new Date())" readonly value="">
                </p>
                <br>
                <div id = "calendar">
                    <select id = "month" onclick = "redrawCalendar()"></select>
                    <select id = "year" onclick="redrawCalendar()"></select>
                </div>
                <p>
                    <textarea id="question" name="question" data-tooltip-message="Напишите свой вопрос" placeholder="Напишите свой вопрос"></textarea>
                </p>
                <input type="submit" name="submit" class="submit" form="contacts" value="Отправить">
                <input type="reset" name="reset" class="reset" value="Сбросить" form="contacts" onclick="location.reload()">
            </form>
        </section>
        <?php
        Validation::showErrors($args['errors']);
        ?>
    </div>
    <footer>
        <p class="footerNote1">&copy; 2019 GRIDI</p>
        <p class="footerNote2">г. Севастополь СевГУ</p>
        <p class="anchor1"><a href="#top">Наверх</a></p>
    </footer>
</div>
<script src="script/jquery-3.3.1.min.js"></script>
<!--<script src="script/check.js"></script>-->
<script src="script/onMenuHoverBackgr.js"></script>
<script src="script/calendar.js"></script>
<script src="script/sessionStorageHistory.js"></script>
<script src="script/globalHistory.js"></script>
<script src="script/currentTime.js"></script>
<script src="script/validationMessage.js"></script>
<script src="script/tooltips.js"></script>
</body>
</html>