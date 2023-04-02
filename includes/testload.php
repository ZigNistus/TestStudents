<?php
session_start();
require_once 'connect.php';

$check_test = mysqli_query($db, "SELECT * FROM `Tests`");


if (mysqli_num_rows($check_test) > 0) {
    $tests = mysqli_fetch_all($check_test, MYSQLI_ASSOC);

    $_SESSION['tests'] = $tests;

    header('Location: ../tests.php');
} else {
    $_SESSION['message'] = 'Тесты не найдены';
    header('Location: ../main.php');
}
