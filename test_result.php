<?php
session_start();

if (!$_SESSION['test_result']) {
    header('Location: tests.php');
} else if (!$_SESSION['user']) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">

    <title>Результат теста</title>
    <link rel="stylesheet" href="/assets/css/header-popup.css">
    <link rel="stylesheet" href="/assets/css/backbtn.css">
    <link rel="stylesheet" href="/assets/css/test-result.css">
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


    <div class="main">
        <span class="main_tittle">Результат</span>
        <div class="main_result">
            <?php
            echo '<div class="main_result-text">Количество правильных ответов: '
                . $_SESSION['test_result']['right'] . '/' . $_SESSION['test_result']['total']
                . '</div>';


            echo '<div id="result_mark" class="main_result-mark">Ваша оценка: '
                . $_SESSION['test_result']['mark']
                . '</div>';

            if (isset($_SESSION['message'])) {
                echo '<div class="markmsg">'
                    . $_SESSION['message']
                    . '</div>';
            }

            unset($_SESSION['message']);

            unset($_SESSION['test_result']);
            ?>
        </div>
    </div>

    <a href="tests.php" class="homebtn">Назад</a>
    <script src="/includes/script.js"></script>
    <script src="/includes/test_result.js"></script>
</body>

</html>