<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Персональный сайт Герцовской Карины. Тестирование.</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
<!--    <script src="script/checkTest.js"></script>-->
    <script src="script/onMenuHoverBackgr.js"></script>
    <script src="script/sessionStorageHistory.js"></script>
    <script src="script/globalHistory.js"></script>
</head>
<body onload="sessionStorageHistory('Входное тестирование'); setCookie('Входное тестирование')">
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
                <li><a id="Connection" href="/contacts" onmouseover="setBackground('Connection')" onmouseout="restore('Connection')">Связь со мной</a></li>
                <li class="active"><a id="Test" class="active" href="/test">Входное тестирование</a></li>
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
            <h2>Тест по дисциплине "Безопасность жизнедеятельности"</h2>
            <form id="tests" method="post" name="testForm" role = "form">
<!--                  onsubmit="return checkTestData()"-->
                <fieldset class="fSet1">
                <?php
                if($args["isAuthorize"]) {
                    echo '<a class="loadRecordsBtn" href="/table" role="button">Ответы студентов на тест</a>' ; }
                ?>
                    <legend>Заполните все поля и дайте правильные ответы</legend>
                    <p>Ваше ФИО:<br>
                        <input type="text" id = "form_fio" size="40" name="FIO" class="inputLength1" title="Фамилия Имя Отчество полностью" data-tooltip-message="Введите Фамилия Имя Отчество полностью" placeholder="Фамилия Имя Отчество полностью">
                    </p>
                    <p>Ваша группа:<br>
                        <select class="focusSelect2" name="groups" id="form_group" data-tooltip-message="Выберите группу, в которой Вы состоите">
                            <optgroup label="">
                                <option disabled selected value="choice">Выберите свою группу</option>
                            </optgroup>
                            <optgroup label="1 курс">
                                <option value="11">ИС/б-11-о</option>
                                <option value="12">ИС/б-12-о</option>
                                <option value="13">ИС/б-13-о</option>
                            </optgroup>
                            <optgroup label="2 курс">
                                <option value="21">ИС/б-21-о</option>
                                <option value="22">ИС/б-22-о</option>
                            </optgroup>
                            <optgroup label="3 курс">
                                <option value="31">ИС/б-31-о</option>
                                <option value="32">ИС/б-32-о</option>
                                <option value="33">ИС/б-33-о</option>
                            </optgroup>
                            <optgroup label="4 курс">
                                <option value="41">ИС/б-41-о</option>
                                <option value="42">ИС/б-42-о</option>
                                <option value="43">ИС/б-43-о</option>
                            </optgroup>
                        </select>
                    </p>
                    <fieldset class="fSet2">
                        <legend>Вопрос №1</legend>
                        <p>Чрезвычайные ситуации техногенного характера (классификация, причины их возникновения, последствия,
                            ликвидация и действие населения на любом примере ЧС техногенного характера.<br>
                            <textarea name="answer1" id = "form_answer1" placeholder="Напишите свой ответ" data-tooltip-message="Напишите ответ. Не менее 30 слов"></textarea>
                        </p>
                    </fieldset>
                    <fieldset class="fSet3" title="Выберите один из вариантов">
                        <legend>Вопрос №2</legend>
                        <p class="focusP">Убежища малой вместительности:<br>
                            <label data-tooltip-message="Выберите правильный ответ" for="ans0"><input id="ans0" type="radio" name="answer2"  value="до 100 чел">до 100 чел.<br></label>
                            <label data-tooltip-message="Выберите правильный ответ" for="ans1"><input id="ans1" type="radio" name="answer2" value="до 600 чел">до 600 чел.<br></label>
                            <label data-tooltip-message="Выберите правильный ответ" for="ans2"><input id="ans2" type="radio" name="answer2" value="до 1000 чел">до 1000 чел.<br></label>
                        </p>
                    </fieldset>
                    <fieldset class="fSet4" title="Выберите один из вариантов">
                        <legend>Вопрос №3</legend>
                        <p>Признаки отравления угарным газом?<br>
                            <select data-tooltip-message="Выберите правильный ответ" id = "form_answer3" class="focusSelect" size="1" name="answer3">
                                <option disabled selected>Выберите ответ</option>
                                <option value="Слабость, тошнота, рвота, головокружение, покраснение кожных покровов">Слабость, тошнота, рвота, головокружение, покраснение кожных покровов</option>
                                <option value="Слабость, головокружение, побледнение кожных покровов">Слабость, головокружение, побледнение кожных покровов</option>
                            </select>
                        </p>
                    </fieldset>
                    <input type="submit" id = "submit" name="submit" class="submit" form="tests">
                    <input type="reset" name="reset" class="reset" form="tests">
                </fieldset>
            </form>
            <?php
            if (!empty($_POST)) {
                TestValidation::showErrors($args['errors']);
                echo '<br>';
                TestVerification::showErrors($args['responses']);
            }
            ?>
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
<script src="script/validationMessage.js"></script>
<script src="script/tooltips.js"></script>
</body>
</html>