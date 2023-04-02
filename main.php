<?php
session_start();

if (!$_SESSION['user']) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link rel="stylesheet" href="assets/css/header-popup.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <nav class="header">
        <div class="header__container">
            <span class="header__title"><?php echo $_SESSION['user']['full_name'] ?></span>
            <button class="header__popbtn" id="popbtn">
                <img src="/assets/img/6.png" class="header__cartimg">
            </button>
        </div>
    </nav>

    <div class="popup" id="popupactive">
        <div class="popup__body">
            <div class="popup__body__top">
                <span class="popup__body__title">Настройки</span>
                <div class="popup__body__close-btn" id='btn_close'>✕</div>
            </div>
            <hr class="popup__body__border">
            <a href="includes/logout.php" class="popup__body__logout">Выйти из профиля</a>
        </div>
    </div>

    <div class="options">
        <a href="includes/testload.php" class='options_tittle'>Тесты</a>
        <a href="includes/results-load.php" class='options_tittle'>Результаты</a>
    </div>


    <script src="includes/script.js"></script>
</body>

</html>