<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Персональный сайт Герцовской Карины. Образование.</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="script/onMenuHoverBackgr.js"></script>
    <script src="script/sessionStorageHistory.js"></script>
    <script src="script/globalHistory.js"></script>
</head>
<body onload="sessionStorageHistory('Образование'); setCookie('Образование')">
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
                <li class="active"><a id="Education" href="/education">Образование</a></li>
                <li><a id="Connection" href="/contacts" onmouseover="setBackground('Connection')" onmouseout="restore('Connection')">Связь со мной</a></li>
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
            <h2>Моё образование</h2>
            <dl class="educationList">
                <dt>Название учебного заведения:</dt>
                    <dd>ФГАОУ Севастопольский государственный университет</dd>
                <dt>Название кафедры:</dt>
                    <dd>Кафедра "Информационных систем и технологий</dd>
            </dl>
            <h3>Изученные мною дисциплины</h3>
            <table border="1" class="educationTable">
                <tr>
                    <th>Наименование дисциплины</th>
                    <th>Общее количество часов</th>
                    <th>Оценка</th>
                    <th>Фамилия преподавателя</th>
                </tr>
                <tr>
                    <td colspan="4">1 семестр</td>
                </tr>
                <tr>
                    <td>Высшая математика</td>
                    <td>252</td>
                    <td>хорошо</td>
                    <td>Ольшанская</td>
                </tr>
                <tr>
                    <td>Информатика</td>
                    <td>108</td>
                    <td>отлично</td>
                    <td>Сметанина</td>
                </tr>
                <tr>
                    <td>История</td>
                    <td>108</td>
                    <td>хорошо</td>
                    <td>Дмитриева</td>
                </tr>
                <tr>
                    <td>Физическая культура</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>Ткаченко</td>
                </tr>
                <tr>
                    <td>Физика</td>
                    <td>144</td>
                    <td>зачтено</td>
                    <td>Лантушенко</td>
                </tr>
                <tr>
                    <td>Экология</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>Климова</td>
                </tr>
                <tr>
                    <td>Русский язык и культура речи</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>Морозова</td>
                </tr>
                <tr>
                    <td>Алгоритмизация и программирование</td>
                    <td>108</td>
                    <td>зачтено</td>
                    <td>Сметанина</td>
                </tr>
                <tr>
                    <td>Иностранный язык</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>Моисейкина</td>
                </tr>
                <tr>
                    <td colspan="4">2 семестр</td>
                </tr>
                <tr>
                    <td>Философия</td>
                    <td>108</td>
                    <td>отлично</td>
                    <td>академ. разница</td>
                </tr>
                <tr>
                    <td>Высшая математика</td>
                    <td>180</td>
                    <td>отлично</td>
                    <td>академ. разница</td>
                </tr>
                <tr>
                    <td>Физика</td>
                    <td>180</td>
                    <td>хорошо</td>
                    <td>академ. разница</td>
                </tr>
                <tr>
                    <td>Алгоритмизация и программирование</td>
                    <td>108</td>
                    <td>отлично</td>
                    <td>Сметанина</td>
                </tr>
                <tr>
                    <td>Физическая культура</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>Ткаченко</td>
                </tr>
                <tr>
                    <td>Иностранный язык</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>Моисейкина</td>
                </tr>
                <tr>
                    <td>Дискретная математика</td>
                    <td>108</td>
                    <td>зачтено</td>
                    <td>академ. разница</td>
                </tr>
                <tr>
                    <td>Экономическая теория</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>академ. разница</td>
                </tr>
                <tr>
                    <td>Основы права</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>???</td>
                </tr>
                <tr>
                    <td><a href="/test">Безопасность жизнедеятельности</a></td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>Буркова</td>
                </tr>
                <tr>
                    <td colspan="4">3 семестр</td>
                </tr>
                <tr>
                    <td>Высшая математика</td>
                    <td>144</td>
                    <td>удовлетворительно</td>
                    <td>Ольшанская</td>
                </tr>
                <tr>
                    <td>Дискретная математика</td>
                    <td>108</td>
                    <td>отлично</td>
                    <td>Ченгарь</td>
                </tr>
                <tr>
                    <td>Архитектура компюьтерных систем</td>
                    <td>144</td>
                    <td>отлично</td>
                    <td>Волкова</td>
                </tr>
                <tr>
                    <td>Объектно-ориентированное программирование</td>
                    <td>144</td>
                    <td>отлично</td>
                    <td>Сметанина</td>
                </tr>
                <tr>
                    <td>Алгоритмизация и программирование</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>Забаштанский</td>
                </tr>
                <tr>
                    <td>Алгоритмизация и программирование</td>
                    <td>курсовой проект</td>
                    <td>отлично</td>
                    <td>Забаштанский</td>
                </tr>
                <tr>
                    <td>Иностранный язык</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>Миронцева</td>
                </tr>
                <tr>
                    <td>Физкультура и спорт</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>Русинова</td>
                </tr>
                <tr>
                    <td>Экономика и основы IT-предприятия</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>Горбачева</td>
                </tr>
                <tr>
                    <td>Компьютерная графика</td>
                    <td>108</td>
                    <td>зачтено</td>
                    <td>Ченгарь</td>
                </tr>
                <tr>
                    <td>Теория электрических цепей</td>
                    <td>108</td>
                    <td>зачтено</td>
                    <td>Козырев</td>
                </tr>
                <tr>
                    <td>Численные методы</td>
                    <td>108</td>
                    <td>зачтено</td>
                    <td>Балабанов</td>
                </tr>
                <tr>
                    <td colspan="4">4 семестр</td>
                </tr>
                <tr>
                    <td>Иностранный язык</td>
                    <td>108</td>
                    <td>отлично</td>
                    <td>Миронцева</td>
                </tr>
                <tr>
                    <td>Электроника</td>
                    <td>144</td>
                    <td>отлично</td>
                    <td>Осадченко</td>
                </tr>
                <tr>
                    <td>Основы теории алгоритмов</td>
                    <td>144</td>
                    <td>отлично</td>
                    <td>Карлусов</td>
                </tr>
                <tr>
                    <td>Теория вероятности и матемаческая статистика</td>
                    <td>144</td>
                    <td>отлично</td>
                    <td>Шумейко</td>
                </tr>
                <tr>
                    <td>Основы системного анализа</td>
                    <td>108</td>
                    <td>зачтено</td>
                    <td>Доронина</td>
                </tr>
                <tr>
                    <td>Операционные системы</td>
                    <td>108</td>
                    <td>зачтено</td>
                    <td>Корепанова</td>
                </tr>
                <tr>
                    <td>Объектно-ориентированное программирование</td>
                    <td>курсовой проект</td>
                    <td>отлично</td>
                    <td>Забаштанский</td>
                </tr>
                <tr>
                    <td>Объектно-ориентированное программирование</td>
                    <td>108</td>
                    <td>зачтено</td>
                    <td>Забаштанский</td>
                </tr>
                <tr>
                    <td>Элективные курсы по физической культуре и спорту</td>
                    <td>72</td>
                    <td>зачтено</td>
                    <td>Русинова</td>
                </tr>
                <tr>
                    <td>Теория баз данных</td>
                    <td>108</td>
                    <td>зачтено</td>
                    <td>Ченгарь</td>
                </tr>
                <tr>
                    <td>Технология создания программного продукта</td>
                    <td>144</td>
                    <td>зачтено</td>
                    <td>Строганов</td>
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
<script src="script/jquery-3.3.1.min.js"></script>
<script src="script/currentTime.js"></script>
</body>
</html>