<?php
require_once("db.php");
require_once('books.php');

$link = db_connect();

$books = books_all($link);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books Online</title>
    <link rel="stylesheet" href="style/main_style.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/book.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Caveat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#dialog" ).dialog();
        } );
    </script>
</head>
<style>
    ul#ul {
        list-style-image: url("images/list_icon.png");
    }

    ul#ul1 {
        list-style-image: url("images/bestseller.png");
    }
    div p{
        padding-left: 10px;
        font-size: 15px;
    }
    .php_answer{
        background-color: #eeeeee;
        text-align: center;
        font-family: "Open Sans", sans-serif;
        font-size: 15px;
        padding-top: 10px;
    }
</style>
<body>
<div id="dialog" title="Books Online">
    <p> Ласкаво просимо до найкращої віртуальної бібліотеки Books Online! Бажаємо захопливої подорожі до світу книжок.
        Вікно можна закрити, натиснувши на &apos;x&apos;.</p>
</div>
<div class="container">
    <header>
        <div class="header">
            <img src="images/logo.png" class="logo">
            <a href="index.php" class="logo"><h1>Books Online</h1></a>
            <nav>
                <ul>
                    <li><a href="">Головна</a></li>
                    <li><a href="JavaScript:window.alert('На жаль, цей розділ не працює')">Про нас</a>
                    <li><a href="">Автори</a></li>
                    <li><a href="literature.php">Література</a></li>
                </ul>
            </nav>
            <form class="search">
                <input type="search" name="search" placeholder="Пошук">
                <input type="submit" value="Знайти">
            </form>
        </div>
    </header>
    <div class="php_answer">
        <?php
        if (( $search = $_GET['search'])) {
            $book = books_get($link, $search);
            if ($book == null) {
                echo("Такої книги не існує(");
            } else {
                echo($book["name_"]);
            }
        }
        ?>
    </div>
    <div class="main">
        <div class="best-lib">
            <ul id="ul">
                <h4><strong>Список жанрів, які ви можете знайти у нашій бібліотеці</strong></h4>
                <li>Класика</li>
                <li>Фантастика</li>
                <li>Містика</li>
                <li>Пригоди</li>
                <li>Наукова література</li>
                <li>Детективи</li>
                <li>Психологія</li>
                <li>Романи</li>
            </ul>
        </div>
        <div class="best-today">
            <ul id="ul1">
                <h4>Бестселери нашої бібліотеки</h4>
                <li><a><h5>Бог завжди подорожує інкогніто </h5><br><h6>Лоран Гунель</h6></a></li>
                <li><a><h5>Місто дівчат </h5><br><h6>Елізабет Гілберт</h6></a></li>
                <li><a><h5>Нормальні люди</h5><br><h6>Саллі Руні</h6></a></li>
                <li><a><h5>П'ять четвертинок мандарина</h5><br><h6>Джоан Гарріс</h6></a></li>
            </ul>
        </div>
    </div>

    <div class="bottom">

        <p class="bottom-text">“The library is inhabited by spirits that come out of the pages at night.”
            – <strong>Isabel Allende</strong></p>
        <br>
        <p>Новинки світової літератури: </p>
        <ul>
            <li><strong>Мальвіль</strong> Робер Мерль</li>
            <li><strong>Геній</strong> Мо Янь</li>
            <li><strong>Двобій</strong> Кліффорд Саймак</li>
        </ul>

    </div>
    <?php
    foreach($books as $b):
        ?>
        <tr>
            <td><?=$b["id"]?></td>
            <td><?=$b["name_"]?></td>
            <td><?=$b["genre"]?></td>

        </tr>
    <?php endforeach;?>

    <footer>
        <div align="center" class="footer">
            <?php
            echo "Сьогоднішня дата: ";
            date_default_timezone_set("UTC");
            $time = time();
            $offset = 2;
            $time += 2 * 3600;
            echo date("d-m-Y H:i:s", $time);
            ?>
        </div>
    </footer>
</body>
</html>