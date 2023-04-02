<?php
session_start();
require_once 'connect.php';

$test_id = $_SESSION['test_id'];
unset($_SESSION['test_id']);

$opt = [];
for ($i = 1; $i < $_SESSION['op_num']; $i++) {
    $opt[$i - 1] = [$_POST['option' . $i]];
}
$check_right_anserws = mysqli_query($db, "SELECT `answer_int` FROM `Qst_Answ` WHERE `test_id` = '$test_id'");

if (mysqli_num_rows($check_right_anserws) > 0) {
    $right_anserws = mysqli_fetch_all($check_right_anserws, MYSQLI_ASSOC);
    $count_right = 0;
    $i = 0;
    foreach ($right_anserws as $key => $value) {

        if ($value['answer_int'] == $opt[$i][0]) {
            $count_right++;
        }
        $i++;
    }
    $ratio = $count_right / count($right_anserws);
    switch ($ratio) {
        case 1:
            $mark = 5;
            break;
        case ($ratio >= 0.7):
            $mark = 4;
            break;
        case ($ratio >= 0.5):
            $mark = 3;
            break;
        case ($ratio < 0.5):
            $mark = 2;
            break;
    }

    $_SESSION['test_result'] = [
        "right" => $count_right,
        "total" => count($right_anserws),
        "test_id" => $test_id,
        "mark" => $mark
    ];

    $exist = $db->prepare("SELECT * FROM Results WHERE test_id = ? and student_id = ?");
    $exist->bind_param("ii", $test_id, $_SESSION['user']['id']);
    $exist->execute();
    $exist = $exist->get_result();
    echo '<pre>';
    echo print_r($exist);
    echo '</pre>';

    if (mysqli_num_rows($exist) > 0) {
        $_SESSION['message'] = 'Так как тест уже был пройден ранее результат этой попытки не защитывается';
        header('Location: ../test_result.php');
    } else {
        $result_insert = $db->prepare("INSERT INTO Results (student_id, test_id, mark) VALUES (?,?,?)");
        $result_insert->bind_param('iii', $_SESSION['user']['id'], $_SESSION['test_result']['test_id'], $_SESSION['test_result']['mark']);
        $result_insert->execute();
    }

    header('Location: ../test_result.php');
} else {
    $_SESSION['message'] = 'ответы не найдены';
    header('Location: ../test_pass.php');
}
