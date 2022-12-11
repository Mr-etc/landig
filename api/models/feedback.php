<?php
require_once './validation.php';
require_once './db.php';
class feedbackModel{
    private $params = null;
    function __construct($params){
        $this->params = $params;
    } 

    function registerFeedback(Array $data){
        try {
            $data['name'] = Validation::checkValue('baseField', $data['name']);
            $data['phone'] = Validation::checkValue('phone', $data['phone']);
            $data['email'] = Validation::checkValue('email', $data['email']);
            $data['gift'] = Validation::checkValue('select', $data['gift']);
            foreach ($data as $item) 
                if(empty($item))
                    throw new Exception("Incorrect data");

            $db = new DB();
            $data = $db->query("INSERT INTO `feedback` (`id`, `date`, `name`, `phone`, `mail`, `giftId`) VALUES (NULL, '". date('Y-m-d H:i:s') ."', '". $data['name'] ."', '". $data['phone'] ."', '". $data['email'] ."', (SELECT `id` FROM `gifts` WHERE `id` = ". $data['gift'] ."));");
            
            if($data == 0)
                throw new Exception("Incorrect data");

            return $this->result([
                'status' => 'ok',
                'message' => 'Feedback is registered',
                'id' => $data
            ] ,200);
        } catch (\Throwable $th) {
            return $this->result([
                'status' => 'false',
                'message' => $th->getMessage()
            ] ,400);
        }
    }


    private function result($data, $code){
        http_response_code($code);
        return json_encode($data);
    }
}