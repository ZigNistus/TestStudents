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
    <title>Результаты</title>
    <link rel="stylesheet" href="assets/css/header-popup.css">
    <link rel="stylesheet" href="/assets/css/backbtn.css">
    <link rel="stylesheet" href="assets/css/results.css">
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
        <div class="main_results-container">
            <?php
            echo '<table class="main_table">'
                . '<caption class="main_table-caption">Результаты</caption>'
                . '<thead>'
                . '<tr>'
                . '<th scope="col">Дисцпилина</th>'
                . '<th scope="col">Тест</th>'
                . '<th scope="col">Оценка</th>'
                . '</tr>'
                . '</thead>'
                . '<tbody>';

            foreach ($_SESSION['results'] as $value) {
                echo '<tr>'
                    . '<td>' . $value[0] . '</td>'
                    . '<td>' .  $value[1] . '</td>'
                    . '<td>' . $value[2] . '</td>'
                    . '</tr>';
            }
            echo '</tbody>' . '</table>';
            if (isset($_SESSION['message'])) {
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
        </div>
    </div>

    <a href="main.php" class="homebtn">Назад</a>
    <script src="includes/script.js"></script>
</body>

</html>