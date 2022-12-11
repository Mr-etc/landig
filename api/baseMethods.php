<?php
function result($data, $code){
    http_response_code($code);
    return json_encode($data);
}