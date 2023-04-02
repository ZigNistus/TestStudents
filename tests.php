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
    <title>Тесты</title>
    <link rel="stylesheet" href="assets/css/header-popup.css">
    <link rel="stylesheet" href="/assets/css/backbtn.css">
    <link rel="stylesheet" href="/assets/css/tests.css">
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

    <div class="tests">
        <span class="tests_head">Тесты</span>
        <?php
        foreach ($_SESSION['tests'] as $v1) {
            echo '<div class ="test_container">' . '<span class="tests_tittle">' . $v1['discipline'] . '</span>' .
                '<span class="tests_discipline">' .  $v1['test'] .
                '</span>' .
                '<form action="/includes/starttest.php" method="POST">' .
                '<input hidden class="form_id" type="password" name="test_id" value="' . $v1['id'] . '">' .
                '<button type="submit" class="tests_playbtn" id="playbtn">' . '<img src="/assets/img/play.png">'
                . '</button>' .
                '</form>'
                . '</div>';
        }
        if (isset($_SESSION['message'])) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
        ?>
    </div>


    <a href="main.php" class="homebtn">Назад</a>
    <script src="includes/script.js"></script>
</body>

</html>