<?php 
    session_start();
    require_once 'connect.php';
    $student_id = $_SESSION['user']['id'];

    $results = $db->prepare(
        "SELECT Tests.discipline AS Discipline,
        Tests.test AS `Name`,
        Results.mark
        FROM Results
        LEFT JOIN Tests ON Tests.id = Results.test_id 
        where Results.student_id = $student_id");
    $results->execute();
    $results = $results->get_result();

    if(mysqli_num_rows($results) > 0)
    {
        $_SESSION['results'] = $results->fetch_all();
        header('Location: ../results.php');
    } else {
        $_SESSION['message'] = 'результаты не найдены';
        header('Location: ../results.php');
    }
