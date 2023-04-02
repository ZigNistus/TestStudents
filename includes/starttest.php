<?php
session_start();
require_once 'connect.php';

$test_id = $_POST['test_id'];
$_SESSION['test_id'] = $test_id;

$check_questions = mysqli_query($db, "SELECT `id`, `question` FROM `Qst_Answ` WHERE `test_id` = '$test_id' ");

if (mysqli_num_rows($check_questions) > 0) {
    $questions = mysqli_fetch_all($check_questions, MYSQLI_ASSOC);

    $qes_anw = [];

    foreach ($questions as $v1) {
        $id = $v1['id'];
        $answers = mysqli_query($db, "SELECT `qes_option` FROM `Var_answ` WHERE `question_id` = '$id' ");
        $ans4 = mysqli_fetch_all($answers, MYSQLI_ASSOC);
        $qes_anw[$v1['question']] = $ans4;
    }

    $_SESSION['questions'] = $qes_anw;

    header('Location: ../test_pass.php');
} else {
    $_SESSION['message'] = 'тест не найден';
    header('Location: ../tests.php');
}
