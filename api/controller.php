<?php

sleep(3);//эмуляция сложных вычислений))

header('Content-Type: application/json; charset=utf-8');
$queryType = $_SERVER['REQUEST_METHOD'];
$query = explode('/', $_GET['q']);
try {
    require_once 'models/' . $query[0] . '.php';
    $model = $query[0] . 'Model';
    $model = new $model($query);

    switch ($queryType) {
        case 'POST':
            switch ($query[0]) {
                case 'feedback':
                    echo $model->registerFeedback([
                        'name' => $_POST['name'],
                        'phone' => $_POST['phone'],
                        'email' => $_POST['email'],
                        'gift' => $_POST['gift'],
                    ]);
                    return;
            }
            break;
        case 'GET':
            break;
    }
} catch (\Throwable $th) {
    echo $th->getMessage();
}
