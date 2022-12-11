<?php
require_once 'baseMethods.php';
session_start();
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
                    if(checkLastQuery())
                        echo $model->registerFeedback([
                            'name' => $_POST['name'],
                            'phone' => $_POST['phone'],
                            'email' => $_POST['email'],
                            'gift' => $_POST['gift'],
                        ]);
                    else
                        echo result([
                            'status' => 'false',
                            'message' => 'The waiting time is broken'
                        ], 408);
                    return;
            }
            break;
        case 'GET':
            break;
    }
} catch (\Throwable $th) {
    echo $th->getMessage();
}
function checkLastQuery(){
    if(empty($_SESSION['lastQueryDate']) || date('d.m.Y H:i:s') > date('d.m.Y H:i:s', strtotime($_SESSION['lastQueryDate'].' +1 minutes'))){
        $_SESSION['lastQueryDate'] = date('d.m.Y H:i:s');
        return true;
    }else
        return false;
}