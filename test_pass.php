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
    <title>Прохождение теста</title>
    <link rel="stylesheet" href="assets/css/header-popup.css">
    <link rel="stylesheet" href="/assets/css/backbtn.css">
    <link rel="stylesheet" href="assets/css/test-pass.css">
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
        <span class="main_tittle">Вопросы</span>
        <div class="main_container">
            <?php
            echo '<form action="includes/test_result.php" method="POST" class="main_form">';

            $op_num = 1;
            foreach ($_SESSION['questions'] as $key => $value) {
                echo '<div class="main_question-container">'
                    . '<span class="main_form-tittle"> Вопрос №' .  $op_num . '  '  . $key . '</span>' . '<br>';
                $num = 1;
                foreach ($value as $v) {
                    echo '<input type="radio" required name="option' . $op_num . '" value="' . $num . '" class="main_input">'
                        . '<span class="main_input-text">' . $v['qes_option'] . '</span>' . '<br>';
                    $num++;
                }
                echo '</div>';
                $op_num++;
            }
            echo '<button type="submit" class="main_form-submit">Завершить тест</button>' . '</form>';

            $_SESSION['op_num'] = $op_num;
            if (isset($_SESSION['message'])) {
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>

        </div>

        <a href="tests.php" class="homebtn">Назад</a>
        <script src="/includes/script.js"></script>
</body>

</html>